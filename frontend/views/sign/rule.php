<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no"/>
    <title>活动规则</title>
    <link rel="stylesheet" href="/jnc/css/main.css">
    <link rel="stylesheet" href="/jnc/css/common.css">
    <!--<link rel="shortcut icon" href="images/zzxm.jpg" type="image-x">-->
    <script type="text/javascript" src="/jnc/js/jquery.min.js"></script>
    <script type="text/javascript" src="/jnc/js/main.js"></script>
    <script type="text/javascript" src="/jnc/js/blocksit.min.js"></script>
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
                alert(conWidth)
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
                125
            </li>
            <li>
                投票数</br>
                1856
            </li>
            <li>
                访问量</br>
                745621
            </li>
        </ul>
        <div id="divdownwrap">
            <img src="/jnc/img/time.png"><span id="divdown"></span>
        </div>
        <div class="search-box">
            <input placeholder="请输入编号/名称"><a>搜索</a>
        </div>
        <div class="rule" style="background: #FED771;">
            <img src="/jnc/img/rule2.png" style="margin-top: 15px;">
            <p>成都思乐科技有限公司诞生于2010年，公司聚集了多名从事界面设计和交互设计的专业设计师,团队成员均有5年以上的项目经验,能够把握国际主流设计风格与创新理念</p>
            <p>我们为客户提供专业的网站设计、程序、域名、空间一条龙服务，提供基于WEB的系统开发. 服务项目涵盖了网页设计、网站程序开发、主流域名注册、国内外空间申请、WEB系统开发、微信二次开发、手机网站开发等网站方面业务。</p>
            <p>成都网站建设公司思乐科技至今已服务客户：峨眉电影、嘉好集团、鑫佰丽集团、煌歌集团、兴合集团、蓝海景观、致高守民律师事务所、潭酒、九寨人才、元通、西南民大、嘉祥集</p>
        </div>
    </div>
</section>
<footer>
    <a href="<?=\yii\helpers\Url::to(['sign/index'])?>"><img src="/jnc/img/footer1.png">全部参赛</a>
    <a href="<?=\yii\helpers\Url::to(['sign/rank'])?>"><img src="/jnc/img/footer2.png">当前排名</a>
    <a class="on"><img src="/jnc/img/footer3.png" style="width: 20px;">活动规则</a>
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