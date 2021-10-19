<?php

namespace citysites\widgets;

use citysites\assets\CookieConsentAsset;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\View;

class CookieConsent extends Widget
{
    /**
     * @var string
     */
    public $message;
    /**
     * @var string
     */
    public $dismiss;
    /**
     * @var string
     */
    public $link;
    /**
     * @var string|array
     */
    public $url;
    /**
     * @var array
     */
    public $cookieOptions = [];
    /**
     * @var array
     */
    public $pluginOptions = [
        'palette' => [
            'popup' => [
                'background' => '#3498db',
                'text' => '#ffffff',
            ],
            'button' => [
                'background' => '#9cc300',
                'text' => '#ffffff',
            ],
        ],
    ];
    /**
     * @var string|null
     */
    public $containerSelector;

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        if (null === $this->message) {
            $this->message = 'This website uses cookies to ensure you get the best experience on our website.';
        }
        if (null === $this->dismiss) {
            $this->dismiss = 'Got It!';
        }
        $this->cookieOptions = array_merge([
            'name' => 'cookieconsent_status',
            'path' => '/',
            'domain' => '',
            'expiryDays' => 365,
            'secure' => false
        ], $this->cookieOptions);
        parent::init();
    }

    /**
     * {@inheritDoc}
     */
    public function run()
    {
        $js = /** @lang JavaScript */ <<<'JS'
function (options, containerSelector) {
    if (null !== containerSelector && undefined === options.container) {
        var container = document.querySelector(containerSelector);
        if (null !== container) {
            options.container = container;
        }
    }
    window.cookieconsent.initialise(options);
}
JS;
        $view = $this->getView();
        CookieConsentAsset::register($view);
        $view->registerJs(sprintf(
            '(%s)(%s, %s);',
            $js,
            Json::encode($this->buildPluginOptions()),
            Json::encode($this->containerSelector)
        ), View::POS_END);

        return '';
    }

    /**
     * @return array
     */
    protected function buildPluginOptions(): array
    {
        return ArrayHelper::merge([
            'cookie' => $this->cookieOptions,
            'content' => [
                'message' => $this->message,
                'dismiss' => $this->dismiss,
                'link' => $this->link,
                'href' => null !== $this->url ? Url::to($this->url, true) : null,
            ],
        ], $this->pluginOptions);
    }
}
