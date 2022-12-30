<?php

namespace frontend\models;

use common\models\Carrinho;
use common\models\Morada;
use common\models\Utilizador;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nome;
    public $telemovel;
    public $nif;
    public $morada;
    public $pais;
    public $cidade;
    public $codigo_postal;




    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'O username tem de ser preenchido!'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Existe uma conta registada com este username!'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'O e-mail tem de ser preenchido!'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Existe uma conta registada com este e-mail!'],

            ['password', 'required', 'message' => 'A password tem de ser preenchida!'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength'], 'message' => 'A password tem de ter pelo menos 8 caracteres!'],

            ['nome', 'required', 'message' => 'O nome tem de ser preenchido!'],
            ['nome', 'string', 'min' => 2, 'max' => 255],

            ['telemovel', 'required', 'message' => 'O telemóvel tem de ser preenchido!'],
            ['telemovel', 'integer', 'message' => 'O telemóvel deve ser um número!'],
            ['telemovel', 'string', 'min' => 9, 'max' => 9, 'tooShort' => 'O telemóvel deve ser um número com 9 digitos!', 'tooLong' => 'O telemóvel deve ser um número com 9 digitos!'],

            ['nif', 'required', 'message' => 'O nif tem de ser preenchido!'],
            ['nif', 'integer', 'message' => 'O nif deve ser um número!'],
            ['nif', 'string', 'min' => 9, 'max' => 9, 'tooShort' => 'O nif deve ser um número com 9 digitos!', 'tooLong' => 'O nif deve ser um número com 9 digitos!'],
            ['nif', 'unique', 'targetClass' => '\common\models\Utilizador', 'message' => 'Existe uma conta registada com este nif!'],

            ['morada', 'required', 'message' => 'A morada tem de ser preenchida!'],
            ['morada', 'string', 'min' => 2, 'max' => 255],

            ['pais', 'required'],
            ['pais', 'string', 'min' => 2, 'max' => 255],

            ['cidade', 'required', 'message' => 'A cidade tem de ser preenchida!'],
            ['cidade', 'string', 'min' => 2, 'max' => 255],

            ['codigo_postal', 'required', 'message' => 'O código postal tem de ser preenchido!'],
            ['codigo_postal', 'string', 'min' => 4, 'max' => 12],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return false;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $utilizador = new Utilizador();
        $utilizador->nome = $this->nome;
        $utilizador->telemovel = $this->telemovel;
        $utilizador->nif = $this->nif;


        $morada = new Morada();
        $morada->rua = $this->morada;
        $morada->pais = $this->pais;
        $morada->cidade = $this->cidade;
        $morada->cod_postal = $this->codigo_postal;

        if(!$user->validate() && !$utilizador->validate() && !$morada->validate()){
            return false;
        }
        $user->save();
        $utilizador->id_user = $user->id;

        $utilizador->save();
        $morada->id_user = $utilizador->idUser;

        $morada->save();

        $cart_id = Yii::$app->request->cookies->getValue('cart_id');

        if($cart_id){
            $cart = Carrinho::findOne($cart_id);
            $cart->id_user = Yii::$app->user->id;
            $cart->save();
        }

        return true;
    }
}
