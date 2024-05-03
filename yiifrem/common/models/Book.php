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
    public $imageFiles;
    public $bookFiles;
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
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['bookFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, doc, xls, docx'],
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
    public function uploadimg($imageName)
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/bookimgs/' .$file->baseName. $imageName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
    public function uploadfile($imageName)
    {
        if (true) {
            $this->bookFiles->saveAs('uploads/bookfiles/' . $this->bookFiles->baseName .$imageName. '.' . $this->bookFiles->extension);
            return true;
        } else {
            return false;
        }
    }
}
