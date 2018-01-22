<?php
namespace App\Model\Table;

use Cake\I18n\Date;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pricings Model
 *
 * @property \App\Model\Table\EventsTable|\Cake\ORM\Association\BelongsTo $Events
 *
 * @method \App\Model\Entity\Pricing get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pricing newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pricing[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pricing|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pricing patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pricing[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pricing findOrCreate($search, callable $callback = null, $options = [])
 */
class PricingsTable extends Table
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

        $this->setTable('pricings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
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
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

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

        return $rules;
    }

    public function getActivePriceOnEvent($eventId)
    {
        $query = $this->find('all');
        $query->where([
                'Pricings.event_id' => $eventId,
                'Pricings.date <=' => Date::now()
            ])
            ->order([
                'Pricings.date DESC'
            ])
            ->limit(1)
            ->select([
                'Pricings.price'
            ]);
        if ($query->count() > 0)
        {
            return $query->first()->price;
        }
        else
        {
            return 0.0;
        }
    }

    public function getPricingsOnEventById($eventId)
    {
        $query = $this->find('all');
        $query
            ->where([
                'Pricings.event_id' => $eventId
            ])
            ->order([
                'Pricings.date ASC'
            ])
            ->select([
                'Pricings.id',
                'Pricings.price',
                'Pricings.date'
            ]);
        return $query->toArray();
    }
}
