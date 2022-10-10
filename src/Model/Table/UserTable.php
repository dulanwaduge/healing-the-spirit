<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class UserTable extends Table
{
    public function initialize(array $config): void {
        parent::initialize($config);

        $this->setTable('user');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }
}
