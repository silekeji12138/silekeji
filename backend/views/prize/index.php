<div class="container">
    <a class="btn btn-info" href="<?=\yii\helpers\Url::to(['index/add-admin'])?>" style="margin-left: -150px">添加</a>
    <table class="table table-hover" style="width: 1500px;margin-left: -150px">
        <tr>
            <td>编号</td>
            <td>活动名称</td>
            <td>获得奖品</td>
            <td>中奖等级</td>
            <td>抽奖时间</td>
            <td>领奖</td>
            <td>领奖人</td>
            <td>联系方式</td>
            <td>地址</td>
            <td>操作</td>
        </tr>
        <?php foreach ($model as $rs): ?>
            <tr>
                <td><?=$rs['id']?></td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td><?=date('Y-d-m H:i:s',$rs['addtime'])?></td>
                <td>1</td>
                <td><?=$rs['name']?></td>
                <td><?=$rs['phone']?></td>
                <td><?=$rs['address']?></td>
                <td>
                    <a class="btn btn-success" id="<?=$rs['id']?>" href="<?=\yii\helpers\Url::to(['index/check-admin'])?>?id=<?=$rs['id']?>"><span class="glyphicon glyphicon-user"></span>查看</a>&nbsp;
                    <a class="btn btn-warning" href="<?=\yii\helpers\Url::to(['index/edit-admin'])?>?id=<?=$rs['id']?>" ><span class="glyphicon glyphicon-edit"></span>编辑</a>&nbsp;
                    <a class="btn btn-danger" id="<?=$rs['id']?>" name="del" ><span class="glyphicon glyphicon-trash"></span>删除</a>&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
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
