<?php
$form=\yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'title')->textInput();
echo $form->field($model,'keywords')->textInput();
echo $form->field($model,'describe')->textarea();

echo \yii\helpers\Html::submitButton('提交',['class'=>'btn btn-info']);

yii\bootstrap\ActiveForm::end();