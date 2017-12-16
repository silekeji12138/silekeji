<?php

use yii\db\Migration;

/**
 * Handles the creation of table `jnc_webset`.
 */
class m171215_030109_create_jnc_webset_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('jnc_webset', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'keywords'=>$this->string(),
            'describe'=>$this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('jnc_webset');
    }
}
