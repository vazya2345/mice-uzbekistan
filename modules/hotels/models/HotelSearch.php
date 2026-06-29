<?php

namespace app\modules\hotels\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HotelSearch — search/filter model for the Hotels GridView.
 *
 * Used exclusively by HotelController::actionIndex().
 */
class HotelSearch extends Hotel
{
    /** @var float|null Price range — minimum */
    public ?float $price_min = null;

    /** @var float|null Price range — maximum */
    public ?float $price_max = null;

    // ----------------------------------------------------------------
    // Override parent rules for search context
    // ----------------------------------------------------------------

    public function rules(): array
    {
        return [
            [['id', 'stars', 'rooms', 'capacity', 'status', 'featured'], 'integer'],
            [['name', 'city', 'address', 'phone', 'email', 'description'], 'safe'],
            [['price_per_day', 'price_min', 'price_max'], 'number'],
        ];
    }

    public function scenarios(): array
    {
        // Bypass scenarios from parent
        return Model::scenarios();
    }

    // ----------------------------------------------------------------
    // Build ActiveDataProvider
    // ----------------------------------------------------------------

    public function search(array $params): ActiveDataProvider
    {
        $query = Hotel::find();

        $dataProvider = new ActiveDataProvider([
            'query'      => $query,
            'pagination' => ['pageSize' => 15],
            'sort'       => [
                'defaultOrder' => ['created_at' => SORT_DESC],
                'attributes'   => [
                    'id', 'name', 'city', 'stars', 'rooms',
                    'capacity', 'price_per_day', 'status', 'created_at',
                ],
            ],
        ]);

        // Load & validate; if invalid, return unfiltered results
        if (!$this->load($params) || !$this->validate()) {
            return $dataProvider;
        }

        // Apply filters
        $query
            ->andFilterWhere(['like', 'name',    $this->name])
            ->andFilterWhere(['like', 'city',    $this->city])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email',   $this->email])
            ->andFilterWhere(['like', 'phone',   $this->phone])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['stars'    => $this->stars])
            ->andFilterWhere(['status'  => $this->status])
            ->andFilterWhere(['featured' => $this->featured ?: null])
            ->andFilterWhere(['>=', 'price_per_day', $this->price_min ?: null])
            ->andFilterWhere(['<=', 'price_per_day', $this->price_max ?: null]);

        return $dataProvider;
    }
}
