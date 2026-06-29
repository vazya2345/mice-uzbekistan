<?php

/**
 * Hotel create view.
 *
 * @var \yii\web\View                    $this
 * @var \app\modules\hotels\models\Hotel $model
 */

use yii\bootstrap5\Html;

$this->title = 'Add New Hotel';
$this->params['breadcrumbs'] = [
    ['label' => 'Hotels', 'url' => ['index']],
    'Add New Hotel',
];
?>

<div class="hotel-create admin-page">

    <div class="admin-page__header">
        <div>
            <h1 class="admin-page__title">🏨 Add New Hotel</h1>
            <p class="admin-page__subtitle">Fill in the details below to add a hotel to the platform.</p>
        </div>
        <?= Html::a('← Back to list', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>
