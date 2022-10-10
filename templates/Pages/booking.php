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

$cakeDescription = 'CakePHP: the rapid development PHP framework';
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

<div class="booking">

    <!--part1-->
    <div class="part1">
        <div class="main">
            <div class="headtitle">Book an appointment with us today</div>
            <div class="image">
                <img src="<?=$this->Url->build("/")?>img/2.png"/>
            </div>
        </div>
    </div>


    <!--part2-->
    <div class="part2">

        <div class="left">
            <h3 class="title">Make An Appointment With Jim</h3>
            <p class="desc">Our services can be booked from Monday to Friday (9am-5pm) with each service being provided for one hour. If you would like to experience one of our services, fill in your details below!</p>
        </div>
        <div class="right">

            <img src="<?=$this->Url->build("/")?>img/4.png"/>
        </div>

    </div>





    <!--part4-->
    <div class="part4">

        <h1>Jim's Availability</h1>

        <?= $this->Form->create($appointment) ?>
        <div class="main">
            <div class="left">
                <div class="title" style="font-size: 30px">Some Information About You:</div>

                <div class="line">
                    <span>First Name:</span> <?php echo $this->Form->text('cus_fname');?>
                </div>
                <div class="line">
                    <span>Last Name:</span> <?php echo $this->Form->text('cus_lname');?>
                </div>
                <div class="line">
                    <span>Phone No:</span> <?php echo $this->Form->text('cus_phone');?>
                </div>
                <div class="line">
                    <span>E-mail:</span><?php echo $this->Form->text('cus_email');?>
                </div>

           </div>
           <div class="right">
               <div class="desc" style="font-size: 30px">
                   I would like to book an appointment at:
               </div>
               <div class="time">
                  <?php echo $this->Form->dateTime('appointment_date');?>
               </div>
               <div class="line">
                  <?= $this->Form->select('Service', ['healing1', 'healing2'], ['empty' => 'Select Service',"class"=>"form-select form-select-lg mb-3"]);?>
               </div>
               <div class="line">
                  <?= $this->Form->select('Type', ['on-site', 'online'], ['empty' => 'Select Type',"class"=>"form-select form-select-lg mb-3"]);?>
               </div>
               <div class="submit">
                   <a href="#"><?= $this->Form->button(__('Submit')) ?></a>
                 </div>
           </div>

        </div>
        <?= $this->Form->end() ?>


    </div>

</div>

<?= $this->element('footer') ?>
</body>
</html>

