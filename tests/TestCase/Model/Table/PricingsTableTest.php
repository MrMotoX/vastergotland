<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PricingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PricingsTable Test Case
 */
class PricingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PricingsTable
     */
    public $Pricings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pricings',
        'app.events'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Pricings') ? [] : ['className' => PricingsTable::class];
        $this->Pricings = TableRegistry::get('Pricings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pricings);

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
