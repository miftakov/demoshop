<?php

use yii\db\Migration;
use common\models\User;

class m190703_044234_insert_testuser extends Migration
{

    public function safeUp()
    {
        $user = new User();
        $user->username = 'user';
        $user->email    = 'user@email';
        $user->setPassword('user');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = User::STATUS_ACTIVE;
        $user->save();

        $user = new User();
        $user->username = 'admin';
        $user->email    = 'admin@email';
        $user->setPassword('admin');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = User::STATUS_ACTIVE;
        $user->save();
    }

    public function safeDown()
    {
        $user = User::find()->where(['username' => 'user'])->one();
        if (!empty($user)) $user->delete();
        $user = User::find()->where(['username' => 'admin'])->one();
        if (!empty($user)) $user->delete();
    }

}
