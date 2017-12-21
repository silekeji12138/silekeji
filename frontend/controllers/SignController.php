<?php
/**
 * Created by PhpStorm.
 * User: M S I  LW 报名系统
 * Date: 2017/12/18
 * Time: 13:25
 */
namespace frontend\controllers;
use frontend\models\Action1;
use frontend\models\Action;
use frontend\models\Rule;
use frontend\models\Sign;
use yii\data\Sort;
use yii\web\Controller;

class SignController extends Controller{
    public $enableCsrfValidation=false;
       public function actionSign(){  //参与活动的页面=>报名的页面
           $model=new Sign();
           $request=\Yii::$app->request;
           if ($request->isPost){
               $model->load($request->post(),'');
               if ($model->validate()){
                   $model->addtime=time()+3600*8;
                   $model->save();
                   return $this->redirect('index');
               }
           }
            return $this->render('sign');
       }
       public function actionIndex(){ //首页参加人数 访问人数 投票数量的显示
           $rule=Rule::find()->asArray()->all(); //规则查询
           /**
            * 排序根据
            */
           if ($rule[0]['p_z']==1) {
               $order = 'addtime DESC';
           }elseif($rule[0]['p_z']==2){
               $order = 'vote_num DESC';
           }else{
               $order='number ASC';
           }
           /**
            * 分割线 以上作用于判断
            */
           $type=Action::find()->select(['type'])->where(['id'=>1])->asArray()->one(); //查询type的方式与格式
           $name=implode('',$type);
           $array=explode(',',$name);
           $time=\frontend\models\Action::find()->select(['end'])->one(); //结束时间的查询
           $model2=Action1::find()->select(['vote_num','view','join_num'])->where(['action_id'=>1])->asArray()->all();
           $request=\Yii::$app->request;
           if ($request->isPost){
               $id=$_POST['ss']; //搜索功能的条件
               $model=Sign::find()->where(['like','title',$id])->orWhere(['like','id',$id])->orderBy($order)->all();
           }else{
               $model=Sign::find()->orderBy($order)->all();
           }
           return $this->render('index',compact('model','model2','time','array','rule'));
       }
       public function actionIntro($id){    //参加用户的详细信息
           $model=Sign::findOne($id);
           return $this->render('intro',compact('model'));
       }

       public function actionRule(){  //活动的详细规则
           return $this->render('rule');
       }

       public function actionRank(){  //活动的当前的排名
           return $this->render('rank');
       }

}