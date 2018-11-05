<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $name
 * @property string $adress
 * @property string $city
 * @property string $province
 * @property int $establishment_id
 * @property string $email
 * @property int $phone
 * @property bool $active
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Establishment $establishment
 * @property \App\Model\Entity\CompaniesClienttype[] $companies_clienttypes
 * @property \App\Model\Entity\Internship[] $internships
 * @property \App\Model\Entity\Mission[] $missions
 */
class Company extends Entity
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
        'name' => true,
        'adress' => true,
        'city' => true,
        'province' => true,
        'establishment_id' => true,
        'email' => true,
        'phone' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'establishment' => true,
        'internships' => true,
        'client_types' => true,
        'missions' => true,
        'user' => true
    ];
}
