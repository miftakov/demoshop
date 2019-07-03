<?php
namespace console\controllers;

use yii\console\Controller;
use common\models\User;

class UserController extends Controller
{

    public function actionIndex()
    {
        echo "please use command\n";
    }

    public function actionAdd()
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

    public function actionDelete()
    {
        $user = User::find()->where(['username' => 'user'])->one();
        if (!empty($user)) $user->delete();
        $user = User::find()->where(['username' => 'admin'])->one();
        if (!empty($user)) $user->delete();
    }

}
