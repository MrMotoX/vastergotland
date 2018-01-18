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
}
