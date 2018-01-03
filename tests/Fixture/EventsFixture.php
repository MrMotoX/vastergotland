<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;
use Cake\I18n\Date;

/**
 * EventsFixture
 *
 */
class EventsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'last_register_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
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
                'title' => 'Ett',
                'date' => Date::now()->subDay(2),
                'last_register_date' => Date::now()->subDay(3)
            ],
            [
                'id' => 2,
                'title' => 'Två',
                'date' => Date::now(),
                'last_register_date' => Date::now()->subDay(1)
            ],
            [
                'id' => 3,
                'title' => 'Tre',
                'date' => Date::now()->addDay(2),
                'last_register_date' => Date::now()->subDay(1)
            ],
            [
                'id' => 4,
                'title' => 'Fyra',
                'date' => Date::now()->addDay(2),
                'last_register_date' => Date::now()
            ],
            [
                'id' => 5,
                'title' => 'Fem',
                'date' => Date::now()->addDay(2),
                'last_register_date' => Date::now()->addDay(2)
            ],
            [
                'id' => 6,
                'title' => 'Sex',
                'date' => Date::now()->addDay(15),
                'last_register_date' => Date::now()->addDay(10)
            ],
        ];

        parent::init();
    }
}
