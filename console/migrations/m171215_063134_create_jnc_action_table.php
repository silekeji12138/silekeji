<?php

use yii\db\Migration;

/**
 * Handles the creation of table `jnc_action`.
 */
class m171215_063134_create_jnc_action_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('jnc_action', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'addtime'=>$this->integer(),
            'starttime'=>$this->integer(),
            'endtime'=>$this->integer(),
            'rule'=>$this->string(),
            'user_id'=>$this->integer(),
            'type'=>$this->string(),
            'join_num'=>$this->integer(),
            'vote'=>$this->integer(),
            'view'=>$this->integer(),
            'luck_rule'=>$this->string(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('jnc_action');
    }
}
