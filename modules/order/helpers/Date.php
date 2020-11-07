<?php

namespace order;

use Yii;

class Date
{
    /** @var string */
    public const DATE_VIEW_FORMAT = 'php:Y-m-d';

    /** @var string */
    public const TIME_VIEW_FORMAT = 'php:H:i:s';

    /** @var string */
    public const DATETIME_DOWNLOAD_FORMAT = 'php:Y-m-d H.i';

    /**
     * @param $value
     * @param string $format
     * @return string
     * @throws
     */
    public static function getDateTime($value, string $format): string
    {
        return Yii::$app->formatter->asDatetime($value, $format);
    }
}
