<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no"/>
    <title>index</title>
    <link rel="stylesheet" href="/jnc/css/main.css">
    <link rel="stylesheet" href="/jnc/css/common.css">
    <!--<link rel="shortcut icon" href="images/zzxm.jpg" type="image-x">-->
    <script type="text/javascript" src="/jnc/js/jquery.min.js"></script>
    <script type="text/javascript" src="/jnc/js/main.js"></script>
    <script type="text/javascript" src="/jnc/js/blocksit.min.js"></script>
    <script type="text/javascript" src="/jnc/js/cove.js"></script>
    <script type="text/javascript" src="/jnc/layer/layer.js"></script>
    <script>
        //blocksit define
        $(window).load(function() {
            $('#container').BlocksIt({
                numOfCol: 2,
                offsetX: 4,
                offsetY: 8,
                blockElement: '.grid'
            });
        });

        //window resize
        var currentWidth = 1100;
        $(window).resize(function() {
            var winWidth = $(window).width();
            var conWidth;
            if(winWidth < 660) {
                conWidth = 440;
                col = 2
            } else if(winWidth < 880) {
                conWidth = 660;
                col = 3
            } else if(winWidth < 1100) {
                conWidth = 880;
                col = 4;
            } else {
                conWidth = 1100;
                col = 5;
            }

            if(conWidth != currentWidth) {
                currentWidth = conWidth;

                $('#container').width(conWidth);
                $('#container').BlocksIt({
                    numOfCol: col,
                    offsetX: 8,
                    offsetY: 8
                });
            }
        });
    </script>
</head>
<body>
<header>
    <img src="/jnc/img/banner.png">
</header>
<section>
    <div class="part-1">
        <ul class="infor">
            <li>
                参与者</br>
                <?=$model2[0]['join_num']?>
            </li>
            <li>
                投票数</br>
                <?=$model2[0]['vote_num']?>
            </li>
            <li>
                访问量</br>
                <?=$model2[0]['view']?>
            </li>
        </ul>
        <div id="divdownwrap">
            <img src="/jnc/img/time.png"><span id="divdown"></span>
        </div>
        <form method="post" action="<?=\yii\helpers\Url::to(['sign/index'])?>">
            <div class="search-box">
                <input placeholder="请输入编号/名称" name="ss"><button><a>搜索</a></button>
            </div>
        </form>
    </div>
    <div class="wrapper">
        <ul class="choose">
            <?php foreach ($array as $value): ?>
            <li id="cos"><?=$value?><span></span></li>
            <?php endforeach; ?>
        </ul>
        <div id="container">
            <?php foreach ($model as $v): ?>
            <div class="grid">
                <a href="<?=\yii\helpers\Url::to(['sign/intro'])?>?id=<?=$v['id']?>"><div class="imgholder">
                        <img src="/jnc/img/product1.jpg">
                    </div></a>
                <p><?=$v['title']?></p>
                <div class="vote"><img src="/jnc/img/zan.png">投票</div>
                <div class="meta"><?=$v['vote_num']?>票</div>
                <span class="paixu"><?=$v['id']?></span>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<footer>
    <a class="on"><img src="/jnc/img/footer1.png">全部参赛</a>
    <a href="<?=\yii\helpers\Url::to(['sign/rank'])?>"><img src="/jnc/img/footer2.png">当前排名</a>
    <a href="<?=\yii\helpers\Url::to(['sign/rule'])?>"><img src="/jnc/img/footer3.png" style="width: 20px;">活动规则</a>
</footer>
<aside>
    <a href="<?=\yii\helpers\Url::to(['prize/index'])?>">
        <img src="/jnc/img/gift.png">
        <p>抽奖</p>
    </a>
    <a>
        <img src="/jnc/img/service.png">
        <p>客服</p>
    </a>
