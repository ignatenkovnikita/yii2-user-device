<?php
/**
 * Copyright (C) $user$, Inc - All Rights Reserved
 *
 *  <other text>
 * @file        UserDeviceForm.php
 * @author      ignatenkovnikita
 * @date        $date$
 */

/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Web Site: http://IgnatenkovNikita.ru
 */

namespace ignatenkovnikita\device\models\form;


use ignatenkovnikita\device\models\UserDevice;
use yii\base\Model;

class UserDeviceForm extends Model
{

    public $uuid;
    public $token;
    public $os;
    public $version;
    public $json;
    public $created_by;

    /** @var UserDevice $_model */
    private $_model;


    public function rules()
    {
        return [
            ['uuid', 'filter', 'filter' => function ($value) {
                if (is_null($value)) {
                    $value = \Yii::$app->security->generateRandomString();
                }
                return $value;
            }],
            [['uuid', 'os'], 'required'],
            [['created_by'], 'integer'],
            ['json', 'filter', 'filter' => function ($value) {
                if (is_array($value)) {
                    $value = json_encode($value);
                }
                return $value;
            }],
            [['os'], 'in', 'range' => ['android', 'ios', 'web']],
            [['json', 'token'], 'string'],
            [['uuid', 'version'], 'string', 'max' => 255],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $model = UserDevice::find()->andWhere(['or',['uuid' => $this->uuid],['token' => $this->token]])->one();
            if (empty($model)) {
                $model = new UserDevice();
            }

            $model->load($this->attributes, '');

            if ($model->save()) {
                $this->_model = $model;
                return true;
            }
        }

        return false;
    }

    public function getModel()
    {
        return $this->_model;
    }
}
