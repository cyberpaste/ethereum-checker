<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\WalletForm;
use app\helpers\Etherscan;

class SiteController extends Controller {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $model = new WalletForm();
        $list = null;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $list['balance'] = Etherscan::getBalance($model->wallet);
            $list['transactions'] = Etherscan::getTransactions($model->wallet);
        }

        return $this->render('index', [
                    'model' => $model,
                    'list' => $list,
        ]);
    }

}
