<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InternshipClienttypeXref Entity
 *
 * @property int $id
 * @property int $internship_id
 * @property int $clienttype_id
 */
class CompaniesClienttypes extends Entity
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
        'clienttype_id' => true,
        'companie' => true,
        'clienttype' => true
    ];
}
