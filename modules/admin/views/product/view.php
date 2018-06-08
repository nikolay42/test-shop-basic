<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $img = $model->getImage(); ?>
    <?php
    $filePath = $img->getUrl();
    $pos = strpos($filePath, "/images");
    $filePath = substr($filePath, $pos);
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'name',
            'content:html',
            'price',
            'keywords',
            'description',
            [
                'attribute' => 'image',
//                'value' => "<img src='/images/products/product3.jpg'>",
//                'value' => "<img src='/upload/store/Products/Product2/f6a802.jpg'>",
                  'value' => "<img src='/yii2images{$filePath}'>",
//                'value' => "<img src='{$img->getUrl()}'>",
//                'value' => "<img src='/yii2images/images/image-by-item-and-alias?item=Product12&dirtyAlias=7564a24bb8-1.jpg'>",
//                'value' => "<img src='/yii2images/images/image-by-item-and-alias?item=&dirtyAlias=placeHolder.png'>",
                'format' => 'html',
            ],
            'hit',
            'new',
            'sale',
        ],
    ]) ?>

</div>
