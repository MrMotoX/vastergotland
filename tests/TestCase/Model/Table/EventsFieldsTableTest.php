<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventsFieldsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventsFieldsTable Test Case
 */
class EventsFieldsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventsFieldsTable
     */
    public $EventsFields;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.events_fields',
        'app.events',
        'app.pricings',
        'app.applications',
        'app.users',
        'app.fields',
        'app.applications_fields',
        'app.applications_events_fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EventsFields') ? [] : ['className' => EventsFieldsTable::class];
        $this->EventsFields = TableRegistry::get('EventsFields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventsFields);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
