<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 23.05.2018
 * Time: 15:06
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;

class ProductController extends AppController
{
    public function actionView($id){
        //$id = Yii::$app->request->get('id');

        $product = Product::findOne($id);
        if(empty($product))
            throw new \yii\web\HttpException(404, 'Такого товара не существует.');
        $hits = Product::find()->where(['hit' => '1'])->limit(9)->all();

        $this->setMeta($product->name . ' | Магазин гитар и гитарных аксессуаров - guitar.by', $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits'));
    }
}