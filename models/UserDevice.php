<?php

namespace ignatenkovnikita\device\models;

use  ignatenkovnikita\device\interfaces\UserDeviceInterface;
use  Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user_device".
 *
 * @property integer $id ID
 * @property string $uuid Uuid
 * @property integer $status_id Status ID
 * @property string $json Json
 * @property string $token Token
 * @property string $access_token Access Token
 * @property integer $created_at Created At
 * @property integer $updated_at Updated At
 * @property integer $author_id Author ID
 * @property integer $updater_id Updater ID
 */
class UserDevice extends ActiveRecord implements UserDeviceInterface
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => \yii\behaviors\TimestampBehavior::class,
            'access_token' => [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'access_token'
                ],
                'value' => function () {
                    return Yii::$app->getSecurity()->generateRandomString(40);
                }
            ],
            'author' => [
                'class' => \yii\behaviors\BlameableBehavior::class,
                'createdByAttribute' => 'author_id',
                'updatedByAttribute' => 'updater_id',
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_device}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uuid'], 'required'],
            [['status_id', 'created_at', 'updated_at', 'author_id', 'updater_id'], 'integer'],
            [['json'], 'string'],
            [['uuid', 'token', 'access_token','os','version'], 'string', 'max' => 255],
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


    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @param $domain
     * @return mixed
     */

    public static function findIdentityByToken($token)
    {
        return self::find()->andWhere(['access_token' => $token])->one();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
