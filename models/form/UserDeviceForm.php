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
use yii\base\Exception;
use yii\base\Model;

class UserDeviceForm extends Model
{

    public $uuid;
    public $token;
    public $os;
    public $json;
    public $created_by;


    public function rules()
    {
        return [
            [['uuid', 'os', 'token'], 'required'],
            [['created_by'], 'integer'],
            ['json', 'filter', 'filter' => function ($value) {
                if (is_array($value)) {
                    $value = json_encode($value);
                }
                return $value;
            }],
//            ['created_by', 'filter', 'filter' => function ($value) {
//                return \Yii::$app->user->id;
//            }],
            [['os'], 'in', 'range' => ['android', 'ios']],
            [['json', 'token'], 'string'],
            [['uuid'], 'string', 'max' => 255],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $model = UserDevice::find()->andWhere(['uuid' => $this->uuid])->one();
            if (empty($model)) {
                $model = new UserDevice();
            }

            $model->load($this->attributes, '');

            if ($model->save()) {
                return true;
            }
        }

        return false;
    }
}