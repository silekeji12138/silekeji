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
        &nbsp;>&nbsp;<a href="#">字段管理</a>&nbsp;>&nbsp;字段添加
    </div>
    <p class="silo_zw"></p>
    <!--当前位置 end-->
    <br />
    <form action="<?=\yii\helpers\Url::to(['edit','model_id'=>$model_id,'id'=>$model->id])?>" method="post">
    <table class="table table-info cs-table">
        <tr>
            <th width="60"></th>
            <td>
            </td>
        </tr>
        <tr>
            <th>注释</th>
            <td>

                <input type="text" id="u2" name="u2" class="input" value="<?=$model->u2?>"/>
            </td>
        </tr>
        <tr>
            <th>字段名</th>
            <td>
                <input type="text" id="u1" name="u1" class="input" value="<?=$model->u1?>" />
            </td>
        </tr>
        <tr>
            <th>必填</th>
            <td>
                <div>
                    <input  type="checkbox" value="1" <?=$model->u4==1?'checked':''?> name="u4">
                </div>
            </td>
        </tr>
        <tr>
            <th>显示</th>
            <td>
                <div>
                    <input  type="checkbox" value="1" <?=$model->u5==1?'checked':''?> name="u5">
                </div>
            </td>
        </tr>
        <tr>
            <th>索引</th>
            <td>
                <div>
                    <input  type="checkbox" value="1" <?=$model->u6==1?'checked':''?> name="u6">
                </div>
            </td>
        </tr>
        <tr>
            <th>字段类型</th>
            <td>
                    <select name="u7" id="">
                        <?php foreach ($types as $v):?>
                        <option <?=$model->u7==$v->u1?'selected':''?> value="<?=$v->u1?>"><?=$v->u1?></option>
                        <?php endforeach;?>
                    </select>
            </td>
        </tr>
        <tr>
            <th width="60">默认值</th>
            <td>

                <textarea class="input" name="u8" style="height: 80px;"><?=$model->u8?></textarea>
            </td>
        </tr>
        <tr>
            <th>列表CSS</th>
            <td>
                <input type="text" name="u9" class="input" value="<?=$model->u9?>"/>
                <span class="help-block">列宽度</span>
            </td>
        </tr>
        <tr>
            <th>排序</th>
            <td>

                <input type="text" name="u10" class="input" value="<?=$model->u10?>"/>
                <span class="help-block">例：0</span>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button style="cursor: pointer" type="submit" class="btn btn-blue"><em class="ficon ficon-queren"></em> 确认操作</button>&nbsp;&nbsp;
                <button style="cursor: pointer" type="reset" class="btn btn-green"><em class="ficon ficon-shanchu"></em> 清空重填</button>
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

<!--wow ajax请求中文转拼音-->
<script>
    if(!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
        new WOW().init();
    };
    //将输入的中文转换为拼音
    $("#u2").blur(function(){
        $.post('<?=\yii\helpers\Url::to(['filed/zh2py','model_id'=>$model_id])?>',{'zh_str':$("#u2").val()},function (data) {
            data = JSON.parse(data);
            if(data.code==1)
            {
                $("#u1").val(data.content);
            }
            else
            {
                alert(data.content);
            }
        })
    });
$(function () {
    $("[type='checkbox']").click(function () {
        var status = $(this).attr('checked')
        if (status == 'checked'){
            $(this).attr('checked','');
        }
    })
})
</script>


</body>
</html>

