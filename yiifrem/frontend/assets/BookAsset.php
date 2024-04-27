<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BookAsset extends AssetBundle
{
    public $basePath = '@webroot/book';
    public $baseUrl = '@web/book';
    public $css = [
        'css/font-awesome.min.css',
        'css/main.css',
        'css/noscript.css',
        'bootstrap/css/bootstrap.css',
        'bootstrap/css/bootstrap.css.map',
        'bootstrap/css/bootstrap.min.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/jquery.scrollex.min.js',
        'js/jquery.scrolly.min.js',
        'js/main.js',
        'bootstrap/js/bootstrap.bundle.min.js',
    ];
}
