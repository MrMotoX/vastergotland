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
    public $import = ['table' => 'events'];

    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Ett',
                'date' => Date::now()->subDay(2),
                'first_register_date' => Date::now()->subDay(6),
                'last_register_date' => Date::now()->subDay(3),
                'location' => 'Plats1',
                'max_applications' => 10
            ],
            [
                'id' => 2,
                'title' => 'Två',
                'date' => Date::now(),
                'first_register_date' => Date::now()->subDay(3),
                'last_register_date' => Date::now()->subDay(1),
                'location' => 'Plats2',
                'max_applications' => 20
            ],
            [
                'id' => 3,
                'title' => 'Tre',
                'date' => Date::now()->addDay(2),
                'first_register_date' => Date::now()->subDay(3),
                'last_register_date' => Date::now()->subDay(1),
                'location' => 'Plats3',
                'max_applications' => 30
            ],
            [
                'id' => 4,
                'title' => 'Fyra',
                'date' => Date::now()->addDay(3),
                'first_register_date' => Date::now()->subDay(3),
                'last_register_date' => Date::now(),
                'location' => 'Plats4',
                'max_applications' => 40
            ],
            [
                'id' => 5,
                'title' => 'Fem',
                'date' => Date::now()->addDay(2),
                'first_register_date' => Date::now(),
                'last_register_date' => Date::now()->addDay(2),
                'location' => 'Plats5',
                'max_applications' => 50
            ],
            [
                'id' => 6,
                'title' => 'Sex',
                'date' => Date::now()->addDay(15),
                'first_register_date' => Date::now()->addDay(1),
                'last_register_date' => Date::now()->addDay(10),
                'location' => 'Plats6',
                'max_applications' => 60
            ],
        ];

        parent::init();
    }
}
