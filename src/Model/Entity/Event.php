<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property string $title
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenDate $last_register_date
 *
 * @property \App\Model\Entity\Pricing[] $pricings
 */
class Event extends Entity
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
        'title' => true,
        'date' => true,
        'last_register_date' => true,
        'pricings' => true,
        'location' => true
    ];
}
