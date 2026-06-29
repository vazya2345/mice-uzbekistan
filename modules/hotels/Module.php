<?php

namespace app\modules\hotels;

/**
 * Hotels module — manages hotel listings for MICE Uzbekistan.
 *
 * Register in config/web.php:
 *   'modules' => [
 *       'hotels' => ['class' => 'app\modules\hotels\Module'],
 *   ],
 */
class Module extends \yii\base\Module
{
    /** @var string Default controller */
    public $defaultRoute = 'hotel';

    public function init(): void
    {
        parent::init();
        \Yii::setAlias('@hotels', __DIR__);
    }
}
