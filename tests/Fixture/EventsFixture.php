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
                'last_register_date' => Date::now()->subDay(3),
                'first_register_date' => Date::now()->subDay(6),
                'location' => 'Plats1'
            ],
            [
                'id' => 2,
                'title' => 'Två',
                'date' => Date::now(),
                'last_register_date' => Date::now()->subDay(1),
                'first_register_date' => Date::now()->subDay(3),
                'location' => 'Plats2'
            ],
            [
                'id' => 3,
                'title' => 'Tre',
                'date' => Date::now()->addDay(2),
                'last_register_date' => Date::now()->subDay(1),
                'first_register_date' => Date::now()->subDay(3),
                'location' => 'Plats3'
            ],
            [
                'id' => 4,
                'title' => 'Fyra',
                'date' => Date::now()->addDay(2),
                'last_register_date' => Date::now(),
                'first_register_date' => Date::now()->subDay(3),
                'location' => 'Plats4'
            ],
            [
                'id' => 5,
                'title' => 'Fem',
                'date' => Date::now()->addDay(2),
                'last_register_date' => Date::now()->addDay(2),
                'first_register_date' => Date::now(),
                'location' => 'Plats5'
            ],
            [
                'id' => 6,
                'title' => 'Sex',
                'date' => Date::now()->addDay(15),
                'last_register_date' => Date::now()->addDay(10),
                'first_register_date' => Date::now()->addDay(1),
                'location' => 'Plats6'
            ],
        ];

        parent::init();
    }
}
