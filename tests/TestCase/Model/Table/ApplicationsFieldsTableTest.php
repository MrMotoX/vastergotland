<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationsFieldsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationsFieldsTable Test Case
 */
class ApplicationsFieldsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationsFieldsTable
     */
    public $ApplicationsFields;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applications_fields',
        'app.applications',
        'app.events',
        'app.pricings',
        'app.users',
        'app.fields',
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
        $config = TableRegistry::exists('ApplicationsFields') ? [] : ['className' => ApplicationsFieldsTable::class];
        $this->ApplicationsFields = TableRegistry::get('ApplicationsFields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicationsFields);

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
