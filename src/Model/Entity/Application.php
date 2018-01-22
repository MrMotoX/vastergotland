<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Application Entity
 *
 * @property int $id
 * @property int $event_id
 * @property int $pricing_id
 * @property int $user_id
 * @property string $ssn
 * @property string $email
 * @property \Cake\I18n\FrozenDate $date
 * @property float $price
 *
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\Pricing $pricing
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Field[] $fields
 */
class Application extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'event_id' => true,
        'pricing_id' => true,
        'user_id' => true,
        'ssn' => true,
        'email' => true,
        'date' => true,
        'price' => true,
        'event' => true,
        'pricing' => true,
        'user' => true,
        'fields' => true
    ];
}
