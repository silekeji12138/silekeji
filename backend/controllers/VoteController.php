<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/15
 * Time: 15:37
 */
namespace backend\controllers;


use backend\models\CbAction;
use yii\web\Controller;
class VoteController extends Controller
{
    //投票结果页面
    public function actionIndex(){
        $data = CbAction::find()->asArray()->all();
        return $this->render('index',['data'=>$data]);
    }
    public function actionCount(){

    }
}