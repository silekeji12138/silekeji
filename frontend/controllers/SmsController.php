<?php
/**
 * Created by PhpStorm.
 * User: M S I LW
 * Date: 2017/12/19
 * Time: 10:26
 */
namespace frontend\controllers;
use yii\web\Controller;

class SmsController extends Controller{
    public $enableCsrfValidation=false;
     public function actionSms($num){
         $redis=\Yii::$app->redis;
         header("Content-type: text/html; charset=utf-8");
         date_default_timezone_set('PRC'); //����Ĭ��ʱ��Ϊ����ʱ��
         //���Žӿ��û��� $uid
         $uid = 'SLKJ006499';
         //���Žӿ����� $passwd
         $passwd = '123456';
         $message=rand(1000,9000);
         $redis->set($num,$message);
         //$num ='136087976876';
         $msg = rawurlencode(mb_convert_encoding($message, "gb2312", "utf-8"));
         $msg=$msg."��˼�ֿƼ���";
         $gateway = "http://mb345.com:999/ws/BatchSend2.aspx?CorpID={$uid}&Pwd={$passwd}&Mobile={$num}&Content={$msg}&SendTime=&cell=";
         $result = file_get_contents($gateway);
//
//         if(  $result > 0 )
//         {
//             echo $gateway;
//             echo $result;
//             echo "���ͳɹ�! ����ʱ��".date("Y-m-d H:i:s");
//         }
//         else
//         {
//             echo "����ʧ��, ������ʾ����: ".$result;
//         }
         exit;
     }

}