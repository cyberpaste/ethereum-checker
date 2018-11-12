<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\helpers\EtheriumConverter;

$converter = new EtheriumConverter;
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Wallet scanner</h1>

        <p class="lead">Enter ethereum wallet please!</p>


        <?php
        $form = ActiveForm::begin([
                    'id' => 'form-input-example',
                    'options' => [
                        'class' => 'form-horizontal col-lg-11',
                    ],
        ]);
        ?>
        <?= $form->field($model, 'wallet'); ?>

        <?= Html::submitButton('Check Eth Wallet', ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
    <?php if ($list) { ?>
        <div class="body-content">

            <div class="container">

                
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <p> <b>BALANCE <?= $converter->fromWei($list['balance']); ?> ETH</b></p>
                        <?php
                        if (isset($list['transactions'])) {
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Transaction Link</th>
                                    </tr>
                                </thead>
                                <?php foreach ($list['transactions'] as $item) { ?> 
                                    <tbody>
                                        <tr>
                                            <td><a targe="_blank" href="https://etherscan.io/tx/<?= $item->hash ?>"><?= $item->hash ?></a></td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table> 

                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>
    <?php } ?>
</div>
