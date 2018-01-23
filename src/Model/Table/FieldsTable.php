<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fields Model
 *
 * @property \App\Model\Table\EventsTable|\Cake\ORM\Association\BelongsToMany $Events
 *
 * @method \App\Model\Entity\Field get($primaryKey, $options = [])
 * @method \App\Model\Entity\Field newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Field[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Field|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Field patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Field[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Field findOrCreate($search, callable $callback = null, $options = [])
 */
class FieldsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('fields');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->inList('type', ['text', 'decimal', 'integer', 'select', 'checkbox'])
            ->requirePresence('type', 'create');

        $validator
            ->inList('validation', ['notEmpty', 'notZero', 'ssn'])
            ->allowEmpty('validation')
            ->requirePresence('validation', 'create');

        $validator
            ->requirePresence('sort', 'create');

        return $validator;
    }

    public function getFieldsByTypeQuery($type)
    {
        $query = $this->find('all');
        $query
            ->where([
                'Fields.type' => $type
            ])
            ->order([
                'Fields.sort ASC'
            ]);
        return $query;
    }

    public function getValidationById($id)
    {
        $query = $this->find('all');
        $query
            ->select([
                'Fields.validation'
            ])
            ->where([
                'Fields.id' => $id
            ]);

        return $query->first()->validation;
    }
}
