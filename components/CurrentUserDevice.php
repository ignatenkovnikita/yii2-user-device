<?php

namespace ignatenkovnikita\device\components;
use ignatenkovnikita\device\interfaces\UserDeviceInterface;
use ignatenkovnikita\device\models\UserDevice;

/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 30/04/2018
 * Time: 10:26
 */

class CurrentUserDevice extends \yii\base\Component
{


    /** @var UserDevice $_identity */
    private $_identity = false;

    /**
     * @var bool/string
     */
    public $identityClass = false;


    /**
     * Returns the identity object associated with the currently logged tenant.
     * @return Site the identity object associated with the currently logged tenant.
     * `null` is returned if the tenant is not logged in (not authenticated).
     */
    public function getIdentity()
    {
        return $this->_identity;
    }


    public function setIdentity($identity)
    {
        if ($identity instanceof UserDeviceInterface) {
            $this->_identity = $identity;
        } elseif ($identity === null) {
            $this->_identity = null;
        } else {
            throw new InvalidValueException('The identity object must implement UserDeviceInterface.');
        }
    }


}