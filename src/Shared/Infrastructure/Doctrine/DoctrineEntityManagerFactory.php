<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Doctrine;

use KetoFoodDbApi\Shared\Infrastructure\Doctrine\DBAL\DbalTypesRegistrar;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\MySqlSchemaManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver;
use Doctrine\ORM\Tools\Setup;
use RuntimeException;
use function Lambdish\Phunctional\dissoc;

final class DoctrineEntityManagerFactory
{
    private static $sharedPrefixes = [
        __DIR__ . '/../../Shared/Infrastructure/Persistence' => 'KetoFoodDbApi\Shared\Domain',
    ];

    public static function create(array $parameters, array $prefixes, $isDevMode, $schemaFile): EntityManagerInterface
    {
        if (true === $isDevMode) {
            static::generateDatabaseIfNotExists($parameters, $schemaFile);
        }

        DbalTypesRegistrar::register();

        return EntityManager::create($parameters, self::createConfiguration($prefixes, $isDevMode));
    }

    private static function generateDatabaseIfNotExists(array $parameters, $schemaFile): void
    {
        self::ensureSchemaFileExists($schemaFile);

        $databaseName                  = $parameters['dbname'];
        $parametersWithoutDatabaseName = dissoc($parameters, 'dbname');
        $connection                    = DriverManager::getConnection($parametersWithoutDatabaseName);
        $schemaManager                 = new MySqlSchemaManager($connection);

        if (!self::databaseExists($databaseName, $schemaManager)) {
            $schemaManager->createDatabase($databaseName);
            $connection->exec(sprintf('USE %s', $databaseName));
            $connection->exec(file_get_contents(realpath($schemaFile)));
        }

        $connection->close();
    }

    /** @fixme add ApcuCache config to configuration */
    private static function createConfiguration(array $prefixes, $isDevMode): Configuration
    {
        $config = Setup::createConfiguration($isDevMode, null, new ArrayCache());

        $config->setMetadataDriverImpl(new SimplifiedYamlDriver(array_merge(self::$sharedPrefixes, $prefixes)));

        return $config;
    }

    private static function databaseExists($databaseName, MySqlSchemaManager $schemaManager): bool
    {
        return in_array($databaseName, $schemaManager->listDatabases(), true);
    }

    private static function ensureSchemaFileExists(string $schemaFile): void
    {
        if (!file_exists($schemaFile)) {
            throw new RuntimeException(sprintf('The file <%s> does not exist', $schemaFile));
        }
    }
}
