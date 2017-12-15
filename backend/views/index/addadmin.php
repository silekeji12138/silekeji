<?php
$form=yii\bootstrap\ActiveForm::begin();
echo $form->field($model,'username')->textInput();
echo $form->field($model,'password')->passwordInput();
echo $form->field($model,'role_id')->textInput();
echo $form->field($model,'status')->dropDownList(['1'=>'可用','2'=>'不可用']);
echo $form->field($model,'name')->textInput();
echo $form->field($model,'really_name')->textInput();
echo $form->field($model,'sex',['inline'=>1])->radioList(['1'=>'男','2'=>'女']);
echo $form->field($model,'qq')->textInput();
echo $form->field($model,'mobile')->textInput();
echo $form->field($model,'email')->textInput();
echo $form->field($model,'address')->textInput();

echo \yii\helpers\Html::submitButton('添加',['class'=>'btn btn-info']);



yii\bootstrap\ActiveForm::end();
