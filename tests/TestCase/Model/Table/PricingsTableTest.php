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

    public function testGetActivePriceOnPastEvent()
    {
        $result = $this->Pricings->getActivePriceOnEvent(1);
        $expected = 300.0;

        $this->assertEquals($expected, $result);
    }

    public function testGetActivePriceOnFreeEvent()
    {
        $result = $this->Pricings->getActivePriceOnEvent(5);
        $expected = 0.0;

        $this->assertEquals($expected, $result);
    }

    public function testGetActivePriceOnFutureEvent()
    {
        $result = $this->Pricings->getActivePriceOnEvent(6);
        $expected = 200.0;

        $this->assertEquals($expected, $result);
    }
}
