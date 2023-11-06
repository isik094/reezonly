<?php

namespace console\controllers;

use common\models\User;
use yii\console\Controller;
use yii\web\ServerErrorHttpException;

class UserController extends Controller
{
    /**
     * @brief Создать рутового пользователя
     * @param string $email
     * @param string $password
     * @return void
     * @throws ServerErrorHttpException
     */
    public function actionCreate(string $email, string $password): void
    {
        try {
            $user = new User();
            $user->username = $email;
            $user->email = $email;
            $user->status = User::STATUS_ACTIVE;
            $user->setPassword($password);
            $user->generateAuthKey();
            $user->generateAccessToken();
            $user->save();

            echo $user->access_token;
        } catch (\Exception $e) {
            throw new ServerErrorHttpException('Произошла ошибка');
        }
    }
}