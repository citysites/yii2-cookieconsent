<?php

namespace citysites\widgets;

use citysites\assets\CookieConsentAsset;
use yii\base\Widget;
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
function (message, dismiss, link, url, cookieOptions) {
    window.cookieconsent.initialise({
        cookie: cookieOptions,
        palette: {
            popup: {
                background: "#3498db",
                text: "#ffffff"
            },
            button: {
                background: "#9cc300",
                text: "#ffffff"
            }
        },
        content: {
            message: message,
            dismiss: dismiss,
            link: link,
            href: url
        }
    });
}
JS;
        $view = $this->getView();
        CookieConsentAsset::register($view);
        $view->registerJs(sprintf(
            '(%s)(%s, %s, %s, %s, %s);',
            $js,
            Json::encode($this->message),
            Json::encode($this->dismiss),
            Json::encode($this->link),
            Json::encode(null !== $this->url ? Url::to($this->url, true) : null),
            Json::encode($this->cookieOptions)
        ), View::POS_END);

        return '';
    }
}
