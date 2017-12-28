<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pricing Entity
 *
 * @property int $id
 * @property int $event_id
 * @property float $price
 * @property \Cake\I18n\FrozenDate $date
 *
 * @property \App\Model\Entity\Event $event
 */
class Pricing extends Entity
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
        'price' => true,
        'date' => true,
        'event' => true
    ];
}
