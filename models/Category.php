<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 17.05.2018
 * Time: 15:10
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName(){
        return 'category';
    }

    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}