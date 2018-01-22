<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicationsFields Model
 *
 * @property \App\Model\Table\ApplicationsTable|\Cake\ORM\Association\BelongsTo $Applications
 * @property \App\Model\Table\FieldsTable|\Cake\ORM\Association\BelongsTo $Fields
 *
 * @method \App\Model\Entity\ApplicationsField get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApplicationsField newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApplicationsField[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationsField|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationsField patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationsField[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationsField findOrCreate($search, callable $callback = null, $options = [])
 */
class ApplicationsFieldsTable extends Table
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

        $this->setTable('applications_fields');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id',
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
            ->scalar('value')
            ->maxLength('value', 255)
            ->requirePresence('value', 'create')
            ->notEmpty('value');

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
        $rules->add($rules->existsIn(['field_id'], 'Fields'));

        return $rules;
    }
}
