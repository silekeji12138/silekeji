<?php
/**
 * Created by PhpStorm.
 * User: M S I LW
 * Date: 2017/12/17
 * Time: 15:38
 */
namespace frontend\controllers;
use frontend\models\Action;
use frontend\models\Action1;
use frontend\models\Rule;
use frontend\models\Sign;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

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
//          $a=Sign::findBySql('SELECT id FROM jnc_sign ORDER BY id DESC LIMIT 1;')->one()->id+1;
//          var_dump($a);
          return $this->render('admin1');
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
      /**
       * 后台管理前台的功能模块 action的修改
       */

      public function actionAdmin($id){ //后台
          if (!Rule::findOne(['action_id'=>$id])){
              $rule=new Rule();
              $rule->action_id=$id;
              $rule->save();
          }
          if (!Action1::findOne(['action_id'=>$id])){
              $action1=new Action1();
              $action1->action_id=$id;
              $action1->save();
          }
          $rs=Action::findOne($id);
          if (!$rs){
              var_dump('没有活动');die;
          }
          $model=Sign::findAll(['action_id'=>$id]);
          $rule=Rule::find()->asArray()->where(['action_id'=>$id])->one();
          $time=Action::find()->asArray()->where(['id'=>$id])->select(['start','end'])->one();
          return $this->render('admin1',compact('model','rule','time'));
      }
       /**
       * 添加数据,活动的条数
       */
      public function actionAddSign($id){
          $model=new Sign();
          $number=Sign::findBySql('SELECT id FROM jnc_sign ORDER BY id DESC LIMIT 1;')->one()->id+1;
          $model->number=$number;
          $model->title="请输入名称";
          $model->addtime=time()+3600*8;
          $model->action_id=$id;
          $model->save();
          $arr=array('A'=>$number,'B'=>$model->id);
          echo json_encode($arr);
      }

    /**
     * 修改投票活动的内容
     */
     public function actionEditSign($id,$title){
         $model=Sign::findOne($id);
         $model->title=$title;
         $model->save();
     }
     /**
      * 删除投票活动内容
      */
     public function actionDelSign($id){
         $model=Sign::findOne($id);
         $model->delete();
     }
     /**
      * 活动总添
      */
     public function actionAction(){
         return $this->render('action');
     }
     /**
      * 附加功能
      */
    public  function actionUploads(){
        if (\Yii::$app->request->isPost){
            $img=UploadedFile::getInstanceByName('file');
            if ($img){
                $file='/upload/'.uniqid().'.'.$img->extension;
                $img->saveAs(\Yii::getAlias('@webroot').$file,0);
                return json_encode(['url'=>$file]);
            }
        }
    }
    /**
     * 内容的添加
     */
    public function actionInfo($id,$info,$story,$join_person){
        $model=Sign::findOne($id);
        $model->info=$info;
        $model->story=$story;
        $model->join_person=$join_person;
        $model->save();
    }
    /**
     * 添加的游戏规则
     */
    public function actionRule($id){

        $request=\Yii::$app->request;
        $model=Rule::findOne(['action_id'=>$id]);
        $model->load($request->post(),'');
        $rs=Action::findOne($id);
        if ($model->validate())
            $rs->start=strtotime($model->start);
            $rs->end=strtotime($model->end);
            $rs->create_time=time()+8*3600;
            $rs->save();
            $model->save();
            return $this->redirect('list');
        }



    /**
     * 图片入库
     */
    public function actionAddPhoto(){
        $url=$_POST['url'];
        $id=$_POST['id'];
        $model=Sign::findOne($id);
        $model->theme_img=$url;
        $model->save();
    }
    /**
     * 添加总活动
     */
    public function actionAddAction($title='',$rule='',$type=''){
        $model=new  Action();
        $model->title=$title;
        $model->rule=$rule;
        $model->type=$type;
        $model->save();
        $id=Sign::findBySql('SELECT id FROM jnc_action ORDER BY id DESC LIMIT 1;')->one()->id;


//        var_dump($id);die;


        return $this->redirect("admin?id={$id}");
    }
    /**
     * 总活动列表
     */
    public function actionList(){
        $model=Action::find()->all();
        return $this->render('list',compact('model'));
    }
    /**
     * 删除活动列表
     */
    public function actionDelAction($id){
        $model=Action::findOne($id);
       $rs= $model->delete();
        if ($rs){
            echo '1';
        }else{
            echo '2';
        }
    }
    /**
     * 修改总活动
     */
    public function actionActionEdit($id){
        $model=Action::findOne($id);
        return $this->render('action1',compact('model'));
    }
    public function actionActionEdit1($id,$title='',$rule='',$type=''){
        $model=Action::findOne($id);
        $model->title=$title;
        $model->rule=$rule;
        $model->type=$type;
        $model->save();
        return $this->redirect("admin?id={$id}");
    }
}