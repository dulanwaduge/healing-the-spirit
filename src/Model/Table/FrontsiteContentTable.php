<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FrontsiteContent Model
 *
 * @method \App\Model\Entity\FrontsiteContent newEmptyEntity()
 * @method \App\Model\Entity\FrontsiteContent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FrontsiteContent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FrontsiteContent get($primaryKey, $options = [])
 * @method \App\Model\Entity\FrontsiteContent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FrontsiteContent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FrontsiteContent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FrontsiteContent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FrontsiteContent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FrontsiteContent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FrontsiteContent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FrontsiteContent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FrontsiteContent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FrontsiteContentTable extends Table
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

        $this->setTable('frontsite_content');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('page_name')
            ->maxLength('page_name', 255)
            ->requirePresence('page_name', 'create')
            ->notEmptyString('page_name');

        $validator
            ->scalar('content')
            ->maxLength('content', 16777215)
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        return $validator;
    }
}
