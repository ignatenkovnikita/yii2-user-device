<?php

namespace ignatenkovnikita\device\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_device".
 *
 * @property integer $id ID
 * @property string $uuid Uuid
 * @property integer $status_id Status ID
 * @property string $json Json
 * @property string $token Token
 * @property integer $created_at Created At
 * @property integer $updated_at Updated At
 * @property integer $author_id Author ID
 * @property integer $updater_id Updater ID
 */
class UserDevice extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => \yii\behaviors\TimestampBehavior::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uuid', 'token'], 'required'],
            [['status_id', 'created_at', 'updated_at', 'author_id', 'updater_id'], 'integer'],
            [['json'], 'string'],
            [['uuid', 'token'], 'string', 'max' => 255],
            [['uuid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uuid' => 'Uuid',
            'status_id' => 'Status ID',
            'json' => 'Json',
            'token' => 'Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'author_id' => 'Author ID',
            'updater_id' => 'Updater ID',
        ];
    }

    /**
     * @inheritdoc
     * @return UserDeviceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserDeviceQuery(get_called_class());
    }
}
