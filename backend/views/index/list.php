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
        &nbsp;>&nbsp;<a href="#">用户管理</a>
    </div>
    <p class="silo_zw"></p>
    <!--当前位置 end-->
    <br />
    <!--筛选条件-->
    <div class="filter">
        <form action="<?=\yii\helpers\Url::to(['list'])?>" method="get">
        <div class="filter-left">
            <div class="form-control">
                关键词：
                <input type="text" name="search" class="input" placeholder="搜索条件"/>
                <button type="submit" class="btn btn-blue">搜索</button>
            </div>
        </div>
        </form>
        <div class="filter-right">

            &nbsp;
            <a href="<?=\yii\helpers\Url::to(['index/add-admin'])?>" class="btn btn-green"> + 添加</a>
        </div>
        <br />
        <p class="clear-right"></p>
    </div>
    <!--筛选条件 end-->

    <!--文章table-->
    <table class="table table-hover table-border">
        <tr>
            <td>编号</td>
            <td>账号</td>
            <td>昵称</td>
            <td>真实姓名</td>
            <td>上次登录时间</td>
            <td>上次登录IP</td>
            <td>状态</td>
            <td>操作</td>
        </tr>
        <?php foreach ($model as $rs): ?>
            <tr>
                <td><?=$rs['id']?></td>
                <td><?=$rs['username']?></td>
                <td><?=$rs['name']?></td>
                <td><?=$rs['really_name']?></td>
                <td><?=date('Y-d-m H:i:s',$rs['last_login_time'])?></td>
                <td><?=long2ip($rs['last_login_ip'])?></td>
                <td><?=$rs['status']==1?'启用':'禁用'?></td>
                <td>
                    <a id="<?=$rs['id']?>" name="del" >查看</a>&nbsp;
                    <a href="<?=\yii\helpers\Url::to(['index/edit-admin'])?>?id=<?=$rs['id']?>" >编辑</a>&nbsp;
                    <a id="<?=$rs['id']?>" name="del" >删除</a>&nbsp;
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
    <!--文章table  end-->

    <!--操作部分-->
    <div class="o-hidden padtb-20">

        <div class="fr full-sm">
            <div class="pagelist">
                <strong>共<?=$total?>页 每页10条信息</strong>
                <a href="#">上一页</a>
                <?php for ($i=1;$i<=$total;$i++):?>
                <a href="<?=\yii\helpers\Url::to(['index/list','page'=>$i])?>"><?=$i?></a>
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

<script>
    $('table').on('click','a[name=del]',function () {
        var that=$(this).closest('tr');
        var id=this.id;
        var statu=confirm("你确定吗");
        if (!statu){
            return false;
        }else{
            $.get('del-admin',{id:id},function (msg) {
                if (msg=='1'){
                    that.fadeOut();
                }else{
                    alert('删除失败');
                }
            })
        }
    })
</script>

</body>
</html>
