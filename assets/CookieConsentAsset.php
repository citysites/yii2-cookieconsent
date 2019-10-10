<?php

namespace citysites\assets;

use yii\web\AssetBundle;

class CookieConsentAsset extends AssetBundle
{
    /**
     * {@inheritDoc}
     */
    public $sourcePath = '@vendor/npm-asset/cookieconsent';
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
        YII_ENV_DEV ? 'src/cookieconsent.js' : 'build/cookieconsent.min.js',
    ];
}
