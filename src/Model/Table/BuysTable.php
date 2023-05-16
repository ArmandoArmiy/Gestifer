<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Buys Model
 *
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsToMany $Customers
 *
 * @method \App\Model\Entity\Buy newEmptyEntity()
 * @method \App\Model\Entity\Buy newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Buy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Buy get($primaryKey, $options = [])
 * @method \App\Model\Entity\Buy findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Buy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Buy[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Buy|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buy saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Buy[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Buy[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Buy[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Buy[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BuysTable extends Table
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

        $this->setTable('buys');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
        ]);
        $this->belongsToMany('Customers', [
            'foreignKey' => 'buy_id',
            'targetForeignKey' => 'customer_id',
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
            ->date('date')
            ->allowEmptyDate('date');

        $validator
            ->integer('customer_id')
            ->allowEmptyString('customer_id');

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

        return $rules;
    }
}
