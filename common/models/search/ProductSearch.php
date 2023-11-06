<?php

namespace common\models\search;

use common\resource\Product;
use yii\data\ActiveDataProvider;

class ProductSearch extends Product
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search(array $params): ActiveDataProvider
    {
        $query = Product::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}