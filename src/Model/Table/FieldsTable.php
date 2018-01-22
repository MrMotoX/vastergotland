<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fields Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsToMany $Applications
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

        $this->belongsToMany('Applications', [
            'foreignKey' => 'field_id',
            'targetForeignKey' => 'application_id',
            'joinTable' => 'applications_fields'
        ]);
        $this->belongsToMany('Events', [
            'foreignKey' => 'field_id',
            'targetForeignKey' => 'event_id',
            'joinTable' => 'events_fields'
        ]);
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
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->scalar('validation')
            ->requirePresence('validation', 'create')
            ->notEmpty('validation');

        $validator
            ->scalar('data')
            ->requirePresence('data', 'create')
            ->notEmpty('data');

        return $validator;
    }
}