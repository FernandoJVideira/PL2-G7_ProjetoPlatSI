<?php

namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Model;

class ChangePasswordForm extends Model
{
    public $currentPassword;
    public $newPassword;
    public $newPasswordRepeat;

    private $_user;

    public function rules()
    {
        return [
            [['currentPassword', 'newPassword', 'newPasswordRepeat'], 'required', 'message' => 'Este campo é obrigatório'],
            ['currentPassword', 'validateCurrentPassword'],
            ['newPassword', 'string', 'min' => 8,  'tooShort' => 'A password tem de ter pelo menos 8 caracteres'],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword', 'message' => "As passwords não coincidem"],
        ];
    }
    public function attributeLabels()
    {
        return [
            'currentPassword' => 'Password Antiga',
            'newPassword' => 'Nova Password',
            'newPasswordRepeat' => 'Repetir Nova Password',
        ];
    }

    public function validateCurrentPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->currentPassword)) {
                $this->addError($attribute, 'Password antiga incorreta.');
            }
        }
    }

    public function changePassword()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            $user->setPassword($this->newPassword);
            return $user->save(false);
        }
        return false;
    }

    private function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findIdentity(Yii::$app->user->id);
        }
        return $this->_user;
    }
}