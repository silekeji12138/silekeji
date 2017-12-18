<!doctype html>
<html lang="">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>PHP_POST</title>
	<style>
        body {
            background-color:#e8e8e8;
        }
        table,table tr th, table tr td { 
			border:1px solid #e8e8e8;
            
		}
        table { 
			width: 700px;
			min-height: 25px; 
			line-height: 35px;
			text-align: center; 
			border-collapse: collapse;
			margin: auto;
            background-color:#ffffff;
		}
		.red{
			color:red;
		}
		.XS{
			border: 1px solid #000000;
			width:80%;
			height:300px; 
			margin:auto;
			margin-top:10px;
		}
		
	</style>
</head>
<body>

<form method="post" action="<?=\yii\helpers\Url::to(['index/index'])?>">
	<table style="border: 1px solid #000000;">
		<tr>
			<td colspan="3">短信网关</td>
		</tr>
		<tr>
			<td>用户名：</td>
			<td><input type="text" name="un"></td>
			<td class="red">必填</td>
		</tr>
		<tr>
			<td>密码：</td>
			<td><input type="text" name="pw"></td>
			<td class="red">必填</td>
		</tr>
		<tr>
			<td>手机号：</td>
			<td>
				<textarea rows="5" cols="40" name="da"></textarea>
			</td>
			<td class="red">必填</td>
		</tr>
		<tr>
			<td>内容：</td>
			<td>
				<textarea rows="5" cols="40" name="sm"></textarea>
			</td>
			<td class="red">必填</td>
		</tr>
		<tr>
			<td>消息编码</td>
			<td>
				<input type="radio" checked="ture" name="dc"  value="15">中文
				<input type="radio" name="dc"  value="8">UCS2
				<input type="radio" name="dc"  value="0">英文
			</td>
			<td class="red">必填</td>
		</tr>
		<tr>
			<td>扩展码：</td>
			<td>
				<input type="text" name="sa">
			</td>
			<td>可为空</td>
		</tr>
		<tr>
			<td>定时时间：</td>
			<td>
				<input type="text" name="st">
			</td>
			<td> yyyyMMddHHmmss</td>
		</tr>
		<tr>
			<td>内容编码格式：</td>
			<td>
				<input type="radio" checked="ture" name="tf" value="0">HEX
				<input type="radio" name="tf"  value="1">Base64
				<input type="radio" name="tf"  value="2">URLEncode
				<input type="radio" name="tf"  value="3">URLEncode+UTF8
			</td>
			<td>默认HEX</td>
		</tr>
		<tr>
			<td>是否报告</td>
			<td>
				<input type="radio" checked="ture" name="rd"  value="0">否
				<input type="radio" name="rd"  value="1">是
			</td>
			<td>默认否</td>
		</tr>
		<tr>
			<td>返回格式</td>
			<td>
				<input type="radio" checked="ture" name="rf"  value="0">文本格式
				<input type="radio" name="rf"  value="1">XML
				<input type="radio" name="rf"  value="2">Json格式
			</td>
			<td>默认文本格式</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="sms" value="点击提交">
			</td>
			<td class="red">
				<a href="test.html" target="_Blank">返回值说明</a>
			</td>
		</tr>
	</table>
</form>
</body>
</html>
<?php
	if(!empty($_POST['sms'])){
		$un = $_POST['un']; //用户名
		$pw = $_POST['pw']; //密码
		$da = $_POST['da']; //手机号
		$sm = $_POST['sm']; //内容
		$dc = $_POST['dc']; //消息编码
		$sa = $_POST['sa']; //扩展号
		$st = $_POST['st']; //定时时间
		$tf = $_POST['tf']; //内容编码格式
		$rd = $_POST['rd']; //是否报告
		$rf = $_POST['rf']; //返回格式
		set_phone(
			$un,$pw,$da,$sm,$dc,$sa,$st,$tf,$rd,$rf
		);
	}
	else{
		echo('<table class="XS"><tr><td>');
		echo("提交的什么都没有");
		echo('</td></tr></table>');
	}
	function set_phone($un,$pw,$da,$sm,$dc,$sa,$st,$tf,$rd,$rf){
		header("Content-type: text/html; charset=utf-8");
		date_default_timezone_set('PRC'); //设置默认时区为北京时间
		$url = "http://IP+Port/mt?";//地址
		switch ($tf)
		{
			case 0://HEX十六进制
			  $sm = iconv("UTF-8", "GB2312//IGNORE",$sm);
			  $sm = bin2hex($sm);
			  break;
			case 1://Base64
			  $sm = iconv("UTF-8", "GB2312//IGNORE", $sm);
			  $sm = base64_encode($sm);
			  break;
			case 2://URLEncode
			  $sm = rawurlencode(mb_convert_encoding($sm, "gb2312", "utf-8"));
			  break;
			case 3://URLEncode+UTF8
			  $sm = urlencode($sm);
			  break;
			default:
			  echo "无法识别";
		}
		//post
		$url = "http://IP+Port/mt?";
		$curpost = "un=".$un."&pw=".$pw."&da=".$da."&sm=".$sm."&dc=".$dc."&sa=".$sa."&st=".$st."&tf=".$tf."&rd=".$rd."&rf=".$rf;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curpost);
		$result = curl_exec($ch);
		curl_close($ch);
		echo("<br>");
		echo('<table class="XS"><tr><td>');
		echo($url.$curpost);
		echo("<br>");
		echo($result);
		echo('</td></tr></table>');
	}
	 

?>
