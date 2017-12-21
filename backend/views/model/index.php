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
        &nbsp;>&nbsp;<a href="#">模型管理</a>
    </div>
    <p class="silo_zw"></p>
    <!--当前位置 end-->
    <br />
    <!--筛选条件-->
    <div class="filter">

        <div class="filter-left">


        </div>

        <div class="filter-right">


            <a href="<?=\yii\helpers\Url::to(['model/add'])?>" class="btn btn-green"> <em class="ficon ficon-tianjia"></em> 添加</a>
        </div>
        <br />
        <p class="clear-right"></p>
    </div>
    <!--筛选条件 end-->

    <!--文章table-->
    <table class="table table-border table-hover">
        <thead>
        <tr>
            <th width="50"></th>
            <th>编号</th>
            <th>模型名</th>
            <th>模型别名</th>
            <th class="hidden-xs">模型类型</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model as $v):?>
        <tr>
            <td>
                &nbsp;&nbsp;
                <div class="checkbox checkbox-inline checkbox-success">
                    <input type="checkbox">
                    <label></label>
                </div>
            </td>
            <td>
                <?=$v['id']?>
            </td>
            <td style="text-align: left;">
                <a href="<?=\yii\helpers\Url::to(['filed/index','model_id'=>$v->id])?>"><?=$v['u1']?></a>
            </td>
            <td class="hidden-xs">
                <?=$v['u2']?>
            </td>
            <td class="hidden-xs">
                <?=$v->canshu->u1?>
            </td>
            <td>
                <a href="#" title="导出" class="operation"><span class="ficon ficon-uploading"></span></a>
                <a href="#" title="添加" class="operation"><span class="ficon ficon-tianjia"></span></a>
                <a href="<?=\yii\helpers\Url::to(['edit','id'=>$v['id']])?>" title="编辑" class="operation"><span class="ficon ficon-xiugai"></span></a>
                <a href="<?=\yii\helpers\Url::to(['del','id'=>$v['id']])?>" title="删除" class="operation"><span class="ficon  ficon-shanchu"></span></a>
            </td>

        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <!--文章table  end-->

    <!--操作部分-->
    <div class="o-hidden padtb-20">


        <div class="fl full-sm">
            <div class="checkbox checkbox-success fl" style="margin-bottom: 0;">
                <input type="checkbox" id="check-all">
                <label for="check-all">全选</label>
            </div>
            <div class="fl ft14">
                &nbsp;&nbsp;
                <a href="" title="删除" class="operation gray"><span class="ficon ficon-qingkong"></span> 删除</a>
            </div>
            <p class="clear"></p>
        </div>
        <div class="fr full-sm">
            <div class="pagelist">
                <strong>共<?=$total?>页 每页10条信息</strong>
                <a href="#">上一页</a>
                <?php for ($i=1;$i<=$total;$i++):?>
                    <a href="<?=\yii\helpers\Url::to(['model/index','page'=>$i])?>"><?=$i?></a>
                <?php endfor;?>
                <a href="#">下一页</a>
            </div>
        </div>
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

