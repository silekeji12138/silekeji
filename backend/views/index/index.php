<?php
$form=yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'username')->textInput();
echo $form->field($model,'password')->textInput();
echo \yii\helpers\Html::submitButton('登录',['class'=>'btn btn-info']);

yii\bootstrap\ActiveForm::end();