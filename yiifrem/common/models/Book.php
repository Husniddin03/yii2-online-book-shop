<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $author
 * @property string|null $price
 * @property string|null $createdtime
 * @property string|null $description
 *
 * @property Bookimg[] $bookimgs
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['createdtime'], 'safe'],
            [['description'], 'string'],
            [['name', 'author', 'price'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'author' => 'Author',
            'price' => 'Price',
            'createdtime' => 'Createdtime',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Bookimgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookimgs()
    {
        return $this->hasMany(Bookimg::class, ['bookid' => 'id']);
    }
}
