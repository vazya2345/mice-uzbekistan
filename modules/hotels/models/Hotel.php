<?php

namespace app\modules\hotels\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * Hotel ActiveRecord model.
 *
 * @property int         $id
 * @property string      $name
 * @property string      $slug
 * @property string      $city
 * @property string      $address
 * @property int         $stars
 * @property int         $rooms
 * @property int         $capacity
 * @property float       $price_per_day
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $description
 * @property string|null $amenities      JSON
 * @property string|null $image_path
 * @property int         $status         1=Active, 0=Inactive
 * @property bool        $featured
 * @property int         $created_at
 * @property int         $updated_at
 */
class Hotel extends ActiveRecord
{
    // Status constants
    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE   = 1;

    // Star rating options
    public const STARS_MIN = 1;
    public const STARS_MAX = 5;

    // Upload scenario
    public const SCENARIO_CREATE = 'create';
    public const SCENARIO_UPDATE = 'update';

    /** @var UploadedFile|null Virtual attribute for the image upload widget */
    public $imageFile = null;

    // ----------------------------------------------------------------
    // AR configuration
    // ----------------------------------------------------------------

    public static function tableName(): string
    {
        return '{{%hotels}}';
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
            [
                'class'         => SluggableBehavior::class,
                'attribute'     => 'name',
                'slugAttribute' => 'slug',
                'immutable'     => false,
                'ensureUnique'  => true,
            ],
        ];
    }

    // ----------------------------------------------------------------
    // Validation rules
    // ----------------------------------------------------------------

    public function rules(): array
    {
        return [
            // Required
            [['name', 'city', 'address', 'stars', 'rooms', 'capacity', 'price_per_day', 'email'], 'required'],

            // Strings
            ['name',        'string', 'max' => 255],
            ['city',        'string', 'max' => 100],
            ['address',     'string', 'max' => 500],
            ['phone',       'string', 'max' => 50],
            ['email',       'string',  'max' => 255],
            
            ['email', 'email'],
            ['website',     'url',    'defaultScheme' => 'https'],
            ['description', 'string'],
            ['amenities',   'string'],
            ['image_path',  'string', 'max' => 500],

            // Integers
            ['stars',    'integer', 'min' => self::STARS_MIN, 'max' => self::STARS_MAX],
            ['rooms',    'integer', 'min' => 0, 'max' => 9999],
            ['capacity', 'integer', 'min' => 0, 'max' => 99999],

            // Decimal
            ['price_per_day', 'number', 'min' => 0, 'max' => 999999.99],

            // Boolean/status
            ['status',   'in', 'range' => [self::STATUS_INACTIVE, self::STATUS_ACTIVE]],
            ['featured', 'boolean'],

            // Nullable
            [['phone', 'email', 'website', 'description', 'amenities', 'image_path'], 'default', 'value' => null],

            // Image upload (UI-only — stores path after saving the file)
            ['imageFile', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp',
             'maxSize' => 1024 * 1024 * 5, 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE]],
        ];
    }

    // ----------------------------------------------------------------
    // Attribute labels
    // ----------------------------------------------------------------

    public function attributeLabels(): array
    {
        return [
            'id'            => 'ID',
            'name'          => 'Hotel Name',
            'slug'          => 'Slug',
            'city'          => 'City',
            'address'       => 'Address',
            'stars'         => 'Star Rating',
            'rooms'         => 'Number of Rooms',
            'capacity'      => 'Max Event Capacity',
            'price_per_day' => 'Price per Day (USD)',
            'phone'         => 'Phone',
            'email'         => 'Email',
            'website'       => 'Website',
            'description'   => 'Description',
            'amenities'     => 'Amenities (comma-separated)',
            'image_path'    => 'Cover Image',
            'imageFile'     => 'Upload Cover Image',
            'status'        => 'Status',
            'featured'      => 'Featured on Homepage',
            'created_at'    => 'Created',
            'updated_at'    => 'Updated',
        ];
    }

    // ----------------------------------------------------------------
    // Helpers
    // ----------------------------------------------------------------

    /** @return array<int,string> */
    public static function statusLabels(): array
    {
        return [
            self::STATUS_INACTIVE => 'Inactive',
            self::STATUS_ACTIVE   => 'Active',
        ];
    }

    public function getStatusLabel(): string
    {
        return self::statusLabels()[$this->status] ?? 'Unknown';
    }

    /** @return array<int,string> 1–5 star options */
    public static function starOptions(): array
    {
        return [1 => '⭐ 1 Star', 2 => '⭐⭐ 2 Stars', 3 => '⭐⭐⭐ 3 Stars',
                4 => '⭐⭐⭐⭐ 4 Stars', 5 => '⭐⭐⭐⭐⭐ 5 Stars'];
    }

    /** @return array<string,string> City options used in forms/search */
    public static function cityOptions(): array
    {
        return [
            'Tashkent'  => 'Tashkent',
            'Samarkand' => 'Samarkand',
            'Bukhara'   => 'Bukhara',
            'Namangan'  => 'Namangan',
            'Andijan'   => 'Andijan',
            'Khiva'     => 'Khiva',
            'Fergana'   => 'Fergana',
            'Nukus'     => 'Nukus',
        ];
    }

    /** Returns star symbols for display in views */
    public function getStarSymbols(): string
    {
        return str_repeat('⭐', (int) $this->stars);
    }

    /**
     * Handle image upload after model saves.
     * Call from controller after $model->save().
     */
    public function uploadImage(): bool
    {
        if ($this->imageFile === null) {
            return true;
        }

        $dir  = Yii::getAlias('@webroot/uploads/hotels/');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $filename  = 'hotel_' . $this->id . '_' . time() . '.' . $this->imageFile->extension;
        $dest      = $dir . $filename;

        if ($this->imageFile->saveAs($dest)) {
            // Delete old image if replacing
            if ($this->image_path && file_exists(Yii::getAlias('@webroot') . $this->image_path)) {
                @unlink(Yii::getAlias('@webroot') . $this->image_path);
            }
            $this->image_path = '/uploads/hotels/' . $filename;
            return $this->save(false, ['image_path']);
        }

        return false;
    }
}
