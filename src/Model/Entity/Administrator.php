<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Administrator Entity
 *
 * @property int $id
 * @property string $gender
 * @property string $first_name
 * @property string $last_name
 * @property string $title
 * @property string $place
 * @property string $adress
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property string $email
 * @property int $phone
 * @property string $position
 * @property int $cell
 * @property int $fax
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 */
class Administrator extends Entity
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
        'gender' => true,
        'first_name' => true,
        'last_name' => true,
        'title' => true,
        'place' => true,
        'adress' => true,
        'city' => true,
        'province' => true,
        'postal_code' => true,
        'email' => true,
        'phone' => true,
        'position' => true,
        'cell' => true,
        'fax' => true,
        'created' => true,
        'modified' => true
    ];
}
