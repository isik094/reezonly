<?php

namespace api\modules\v1admin\controllers;

use common\resource\Product;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

/**
 * Default controller for the `v1admin` module
 */
class ProductController extends ActiveController
{
    public $modelClass = Product::class;

    /**
     * @return array
     */
    public function actions(): array
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['view'], $actions['delete']);

        return $actions;
    }

    /**
     * @return array
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['only'] = ['create', 'update'];
        $behaviors['authenticator']['authMethods'] = [
            'class' => HttpBearerAuth::class,
        ];

        return $behaviors;
    }
}
