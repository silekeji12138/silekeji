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
    <form action="<?=\yii\helpers\Url::to(['index/edit-admin']).'?id='.$model->id?>" method="post">
    <table class="add-table">
        <tr>
            <th><em class="ficon ficon-riqi"></em></th>
            <td>
                <div class="pos-relative">
                    <input type="text" class="add-input" name="username" value="<?=$model->username?>"/>
                    <p class="add-input-txt">账号</p>
                </div>
            </td>
        </tr>
        <tr>
            <th><em class="ficon ficon-yonghuming"></em></th>
            <td>
                <div class="pos-relative">
                    <input type="text" class="add-input" name="name" value="<?=$model->name?>"/>
                    <p class="add-input-txt">昵称</p>
                </div>
            </td>
        </tr>
        <tr>
            <th><em class="ficon ficon-xingming"></em></th>
            <td>
                <div class="pos-relative">
                    <input type="text" class="add-input" name="really_name" value="<?=$model->really_name?>"/>
                    <p class="add-input-txt">真实姓名</p>
                </div>
            </td>
        </tr>
        <tr>
            <th><em class="ficon ficon-mima"></em></th>
            <td>
                <div class="pos-relative">
                    <input type="password" class="add-input" />
                    <p class="add-input-txt">密码</p>
                </div>
            </td>
        </tr>
        <tr>
            <th><em class="ficon ficon-xingbienv"></em></th>
            <td>
                <div class="radio radio-info radio-inline">
                    <input type="radio" id="nan" value="1" name="sex" checked="checked" <?=$model->sex==1?"checked":''?>>
                    <label for="nan"> 男 </label>
                </div>
                &nbsp;&nbsp;
                <div class="radio radio-info radio-inline">
                    <input type="radio" id="nv" name="sex" value="2" <?=$model->sex==2?"checked":''?>>
                    <label for="nv"> 女 </label>
                </div>
            </td>
        </tr>
        <tr>
            <th><em class="ficon ficon-deng"></em></th>
            <td>
                <div class="pos-relative">
                    <select name="status" class="form-group-lg">
                        <option value="1" <?=$model->status==1?"selected":''?>>启用</option>
                        <option value="2" <?=$model->status==2?"selected":''?>>禁用</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th><em class="ficon ficon-shouji"></em></th>
            <td>
                <div class="pos-relative">
                    <input type="text" class="add-input" name="mobile" value="<?=$model->mobile?>"/>
                    <p class="add-input-txt">手机</p>
                </div>
            </td>
        </tr>
        <tr>
            <th><em class="ficon ficon-youxiang1"></em></th>
            <td>
                <div class="pos-relative">
                    <input type="text" class="add-input" name="email" value="<?=$model->email?>"/>
                    <p class="add-input-txt">电子邮箱</p>
                </div>
            </td>
        </tr>
        <tr>
            <th><em class="ficon ficon-weixin"></em></th>
            <td>
                <div class="pos-relative">
                    <input type="text" class="add-input" name="qq" value="<?=$model->qq?>"/>
                    <p class="add-input-txt">微信</p>
                </div>
            </td>
        </tr>
        <tr>
            <th><em class="ficon ficon-huiyuan"></em></th>
            <td>
                <div class="pos-relative">
                    <input type="text" class="add-input" name="address" value="<?=$model->address?>"/>
                    <p class="add-input-txt">详细地址</p>
                </div>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="submit" style="cursor: pointer" class="btn btn-blue marb-20"><em class="ficon ficon-queren"></em> 确认操作</button>
                <a href="<?=\yii\helpers\Url::to(['index/add-admin'])?>" class="btn btn-green marb-20"><em class="ficon ficon-shanchu"></em> 清空重填</a>
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

