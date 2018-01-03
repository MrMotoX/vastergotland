<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;
use Cake\I18n\Date;

/**
 * PricingsFixture
 *
 */
class PricingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'event_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'event_id' => 1,
                'price' => 150.0,
                'date' => Date::now()->subDay(10)
            ],
            [
                'id' => 2,
                'event_id' => 1,
                'price' => 300.0,
                'date' => Date::now()->subDay(5)
            ],
            [
                'id' => 3,
                'event_id' => 5,
                'price' => 100.0,
                'date' => Date::now()->addDay(1)
            ],
            [
                'id' => 4,
                'event_id' => 6,
                'price' => 200.0,
                'date' => Date::now()->subDay(2)
            ],
            [
                'id' => 5,
                'event_id' => 6,
                'price' => 400.0,
                'date' => Date::now()->addDay(8)
            ],
        ];

        parent::init();
    }
}
