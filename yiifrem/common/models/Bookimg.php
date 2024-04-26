<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bookimg".
 *
 * @property int|null $bookid
 * @property string|null $path
 *
 * @property Book $book
 */
class Bookimg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookimg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bookid'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['bookid'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['bookid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bookid' => 'Bookid',
            'path' => 'Path',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id' => 'bookid']);
    }
}
