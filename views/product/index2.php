<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\AppAsset;
use app\models\Products;
use yii\web\JsExpression;

$asset = AppAsset::register($this);
$baseUrl = $asset->baseUrl;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Productssearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    \nullref\datatable\DataTable::widget([
        'data' => $model,
        'tableOptions' => [
            'class' => 'table table-striped- table-bordered',
            'scrollY' => '200px',
            'scrollCollapse' => true,
            'paging' => false,
        ],
        'columns' => [
            'id',
            'order_no',
            'country',
            [
                'data' => 'country',
                'filter'=>true
            ],
            'ship_city',
            'ship_address',
            'ship_date',
                [
                'data' => 'status',
                'title' => 'Is active',
                'sClass' => 'active-cell-css-class',
            ],
                [
                'class' => 'nullref\datatable\LinkColumn',
                'url' => ['product/delete'],
                'linkOptions' => ['data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post'],
                'label' => 'Delete',
            ],
            [
                'class' => \nullref\datatable\LinkColumn::class,
                'title' => 'Action',
                'label' => 'View',
                'url' => ['product/view'],
            ]
        ],
        'withColumnFilter' => true
    ]);
    ?>
</div>