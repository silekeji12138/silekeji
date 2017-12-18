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
        &nbsp;>&nbsp;<a href="#">活动管理</a>
    </div>
    <p class="silo_zw"></p>
    <!--当前位置 end-->
    <br />
    <!--筛选条件-->
    <div class="filter">

        <div class="filter-left">

            <div class="form-control">
                <input type="text" class="input" placeholder="搜索条件"/>
                <a href="#" class="btn btn-blue">搜索</a>
            </div>

        </div>

        <div class="filter-right">

        </div>
        <br />
        <p class="clear-right"></p>
    </div>
    <!--筛选条件 end-->

    <!--文章table-->
    <table class="table table-border table-hover">
        <thead>
        <tr>
            <th width="20">#</th>
            <th>活动标题</th>
            <th>参与人数</th>
            <th>总投票量</th>
            <th>今日投票量</th>
            <th>总浏览量</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $v):?>
            <tr>
                <td><?=$v['id']?></td>
                <td><a href=""><?=$v['title']?></a></td>
                <td><?=$v['join_num']?></td>
                <td><?=$v['vote']?></td>
                <td><?=$v['user_id']?></td>
                <td><?=$v['view']?></td>
                <td><?=date('Y-m-d H:i',$v['addtime'])?></td>
                <td>
                    <a href="" title="投票用户" class="fa-eye"><span>投票用户</span></a>&nbsp;
                    <a href="" title="投票统计" class="fa-eye"><span>投票统计</span></a>&nbsp;
                    <a href="" target="_blank" title="导出" class="fa-cloud-download"><span>导出</span></a>&nbsp;
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <!--文章table  end-->

    <!--操作部分-->
    <div class="o-hidden padtb-20">

        <div class="fr full-sm">
            <div class="pagelist">
                <strong>共6页 每页10条信息</strong>
                <a href="#">上一页</a>
                <strong>1</strong>
                <a href="#">2</a>
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

<!--<script src="/js/bootstrap.min.js" type="text/javascript"></script>-->
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

