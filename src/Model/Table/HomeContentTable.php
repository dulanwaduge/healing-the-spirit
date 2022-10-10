<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HomeContent Model
 *
 * @method \App\Model\Entity\HomeContent newEmptyEntity()
 * @method \App\Model\Entity\HomeContent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\HomeContent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HomeContent get($primaryKey, $options = [])
 * @method \App\Model\Entity\HomeContent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\HomeContent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HomeContent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\HomeContent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HomeContent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HomeContent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HomeContent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\HomeContent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\HomeContent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HomeContentTable extends Table
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

        $this->setTable('home_content');
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
            ->scalar('logo')
            ->maxLength('logo', 1000)
            ->allowEmptyString('logo');

        $validator
            ->scalar('section1_title')
            ->maxLength('section1_title', 255)
            ->requirePresence('section1_title', 'create')
            ->notEmptyString('section1_title');

        $validator
            ->scalar('section1_content')
            ->maxLength('section1_content', 1000)
            ->requirePresence('section1_content', 'create')
            ->notEmptyString('section1_content');

        $validator
            ->scalar('section1_img')
            ->maxLength('section1_img', 1000)
            ->allowEmptyString('section1_img');

        $validator
            ->scalar('section2_content')
            ->maxLength('section2_content', 1000)
            ->requirePresence('section2_content', 'create')
            ->notEmptyString('section2_content');

        $validator
            ->scalar('section2_title')
            ->maxLength('section2_title', 255)
            ->requirePresence('section2_title', 'create')
            ->notEmptyString('section2_title');

        $validator
            ->scalar('section2_img')
            ->maxLength('section2_img', 1000)
            ->allowEmptyString('section2_img');

        $validator
            ->scalar('section3_title')
            ->maxLength('section3_title', 255)
            ->requirePresence('section3_title', 'create')
            ->notEmptyString('section3_title');

        $validator
            ->scalar('section3_content')
            ->maxLength('section3_content', 1000)
            ->requirePresence('section3_content', 'create')
            ->notEmptyString('section3_content');

        $validator
            ->scalar('section3_img')
            ->maxLength('section3_img', 1000)
            ->allowEmptyString('section3_img');

        $validator
            ->scalar('section4_title')
            ->maxLength('section4_title', 255)
            ->requirePresence('section4_title', 'create')
            ->notEmptyString('section4_title');

        $validator
            ->scalar('section4_content')
            ->maxLength('section4_content', 1000)
            ->requirePresence('section4_content', 'create')
            ->notEmptyString('section4_content');

        $validator
            ->scalar('section4_img')
            ->maxLength('section4_img', 1000)
            ->allowEmptyString('section4_img');

        return $validator;
    }
}
