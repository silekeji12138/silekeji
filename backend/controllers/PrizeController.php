<?php
/**
 * Created by PhpStorm.
 * User: M S I
 * Date: 2017/12/15
 * Time: 16:30
 */
namespace backend\controllers;

use backend\models\Prize;
use yii\web\Controller;

class PrizeController extends Controller{
    //中奖纪录
    public function actionIndex(){
          $model=Prize::find()->all();
          return $this->render('index',compact('model'));
    }
}