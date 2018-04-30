<?php

namespace ignatenkovnikita\device\interfaces;

/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 30/04/2018
 * Time: 10:23
 */

interface UserDeviceInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public static function findIdentity($id);

    public static function findIdentityByToken($token);

    /**
     * @return mixed
     */
    public function getId();
}