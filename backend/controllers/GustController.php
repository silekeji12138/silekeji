<?php
/**
 * Created by PhpStorm.
 * User: M S I
 * Date: 2017/12/15
 * Time: 12:58
 */
namespace backend\controllers;
use yii\helpers\Url;
use yii\web\Controller;

class GustController extends Controller{
      public  function actionLogin(){
          if (\Yii::$app->user->isGuest){
              \Yii::$app->session->setFlash('error','请先登录');
              return $this->redirect(Url::to(['index/login']));
          }
      }

}