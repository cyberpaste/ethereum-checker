<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\helpers\EthereumValidator;

/**
 * ContactForm is the model behind the contact form.
 */
class WalletForm extends Model {

    public $wallet;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            ['wallet', 'required'],
            ['wallet', 'validateWallet'],
        ];
    }

    public function validateWallet($attribute) {
        if (!EthereumValidator::isAddress($this->$attribute)) {
            $this->addError($attribute, 'Invalid address');
        }
    }

}
