<?php

namespace citysites\assets;

use yii\web\AssetBundle;

class CookieconsentAsset extends AssetBundle
{
    public $sourcePath = '@vendor/npm-asset/cookieconsent/build';

    public $css = [
        'cookieconsent.min.css',
    ];

    public $js = [
        'cookieconsent.min.js',
    ];

}
