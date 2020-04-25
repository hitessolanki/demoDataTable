
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\AppAsset;
use app\models\Products;
use yii\web\JsExpression;
use yii\helpers\Url;

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
          'data' => $dataProvider->getModels(),
        'tableOptions' => [
            'class' => 'table table-striped- table-bordered',
            'scrollY' => '200px',
            'scrollCollapse' => true,
            'paging' => false,
        ],
        // 'extraColumns' => ['shipDate'],
        'columns' => [
            'id',
            'order_no',
            'country',
            'ship_city',
            'ship_address',
            'ship_date',
            [
                'data' => 'status',
                'title' => 'Is active',
                'sClass' => 'active-cell-css-class',
            ],
//            [
//            'class' => 'nullref\datatable\LinkColumn',
//            'queryParams' => ['id'],
//            'title'=>'Action',
//            'render' => new \yii\web\JsExpression('function(data, type, row, meta) { 
//                 return "<a href=\"/demoDataTable/web/index.php?r=product/view&id="+row["id"]+"\">View</a>"+
//                 "&nbsp;<a href=\"/demoDataTable/web/index.php?r=product/update&id="+row["id"]+"\">Update</a>"+
//                 "&nbsp;<a data-method=\"post\" href=\"/demoDataTable/web/index.php?r=product/delete&id="+row["id"]+"\">Delete</a>"
//                }')    
//            ]
        ],
        'withColumnFilter' => true
    ]);
    ?>
</div>