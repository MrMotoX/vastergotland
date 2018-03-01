<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationsEventsFieldsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationsEventsFieldsTable Test Case
 */
class ApplicationsEventsFieldsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationsEventsFieldsTable
     */
    public $ApplicationsEventsFields;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applications_events_fields',
        'app.events_fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicationsEventsFields') ? [] : ['className' => ApplicationsEventsFieldsTable::class];
        $this->ApplicationsEventsFields = TableRegistry::get('ApplicationsEventsFields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicationsEventsFields);

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

    public function testValidatingNotEmptyValue()
    {
        $validated = $this->ApplicationsEventsFields->validateValueByEventsFieldId(1, 'Test value');
        $this->assertTrue($validated);
    }

    public function testValidatingEmptyValue()
    {
        $validated = $this->ApplicationsEventsFields->validateValueByEventsFieldId(1, '');
        $this->assertFalse($validated);
    }

    public function testValidatingNonZeroValue()
    {
        $validated = $this->ApplicationsEventsFields->validateValueByEventsFieldId(2, 1);
        $this->assertTrue($validated);
    }

    public function testValidatingZeroValue()
    {
        $validated = $this->ApplicationsEventsFields->validateValueByEventsFieldId(2, 0);
        $this->assertFalse($validated);
    }

    public function testValidatingNoRules()
    {
        $validated = $this->ApplicationsEventsFields->validateValueByEventsFieldId(3,'');
        $this->assertTrue($validated);
    }
}
