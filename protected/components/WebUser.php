<?php

class WebUser extends CWebUser
{
    // Menambahkan properti user untuk menyimpan data user
    private $_user = null;

    public function getUser()
    {
        // Mengembalikan data user dari sesi jika ada
        if ($this->_user === null) {
            $this->_user = Yii::app()->user->getState('user');
        }
        return $this->_user;
    }

    public function setUser($value)
    {
        // Menyimpan data user dalam sesi
        $this->_user = $value;
        Yii::app()->user->setState('user', $value);
    }
}
?>
