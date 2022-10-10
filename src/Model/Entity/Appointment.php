<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Appointment Entity
 *
 * @property int $id
 * @property string $cus_fname
 * @property string $cus_lname
 * @property string $cus_phone
 * @property string $cus_email
 * @property string $service
 * @property string $type
 * @property \Cake\I18n\FrozenDate $appointment_date
 */
class Appointment extends Entity
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
        'cus_fname' => true,
        'cus_lname' => true,
        'cus_phone' => true,
        'cus_email' => true,
        'service' => true,
        'type' => true,
        'appointment_date' => true,
        'appointment_time' => true,
        'is_cancel' => true
    ];
}
