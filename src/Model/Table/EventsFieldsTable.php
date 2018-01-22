<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EventsFields Model
 *
 * @property \App\Model\Table\EventsTable|\Cake\ORM\Association\BelongsTo $Events
 * @property \App\Model\Table\FieldsTable|\Cake\ORM\Association\BelongsTo $Fields
 *
 * @method \App\Model\Entity\EventsField get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventsField newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EventsField[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventsField|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsField patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventsField[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventsField findOrCreate($search, callable $callback = null, $options = [])
 */
class EventsFieldsTable extends Table
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

        $this->setTable('events_fields');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Fields', [
            'foreignKey' => 'field_id',
            'joinType' => 'INNER'
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['event_id'], 'Events'));
        $rules->add($rules->existsIn(['field_id'], 'Fields'));

        return $rules;
    }
}
