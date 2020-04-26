<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
?>
<style>
    .test{
        text-align:center !important;
    };
</style>
<div class="products-index">
    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php echo $customColumnRender="" ?>
    </p>
    <?php Pjax::begin();?>
     <?=
    \nullref\datatable\DataTable::widget([
       'processing' => true,
       'serverSide' => true,
       'ajax' => Url::to(['datatables','search[country]'=> Yii::$app->request->get('country')]),
        'tableOptions' => [
            'class' => 'table table-bordered',
            'scrollY' => '200px',
            'scrollCollapse' => true,
            'paging' => false,
        ],
//        'extraColumns' => ['customCountry'],
        'columns' => [
//              [
//            'title' => 'Custom column',
//            'extraColumns' => ['customField'],
//            'render' => new yii\web\JsExpression("hello test"),
//        ],
            'id',
            [
                'data' => 'order_no',
                'title' => 'Order No',
                'sClass' => 'active-cell-css-class test'
            ],
            'country',
            'ship_city',
            'ship_address',
            'ship_date',
            [
                'data' => 'status',
                'title' => 'Is active',
                'sClass' => 'active-cell-css-class'
            ],
//            [
//                'class' => \nullref\datatable\LinkColumn::class,
//                'title' => 'Action',
//                'label' => 'View',
//                'url' => ['product/view'],
//            ],
//            [
//                'class' => \nullref\datatable\LinkColumn::class,
//                'title' => 'Action',
//                'label' => 'Update',
//                'url' => ['product/update'],
//            ],
//            [
//                'class' => 'nullref\datatable\LinkColumn',
//                'title' => 'Delete',
//                'label' => 'Delete',
//                'linkOptions' => ['data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post'],
//                'url' => ['product/delete'],
//            ]
            [
            'class' => 'nullref\datatable\LinkColumn',
            'queryParams' => ['id'],
            'title'=>'Action',
            'render' => new \yii\web\JsExpression('function(data, type, row, meta) { 
                 return "<a href=\"/demoDataTable/web/index.php?r=product/view&id="+row["id"]+"\">View</a>"+
                 "&nbsp;<a href=\"/demoDataTable/web/index.php?r=product/update&id="+row["id"]+"\">Update</a>"+
                 "&nbsp;<a data-method=\"post\" href=\"/demoDataTable/web/index.php?r=product/delete&id="+row["id"]+"\">Delete</a>"
                }')    
            ],
        ],
        'withColumnFilter' => true  
    ]);
    ?>
    <?php Pjax::end();?>
</div>
<?php
$csrfToken = Yii::$app->request->getCsrfToken();
$script = <<< JS
   
   var reqParams={};
    $("#w0").on('submit', function (event) { 
        reqParams={
        'r':'product/datatables',
        'draw':'1',
        'columns':[{
            'data':'id',
            'name':'',
            'searchable':true,
            'orderable':true,
            'search':{'value':''},
            'search':{'regex':false},
        },
        {
            'data':'order_no',
            'name':'',
            'searchable':true,
            'orderable':true,
            'search':{'value':''},
            'search':{'regex':false},
        },
        {
            'data':'country',
            'name':'',
            'searchable':true,
            'orderable':true,
            'search':{'value':''},
            'search':{'regex':false},
        },
        {
            'data':'ship_city',
            'name':'',
            'searchable':true,
            'orderable':true,
            'search':{'value':''},
            'search':{'regex':false},
        },
        {
            'data':'ship_address',
            'name':'',
            'searchable':true,
            'orderable':true,
            'search':{'value':''},
            'search':{'regex':false},
        },
        {
            'data':'ship_date',
            'name':'',
            'searchable':true,
            'orderable':true,
            'search':{'value':''},
            'search':{'regex':false},
        },
        {
            'data':'ship_date',
            'name':'',
            'searchable':true,
            'orderable':true,
            'search':{'value':''},
            'search':{'regex':false},
        },
        {
            'data':'status',
            'name':'',
            'searchable':true,
            'orderable':true,
            'search':{'value':''},
            'search':{'regex':false},
        },
        {
            'data':'',
            'name':'',
            'searchable':false,
            'orderable':false,
            'search':{'value':''},
            'search':{'regex':false},
        }],
        'order':[
            {
                'column':0,
                'dir':'ASC',
            }
        ],
        start: 0,
        length: 10,
        search:{'value':'ind','regex': false},
        
    };
        var buttonevent = $(document.activeElement).val();
        event.preventDefault();            
         var form = $(this);
         
         
           $.ajax({
               url: $("#w0").attr('action'), 
               dataType: 'JSON',  
               cache: false,
               contentType: false,
               processData: false,
               data: jQuery.param(reqParams),                         
               type: 'get',                        
               beforeSend: function() {
               },
               success: function(response){
                console.log('res',response)

                },
               complete: function() {
               },
               error: function (data) {
                  //toastr.warning("","There may a error on uploading. Try again later");    
                    alert("error");
               }
            });

        return false;
    });
JS;
$this->registerJs($script);
?>