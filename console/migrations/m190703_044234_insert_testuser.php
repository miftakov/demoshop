<?php

use yii\db\Migration;
use common\models\User;

class m190703_044234_insert_testuser extends Migration
{

    public function safeUp()
    {

        $transaction = $this->getDb()->beginTransaction();
        $user = \Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
            'email'    => 'admin@test.test',
            'username' => 'admin',
            'password' => 'admin',
        ]);
        if (!$user->insert(false)) {
            $transaction->rollBack();
            return false;
        }
        $user->confirm();
        $transaction->commit();

        $transaction = $this->getDb()->beginTransaction();
        $user = \Yii::createObject([
            'class'    => User::className(),
            'scenario' => 'create',
            'email'    => 'user@test.test',
            'username' => 'user',
            'password' => 'user',
        ]);
        if (!$user->insert(false)) {
            $transaction->rollBack();
            return false;
        }
        $user->confirm();
        $transaction->commit();

    }

    public function safeDown()
    {
        echo "m190703_044234_insert_testuser cannot be reverted.\n";
        return false;
    }

}
