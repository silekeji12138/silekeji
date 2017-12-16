<?php
namespace backend\controllers;

use backend\models\Action;
use backend\models\Admin;
use backend\models\AdminForm;
use backend\models\EditForm;
use backend\models\PasswordForm;
use backend\models\WebSet;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;


class IndexController extends Controller {
//管理员登录界面
    public function actionLogin(){
        $model=new AdminForm();
        $request=\Yii::$app->request;
        if ($request->isPost){
            $model->load($request->post());
            if($model->validate()){
                if($model->login()){
                    \Yii::$app->session->setFlash('success','登录成功');
                    $admin=\Yii::$app->user->identity;
                    $ip=ip2long(\Yii::$app->request->getUserIP());
                    $rs=Admin::findOne($admin->id);
                    $rs->last_login_time=time()+3600*8;
                    $rs->last_login_ip=$ip;
                    $rs->save();
                    return $this->redirect(Url::to(['index/list']));
                }else{
                    \Yii::$app->session->setFlash('error','请检测您的用户民或密码');
                    return $this->redirect(Url::to(['index/login']));
                }
            }
        }
        return $this->render('index',compact('model'));
    }
    //管理员列表界面
    public function actionList(){
        if (\Yii::$app->user->isGuest){
            \Yii::$app->session->setFlash('error','请先登录');
            return $this->redirect(Url::to(['index/login']));
        }
        $model=Admin::find()->all();
        return $this->render('list',compact('model'));
    }
    //添加管理人员
    public function actionAddAdmin(){
        $model=new Admin();
        $request=\Yii::$app->request;
        if ($request->isPost){
            $model->load($request->post());
            if ($model->validate()){
                   $model->password=md5($model->password);
                   $model->create_time=time();
                   $model->last_login_ip=ip2long(\Yii::$app->request->getUserIP());
                   $model->save();
                   \Yii::$app->session->setFlash('success','添加成功');
                   return $this->redirect(Url::to(['index/list']));
            }
        }
        return $this->render('addadmin',compact('model'));
    }
    //删除管理员
    public function actionDelAdmin($id){
        $model=Admin::findOne($id);
        $rs=$model->delete();
        if ($rs){
            return '1';
        }else{
            return '2';
        }
    }
    //编辑管理员
    public function actionEditAdmin($id){
        $model=EditForm::findOne($id);
        $request=\Yii::$app->request;
        if ($request->isPost){
            $model->load($request->post());
            if ($model->validate()){
                $model->last_login_time=time();
                $model->last_login_ip=ip2long(\Yii::$app->request->getUserIP());
                $model->save();
                \Yii::$app->session->setFlash('success','修改成功');
                return $this->redirect(Url::to(['index/list']));
            }
        }
        return $this->render('editadmin',compact('model'));
    }
    //查看管理员详细信息
    public function actionCheckAdmin($id){
        $model=Admin::findOne($id);
        return $this->render('checkadmin',compact('model'));
    }
    //网站设置
    public function actionWebSet(){
        $model=WebSet::findOne(1);
        $request=\Yii::$app->request;
        if ($request->isPost){
            $model->load($request->post());
            if ($model->validate()){
                $model->save();
                \Yii::$app->session->setFlash('success','修改成功');
                return $this->redirect(Url::to(['index/web-set']));
            }
        }
        return $this->render('webset',compact('model'));
    }
    //修改密码
    public function actionEditPassword($id){
        $model=new PasswordForm();
        $request=\Yii::$app->request;
        if ($request->isPost){
            $admin=\Yii::$app->user->identity;
            $model=PasswordForm::findOne($id);
            $model->load($request->post());
            if ($model->validate()){
                $model->password=md5($model->password);
                $model->save();
                \Yii::$app->session->setFlash('success','修改成功');
                return $this->redirect(Url::to(['index/list']));
            }
        }
        return $this->render('edit-password',compact('model'));
    }
    //活动设置





}