<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Internship Entity
 *
 * @property int $id
 * @property int $company_id
 * @property int $session_id
 * @property string $name
 * @property string $adress
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property string $administrative_region
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
        'name' => true,
        'adress' => true,
        'city' => true,
        'province' => true,
        'postal_code' => true,
        'administrative_region' => true,
        'created' => true,
        'modified' => true,
        'company' => true,
        'session' => true
    ];
}
