<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomersBuys Model
 *
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\BuysTable&\Cake\ORM\Association\BelongsTo $Buys
 *
 * @method \App\Model\Entity\CustomersBuy newEmptyEntity()
 * @method \App\Model\Entity\CustomersBuy newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CustomersBuy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomersBuy get($primaryKey, $options = [])
 * @method \App\Model\Entity\CustomersBuy findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CustomersBuy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CustomersBuy[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomersBuy|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomersBuy saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CustomersBuy[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CustomersBuy[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CustomersBuy[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CustomersBuy[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CustomersBuysTable extends Table
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

        $this->setTable('customers_buys');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
        ]);
        $this->belongsTo('Buys', [
            'foreignKey' => 'buy_id',
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
            ->integer('customer_id')
            ->allowEmptyString('customer_id');

        $validator
            ->integer('buy_id')
            ->allowEmptyString('buy_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('customer_id', 'Customers'), ['errorField' => 'customer_id']);
        $rules->add($rules->existsIn('buy_id', 'Buys'), ['errorField' => 'buy_id']);

        return $rules;
    }
}
