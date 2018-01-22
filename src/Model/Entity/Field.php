<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Field Entity
 *
 * @property int $id
 * @property string $title
 * @property string $type
 * @property string $validation
 * @property string $data
 *
 * @property \App\Model\Entity\Application[] $applications
 * @property \App\Model\Entity\Event[] $events
 */
class Field extends Entity
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
        'type' => true,
        'validation' => true,
        'data' => true,
        'applications' => true,
        'events' => true
    ];
}
