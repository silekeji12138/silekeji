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
        &nbsp;>&nbsp;<a href="#">参数管理</a>
    </div>
    <p class="silo_zw"></p>
    <!--当前位置 end-->
    <br />
    <!--筛选条件-->
    <div class="filter">


        <div class="filter-right">

            &nbsp;
            <a href="<?=\yii\helpers\Url::to(['canshu/add','classid'=>$classid])?>" class="btn btn-green"><em class="ficon ficon-tianjia"></em> 添加信息</a>
        </div>
        <br />
        <p class="clear-right"></p>
    </div>
    <!--筛选条件 end-->

    <!--文章table-->
    <table class="table table-border table-hover">
        <thead>
        <tr>
            <th>编号</th>
            <th>参数名称</th>
            <th>参数类型</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model as $v):?>
        <tr>
            <td>
                <?=$v['id']?>
            </td>
            <td style="text-align: left;"><?=$v->u1?></td>
            <td>
                <?=$v->classid==0?'顶级':$v->canshu->u1?>
            </td>
            <td>
                <?=$v->u4?>
            </td>
            <td>
                <a href="<?=\yii\helpers\Url::to(['canshu/index','classid'=>$v['id']])?>" title="查看" class="operation"><span class="ficon ficon-chakan"></span></a>
                <a href="<?=\yii\helpers\Url::to(['canshu/edit','id'=>$v['id']])?>" title="编辑" class="operation"><span class="ficon ficon-xiugai"></span></a>
                <a href="<?=\yii\helpers\Url::to(['canshu/del','id'=>$v['id']])?>" title="删除" class="operation"><span class="ficon  ficon-shanchu"></span></a>
            </td>

        </tr>
       <?php endforeach;?>
        </tbody>
    </table>
    <!--文章table  end-->

    <!--操作部分-->
    <div class="o-hidden padtb-20">


    </div>
    <!--操作部分 end-->

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
