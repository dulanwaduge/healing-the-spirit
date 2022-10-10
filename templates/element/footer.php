<footer>
    <div class="container row">
        <div class="col-5">
            <div class="logo"><?php echo $this->Html->image('logo.png',['url'=> ['controller' => 'Pages', 'action' => 'display', 'home']]); ?></div></div>

        <div class="col-7">
            <h4>Quicklinks</h4>
            <ul class="quicklinks" >

        <li><?= $this->Html->link(__('Book Appointment'), ['controller' => 'Appointments', 'action' => 'add']) ?></li>
     <li><?= $this->Html->link(__('FAQ'), ['controller' => 'Faq', 'action' => 'index']) ?></li>


        <li><?= $this->Html->link(__('Blog'), ['controller' => 'Blog', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Contact'), ['controller' => 'Form', 'action' => 'contact']) ?></li>
        <!-- <li><?= $this->Html->link('Shop', '/shop') ?></li> -->
    </ul>

        </div>


    </div>
</footer>
