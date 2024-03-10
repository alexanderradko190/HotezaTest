<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\PhoneListForm $phoneListForm */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'PhoneFormatter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-list-upload">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'list-upload-form',
                'action' => ['phone-formatter/normalize-phone-numbers'],
                'method' => 'post',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($phoneListForm, 'csvList')->fileInput(['options' =>
                ['accept' => '.csv']
            ]) ?>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('загрузить', ['class' => 'btn btn-primary', 'name' => 'upload-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
