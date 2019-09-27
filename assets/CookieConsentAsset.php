<?php

namespace citysites\assets;

use yii\web\AssetBundle;

class CookieConsentAsset extends AssetBundle
{
    /**
     * {@inheritDoc}
     */
    public $sourcePath = '@vendor/npm-asset/cookieconsent/build';
    /**
     * {@inheritDoc}
     */
    public $css = [
        'cookieconsent.min.css',
    ];
    /**
     * {@inheritDoc}
     */
    public $js = [
        'cookieconsent.min.js',
    ];
}
