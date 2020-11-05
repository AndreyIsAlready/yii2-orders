<?php

namespace order;

use yii\web\AssetBundle;

class OrderAsset extends AssetBundle
{
    public $sourcePath = '@order/web';

    public $css = [
        'css/bootstrap.min.css',
        'css/custom.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
