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

    public function testGetOpenForRegistration()
    {
        $query = $this->Events->getOpenForRegistration();
        $result = $query->enableHydration(false)->toArray();
        $expected = [
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

        $this->assertEquals($expected, $result);
    }
}
