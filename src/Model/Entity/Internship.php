<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Internship Entity
 *
 * @property int $id
 * @property int $company_id
 * @property int $session_id
 * @property int $ownerStatus_id
 * @property int $region_id
 * @property string $name
 * @property string $task
 * @property string $precision_facility
 * @property string $precision_task
 * @property string $adress
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property int $phone
 * @property int $fax
 * @property string $email
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Session $session
 */
class Internship extends Entity
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
        'company_id' => true,
        'session_id' => true,
        'ownerStatus_id' => true,
        'region_id' => true,
        'name' => true,
        'task' => true,
        'precision_facility' => true,
        'precision_task' => true,
        'adress' => true,
        'city' => true,
        'province' => true,
        'postal_code' => true,
        'phone' => true,
        'fax' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'company' => true,
        'session' => true,
        'mission' => true
    ];
}
