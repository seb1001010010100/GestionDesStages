<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Companies Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Establishments
 * @property \App\Model\Table\InternshipsTable|\Cake\ORM\Association\HasMany $Internships
 *
 * @method \App\Model\Entity\Company get($primaryKey, $options = [])
 * @method \App\Model\Entity\Company newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Company[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Company|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Company[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Company findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CompaniesTable extends Table
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

        $this->setTable('companies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Establishments', [
            'foreignKey' => 'establishment_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Internships', [
            'foreignKey' => 'company_id'
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
            ->scalar('adress')
            ->maxLength('adress', 255)
            ->requirePresence('adress', 'create')
            ->notEmpty('adress');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->allowEmpty('city');

        $validator
            ->scalar('province')
            ->maxLength('province', 255)
            ->allowEmpty('province');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 16)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->integer('phone')
            ->allowEmpty('phone');

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
        //$rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['establishment_id'], 'Establishments'));

        // Add a rule that is applied for create and update operations
        // check if email is available
        $rules->add(
            function ($entity, $options) {
                $usersTable = TableRegistry::get('Users');
                $user = $usersTable->find()->where(['username' => $entity['email']])->first();
                if ($user) {
                    return 'cette email n\'est pas disponible.';
                } else {
                    // le test a passé
                    return true;
                }
            }, 'is_email_free',
            [
                'errorField' => 'email',
                'message' => 'cette email n\'est pas disponible.'
            ]
        );

        return $rules;
    }
}
