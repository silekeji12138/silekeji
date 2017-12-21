<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no"/>
    <title>apply</title>
    <link rel="stylesheet" href="/jnc/css/main.css">
    <link rel="stylesheet" href="/jnc/css/common.css">
    <!--<link rel="shortcut icon" href="images/zzxm.jpg" type="image-x">-->
    <script type="text/javascript" src="/jnc/js/jquery.min.js"></script>
    <script type="text/javascript" src="/jnc/js/main.js"></script>
    <script type="text/javascript" src="/jnc/js/blocksit.min.js"></script>
</head>
<body>
<section style="background: #FED771 !important;">
    <form id="apply" method="post" action="<?=\yii\helpers\Url::to(['sign/sign'])?>">
        <input name="title" id="theme" placeholder="主题"/>
        <input name="join_person" id="name" placeholder="参赛人"/>
        <input name="contact" id="phone" placeholder="联系电话"/>
        <div>
            <select id="s_province" name="prvoince"></select>
            <select id="s_city" name="city" ></select>
            <select id="s_county" name="county"></select>
        </div>
        <script type="text/javascript" src="/jnc/js/area.js"></script>
        <script type="text/javascript">_init_area();</script>
        <input name="address" id="area" placeholder="负责区域"/>
        <div class="uploadimg">
            <img src="/jnc/img/headimg.jpg">
            <img src="/jnc/img/upload.png">
        </div>
        <div class="uploadpro">
            <img src="/jnc/img/prodetail.jpg">
            <img src="/jnc/img/add.png">
        </div>
        <textarea name="info" placeholder="工作服务简介"></textarea>
        <textarea name="story" placeholder="请填写照片故事"></textarea>
        <select id="applytype" value="剑南春宴席" name="type">
            <option value="剑南春宴席">剑南春宴席</option>
            <option value="金剑南宴席">金剑南宴席</option>
        </select>
        <input id="submit" value="立即报名" type="submit"/>
    </form>
</section>
<footer>
    <a class="on"><img src="/jnc/img/footer1.png">全部参赛</a>
    <a><img src="/jnc/img/footer2.png">当前排名</a>
    <a><img src="/jnc/img/footer3.png" style="width: 20px;">活动规则</a>
</footer>

</body>
<script type="text/javascript">
    var Gid = document.getElementById;

    var showArea = function() {

        Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +

            Gid('s_city').value + " - 县/区" +

            Gid('s_county').value + "</h3>"

    }

    Gid('s_county').setAttribute('onchange', 'showArea()');
</script>
</html>