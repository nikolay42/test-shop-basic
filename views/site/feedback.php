<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->label('Ваше имя') ?>

<?= $form->field($model, 'email')->label('Электронная почта') ?>

<?= $form->field($model, 'message')->textarea(['rows' => 6])->label('Сообщение') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>