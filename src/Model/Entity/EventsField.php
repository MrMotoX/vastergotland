<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventsField Entity
 *
 * @property int $id
 * @property int $event_id
 * @property int $field_id
 * @property string $title
 * @property string $type
 * @property string $validation
 * @property string $data
 *
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\Field $field
 */
class EventsField extends Entity
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
        'field_id' => true,
        'title' => true,
        'type' => true,
        'validation' => true,
        'data' => true,
        'event' => true,
        'field' => true
    ];
}
