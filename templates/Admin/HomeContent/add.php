<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HomeContent $homeContent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Home Content'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="homeContent form content">
            <?= $this->Form->create($homeContent) ?>
            <fieldset>
                <legend><?= __('Add Home Content') ?></legend>
                <?php
                    echo $this->Form->control('logo');
                    echo $this->Form->control('section1_title');
                    echo $this->Form->control('section1_content');
                    echo $this->Form->control('section1_img');
                    echo $this->Form->control('section2_content');
                    echo $this->Form->control('section2_title');
                    echo $this->Form->control('section2_img');
                    echo $this->Form->control('section3_title');
                    echo $this->Form->control('section3_content');
                    echo $this->Form->control('section3_img');
                    echo $this->Form->control('section4_title');
                    echo $this->Form->control('section4_content');
                    echo $this->Form->control('section4_img');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
