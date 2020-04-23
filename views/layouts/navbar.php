<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\components\CommonFunction;

$asset = AppAsset::register($this);
$baseUrl = $asset->baseUrl;
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;


?>

<nav role="navigation" class="navbar navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <i class="fa fa-reorder"></i>
        </button>        
        <a class="navbar-brand" href="<?php echo Url::base(true) ?>" style="align-items: center !important;display: flex !important;"> 
            <img src="<?php echo "$baseUrl/assets/images/logo.png" ?>"  height="40px"  />  &nbsp; <span class="top-nav-title-color"><?php //echo Yii::$app->params['SITE_NAME']                                                                                                              ?> </span>
        </a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav user-logout navbar-top-links navbar-right mobile-dropdown hidden-sm hidden-xs">
            <li class="dropdown" style="display: table-caption;"><a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                    <div class="media" style="border-right: 1px solid #d2d5da;margin-right: 10px;display: block;">
                        <div class="media-body">
                            <span class="" style="line-height: 32px"><?= $label; ?></span>
                        </div>
                    </div>
                    <img class="img-circle" style="border: 2px solid #E2EBF0;" width="30px" height="30px" alt="" src="<?php echo $defailImageProfile ?>">
                    <?php echo '<span class="profile-name">' . $shortName . '</span>'; //ucwords(Yii::$app->user->identity->first_name);  . ' ' . Yii::$app->user->identity->last_name;    ?><i class="fa fa-angle-down font-weight-600" aria-hidden="true"></i> 
                </a>
              
            </li>
        </ul>


    </div>
</nav>
<?php
$script = <<< JS
$(document).ready(function(){
  $('.dropdown-submenu a.notice-submenu').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
        
    $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
JS;
$this->registerJs($script);
?>