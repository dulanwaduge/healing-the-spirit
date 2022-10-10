<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription = 'Jims Healing'?>

        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
<?php
    echo $this->Html->charset();
    echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
    echo $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js');

?>
<?= $this->fetch('meta') ?>

    <?= $this->fetch('script') ?>

<?= $this->Html->css(['normalize.min', 'milligram.min',  'booking',  'cake']) ?>
<?= $this->fetch('css') ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container nav-row">
        <div class="logo"><?php echo $this->Html->image('logo.png',['url'=> ['controller' => 'Pages', 'action' => 'display', 'home']]); ?>
            <?php
                if (empty($_SESSION["logininfo"])) {
            ?>
            <?= $this->Html->link(__('Sign-in'), ['controller' => 'Login', 'action' => 'index'],['class'=>"login"]); ?>
            <?php
                } else {
            ?>
            <div class="dropdown login">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 18px">
                    <?= $_SESSION['logininfo']['email'] ?>
                </button>
                <div class="dropdown-menu"  aria-labelledby="dropdownMenu2" >
                    <?= $this->Html->link(__('Sign-out'), ['controller' => 'Login', 'action' => 'signout'],['class'=>"dropdown-item font"]); ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>

    </div>
    <ul class="menu">
        <li>
            <div class="dropdown">
                <div class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;  background-color: #331832; border-color: #331832;">
                    <?= $this->Html->link(__('Services'), ['controller' => 'Pages', 'action' => 'service']) ?>
                </div>
                <div class="dropdown-menu" style="background: #2c132c;font-size: 15px" aria-labelledby="dropdownMenu2" >

                    <?= $this->Html->link(__('Medium Readings'), ['controller' => 'Pages', 'action' => 'service'],['class'=>"dropdown-item font"]); ?>
                    <?= $this->Html->link(__('Traditional Japanese Reiki Healing'), ['controller' => 'Pages', 'action' => 'second_service'],['class'=>"dropdown-item font"]); ?>
                </div>
            </div>

    <?= $this->Html->link(__('FAQ'), ['controller' => 'Faq', 'action' => 'index']) ?></li>

        <!-- <li><?= $this->Html->link(__('Blog'), ['controller' => 'Blog', 'action' => 'index']) ?></li> -->
        <li><?= $this->Html->link(__('Blog'), ['controller' => 'Blog', 'action' => 'index']) ?>
        <?= $this->Html->link(__('Contact'), ['controller' => 'Form', 'action' => 'contact']) ?></li>
        <!-- <li><?= $this->Html->link('Shop', '/shop') ?></li> -->
    </ul>
</nav>
<style type="text/css">
    .menu li a {
        padding: 0 2rem;
        font-family: 'Playfair Display', serif;
        letter-spacing: .1rem;
        text-decoration: none;
    }
    .dropdown-menu {
        position: absolute;
        z-index: 1000;
        display: none;
        min-width: 10rem;
        padding: .5rem 0;
        margin: 0;
        font-size: 1rem;
        color: #212529;
        text-align: left;
        list-style: none;
        /* background-color: #fff; */
        background-clip: padding-box;
        /* border: 1px solid rgba(0,0,0,.15);*/
        border-radius: .25rem;
    }
</style>
