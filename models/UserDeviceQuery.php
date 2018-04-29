<?php

namespace ignatenkovnikita\device\models;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[UserDevice]].
 *
 * @see UserDevice
 */
class UserDeviceQuery extends ActiveQuery
{
    /*public function active()
    {
    return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserDevice[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserDevice|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
