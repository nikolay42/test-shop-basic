<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 17.05.2018
 * Time: 15:10
 */

namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName(){
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}