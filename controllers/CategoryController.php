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
use yii\data\Pagination;


class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('Магазин гитар и гитарных аксессуаров - guitar.by');

        return $this->render('index', compact('hits'));
    }

    public function actionView($id){
        //$id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if(empty($category))
            throw new \yii\web\HttpException(404, 'Такой категории не существует.');

        $query = Product::find()->where(['category_id' => $id]);//->all();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta($category->name . ' | Магазин гитар и гитарных аксессуаров - guitar.by', $category->keywords, $category->description);

        return $this->render('view', compact('products', 'category', 'pages'));
    }

    public function actionSearch(){
        $q = Yii::$app->request->get('q');
        $this->setMeta('Поиск: ' . $q . ' | Магазин гитар и гитарных аксессуаров - guitar.by');
        if(!$q)
            return $this->render('search');
        $query = Product::find()->where(['like', 'name', $q]);//->all();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }
}