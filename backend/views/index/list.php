<div class="container">
<a class="btn btn-info" href="<?=\yii\helpers\Url::to(['index/add-admin'])?>">添加</a>
<table class="table table-hover table-responsive">
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
            <td><?php if($rs['status']==1){ ?>
                  <span class="glyphicon glyphicon-ok" title="启用"></span>
                <?php }else{ ?>
                <span class="glyphicon glyphicon-remove" title="禁用"></span>
                <?php } ?>
            </td>
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
