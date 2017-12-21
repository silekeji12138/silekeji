<?=require '/public/head.php'?>
<body class="body-color">
<?=require '/public/top.php'?>
<!--侧边菜单栏-->
<?=require '/public/left.php'?>
<!--侧边菜单栏 end-->

<!--主体部分-->
<section class="body-content">
    <!--当前位置-->
    <div class="site-location">
        &nbsp;&nbsp;
        <span class="ficon ficon-weizhi"></span>&nbsp;<a href="#">首页</a>
        &nbsp;>&nbsp;<a href="#">添加</a>
    </div>
<!--    <p class="silo_zw"></p>-->
    <!--当前位置 end-->
    <br />
    <form action="<?=\yii\helpers\Url::to(['model/add'])?>" method="post">
    <table class="table table-info cs-table">
        <tr>
            <th width="60"></th>
            <td>
            </td>
        </tr>
        <?=$html?>
        <tr>
            <th></th>
            <td>
                <button type="submit" class="btn btn-blue" style="cursor: pointer;"><em class="ficon ficon-queren"></em> 确认操作</button>&nbsp;&nbsp;
                <a href="#" class="btn btn-green"><em class="ficon ficon-shanchu"></em> 清空重填</a>
            </td>
        </tr>
    </table>
    </form>
    <footer>
        <p class="fr">思乐科技 (2016) 版权所有.</p>
        <a href="#" class="txt-blue"><span class="ficon ficon-tongzhi"></span> 欢迎您使用思乐科技网络营销平台！</a>
    </footer>
</section>
<p class="clear"></p>

<!--<script src="js/bootstrap.min.js" type="text/javascript"></script>-->
<script src="/js/wow.min.js" type="text/javascript"></script>
<script src="/js/common.js" type="text/javascript"></script>

<!--wow 初始化-->
<script>
    if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
        new WOW().init();
    };
</script>



</body>
</html>
