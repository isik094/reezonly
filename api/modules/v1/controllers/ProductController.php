<?php

namespace api\modules\v1\controllers;

use common\resource\Product;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use common\models\search\ProductSearch;

/**
 * Product controller for the `v1` module
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
        unset($actions['create'], $actions['update'], $actions['delete']);

        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    /**
     * @return ActiveDataProvider
     */
    public function prepareDataProvider(): ActiveDataProvider
    {
        $search = new ProductSearch();
        return $search->search(\Yii::$app->request->getQueryParams());
    }
}
