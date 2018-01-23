<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FieldsFixture
 *
 */
class FieldsFixture extends TestFixture
{

    public $import = ['table' => 'fields'];

    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Efternamn',
                'type' => 'text',
                'validation' => 'notEmpty',
                'data' => '',
                'sort' => 200
            ],
            [
                'id' => 2,
                'title' => 'Förnamn',
                'type' => 'text',
                'validation' => '',
                'data' => '',
                'sort' => 100
            ],
            [
                'id' => 3,
                'title' => 'Personnummer',
                'type' => 'integer',
                'validation' => 'ssn',
                'data' => '',
                'sort' => 300
            ],
            [
                'id' => 4,
                'title' => 'Ålder',
                'type' => 'integer',
                'validation' => 'notZero',
                'data' => '',
                'sort' => 500
            ],
            [
                'id' => 5,
                'title' => 'Land',
                'type' => 'select',
                'validation' => 'notEmpty',
                'data' => ', Sverige, England',
                'sort' => 400
            ],
        ];

        parent::init();
    }
}
