<?php
namespace backend\controllers;

<<<<<<< HEAD
use backend\filters\YiiFilter;
use backend\models\Action;
=======
>>>>>>> 60990fb69c36fd63318c187427e3e6e83c53f68f
use backend\models\Admin;
use backend\models\AdminForm;
use backend\models\EditForm;
use yii\helpers\Url;
use yii\web\Controller;
use PHPExcel;



class IndexController extends Controller {
    public $enableCsrfValidation = false;
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
        return $this->render('index',compact('model' ));
    }
    //管理员列表界面
<<<<<<< HEAD
    public function actionList(){
        $model=Admin::find()->all();
        return $this->render('list',compact('model'));
=======
    public function actionList($search,$page=1){
        if ($search==''){
            $query = Admin::find();
        }else{
            $query = Admin::find()->orWhere(['like','username',$search])->orWhere(['like','name',$search])->orWhere(['like','really_name',$search]);
        }
        $offset = \Yii::$app->request->post('offset');
        $offset = isset($offset)?$offset:10;
        $count = $query->count();
        $total = ceil($count/$offset);
        $start = ($page-1)*$offset;
        $model = $query->limit($offset)->offset($start)->all();
        return $this->render('list',['model'=>$model,'total'=>$total]);
>>>>>>> 60990fb69c36fd63318c187427e3e6e83c53f68f
    }
    //添加管理人员
    public function actionAddAdmin(){
        $model=new Admin();
        $request=\Yii::$app->request;
        if ($request->isPost){
            $model->load($request->post(),'');
            if ($model->validate()){
                   $model->password=md5($model->password);
                   $model->create_time=time();
                   $model->last_login_ip=ip2long(\Yii::$app->request->getUserIP());
                   $model->save();
                   \Yii::$app->session->setFlash('success','添加成功');
                   return $this->redirect(Url::to(['index/list']));
            }else{
                var_dump($model->getErrors());die;
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
            $model->load($request->post(),'');
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
<<<<<<< HEAD
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
    //导出文件
    public function actionDe(){
        $repair_infos = Admin::find()->asArray()->all();
        //实例化
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
        //这里是显示的标题字段 也就是你数据库的字段名称
        $objPHPExcel->getActiveSheet()->setCellValue('A1',  '日期');//这里是设置A1单元格的内容
        $objPHPExcel->getActiveSheet()->setCellValue('B1',  '维修名称');////这里是设置B1单元格的内容
        $objPHPExcel->getActiveSheet()->setCellValue('C1',  '维修类型');////这里是设置B1单元格的内容
        $objPHPExcel->getActiveSheet()->setCellValue('D1',  '消耗库存');////这里是设置B1单元格的内容
        $objPHPExcel->getActiveSheet()->setCellValue('E1',  '维修费用');////这里是设置B1单元格的内容
        $objPHPExcel->getActiveSheet()->setCellValue('F1',  '成本');////这里是设置B1单元格的内容
        $objPHPExcel->getActiveSheet()->setCellValue('G1',  '毛利');////这里是设置B1单元格的内容
        //这里是每条数据的内容了
        foreach ($repair_infos as $key => $value) {
            $i=$key+2;//表格是从1开始的
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$i,  $value['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$i,  $value['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$i,  $value['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$i,  $value['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $value['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$i,  $value['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$i,   $value['name']);
        }
        //接下来当然是下载这个表格了，在浏览器输出就好了
        $file_name = date('YmdHis');
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename='.$file_name.'.xls');
        header("Content-Transfer-Encoding:binary");
        $objWriter->save('php://output');

    }
    //导出文件
    public function actionDl(){
        $basePath=\Yii::$app->basePath;
        $file_url=$basePath.'/web/upload/excel/20171216111401.xls';
        $filename=$file_url;
        $objPHPExcelnew=new PHPExcel();
        $objReader= \PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel=$objReader->load($filename);
        $sheet=$objPHPExcel->getActiveSheet();
        $highestRow=$sheet->getHighestRow();
        $highestColumn=$sheet->getHighestColumn();
        $highestColumnIndex=\PHPExcel_Cell::columnIndexFromString($highestColumn);
        $excelData=array();
        for($row=2;$row<=$highestRow;$row++)
        {
            for($col=0;$col<$highestColumnIndex;$col++)
            {
                $excelData[$row][]=(string)$sheet->getCellByColumnAndRow($col,$row)->getValue();
            }
        }
        \Yii::$app->db->createCommand()->batchInsert('jnc_webset', ['title', 'keywords','describe'],$excelData)->execute();
        echo 'insert success.';

    }






=======
>>>>>>> 60990fb69c36fd63318c187427e3e6e83c53f68f

    public function text(){
        $admin=\Yii::$app->user->identity;
        echo 111;
    }
}