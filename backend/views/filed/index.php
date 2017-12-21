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
        &nbsp;>&nbsp;<a href="#">字段管理</a>
    </div>
    <p class="silo_zw"></p>
    <!--当前位置 end-->
    <br />
    <!--筛选条件-->
    <div class="filter">


        <div class="filter-right">


            <a href="<?=\yii\helpers\Url::to(['add','model_id'=>$model_id])?>" class="btn btn-green"> <em class="ficon ficon-tianjia"></em> 添加字段</a>
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
            <th>字段名称</th>
            <th class="hidden-xs">注释</th>
            <th class="hidden-xs">必填</th>
            <th class="hidden-xs">显示</th>
            <th class="hidden-xs">检索</th>
            <th class="hidden-xs">字段类型 </th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model as $v):?>
        <tr>
            <td>
                <?=$v->id?>
            </td>
            <td style="text-align: left;"><?=$v->u1?></td>
            <td class="hidden-xs">
                <?=$v->u2?>
            </td>
            <td class="hidden-xs">
                <?=$v->u4==1?'是':'否'?>
            </td>
            <td class="hidden-xs">
                <?=$v->u5==1?'是':'否'?>
            </td>
            <td class="hidden-xs">
                <?=$v->u6==1?'是':'否'?>
            </td>
            <td class="hidden-xs"><?=$v->u7?></td>
            <td>
                <a href="<?=\yii\helpers\Url::to(['edit','id'=>$v->id,'model_id'=>$model_id])?>" title="编辑" class="operation"><span class="ficon ficon-xiugai"></span></a>
                <a href="<?=\yii\helpers\Url::to(['del','id'=>$v->id,'model_id'=>$model_id])?>" title="删除" class="operation"><span class="ficon  ficon-shanchu"></span></a>
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

