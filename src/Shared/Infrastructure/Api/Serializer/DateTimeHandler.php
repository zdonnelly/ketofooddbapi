<?php

declare(strict_types = 1);

namespace KetoFoodDbApi\Shared\Infrastructure\Api\Serializer;

use DateInterval;
use DateTime;
use DateTimeInterface;
use DateTimeZone;
use JMS\Serializer\Context;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\VisitorInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;

/**
 * Copy & paste from `JMS\Serializer\Handler\DateHandler` with support for DateTimeImmutable
 */
final class DateTimeHandler implements SubscribingHandlerInterface
{
    private $defaultFormat;
    private $defaultTimezone;
    private $xmlCData;

    public function __construct($defaultFormat = DateTime::ATOM, $defaultTimezone = 'UTC', $xmlCData = true)
    {
        $this->defaultFormat   = $defaultFormat;
        $this->defaultTimezone = new DateTimeZone($defaultTimezone);
        $this->xmlCData        = $xmlCData;
    }

    public static function getSubscribingMethods(): array
    {
        $methods = [];
        $types   = ['DateTime', 'DateInterval'];

        foreach (['json', 'xml', 'yml'] as $format) {
            $methods[] = [
                'type'      => 'DateTime',
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format'    => $format,
            ];

            foreach ($types as $type) {
                $methods[] = [
                    'type'      => $type,
                    'format'    => $format,
                    'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                    'method'    => 'serialize' . $type,
                ];
            }
        }

        return $methods;
    }

    public function serializeDateTime(VisitorInterface $visitor, DateTimeInterface $date, array $type, Context $context)
    {
        if ($visitor instanceof XmlSerializationVisitor && false === $this->xmlCData) {
            return $visitor->visitSimpleString($date->format($this->getFormat($type)), $type, $context);
        }

        return $visitor->visitString($date->format($this->getFormat($type)), $type, $context);
    }

    public function serializeDateInterval(VisitorInterface $visitor, DateInterval $date, array $type, Context $context)
    {
        $iso8601DateIntervalString = $this->format($date);

        if ($visitor instanceof XmlSerializationVisitor && false === $this->xmlCData) {
            return $visitor->visitSimpleString($iso8601DateIntervalString, $type, $context);
        }

        return $visitor->visitString($iso8601DateIntervalString, $type, $context);
    }

    public function format(DateInterval $dateInterval): string
    {
        $format = 'P';

        if (0 < $dateInterval->y) {
            $format .= $dateInterval->y . 'Y';
        }

        if (0 < $dateInterval->m) {
            $format .= $dateInterval->m . 'M';
        }

        if (0 < $dateInterval->d) {
            $format .= $dateInterval->d . 'D';
        }

        if (0 < $dateInterval->h || 0 < $dateInterval->i || 0 < $dateInterval->s) {
            $format .= 'T';
        }

        if (0 < $dateInterval->h) {
            $format .= $dateInterval->h . 'H';
        }

        if (0 < $dateInterval->i) {
            $format .= $dateInterval->i . 'M';
        }

        if (0 < $dateInterval->s) {
            $format .= $dateInterval->s . 'S';
        }

        return $format;
    }

    public function deserializeDateTimeFromXml(XmlDeserializationVisitor $unused, $data, array $type)
    {
        $attributes = $data->attributes('xsi', true);
        if (isset($attributes['nil'][0]) && (string) $attributes['nil'][0] === 'true') {
            return null;
        }

        return $this->parseDateTime($data, $type);
    }

    public function deserializeDateTimeFromJson(JsonDeserializationVisitor $unused, $data, array $type)
    {
        if (null === $data) {
            return null;
        }

        return $this->parseDateTime($data, $type);
    }

    /**
     * @param array $type
     *
     * @return string
     *
     */
    private function getFormat(array $type): string
    {
        return $type['params'][0] ?? $this->defaultFormat;
    }

    private function parseDateTime($data, array $type)
    {
        $timezone = isset($type['params'][1]) ? new DateTimeZone($type['params'][1]) : $this->defaultTimezone;
        $format   = $this->getFormat($type);
        $datetime = DateTime::createFromFormat($format, (string) $data, $timezone);
        if (false === $datetime) {
            throw new RuntimeException(sprintf('Invalid datetime "%s", expected format %s.', $data, $format));
        }

        return $datetime;
    }
}
