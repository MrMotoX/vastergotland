<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicationsEventsFields Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\EventsFieldsTable|\Cake\ORM\Association\BelongsTo $EventsFields
 *
 * @method \App\Model\Entity\ApplicationsEventsField get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApplicationsEventsField newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApplicationsEventsField[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationsEventsField|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationsEventsField patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationsEventsField[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationsEventsField findOrCreate($search, callable $callback = null, $options = [])
 */
class ApplicationsEventsFieldsTable extends Table
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

        $this->setTable('applications_events_fields');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('EventsFields', [
            'foreignKey' => 'events_field_id',
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
            ->requirePresence('value', 'create');

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
        $rules->add($rules->existsIn(['application_id'], 'Applications'));
        $rules->add($rules->existsIn(['events_field_id'], 'EventsFields'));

        return $rules;
    }

    public function validateValueByEventsFieldId($eventsFieldId, $value)
    {
        $eventsFieldQuery = $this->EventsFields->find('all', [
            'select' => [
                'validation'
            ],
            'conditions' => [
                'id' => $eventsFieldId
            ]
        ]);
        $eventsField = $eventsFieldQuery->first();

        $validator = new Validator();

        switch ($eventsField->validation)
        {
            case 'notEmpty':
                $validator
                    ->notEmpty('value');
                break;

            case 'notZero':
                $validator
                    ->greaterThan('value', 0);
        }

        if (empty($validator->errors(['value' => $value])))
        {
            return true;
        }

        return false;
    }
}
