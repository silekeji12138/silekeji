<?php
/**
 * Created by PhpStorm.
 * User: M S I LW
 * Date: 2017/12/17
 * Time: 15:38
 */
namespace frontend\controllers;
use yii\web\Controller;

class IndexController extends Controller{
    public $enableCsrfValidation=false;
      public function actionIndex(){
          return $this->render('sms');
      }
}