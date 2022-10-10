<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        'email'         => true,
        'password'      => true,
        'salt'          => true,
        'dt_add'        => true,
        'reset_code'    => true,
        'expire_code'   => true,
        'code_status'   => true
    ];
}
