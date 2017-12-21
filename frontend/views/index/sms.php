<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>

<center>
    <form action="<?=\yii\helpers\Url::to(['sms/sms'])?>" method="get">手机号码：
        <input type="text" name="num" /><br /> <br />短信内容：
        <input type="submit" name="sms" value="提交" /><br />
    </form>
</center>
</body>
</html>
