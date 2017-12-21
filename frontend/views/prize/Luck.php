

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
	<meta name="format-detection" content="telephone=no"/>
    <title>抽奖</title>
    <link rel="stylesheet" href="/jnc/css/main.css">
	<link rel="stylesheet" href="/jnc/css/common.css">
	<!--<link rel="shortcut icon" href="images/zzxm.jpg" type="image-x">-->
	<script type="text/javascript" src="/jnc/js/jquery.min.js"></script>
	<script type="text/javascript" src="/jnc/js/main.js"></script>
	<script type="text/javascript" src="/jnc/js/blocksit.min.js"></script>
	<script type="text/javascript" src="/jnc/js/awardRotate.js"></script>
	<script type="text/javascript" src="/jnc/layer/layer.js"></script>
	<script type="text/javascript">

$(function (){



	var rotateTimeOut = function (){

		$('#rotate').rotate({

			angle:0,

			animateTo:2160,

			duration:8000,

			callback:function (){

				layer.alert('网络超时，请检查您的网络设置！');

			}

		});

	};

	var bRotate = false;



	var rotateFn = function (awards, angles, txt){

		bRotate = !bRotate;

		$('#rotate').stopRotate();

		$('#rotate').rotate({

			angle:0,

			animateTo:angles+1800,

			duration:3000,

			callback:function (){

				layer.alert(txt);

				bRotate = !bRotate;

			}

		})

	};



	$('.pointer').click(function (){

            <?php if (1<0){ ?>
         alert("111");return;
            <?php } ?>

		if(bRotate)return;

//		var item = rnd(0,7);
        $.getJSON("<?=\yii\helpers\Url::to(['prize/prize'])?>",function (msg) {
//            var b=msg.split(",");
          var  arr = [0];
            for(var i=0;i<msg.length;i++){
                //放入数组
                arr.push(parseInt(msg[i]));
            }
            console.debug(arr);

        var item =arr[Math.floor((Math.random()*arr.length))] ;
        console.debug(item);



        switch (item) {

			case 0:

				//var angle = [26, 88, 137, 185, 235, 287, 337];

				rotateFn(0, 337, "<?php echo '谢谢惠顾';?>");

				break;

			case 1:

				//var angle = [88, 137, 185, 235, 287];

				rotateFn(1, 26, '<?php echo $model[0]['name'];?>');

				break;

			case 2:

				//var angle = [137, 185, 235, 287];

				rotateFn(2, 88, '<?php echo $model[1]['name'];?>');

				break;

			case 3:

				//var angle = [137, 185, 235, 287];

				rotateFn(3, 137, '<?php echo $model[2]['name'];?>');

				break;

			case 4:

				//var angle = [185, 235, 287];

				rotateFn(4, 185, '<?php echo $model[3]['name'];?>');

				break;

			case 5:

				//var angle = [235, 287];

				rotateFn(5, 235, '<?php echo $model[4]['name'];?>');

				break;

			case 6:

				//var angle = [287];

				rotateFn(6, 287, '<?php echo $model[5]['name'];?>');

				break;

		}
	<!--json调回处理库存-->
            if (item!=0){
                $.get("<?=\yii\helpers\Url::to(['prize/del'])?>",{id:item})
            }

	});
    });


});

function rnd(n, m){

	return Math.floor(Math.random()*(m-n+1)+n)

}

</script>
</head>
<body>
	<section style="background: url(/jnc/img/bg.jpg);background-size: cover;padding-top: 124px;">
		 <div class="turntable-bg">
	        <!--<div class="mask"><img src="images/award_01.png"/></div>-->
	        <div class="pointer"><img src="/jnc/img/pointer.png" alt="pointer"/></div>
	        <div class="rotate" ><img id="rotate" src="/jnc/img/turntable2.png" alt="turntable"/></div>
	    </div>
	    <div class="rule">
	    	<img src="img/rule.png">
	    	<p>成都思乐科技有限公司诞生于2010年，公司聚集了多名从事界面设计和交互设计的专业设计师,团队成员均有5年以上的项目经验,能够把握国际主流设计风格与创新理念</p>
	    	<p>我们为客户提供专业的网站设计、程序、域名、空间一条龙服务，提供基于的系统开发. 服务项目涵盖了网页设计、网站程序开发、主流域名注册、国内外空间申请、系统开发、微信二次开发、手机网站开发等网站方面业务。</p>
	    	<p>成都网站建设公司思乐科技至今已服务客户：峨眉电影、嘉好集团、鑫佰丽集团、煌歌集团、兴合集团、蓝海景观、致高守民律师事务所、潭酒、九寨人才、元通、西南民大、嘉祥集</p>
	    </div>
	    <div class="giftrecord">
	    	<h3>我的中奖纪录</h3>
	    	<table id="getgift">
				<tr class="title">
				  <td>奖品</td>
				  <td>时间</td>
				  <td>状态</td>
				  <td>操作</td>
				</tr>
				<tr class="notget">
				  <td>一等奖</td>
				  <td>2017-09-18</td>
				  <td>未领取</td>
				  <td><a href="领取.html">立即领取</a></td>
				</tr>
				<tr>
				  <td>二等奖</td>
				  <td>2017-09-18</td>
				  <td>已领取</td>
				  <td><a>报名信息</a></td>
				</tr>
				<tr>
				  <td>三等奖</td>
				  <td>2017-09-18</td>
				  <td>已领取</td>
				  <td><a>报名信息</a></td>
				</tr>
			</table>
	    </div>
	    
	</section>
	<footer>
		<a href="<?=\yii\helpers\Url::to(['sign/index'])?>"><img src="/jnc/img/footer1.png">全部参赛</a>
		<a href="<?=\yii\helpers\Url::to(['sign/rank'])?>"><img src="/jnc/img/footer2.png">当前排名</a>
		<a href="<?=\yii\helpers\Url::to(['sign/rule'])?>"><img src="/jnc/img/footer3.png" style="width: 20px;">活动规则</a>
	</footer>
	
</body>

</html>