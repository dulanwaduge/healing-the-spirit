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
            <?= $this->Html->link(__('Edit Home Content'), ['action' => 'edit', $homeContent->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Home Content'), ['action' => 'delete', $homeContent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $homeContent->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Home Content'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Home Content'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="homeContent view content">
            <h3><?= h($homeContent->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Logo') ?></th>
                    <td><?= h($homeContent->logo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section1 Title') ?></th>
                    <td><?= h($homeContent->section1_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section1 Content') ?></th>
                    <td><?= h($homeContent->section1_content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section1 Img') ?></th>
                    <td><?= h($homeContent->section1_img) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section2 Content') ?></th>
                    <td><?= h($homeContent->section2_content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section2 Title') ?></th>
                    <td><?= h($homeContent->section2_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section2 Img') ?></th>
                    <td><?= h($homeContent->section2_img) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section3 Title') ?></th>
                    <td><?= h($homeContent->section3_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section3 Content') ?></th>
                    <td><?= h($homeContent->section3_content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section3 Img') ?></th>
                    <td><?= h($homeContent->section3_img) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section4 Title') ?></th>
                    <td><?= h($homeContent->section4_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section4 Content') ?></th>
                    <td><?= h($homeContent->section4_content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Section4 Img') ?></th>
                    <td><?= h($homeContent->section4_img) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($homeContent->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
