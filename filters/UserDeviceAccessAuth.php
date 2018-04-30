<?php
/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Web Site: http://IgnatenkovNikita.ru
 */

namespace ignatenkovnikita\device\filters;


use ignatenkovnikita\device\models\UserDevice;
use yii\base\ActionFilter;
use yii\web\HttpException;

class UserDeviceAccessAuth extends ActionFilter
{

    public $tokenParam = 'User-Device-Token';

    public function beforeAction($action)
    {

        $accessToken = \Yii::$app->request->getHeaders()->get($this->tokenParam);

        if (is_string($accessToken)) {
            $model = UserDevice::findIdentityByToken($accessToken);
            if ($model !== null) {
                \Yii::$app->userDevice->setIdentity($model);
                return true;
            }
        }

        throw new HttpException(401, 'Попытка соединения с неверным  user-device token.');
    }

}