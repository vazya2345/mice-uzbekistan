<?php

namespace app\modules\hotels\assets;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Hotels module admin UI.
 */
class HotelsAsset extends AssetBundle
{
    public $sourcePath = '@hotels/assets';

    public $css = [
        'hotels.css',
    ];

    public $js = [];

    public $depends = [
        'app\assets\AppAsset',
    ];
}
