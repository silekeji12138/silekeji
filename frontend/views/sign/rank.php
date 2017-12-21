<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no"/>
    <title>当前排名</title>
    <link rel="stylesheet" href="/jnc/css/main.css">
    <link rel="stylesheet" href="/jnc/css/common.css">
    <!--<link rel="shortcut icon" href="images/zzxm.jpg" type="image-x">-->
    <script type="text/javascript" src="/jnc/js/jquery.min.js"></script>
    <script type="text/javascript" src="/jnc/js/main.js"></script>
    <script type="text/javascript" src="/jnc/js/blocksit.min.js"></script>
</head>
<body>
<header>
    <img src="/jnc/img/banner.png">
</header>
<section style="background: #FED771 !important;">
    <div id="divdownwrap">
        <img src="/jnc/img/time.png"><span id="divdown"></span>
    </div>
    <div class="typewarp">
        <ul class="typechoose">
            <!--<li>投票者排名<span></span></li>-->
            <li class="on">剑南春宴席<span></span></li>
            <li>金南春宴席<span></span></li>
        </ul>
        <table id="getgift">
            <tr style="background: #fff4d7;">
                <td>编号</td>
                <td>排名</td>
                <td>标题</td>
                <td>票数</td>
            </tr>
            <tr class="tep">
                <td>001</td>
                <td><img>1</td>
                <td>中国三大名酒剑南春</td>
                <td>100</td>
            </tr>
            <tr class="tep">
                <td>002</td>
                <td><img>2</td>
                <td>中国三大名酒剑南春</td>
                <td>100</td>
            </tr>
            <tr class="tep">
                <td>003</td>
                <td><img>3</td>
                <td>中国三大名酒剑南春</td>
                <td>100</td>
            </tr>
            <tr class="tep">
                <td>004</td>
                <td><img>4</td>
                <td>中国三大名酒剑南春</td>
                <td>100</td>
            </tr>
            <tr class="tep">
                <td>004</td>
                <td><img>4</td>
                <td>中国三大名酒剑南春</td>
                <td>100</td>
            </tr>
            <tr class="tep">
                <td>004</td>
                <td><img>4</td>
                <td>中国三大名酒剑南春</td>
                <td>100</td>
            </tr>
            <tr class="tep">
                <td>004</td>
                <td><img>4</td>
                <td>中国三大名酒剑南春</td>
                <td>100</td>
            </tr>
            <tr class="tep">
                <td>004</td>
                <td><img>4</td>
                <td>中国三大名酒剑南春</td>
                <td>100</td>
            </tr>
            <tr class="tep">
                <td>004</td>
                <td><img>4</td>
                <td>中国三大名酒剑南春</td>
                <td>100</td>
            </tr>
            <tr class="tep">
                <td>004</td>
                <td><img>4</td>
                <td>中国三大名酒剑南春</td>
                <td>100</td>
            </tr>
        </table>
        <button class="lookmore">查看更多</button>
    </div>
</section>
<footer>
    <a href="<?=\yii\helpers\Url::to(['sign/index'])?>"><img src="/jnc/img/footer1.png">全部参赛</a>
    <a class="on" ><img src="/jnc/img/footer2.png">当前排名</a>
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
    $('#getgift tr').each(function(){
        var index=$(this).index();
        if(index==1){
            $(this).find('img').attr('src','/jnc/img/p1.png')
        }else if(index==2){
            $(this).find('img').attr('src','/jnc/img/p2.png')
        }else if(index==3){
            $(this).find('img').attr('src','/jnc/img/p3.png')
        }else{
            $(this).find('img').attr('src','/jnc/img/p4.png')
        }
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
    window.setInterval(function(){ShowCountDown(2018,4,20,'divdown');}, interval);
</script>
</html>