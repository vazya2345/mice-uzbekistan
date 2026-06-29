<?php

/**
 * Hotel update view.
 *
 * @var \yii\web\View                    $this
 * @var \app\modules\hotels\models\Hotel $model
 */

use yii\bootstrap5\Html;

$this->title = 'Edit: ' . $model->name;
$this->params['breadcrumbs'] = [
    ['label' => 'Hotels', 'url' => ['index']],
    ['label' => $model->name, 'url' => ['view', 'id' => $model->id]],
    'Edit',
];
?>

<div class="hotel-update admin-page">

    <div class="admin-page__header">
        <div>
            <h1 class="admin-page__title">✏️ Edit Hotel</h1>
            <p class="admin-page__subtitle"><?= \yii\bootstrap5\Html::encode($model->name) ?></p>
        </div>
        <div class="d-flex gap-2">
            <?= Html::a('← Back to list', ['index'],              ['class' => 'btn btn-outline-secondary btn-sm']) ?>
            <?= Html::a('View',            ['view', 'id' => $model->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
        </div>
    </div>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>
