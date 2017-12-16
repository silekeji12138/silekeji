<div class="container">
    <a class="btn btn-info" href="<?=\yii\helpers\Url::to(['action/add-action'])?>">添加</a>
    <table class="table table-hover table-responsive">
        <tr>
            <td>编号</td>
            <td>活动标题</td>
            <td>创建时间</td>
            <td>参与人数</td>
            <td>投票数</td>
            <td>浏览数</td>
            <td>操作</td>
        </tr>
        <?php foreach ($model as $rs): ?>
            <tr>
                <td><?=$rs['id']?></td>
                <td><?=$rs['title']?></td>
                <td><?=$rs['addtime']?></td>
                <td><?=$rs['join_num']?></td>
                <td><?=$rs['vote']?></td>
                <td><?=$rs['view']?></td>
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
