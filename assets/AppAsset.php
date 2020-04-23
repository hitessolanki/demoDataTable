<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
   public $sourcePath = '@app/themes/lbizz/';
    public $css = [
        'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700',
        'assets/css/datatables/datatables.bundles.css',
        // 'assets/css/datatables/custome.css',
        // 'assets/css/datatables/plugins.bundle.css', 
        // 'assets/css/datatables/style.bundle.css',
    ];
    public $js = [
        'https://www.googletagmanager.com/gtag/js?id=UA-37564768-1',
        // 'assets/js/datatables/plugins.bundel.js',
        // 'assets/js/datatables/script.bundel.js',
        // 'assets/js/datatables/basic.js',
        // 'assets/js/datatables/datatables.bundle.js',
        // 'assets/js/datatables/scrollable.js',
        // 'assets/js/datatables/ajax.js',
        // 'assets/js/datatables/search.js',
        // 'assets/js/datatables/buttons.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
