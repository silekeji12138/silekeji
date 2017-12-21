<script type="text/javascript" src="/css/01.js"></script>
<button id="add">添加</button>
<br>
<table id="po">
    <?php foreach ($model as $v):?>
        <a>
    <input type="submit" value="<?=$v['number']?>"><br>
        <input type="text" value="<?=$v['title']?>" id="<?=$v['id']?>" name="edit"><br>
        <button name="del" id="<?=$v['id']?>">删除</button><br>
        </a>
    <?php endforeach;?>
</table>
<script>
    $('#add').click(function () {
        $.getJSON("<?=\yii\helpers\Url::to(['index/add-sign'])?>",function (msg) {
           $('<a><input type="submit" value="'+msg.A+'"><br><input type="text" name="edit" id="'+msg.B+'" value="'+msg.B+'"><br><button name="del" id="'+msg.B+'">删除</button><br><a>').appendTo('body');
        })
    });
    /**
     * 对刚加的进行刷新修改
     */
    $('body').on('blur','input[name=edit]',function () {
        var id=this.id;
        var title=this.value;
        $.get("<?=\yii\helpers\Url::to(['index/edit-sign'])?>",{id:id,title:title});
    });
    $('body').on('click','button[name=del]',function () {
        var id=this.id;
        var that=this.closest('a');
        $.get("<?=\yii\helpers\Url::to(['index/del-sign'])?>",{id:id},function (msg) {
                   $(that).remove();
        });
    });

</script>