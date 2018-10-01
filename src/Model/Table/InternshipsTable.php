<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Internships Model
 *
 * @property \App\Model\Table\CompaniesTable|\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\SessionsTable|\Cake\ORM\Association\BelongsTo $Sessions
 * @property |\Cake\ORM\Association\BelongsTo $OwnershipStatuses
 * @property |\Cake\ORM\Association\BelongsTo $Regions
 * @property |\Cake\ORM\Association\BelongsTo $ClientTypes
 *
 * @method \App\Model\Entity\Internship get($primaryKey, $options = [])
 * @method \App\Model\Entity\Internship newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Internship[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Internship|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Internship|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Internship patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Internship[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Internship findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InternshipsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('internships');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OwnershipStatuses', [
            'foreignKey' => 'ownerStatus_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ClientTypes', [
            'foreignKey' => 'clientType_id',
            'joinType' => 'INNER'
        ]);
		
		$this->belongsTo('Missions', [
            'foreignKey' => 'missions_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('task')
            ->maxLength('task', 255)
            ->requirePresence('task', 'create')
            ->notEmpty('task');

        $validator
            ->scalar('precision_facility')
            ->maxLength('precision_facility', 255)
            ->requirePresence('precision_facility', 'create')
            ->notEmpty('precision_facility');

        $validator
            ->scalar('precision_task')
            ->maxLength('precision_task', 255)
            ->requirePresence('precision_task', 'create')
            ->notEmpty('precision_task');

        $validator
            ->scalar('adress')
            ->maxLength('adress', 255)
            ->allowEmpty('adress');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->allowEmpty('city');

        $validator
            ->scalar('province')
            ->maxLength('province', 255)
            ->allowEmpty('province');

        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 6)
            ->allowEmpty('postal_code');

        $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->integer('fax')
            ->allowEmpty('fax');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));
        $rules->add($rules->existsIn(['ownerStatus_id'], 'OwnershipStatuses'));
        $rules->add($rules->existsIn(['region_id'], 'Regions'));
        $rules->add($rules->existsIn(['clientType_id'], 'ClientTypes'));

        return $rules;
    }
}
