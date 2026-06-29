<?php

/**
 * Hotel view (detail page).
 *
 * @var \yii\web\View                    $this
 * @var \app\modules\hotels\models\Hotel $model
 */

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'] = [
    ['label' => 'Hotels', 'url' => ['index']],
    $model->name,
];
?>

<div class="hotel-view admin-page">

    <!-- ── Page header ───────────────────────────────────────── -->
    <div class="admin-page__header">
        <div class="d-flex align-items-center gap-3">
            <?php if ($model->image_path): ?>
                <img src="<?= Html::encode($model->image_path) ?>"
                     alt="<?= Html::encode($model->name) ?>"
                     class="view-cover-thumb">
            <?php else: ?>
                <div class="view-cover-thumb view-cover-thumb--placeholder">🏨</div>
            <?php endif; ?>
            <div>
                <h1 class="admin-page__title mb-1"><?= Html::encode($model->name) ?></h1>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <span><?= $model->getStarSymbols() ?></span>
                    <span class="text-muted">·</span>
                    <span class="text-muted"><?= Html::encode($model->city) ?></span>
                    <?php if ($model->featured): ?>
                        <span class="status-badge badge-active">⭐ Featured</span>
                    <?php endif; ?>
                    <span class="status-badge <?= $model->status ? 'badge-active' : 'badge-inactive' ?>">
                        <?= $model->getStatusLabel() ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <?= Html::a('✏️ Edit',   ['update', 'id' => $model->id], ['class' => 'btn btn-primary-mice btn-sm']) ?>
            <?= Html::a('← Hotels', ['index'],                        ['class' => 'btn btn-outline-secondary btn-sm']) ?>
            <?= Html::a('🗑 Delete', ['delete', 'id' => $model->id],
                ['class' => 'btn btn-outline-danger btn-sm',
                 'data'  => ['confirm' => "Delete «{$model->name}»? This cannot be undone.",
                             'method'  => 'post']]) ?>
        </div>
    </div>

    <!-- ── Cover image (full-width) ──────────────────────────── -->
    <?php if ($model->image_path): ?>
        <div class="view-hero-image mb-4">
            <img src="<?= Html::encode($model->image_path) ?>"
                 alt="<?= Html::encode($model->name) ?>" class="img-fluid rounded">
        </div>
    <?php endif; ?>

    <!-- ── Detail grid ───────────────────────────────────────── -->
    <div class="row g-4">
        <div class="col-lg-8">

            <!-- Description -->
            <?php if ($model->description): ?>
            <div class="hotel-card mb-4">
                <div class="hotel-card__header"><span class="hotel-card__header-icon">📝</span> Description</div>
                <div class="hotel-card__body">
                    <p class="mb-0" style="line-height:1.75;"><?= nl2br(Html::encode($model->description)) ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Amenities -->
            <?php if ($model->amenities): ?>
            <div class="hotel-card mb-4">
                <div class="hotel-card__header"><span class="hotel-card__header-icon">✨</span> Amenities</div>
                <div class="hotel-card__body">
                    <div class="amenity-tags">
                        <?php foreach (array_map('trim', explode(',', $model->amenities)) as $tag): ?>
                            <?php if ($tag): ?>
                                <span class="amenity-tag"><?= Html::encode($tag) ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Full attribute detail -->
            <div class="hotel-card">
                <div class="hotel-card__header"><span class="hotel-card__header-icon">📋</span> All Details</div>
                <div class="hotel-card__body p-0">
                    <?= DetailView::widget([
                        'model'   => $model,
                        'options' => ['class' => 'table table-striped mb-0 detail-view'],
                        'attributes' => [
                            'id',
                            'name',
                            'slug',
                            'city',
                            'address',
                            [
                                'attribute' => 'stars',
                                'value'     => $model->getStarSymbols() . " ({$model->stars} stars)",
                                'format'    => 'raw',
                            ],
                            'rooms',
                            [
                                'attribute' => 'capacity',
                                'value'     => number_format($model->capacity) . ' pax',
                            ],
                            [
                                'attribute' => 'price_per_day',
                                'value'     => '$' . number_format($model->price_per_day, 2),
                            ],
                            'phone',
                            'email:email',
                            'website:url',
                            [
                                'attribute' => 'status',
                                'value'     => $model->getStatusLabel(),
                            ],
                            [
                                'attribute' => 'featured',
                                'format'    => 'boolean',
                            ],
                            [
                                'attribute' => 'created_at',
                                'value'     => date('d M Y, H:i', $model->created_at),
                            ],
                            [
                                'attribute' => 'updated_at',
                                'value'     => date('d M Y, H:i', $model->updated_at),
                            ],
                        ],
                    ]) ?>
                </div>
            </div>

        </div><!-- /col-lg-8 -->

        <!-- Stats sidebar -->
        <div class="col-lg-4">
            <div class="hotel-card mb-4">
                <div class="hotel-card__header"><span class="hotel-card__header-icon">📊</span> Quick Stats</div>
                <div class="hotel-card__body p-0">
                    <div class="quick-stat">
                        <span class="quick-stat__label">Rooms</span>
                        <span class="quick-stat__value"><?= number_format($model->rooms) ?></span>
                    </div>
                    <div class="quick-stat">
                        <span class="quick-stat__label">Max Capacity</span>
                        <span class="quick-stat__value"><?= number_format($model->capacity) ?> pax</span>
                    </div>
                    <div class="quick-stat">
                        <span class="quick-stat__label">Price / Day</span>
                        <span class="quick-stat__value">$<?= number_format($model->price_per_day, 0) ?></span>
                    </div>
                    <div class="quick-stat">
                        <span class="quick-stat__label">Star Rating</span>
                        <span class="quick-stat__value"><?= $model->getStarSymbols() ?></span>
                    </div>
                </div>
            </div>

            <div class="hotel-card">
                <div class="hotel-card__header"><span class="hotel-card__header-icon">📞</span> Contact</div>
                <div class="hotel-card__body">
                    <?php if ($model->phone): ?>
                        <p class="mb-2"><strong>Phone:</strong><br>
                           <a href="tel:<?= Html::encode($model->phone) ?>"><?= Html::encode($model->phone) ?></a></p>
                    <?php endif; ?>
                    <?php if ($model->email): ?>
                        <p class="mb-2"><strong>Email:</strong><br>
                           <a href="mailto:<?= Html::encode($model->email) ?>"><?= Html::encode($model->email) ?></a></p>
                    <?php endif; ?>
                    <?php if ($model->website): ?>
                        <p class="mb-0"><strong>Website:</strong><br>
                           <a href="<?= Html::encode($model->website) ?>" target="_blank" rel="noopener">
                               <?= Html::encode($model->website) ?></a></p>
                    <?php endif; ?>
                    <?php if (!$model->phone && !$model->email && !$model->website): ?>
                        <p class="text-muted mb-0">No contact details provided.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>
