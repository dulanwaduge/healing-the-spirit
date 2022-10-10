<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'Jims Healing Service';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min',  'cake', 'booking']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>


<head>
    <?= $this->element('header') ?>
</head>

<div class="services">


    <!--part1-->
    <div class="part1">

        <div class="left">
            <img src="<?=$this->Url->build("/")?>img/3.png"/>
        </div>
        <div class="right">
            <h3 class="title">Traditional Japanese Reiki Healing</h3>

            <p class="desc">Reiki is an energy healing technique that promotes relaxation, reduces stress and anxiety through gentle touch. Reiki practitioners use their hands to deliver energy to your body, improving the flow and balance of your energy to support healing.</p>

            <p class="desc">Traditional Japanese Reiki healing allows for Jim to remove energetic blockades within an individuals body to restore the flow of one’s life energy or ki. Jim is able to redirect the flow of ki and control this flow with her hands as she moves the ki in different positions to remove blockades and obstructions and by doing so she is able to reduce one’s stress and promote healing by optimising the flow of ki. Would you like to restore your natural flow of ki?</p>

            <div class="link">
                <a href="<?=$this->Url->build("/appointments/add")?>">Book An Appointment</a>
            </div>
        </div>
    </div>

    </div>



<?= $this->element('footer') ?>

</body>
</html>

