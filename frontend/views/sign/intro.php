<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no"/>
    <title>detail</title>
    <link rel="stylesheet" href="/jnc/css/main.css">
    <link rel="stylesheet" href="/jnc/css/common.css">
    <link rel="stylesheet" href="/jnc/css/viewer.min.css">
    <!--<link rel="shortcut icon" href="images/zzxm.jpg" type="image-x">-->
    <script type="text/javascript" src="/jnc/js/jquery.min.js"></script>
    <script type="text/javascript" src="/jnc/js/main.js"></script>
    <script type="text/javascript" src="/jnc/js/blocksit.min.js"></script>
    <script type="text/javascript" src="/jnc/js/viewer.min.js"></script>
</head>
<body>
<header>
    <img src="img/banner.png">
</header>
<section style="background: #FED771 !important;">
    <div id="divdownwrap">
        <img src="img/time.png"><span id="divdown"></span>
    </div>
    <div class="detail">
        <h3>中国三大名酒·剑南春</h3>
        <h4>001号   &nbsp;  排名：第二名</h4>
        <div class="imgbox">
            <div id="dowebok">
                <img data-original="/jnc/img/prodetail.jpg" src="/jnc/img/prodetail.jpg">
                <span></span>
            </div>
        </div>
        <script type="text/javascript">
            $("#dowebok span").click(function(){
                $("#dowebok img:first-child").click();
            });
        </script>
        <div class="userinfor">
            <img src="/jnc/img/topic.png"/>
            <div class="d_user">
                <img src="/jnc/img/user.png">
                <div>
                    <p>参赛人：<span><?=$model->join_person?></span></p>
                    <p>负责区域：<span><?=$model->address?></span></p>
                </div>
            </div>
        </div>
        <p class="tips">工作服务简介 : <span><?=$model->info?></span></p>
        <p class="tips">参赛照片故事 : <span><?=$model->story?></span></p>
        <div class="topvote">
            <?=$model->vote_num?>票<a><img src="/jnc/img/zan.png">投票</a>
        </div>
    </div>
</section>
<footer>
    <a class="on"><img src="/jnc/img/footer1.png">全部参赛</a>
    <a><img src="/jnc/img/footer2.png">当前排名</a>
    <a><img src="/jnc/img/footer3.png" style="width: 20px;">活动规则</a>
</footer>
<aside>
    <a>
        <img src="/jnc/img/gift.png">
        <p>抽奖</p>
    </a>
    <a>
        <img src="/jnc/img/service.png">
        <p>客服</p>
    </a>
</aside>
<div id="shadowbox">
    <div id="pop1">
        <p><img src="/jnc/img/vote.png">投票成功</p>
        <a>立即抽奖</a>
        <img class="close" src="/jnc/img/close.png"/>
    </div>
    <div id="pop2">
        <p>你今天已经投过啦</p>
        <p>明天再来!</p>
        <img class="close" src="/jnc/img/close.png"/>
    </div>
</div>
</body>

<script type="text/javascript">
    var viewer = new Viewer(document.getElementById('dowebok'), {
        url: 'data-original'
    });
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
    window.setInterval(function(){ShowCountDown(2018,4,20,'divdown');}, interval);
</script>
</html>