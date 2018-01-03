<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Date;

/**
 * Events Model
 *
 * @property \App\Model\Table\PricingsTable|\Cake\ORM\Association\HasMany $Pricings
 *
 * @method \App\Model\Entity\Event get($primaryKey, $options = [])
 * @method \App\Model\Entity\Event newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Event|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Event[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Event findOrCreate($search, callable $callback = null, $options = [])
 */
class EventsTable extends Table
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

        $this->setTable('events');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Pricings', [
            'foreignKey' => 'event_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     * @todo Correct the validation of these fields
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->date('last_register_date')
            ->requirePresence('last_register_date', 'create')
            ->notEmpty('last_register_date');

        return $validator;
    }

    public function getOpenForRegistration()
    {
        $query = $this->find('all');
        $query->where([
            'Events.date >=' => Date::now(),
            'Events.last_register_date >=' => Date::now()
        ]);

        return $query;
    }

    /*
     * @todo Create a method which can be used to paginate all events together with their active price
     * I should always look for the pricing which is the youngest past the active date. If I can't find any I will
     * have to look for the pricing which is the closest in the future. If I still can't find any I will pick the price of zero.
     */
}
