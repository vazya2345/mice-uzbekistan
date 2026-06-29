<?php

namespace app\modules\hotels\controllers;

use Yii;
use app\modules\hotels\assets\HotelsAsset;
use app\modules\hotels\models\Hotel;
use app\modules\hotels\models\HotelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * HotelController — CRUD for Hotel records.
 *
 * Routes (module = hotels):
 *   GET  /hotels/hotel/index    → list + search
 *   GET  /hotels/hotel/view/1   → detail
 *   GET  /hotels/hotel/create   → create form
 *   POST /hotels/hotel/create   → save new hotel
 *   GET  /hotels/hotel/update/1 → edit form
 *   POST /hotels/hotel/update/1 → save changes
 *   POST /hotels/hotel/delete/1 → delete
 */
class HotelController extends Controller
{
    /** @var string Module layout reuses the main site layout */
    public $layout = '@app/views/layouts/main';

    public function beforeAction($action): bool
    {
        HotelsAsset::register($this->view);
        return parent::beforeAction($action);
    }

    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    // ----------------------------------------------------------------
    // INDEX — paginated list with search
    // ----------------------------------------------------------------

    public function actionIndex(): string
    {
        $searchModel  = new HotelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    // ----------------------------------------------------------------
    // VIEW
    // ----------------------------------------------------------------

    public function actionView(int $id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    // ----------------------------------------------------------------
    // CREATE
    // ----------------------------------------------------------------

    public function actionCreate(): \yii\web\Response|string
    {
        $model           = new Hotel();
        $model->scenario = Hotel::SCENARIO_CREATE;
        $model->status   = Hotel::STATUS_ACTIVE;
        $model->stars    = 3;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Handle image after save (ID is available)
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $model->uploadImage();
            }

            Yii::$app->session->setFlash('success', "Hotel «{$model->name}» created successfully.");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', ['model' => $model]);
    }

    // ----------------------------------------------------------------
    // UPDATE
    // ----------------------------------------------------------------

    public function actionUpdate(int $id): \yii\web\Response|string
    {
        $model           = $this->findModel($id);
        $model->scenario = Hotel::SCENARIO_UPDATE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->imageFile) {
                $model->uploadImage();
            }

            Yii::$app->session->setFlash('success', "Hotel «{$model->name}» updated successfully.");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' => $model]);
    }

    // ----------------------------------------------------------------
    // DELETE
    // ----------------------------------------------------------------

    public function actionDelete(int $id): \yii\web\Response
    {
        $model = $this->findModel($id);
        $name  = $model->name;

        // Delete image file if it exists
        if ($model->image_path) {
            $abs = Yii::getAlias('@webroot') . $model->image_path;
            if (file_exists($abs)) {
                @unlink($abs);
            }
        }

        $model->delete();

        Yii::$app->session->setFlash('warning', "Hotel «{$name}» has been deleted.");
        return $this->redirect(['index']);
    }

    // ----------------------------------------------------------------
    // Private helpers
    // ----------------------------------------------------------------

    /**
     * @throws NotFoundHttpException
     */
    private function findModel(int $id): Hotel
    {
        $model = Hotel::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException("Hotel #$id not found.");
        }
        return $model;
    }
}
