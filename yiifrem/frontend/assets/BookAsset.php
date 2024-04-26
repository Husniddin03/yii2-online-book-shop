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
        'bootstrap/css/bootstrap.min.css.map',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/jquery.scrollex.min.js',
        'js/jquery.scrolly.min.js',
        'js/main.js',
        'bootstrap/js/bootstrap.bundle.js',
        // 'bootstrap/js/bootstrap.bundle.js.map',
        'bootstrap/js/bootstrap.bundle.min.js',
        // 'bootstrap/js/bootstrap.bundle.min.js.map',
        'bootstrap/js/bootstrap.js',
        // 'bootstrap/js/bootstrap.js.map',
        'bootstrap/js/bootstrap.min.js',
        // 'bootstrap/js/bootstrap.min.js.map',
    ];
}
