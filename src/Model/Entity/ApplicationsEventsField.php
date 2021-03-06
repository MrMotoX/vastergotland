<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApplicationsEventsField Entity
 *
 * @property int $id
 * @property int $application_id
 * @property int $events_field_id
 * @property string $title
 * @property string $type
 * @property string $value
 *
 * @property \App\Model\Entity\Application $application
 * @property \App\Model\Entity\EventsField $events_field
 */
class ApplicationsEventsField extends Entity
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
        'application_id' => true,
        'events_field_id' => true,
        'title' => true,
        'type' => true,
        'value' => true,
        'application' => true,
        'events_field' => true
    ];
}
