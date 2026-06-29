<?php

/**
 * Partial: _search.php
 * Rendered above the GridView in index.php
 *
 * @var \yii\web\View                          $this
 * @var \app\modules\hotels\models\HotelSearch $model
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\modules\hotels\models\Hotel;
?>

<div class="hotel-search-bar mb-4">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'search-form'],
        'fieldConfig' => ['options' => ['class' => 'mb-0']],
    ]) ?>

    <div class="row g-2 align-items-end">

        <div class="col-md-3 col-sm-6">
            <?= $form->field($model, 'name')
                ->textInput(['placeholder' => 'Hotel name…', 'class' => 'form-control form-control-sm'])
                ->label('Name') ?>
        </div>

        <div class="col-md-2 col-sm-6">
            <?= $form->field($model, 'city')
                ->dropDownList(Hotel::cityOptions(),
                    ['prompt' => 'All cities', 'class' => 'form-select form-select-sm'])
                ->label('City') ?>
        </div>

        <div class="col-md-2 col-sm-6">
            <?= $form->field($model, 'stars')
                ->dropDownList([1=>'⭐ 1', 2=>'⭐⭐ 2', 3=>'⭐⭐⭐ 3', 4=>'⭐⭐⭐⭐ 4', 5=>'⭐⭐⭐⭐⭐ 5'],
                    ['prompt' => 'Any stars', 'class' => 'form-select form-select-sm'])
                ->label('Stars') ?>
        </div>

        <div class="col-md-2 col-sm-6">
            <?= $form->field($model, 'status')
                ->dropDownList(Hotel::statusLabels(),
                    ['prompt' => 'Any status', 'class' => 'form-select form-select-sm'])
                ->label('Status') ?>
        </div>

        <div class="col-md-1 col-sm-4">
            <?= $form->field($model, 'price_min')
                ->textInput(['type' => 'number', 'min' => 0, 'placeholder' => 'Min $',
                             'class' => 'form-control form-control-sm'])
                ->label('Price from') ?>
        </div>

        <div class="col-md-1 col-sm-4">
            <?= $form->field($model, 'price_max')
                ->textInput(['type' => 'number', 'min' => 0, 'placeholder' => 'Max $',
                             'class' => 'form-control form-control-sm'])
                ->label('Price to') ?>
        </div>

        <div class="col-md-1 col-sm-4">
            <div class="d-flex gap-1">
                <?= Html::submitButton(
                    '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="M21 21l-4.35-4.35"/></svg> Search',
                    ['class' => 'btn btn-primary-mice btn-sm', 'encode' => false]
                ) ?>
                <?= Html::a('✕', ['index'], ['class' => 'btn btn-outline-secondary btn-sm',
                                              'title' => 'Reset filters']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end() ?>
</div>
