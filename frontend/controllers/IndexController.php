<?php
/**
 * Created by PhpStorm.
 * User: M S I LW
 * Date: 2017/12/17
 * Time: 15:38
 */
namespace frontend\controllers;
use frontend\models\Action;
use yii\web\Controller;

class IndexController extends Controller{
    public $enableCsrfValidation=false;
      public function actionIndex(){ //测试短信发送方式
          return $this->render('sms');
      }

      public function actionText(){ //测试短信接口
          $redis=\Yii::$app->redis;
          echo $redis->get('15680759524');
      }

      public function actionText1(){ //内容专用测试
          $model=Action::find()->select(['type'])->where(['id'=>1])->asArray()->one();
          $name=implode('',$model);
          $array=explode(',',$name);
          var_dump($array);
      }

      public function actionCheck(){  //判断ip的重复性
          $ip=\Yii::$app->request->userIP;
          $redis=\Yii::$app->redis;
          $result=$redis->get($ip);
          if ($result){
              echo '1';
          }else{
              echo '2';
          }
      }

      public function actionCheck1($msg,$num){ //验证验证码的对错
          $redis=\Yii::$app->redis;
          $number=$redis->get($num);
          if ($number==$msg){
              echo '1';
          }else{
              echo '2';
          }

      }
}