</aside>
<div id="shadowbox">
    <div class="pop1">
        <p><img src="/jnc/img/vote.png">投票成功</p>
        <a href="<?=\yii\helpers\Url::to(['prize/index'])?>">立即抽奖</a>
        <img class="close" src="/jnc/img/close.png"/>
    </div>
    <div class="pop2">
        <p>你今天已经投过啦</p>
        <p>明天再来!</p>
        <img class="close" src="/jnc/img/close.png"/>
    </div>
    <div class="pop5">
        <div data-type="drag_embed" class="j-captcha">
            <div class="yidun yidun--light yidun--embed yidun--jigsaw">

                <div class="yidun_panel">
                    <div class="yidun_panel-placeholder">
                        <div class="yidun_bgimg">
                            <img class="bg-img" alt="" src="http://necaptcha.nosdn.127.net/b01888b06ed64fcd95efda28d06ec024.jpg">
                            <img class="yidun_jigsaw" src="http://necaptcha.nosdn.127.net/d7bb61569d4a4043866b0d6ef0734f49.png"> 							</div>
                    </div>
                </div>

                <div class="yidun_control">
                    <div class="yidun_slide_indicator"></div>
                    <div class="yidun_slider">
                        <span class="slider__icon"></span>
                    </div>
                    <div class="yidun_tips">
                        <span class="tips__icon"></span>
                        <span class="tips__text">向右滑动滑块填充拼图</span>
                    </div>
                </div>

            </div>
        </div>
        <input class="phone" id="phone" placeholder="请输入手机号"/>
        <input class="code" placeholder="验证码" id="cahe"/><span class="sendcode"  onclick="sendcode(this);">获取验证码</span>
        <input type="submit" name="vote" class="submit" value="立即投票"/>
        <img class="close" src="/jnc/img/close.png"/>
    </div>
</div>
</body>

<script type="text/javascript">
    var count = 120;
    var countdown;
    function countDown() {
        $(".sendcode").html(count + "秒后可重试");
        if (count == 0) {
            $(".sendcode").removeAttr("disabled").html("获取验证码");
            clearInterval(countdown);
        }
        count--;
    }
    function sendcode() {
        //手机验证
        var myreg = /^1+\d{10}$/;
        var shouji = $("#phone").val();
        if (document.getElementById('phone').value=='') {
            layer.alert("请输入手机号");
            return false
        }
        if (!myreg.test(document.getElementById('phone').value)) {
            layer.alert("手机号不正确");
        }else {
            $('.pop5 .submit').attr("disabled", true);
            count = 120;
            countdown = setInterval("countDown()", 1000);
            //获取手机验证码
            var num=$('#phone').val();
            $.get("<?=\yii\helpers\Url::to(['sms/sms'])?>",{num:num});
            layer.alert("短信发送成功！");
        }
    }
    function randomNum(lowerValue,upperValue){
        var choices = upperValue - lowerValue + 1;
        var num = Math.floor(Math.random() * choices + lowerValue );
        return num;
    }
    $('#cos:first').addClass('on');
    $('.vote').click(function(){
//        if(randomNum(2,4)=='2'){
//            $('#shadowbox').show();
//            $('.pop1').show();
//        }else if(randomNum(2,4)=='3'){
//            $('#shadowbox').show();
//            $('.pop2').show();
//        }else if(randomNum(2,4)=='4'){
        $.get("<?=\yii\helpers\Url::to(['index/check'])?>",function (msg) {
             if (msg=='1'){
                 $('#shadowbox').show();
                 $('.pop2').show();
             }else {
                 $('#shadowbox').show();
                 $('.pop5').show();
             }
        });

//        }
    });
    <!--验证码的处理,,,,,,,,,,,验证码的处理,,,,,,,,,验证码的处理,,,,,,,,验证码的处理,,,,,,,验证码的处理-->
//    $('input[name=vote]').click(function () {
    $('body').on('click','input[name=vote]',function () {
        var cahe=$('#cahe').val();
        var num=$('#phone').val();
        if (cahe.length!=4){
            alert('请正确输入验证码');
        }else {
            $.getJSON("<?=\yii\helpers\Url::to(['index/check1'])?>",{msg:cahe,num:num},function (msg){
                 if (msg=='1'){
                     $('.pop5').hide();
                     $('#shadowbox').show();
                     $('.pop1').show();
                 }else {
                     alert('验证码错误');
                 }
            });


        }

    });


    $('.close').click(function(){
        $('#shadowbox').hide();
        $(this).parent().hide();
    })
    var interval = 1000;
    function ShowCountDown(year,month,day,divname)
    {
        var now = new Date();
        var endDate = new Date(year, month-1, day);
        var leftTime=endDate.getTime()-now.getTime();
        var leftsecond = parseInt(leftTime/1000);
        //var day1=parseInt(leftsecond/(24*60*60*6));
        var day1=Math.floor(leftsecond/(60*60*24));
        var hour=Math.floor((leftsecond-day1*24*60*60)/3600);
        var minute=Math.floor((leftsecond-day1*24*60*60-hour*3600)/60);
        var second=Math.floor(leftsecond-day1*24*60*60-hour*3600-minute*60);
        var cc = document.getElementById(divname);
        cc.innerHTML = "活动结束倒计时"+day1+"天"+hour+"小时"+minute+"分"+second+"秒";
    }
    window.setInterval(function(){ShowCountDown(<?=date('Y',$time->end)?>,<?=date('m',$time->end)?>,<?=date('d',$time->end)?>,'divdown');}, interval);
</script>
</html>