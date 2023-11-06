<?php

namespace common\models;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property float $price
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title', 'price'], 'required'],
            [['price'], 'number', 'min' => 0.01, 'max' => 9999999999.99],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 600],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
        ];
    }
}
