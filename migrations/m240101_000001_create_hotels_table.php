<?php

use yii\db\Migration;

/**
 * Creates the {{%hotels}} table.
 *
 * Run with:
 *   php yii migrate --migrationPath=@app/migrations
 */
class m240101_000001_create_hotels_table extends Migration
{
    private string $table = '{{%hotels}}';

    public function safeUp(): void
    {
        $this->createTable($this->table, [
            'id'             => $this->primaryKey(),
            'name'           => $this->string(255)->notNull(),
            'slug'           => $this->string(255)->notNull()->unique(),
            'city'           => $this->string(100)->notNull(),
            'address'        => $this->string(500)->notNull(),
            'stars'          => $this->tinyInteger()->unsigned()->notNull()->defaultValue(3),
            'rooms'          => $this->smallInteger()->unsigned()->notNull()->defaultValue(0),
            'capacity'       => $this->smallInteger()->unsigned()->notNull()->defaultValue(0),
            'price_per_day'  => $this->decimal(10, 2)->notNull()->defaultValue(0.00),
            'phone'          => $this->string(50)->null(),
            'email'          => $this->string(255)->null(),
            'website'        => $this->string(255)->null(),
            'description'    => $this->text()->null(),
            'amenities'      => $this->text()->null()->comment('JSON array of amenity strings'),
            'image_path'     => $this->string(500)->null(),
            'status'         => $this->tinyInteger()->unsigned()->notNull()->defaultValue(1)
                                     ->comment('1=Active, 0=Inactive'),
            'featured'       => $this->boolean()->notNull()->defaultValue(false),
            'created_at'     => $this->integer()->unsigned()->notNull(),
            'updated_at'     => $this->integer()->unsigned()->notNull(),
        ]);

        // Indexes for common filter columns
        $this->createIndex('idx_hotels_city',   $this->table, 'city');
        $this->createIndex('idx_hotels_stars',  $this->table, 'stars');
        $this->createIndex('idx_hotels_status', $this->table, 'status');
    }

    public function safeDown(): void
    {
        $this->dropTable($this->table);
    }
}
