<?php

namespace citysites\widgets;

use yii\base\Widget;

class CookieconsentWidget extends Widget
{

    public $message;
    public $dismiss;
    public $link;
    public $href;

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
