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

    public function testGettingFieldValidationById()
    {
        $result = $this->Fields->getValidationById(3);
        $expected = 'ssn';
        $this->assertEquals($expected, $result);
    }

    public function testAddingWithNoTitle()
    {
        $field = $this->Fields->newEntity();
        $field = $this->Fields->patchEntity($field, [
            'title' => '',
            'type' => 'text',
            'validation' => '',
            'data' => '',
            'sort' => 50
        ]);
        $this->Fields->save($field);
        $expected = [
            'title' => [
                '_empty' => 'This field cannot be left empty'
            ]
        ];
        $this->assertEquals($expected, $field->getErrors());
    }

    public function testAddingWithNoType()
    {
        $field = $this->Fields->newEntity();
        $field = $this->Fields->patchEntity($field, [
            'title' => 'Test',
            'type' => '',
            'validation' => '',
            'data' => '',
            'sort' => 50
        ]);
        $this->Fields->save($field);
        $expected = [
            'type' => [
                '_empty' => 'This field cannot be left empty'
            ]
        ];
        $this->assertEquals($expected, $field->getErrors());
    }

    public function testAddingWithWrongValidation()
    {
        $field = $this->Fields->newEntity();
        $field = $this->Fields->patchEntity($field, [
            'title' => 'Test',
            'type' => 'text',
            'validation' => 'BeyondTheRealm',
            'data' => '',
            'sort' => 50
        ]);
        $this->Fields->save($field);
        $expected = [
            'validation' => [
                'inList' => 'The provided value is invalid'
            ]
        ];
        $this->assertEquals($expected, $field->getErrors());
    }

    public function testAddingWithNoSort()
    {
        $field = $this->Fields->newEntity();
        $field = $this->Fields->patchEntity($field, [
            'title' => 'Test',
            'type' => 'text',
            'validation' => '',
            'data' => ''
        ]);
        $this->Fields->save($field);
        $expected = [
            'sort' => [
                '_required' => 'This field is required'
            ]
        ];
        $this->assertEquals($expected, $field->getErrors());
    }
}
