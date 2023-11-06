<?php

namespace common\resource;

class Product extends \common\models\Product
{
    public function fields(): array
    {
        return [
            'id',
            'title',
            'description',
            'price',
        ];
    }
}