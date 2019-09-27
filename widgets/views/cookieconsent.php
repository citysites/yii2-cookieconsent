<?php
/**
 * @var string $message
 * @var string $dismiss
 * @var string $link
 * @var string $href
 */

$js = '
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#3498db",
      "text": "#ffffff"
    },
    "button": {
      "background": "#9cc300",
      "text": "#ffffff"
    }
  },
  "content": {
    "message": "'.$message.'",
    "dismiss": "'.$dismiss.'",
    "link": "'.$link.'",
    "href": "'.$href.'"
  }
});
';

$this->registerJs($js, \yii\web\View::POS_END);
