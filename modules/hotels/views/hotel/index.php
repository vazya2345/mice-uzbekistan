<?php

/**
 * Hotels index — paginated GridView with search.
 *
 * @var \yii\web\View                          $this
 * @var \app\modules\hotels\models\HotelSearch $searchModel
 * @var \yii\data\ActiveDataProvider           $dataProvider
 */

use app\modules\hotels\models\Hotel;
use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Hotels';
$this->params['breadcrumbs'] = [['label' => 'Hotels', 'url' => ['index']]];
?>

<div class="hotels-index admin-page">

    <!-- ── Page header ───────────────────────────────────────── -->
    <div class="admin-page__header">
        <div>
            <h1 class="admin-page__title">
                🏨 Hotels
                <span class="admin-page__count"><?= $dataProvider->getTotalCount() ?></span>
            </h1>
            <p class="admin-page__subtitle">Manage hotel listings on the MICE Uzbekistan platform.</p>
        </div>
        <?= Html::a('+ Add Hotel', ['create'], ['class' => 'btn btn-primary-mice btn-add']) ?>
    </div>

    <!-- Flash messages -->
    <?php foreach (['success', 'warning', 'danger', 'info'] as $type): ?>
        <?php if (Yii::$app->session->hasFlash($type)): ?>
            <div class="alert alert-<?= $type ?> alert-dismissible fade show" role="alert">
                <?= Html::encode(Yii::$app->session->getFlash($type)) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <!-- ── Search bar ────────────────────────────────────────── -->
    <?= $this->render('_search', ['model' => $searchModel]) ?>

    <!-- ── GridView ──────────────────────────────────────────── -->
    <div class="hotel-card">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-hover align-middle mb-0 hotels-grid'],
            'layout'       => "{items}\n{pager}",
            'emptyText'    => '<div class="grid-empty">No hotels found. <a href="' . Url::to(['create']) . '">Add the first one →</a></div>',
            'columns' => [

                // Cover thumbnail
                [
                    'label'          => '',
                    'attribute'      => 'image_path',
                    'format'         => 'raw',
                    'contentOptions' => ['class' => 'grid-thumb-cell'],
                    'value'          => function (Hotel $model) {
                        if ($model->image_path) {
                            return Html::img($model->image_path, [
                                'class' => 'grid-thumb',
                                'alt'   => Html::encode($model->name),
                            ]);
                        }
                        return '<span class="grid-thumb-placeholder">🏨</span>';
                    },
                    'enableSorting' => false,
                ],

                // Name + city
                [
                    'attribute'      => 'name',
                    'format'         => 'raw',
                    'contentOptions' => ['class' => 'fw-semibold'],
                    'value'          => function (Hotel $model) {
                        $link = Html::a(Html::encode($model->name), ['view', 'id' => $model->id],
                                        ['class' => 'grid-name-link']);
                        $city = '<small class="text-muted">' . Html::encode($model->city) . '</small>';
                        return $link . '<br>' . $city;
                    },
                ],

                // Stars
                [
                    'attribute'      => 'stars',
                    'format'         => 'raw',
                    'contentOptions' => ['class' => 'text-nowrap'],
                    'value'          => fn(Hotel $m) => '<span title="' . $m->stars . ' stars">' . $m->getStarSymbols() . '</span>',
                ],

                // Rooms
                [
                    'attribute'      => 'rooms',
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions'  => ['class' => 'text-center'],
                ],

                // Capacity
                [
                    'attribute'      => 'capacity',
                    'label'          => 'Capacity',
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions'  => ['class' => 'text-center'],
                    'value'          => fn(Hotel $m) => number_format($m->capacity) . ' pax',
                ],

                // Price
                [
                    'attribute'      => 'price_per_day',
                    'label'          => 'Price/Day',
                    'format'         => 'raw',
                    'contentOptions' => ['class' => 'text-end'],
                    'headerOptions'  => ['class' => 'text-end'],
                    'value'          => fn(Hotel $m) => '<strong>$' . number_format($m->price_per_day, 0) . '</strong>',
                ],

                // Status badge
                [
                    'attribute'      => 'status',
                    'format'         => 'raw',
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions'  => ['class' => 'text-center'],
                    'value'          => function (Hotel $m) {
                        $cls  = $m->status === Hotel::STATUS_ACTIVE ? 'badge-active' : 'badge-inactive';
                        $text = $m->status === Hotel::STATUS_ACTIVE ? 'Active'       : 'Inactive';
                        return "<span class=\"status-badge $cls\">$text</span>";
                    },
                ],

                // Featured
                [
                    'attribute'      => 'featured',
                    'format'         => 'raw',
                    'contentOptions' => ['class' => 'text-center'],
                    'headerOptions'  => ['class' => 'text-center'],
                    'value'          => fn(Hotel $m) => $m->featured ? '⭐' : '<span class="text-muted">—</span>',
                ],

                // Actions
                [
                    'class'          => 'yii\grid\ActionColumn',
                    'template'       => '{view} {update} {delete}',
                    'contentOptions' => ['class' => 'text-end grid-actions'],
                    'headerOptions'  => ['class' => 'text-end'],
                    'buttons' => [
                        'view' => fn($url) => Html::a(
                            '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>',
                            $url, ['class' => 'action-btn action-btn--view', 'title' => 'View', 'encode' => false]
                        ),
                        'update' => fn($url) => Html::a(
                            '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>',
                            $url, ['class' => 'action-btn action-btn--edit', 'title' => 'Edit', 'encode' => false]
                        ),
                        'delete' => fn($url) => Html::a(
                            '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m3 0V4a1 1 0 011-1h4a1 1 0 011 1v2"/></svg>',
                            $url, ['class' => 'action-btn action-btn--delete', 'title' => 'Delete',
                                   'encode' => false, 'data-confirm' => 'Delete this hotel?',
                                   'data-method' => 'post']
                        ),
                    ],
                ],

            ],
        ]) ?>
    </div>

</div>
