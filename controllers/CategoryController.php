<?php
/**
 * Created by PhpStorm.
 * User: Николай
 * Date: 21.05.2018
 * Time: 15:37
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;


class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('Магазин гитар и гитарных аксессуаров - guitar.by');

        return $this->render('index', compact('hits'));
    }

    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $products = Product::find()->where(['category_id' => $id])->all();
        $category = Category::findOne($id);
        $this->setMeta($category->name . ' | Магазин гитар и гитарных аксессуаров - guitar.by', $category->keywords, $category->description);

        return $this->render('view', compact('products', 'category'));
    }
}