<?php
/**
 * Created by PhpStorm.
 * User: M S I LW
 * Date: 2017/12/17
 * Time: 15:38
 */
namespace frontend\controllers;
use frontend\models\Prize;
use yii\web\Controller;

class PrizeController extends Controller{
    public $layouts=false;
    public function actionIndex(){ //抽奖视图页面的显示
        $model=Prize::find()->select('name')->asArray()->all();
         return $this->render('Luck',compact('model'));
    }

    public  function actionPrize(){ //抽奖的控制
        $arr=Prize::prize();
        echo json_encode($arr);
    }

    public function actionDel($id){  //抽奖后重新计算库存的多少
          $model=Prize::findOne(['level'=>$id]);
          $model->number-=1;
          $model->save();
    }
}