<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\I18n\Date;

/**
 * App\Model\Table\EventsTable Test Case
 */
class EventsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventsTable
     */
    public $Events;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.events',
        'app.pricings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Events') ? [] : ['className' => EventsTable::class];
        $this->Events = TableRegistry::get('Events', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Events);

        parent::tearDown();
    }

    public function testGetQueryOpenForRegistration()
    {
        $query = $this->Events->getQueryOpenForRegistration();
        $result = $query
            ->select(['Events.id', 'Events.title'])
            ->enableHydration(false)
            ->toArray();
        $expected = [
            [
                'id' => 5,
                'title' => 'Fem'
            ],
            [
                'id' => 4,
                'title' => 'Fyra'
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testGetDetailsOnFutureEvent()
    {
        $result = $this->Events->getDetailsOnEventById(6)->toArray();
        $expected = [
            'first_register_date' => Date::now()->addDay(1),
            'last_register_date' => Date::now()->addDay(10),
            'max_applications' => 60,
            'pricings' => [
                [
                    'id' => 4,
                    'price' => 200.0,
                    'date' => Date::now()->subDay(2)
                ],
                [
                    'id' => 5,
                    'price' => 400.0,
                    'date' => Date::now()->addDay(8)
                ]
            ]
        ];

        $this->assertEquals($expected, $result);
    }

    public function testGetDetailsOnPastEvent()
    {
        $result = $this->Events->getDetailsOnEventById(1)->toArray();
        $expected = [
            'first_register_date' => Date::now()->subDay(6),
            'last_register_date' => Date::now()->subDay(3),
            'max_applications' => 10,
            'pricings' => [
                [
                    'id' => 1,
                    'price' => 150.0,
                    'date' => Date::now()->subDay(10)
                ],
                [
                    'id' => 2,
                    'price' => 300.0,
                    'date' => Date::now()->subDay(5)
                ]
            ]
        ];

        $this->assertEquals($expected, $result);
    }

    public function testGetDetailsOnEventWithoutPricing()
    {
        $result = $this->Events->getDetailsOnEventById(2)->toArray();
        $expected = [
            'first_register_date' => Date::now()->subDay(3),
            'last_register_date' => Date::now()->subDay(1),
            'max_applications' => 20,
            'pricings' => []
        ];

        $this->assertEquals($expected, $result);
    }
}
