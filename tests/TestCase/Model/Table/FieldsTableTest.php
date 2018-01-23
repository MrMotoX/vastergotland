<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FieldsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FieldsTable Test Case
 */
class FieldsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FieldsTable
     */
    public $Fields;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fields') ? [] : ['className' => FieldsTable::class];
        $this->Fields = TableRegistry::get('Fields', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fields);

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

    public function testGettingFieldsByTypeText()
    {
        $query = $this->Fields->getFieldsByTypeQuery('text');
        $result = $query
            ->enableHydration(false)
            ->toArray();
        $expected = [
            [
                'id' => 2,
                'title' => 'Förnamn',
                'type' => 'text',
                'validation' => '',
                'data' => '',
                'sort' => 100
            ],
            [
                'id' => 1,
                'title' => 'Efternamn',
                'type' => 'text',
                'validation' => 'notEmpty',
                'data' => '',
                'sort' => 200
            ]
        ];

        $this->assertEquals($expected, $result);
    }
}
