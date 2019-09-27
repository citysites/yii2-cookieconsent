<?php

namespace citysites\widgets;

use yii\base\Widget;

class CookieconsentWidget extends Widget
{

    public $message;
    public $dismiss;
    public $link;
    public $href;

    public function init()
    {
        parent::init();

        // Default Value
        if(!$this->message) {
            $this->message = 'This website uses cookies to ensure you get the best experience on our website.';
        }
        if(!$this->dismiss) {
            $this->dismiss = 'Got It!';
        }
        if(!$this->link) {
            $this->link = null;
        }
        if(!$this->href) {
            $this->href = null;
        }
    }


    /**
     * @param array $params
     *
     * @return string
     */
    public function run($params = [])
    {
        return $this->render('cookieconsent', [
            'message' => $this->message,
            'dismiss' => $this->dismiss,
            'link' => $this->link,
            'href' => $this->href,
        ]);
    }
}
