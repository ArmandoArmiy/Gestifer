<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \App\Model\Table\BuysTable&\Cake\ORM\Association\HasMany $Buys
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\BuysTable&\Cake\ORM\Association\BelongsToMany $Buys
 *
 * @method \App\Model\Entity\Customer newEmptyEntity()
 * @method \App\Model\Entity\Customer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CustomersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('customers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Buys', [
            'foreignKey' => 'customer_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'customer_id',
        ]);
        $this->belongsToMany('Buys', [
            'foreignKey' => 'customer_id',
            'targetForeignKey' => 'buy_id',
            'joinTable' => 'customers_buys',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 10)
            ->allowEmptyString('phone');

        $validator
            ->numeric('credit_limit')
            ->allowEmptyString('credit_limit');

        $validator
            ->numeric('credit_used')
            ->allowEmptyString('credit_used');

        return $validator;
    }
}
