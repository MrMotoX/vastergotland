<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PricingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\I18n\Date;

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
        $query = $this->Pricings->getActivePriceOnEvent(1);
        $result = $query->enableHydration(false)->toArray();
        $expected = [
            [
                'id' => 2,
                'event_id' => 1,
                'price' => 300.0,
                'date' => Date::now()->day(-5)
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testGetActivePriceOnFreeEvent()
    {
        $query = $this->Pricings->getActivePriceOnEvent(6);
        $result = $query->enableHydration(false)->toArray();
        $expected = [
            [
                'id' => 3,
                'event_id' => 6,
                'price' => 100.0,
                'date' => Date::now()->day(3)
            ],
        ];
        // @TODO Make this method collect a price in stead of a record and have it collect the price of zero when no pricing is found
        //$this->assertEquals($expected, $result);
        $this->assertEmpty($result);
    }
}
