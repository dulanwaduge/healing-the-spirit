<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HomeContent $homeContent
 */
?>
<div class="row">

    <div class="column-responsive column-80">
        <div class="homeContent form content">
            <?= $this->Form->create($homeContent, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Edit Home Content') ?></legend>
                <?php
               
                    // echo "<div class='page-section '><h5>Update Logo</h5>";
                    // echo $this->Html->image(h($homeContent->logo), array('height'=>'200px'));
                    // echo $this->Form->control('logo', ['label'=>false, 'type' => 'file']);
                    // echo "</div>";
                    echo "<div class='page-section row'>";
                    echo "<div class='col-7 section-item'><h5>Section 1 Title</h5>";
                    echo $this->Form->control('section1_title',['label'=>false]);
                    echo "<h5>Section 1 Content</h5>";
                    echo $this->Form->control('section1_content',['label'=>false, 'type'=>'textarea']);
                    echo "</div>";
                    // echo "<div class='col-4 section-item'>";
                    // echo "<h5>Section 1 Image</h5>";
                    // echo $this->Html->image(h($homeContent->section1_img), array('height'=>'200px'));
                    // echo $this->Form->control('section1_img', ['label'=>false, 'type' => 'file', 'value'=>h($homeContent->section1_img)]);
                    // echo "</div>";
                    echo "</div>";
                    echo "<div class='page-section row'>";
                    echo "<div class='col-7 section-item'><h5>Section 2 Title</h5>";
                    echo $this->Form->control('section2_title',['label'=>false]);
                    echo "<h5>Section 2 Content</h5>";
                    echo $this->Form->control('section2_content',['label'=>false, 'type'=>'textarea']);
                    echo "</div>";
                    // echo "<div class='col-4 section-item'>";
                    // echo "<h5>Section 2 Image</h5>";
                    // echo $this->Html->image(h($homeContent->section2_img), array('height'=>'200px'));
                    // echo $this->Form->control('section2_img', ['label'=>false, 'type' => 'file']);
                    // echo "</div>";
                    echo "</div>";
                    echo "<div class='page-section row'>";
                    echo "<div class='col-7 section-item'><h5>Section 3 Title</h5>";
                    echo $this->Form->control('section3_title',['label'=>false]);
                    echo "<h5>Section 3 Content</h5>";
                    echo $this->Form->control('section3_content',['label'=>false, 'type'=>'textarea']);
                    echo "</div>";
                    // echo "<div class='col-4 section-item'>";
                    // echo "<h5>Section 3 Image</h5>";
                    // echo $this->Html->image(h($homeContent->section3_img), array('height'=>'200px'));
                    // echo $this->Form->control('section3_img', ['label'=>false, 'type' => 'file']);
                    // echo "</div>";
                    echo "</div>";
                    echo "<div class='page-section row'>";
                    echo "<div class='col-7 section-item'>";
                    echo "<h5>Section 4 Title</h5>";
                    echo $this->Form->control('section4_title',['label'=>false]);
                    echo "<h5>Section 4 Content</h5>";
                    echo $this->Form->control('section4_content',['label'=>false, 'type'=>'textarea']);
                    echo "</div>";
                    // echo "<div class='col-4 section-item'>";
                    // echo "<h5>Section 4 Image</h5>";
                    // echo $this->Html->image(h($homeContent->section4_img), array('height'=>'200px'));
                    // echo $this->Form->control('section4_img', ['label'=>false, 'type' => 'file']);
                    // echo "</div>";
                    echo "</div>";
                ?>
            </fieldset>
            <?= $this->Form->button(__('Save'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
