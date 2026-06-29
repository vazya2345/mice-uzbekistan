<?php

/**
 * Partial: _form.php
 * Shared by create.php and update.php
 *
 * @var \yii\web\View          $this
 * @var \app\modules\hotels\models\Hotel $model
 * @var \yii\widgets\ActiveForm $form
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\modules\hotels\models\Hotel;
?>

<?php $form = ActiveForm::begin([
    'id'      => 'hotel-form',
    'options' => [
        'enctype' => 'multipart/form-data',
        'class'   => 'needs-validation',
    ],
]) ?>

<div class="row g-4">

    <!-- ── Left column: core info ─────────────────────────────── -->
    <div class="col-lg-8">

        <!-- Basic info card -->
        <div class="hotel-card mb-4">
            <div class="hotel-card__header">
                <span class="hotel-card__header-icon">🏨</span>
                Basic Information
            </div>
            <div class="hotel-card__body">
                <div class="row g-3">
                    <div class="col-12">
                        <?= $form->field($model, 'name', ['options' => ['class' => 'mb-0']])
                            ->textInput(['maxlength' => 255, 'placeholder' => 'e.g. Hyatt Regency Tashkent',
                                         'class' => 'form-control form-control-lg'])
                            ->label('Hotel Name <span class="text-danger">*</span>', ['encode' => false]) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'city')
                            ->dropDownList(Hotel::cityOptions(),
                                ['prompt' => '— Select city —', 'class' => 'form-select'])
                            ->label('City <span class="text-danger">*</span>', ['encode' => false]) ?>
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'stars')
                            ->dropDownList(Hotel::starOptions(),
                                ['prompt' => '— Select stars —', 'class' => 'form-select'])
                            ->label('Star Rating <span class="text-danger">*</span>', ['encode' => false]) ?>
                    </div>

                    <div class="col-12">
                        <?= $form->field($model, 'address')
                            ->textInput(['maxlength' => 500, 'placeholder' => 'Full street address'])
                            ->label('Address <span class="text-danger">*</span>', ['encode' => false]) ?>
                    </div>

                    <div class="col-12">
                        <?= $form->field($model, 'description')
                            ->textarea(['rows' => 5, 'placeholder' =>
                                'Describe the hotel, its event spaces, unique features…']) ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Capacity & Pricing card -->
        <div class="hotel-card mb-4">
            <div class="hotel-card__header">
                <span class="hotel-card__header-icon">📊</span>
                Capacity &amp; Pricing
            </div>
            <div class="hotel-card__body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <?= $form->field($model, 'rooms')
                            ->textInput(['type' => 'number', 'min' => 0, 'max' => 9999])
                            ->label('Number of Rooms <span class="text-danger">*</span>', ['encode' => false]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'capacity')
                            ->textInput(['type' => 'number', 'min' => 0, 'max' => 99999])
                            ->label('Max Event Capacity <span class="text-danger">*</span>', ['encode' => false]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'price_per_day')
                            ->textInput(['type' => 'number', 'min' => 0, 'step' => '0.01',
                                         'placeholder' => '0.00'])
                            ->label('Price / Day (USD) <span class="text-danger">*</span>', ['encode' => false]) ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact card -->
        <div class="hotel-card mb-4">
            <div class="hotel-card__header">
                <span class="hotel-card__header-icon">📞</span>
                Contact Details
            </div>
            <div class="hotel-card__body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <?= $form->field($model, 'phone')
                            ->textInput(['placeholder' => '+998 71 …']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'email')
                            ->input('email', ['placeholder' => 'events@hotel.com']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'website')
                            ->input('url', ['placeholder' => 'https://…']) ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Amenities card -->
        <div class="hotel-card">
            <div class="hotel-card__header">
                <span class="hotel-card__header-icon">✨</span>
                Amenities
            </div>
            <div class="hotel-card__body">
                <?= $form->field($model, 'amenities')
                    ->textarea(['rows' => 3, 'placeholder' =>
                        'WiFi, Parking, Pool, Gym, Business Centre, AV Equipment, Catering…'])
                    ->hint('Separate amenities with commas. They will display as tags.') ?>
            </div>
        </div>

    </div><!-- /col-lg-8 -->

    <!-- ── Right column: media + settings ────────────────────── -->
    <div class="col-lg-4">

        <!-- Image upload card -->
        <div class="hotel-card mb-4">
            <div class="hotel-card__header">
                <span class="hotel-card__header-icon">🖼</span>
                Cover Image
            </div>
            <div class="hotel-card__body">

                <!-- Preview area -->
                <div class="img-upload-preview mb-3" id="imgPreviewWrap">
                    <?php if ($model->image_path): ?>
                        <img src="<?= Html::encode($model->image_path) ?>"
                             alt="Current cover" id="imgPreview" class="img-fluid rounded">
                    <?php else: ?>
                        <div class="img-upload-placeholder" id="imgPlaceholder">
                            <div class="img-upload-placeholder__inner">
                                <span class="img-upload-placeholder__icon">📷</span>
                                <span class="img-upload-placeholder__text">No image uploaded</span>
                            </div>
                        </div>
                        <img src="" alt="Preview" id="imgPreview"
                             class="img-fluid rounded d-none" style="max-height:220px; width:100%; object-fit:cover;">
                    <?php endif; ?>
                </div>

                <?= $form->field($model, 'imageFile', ['options' => ['class' => 'mb-2']])
                    ->fileInput(['accept' => 'image/png, image/jpeg, image/webp',
                                 'class'  => 'form-control',
                                 'id'     => 'imageFileInput'])
                    ->label('Upload Image') ?>

                <div class="form-text text-muted">
                    Accepted: JPG, PNG, WebP · Max 5 MB<br>
                    Recommended: 1200 × 800 px
                </div>

                <?php if ($model->image_path): ?>
                    <div class="mt-2">
                        <small class="text-muted">Current: <code><?= Html::encode($model->image_path) ?></code></small>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Settings card -->
        <div class="hotel-card mb-4">
            <div class="hotel-card__header">
                <span class="hotel-card__header-icon">⚙️</span>
                Settings
            </div>
            <div class="hotel-card__body">

                <?= $form->field($model, 'status')
                    ->dropDownList(Hotel::statusLabels(), ['class' => 'form-select']) ?>

                <div class="form-check form-switch mt-3">
                    <?= Html::activeCheckbox($model, 'featured', [
                        'class' => 'form-check-input',
                        'id'    => 'hotel-featured',
                    ]) ?>
                    <label class="form-check-label fw-semibold" for="hotel-featured">
                        Featured on Homepage
                    </label>
                    <div class="form-text">Featured hotels appear in the landing page hero section.</div>
                </div>
            </div>
        </div>

        <!-- Action buttons -->
        <div class="d-grid gap-2">
            <?= Html::submitButton(
                $model->isNewRecord ? '✅ Create Hotel' : '💾 Save Changes',
                ['class' => 'btn btn-primary-mice btn-lg']
            ) ?>
            <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
        </div>

    </div><!-- /col-lg-4 -->

</div><!-- /row -->

<?php ActiveForm::end() ?>

<?php
// JS: live image preview
$this->registerJs(<<<JS
(function () {
    var input   = document.getElementById('imageFileInput');
    var preview = document.getElementById('imgPreview');
    var holder  = document.getElementById('imgPlaceholder');
    if (!input || !preview) return;

    input.addEventListener('change', function () {
        var file = this.files[0];
        if (!file) return;
        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.maxHeight = '220px';
            preview.style.width     = '100%';
            preview.style.objectFit = 'cover';
            preview.classList.remove('d-none');
            if (holder) holder.classList.add('d-none');
        };
        reader.readAsDataURL(file);
    });
})();
JS
);
?>
