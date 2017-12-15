<?php

use yii\db\Migration;

/**
 * Handles the creation of table `jnc_admin`.
 */
class m171214_045649_create_jnc_admin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('jnc_admin', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->comment('昵称'),
            'username'=>$this->string(),
            'password'=>$this->string('255'),
            'last_login_time'=>$this->integer(),
            'last_login_ip'=>$this->integer(),
            'email'=>$this->string(),
            'mobile'=>$this->integer(11),
            'qq'=>$this->integer(),
            'address'=>$this->string(),
            'status'=>$this->smallInteger(),
            'really_name'=>$this->string(),
            'role_id'=>$this->integer(),
            'sex'=>$this->smallInteger()->comment('1男2女'),
            'header'=>$this->string(),
            'create_time'=>$this->integer()->comment('创建时间'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('jnc_admin');
    }
}
