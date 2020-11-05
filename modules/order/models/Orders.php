<?php

namespace order\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $user_id
 * @property string $link
 * @property int $quantity
 * @property int $service_id
 * @property int $status 0 - Pending, 1 - In progress, 2 - Completed, 3 - Canceled, 4 - Fail
 * @property int $created_at
 * @property int $mode 0 - Manual, 1 - Auto
 */
class Orders extends ActiveRecord
{
    /** @var string */
    public const STATUS_PENDING = '0';

    /** @var string */
    public const STATUS_IN_PROGRESS = '1';

    /** @var string */
    public const STATUS_COMPLETED = '2';

    /** @var string */
    public const STATUS_CANCELED = '3';

    /** @var string */
    public const STATUS_FAIL = '4';

    /** @var string */
    public const MODE_MANUAL = '0';

    /** @var string */
    public const MODE_AUTO = '1';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'link', 'quantity', 'service_id', 'status', 'created_at', 'mode'], 'required'],
            [['user_id', 'quantity', 'service_id', 'status', 'created_at', 'mode'], 'integer'],
            [['link'], 'string', 'max' => 300],
        ];
    }
}
