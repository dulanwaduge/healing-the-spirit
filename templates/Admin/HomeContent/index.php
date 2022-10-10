<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HomeContent[]|\Cake\Collection\CollectionInterface $homeContent
 */
?>
<div class="homeContent index content">
    <?= $this->Html->link(__('New Home Content'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Home Content') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('logo') ?></th>
                    <th><?= $this->Paginator->sort('section1_title') ?></th>
                    <th><?= $this->Paginator->sort('section1_content') ?></th>
                    <th><?= $this->Paginator->sort('section1_img') ?></th>
                    <th><?= $this->Paginator->sort('section2_content') ?></th>
                    <th><?= $this->Paginator->sort('section2_title') ?></th>
                    <th><?= $this->Paginator->sort('section2_img') ?></th>
                    <th><?= $this->Paginator->sort('section3_title') ?></th>
                    <th><?= $this->Paginator->sort('section3_content') ?></th>
                    <th><?= $this->Paginator->sort('section3_img') ?></th>
                    <th><?= $this->Paginator->sort('section4_title') ?></th>
                    <th><?= $this->Paginator->sort('section4_content') ?></th>
                    <th><?= $this->Paginator->sort('section4_img') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($homeContent as $homeContent): ?>
                <tr>
                    <td><?= $this->Number->format($homeContent->id) ?></td>
                    <td><?= h($homeContent->logo) ?></td>
                    <td><?= h($homeContent->section1_title) ?></td>
                    <td><?= h($homeContent->section1_content) ?></td>
                    <td><?= h($homeContent->section1_img) ?></td>
                    <td><?= h($homeContent->section2_content) ?></td>
                    <td><?= h($homeContent->section2_title) ?></td>
                    <td><?= h($homeContent->section2_img) ?></td>
                    <td><?= h($homeContent->section3_title) ?></td>
                    <td><?= h($homeContent->section3_content) ?></td>
                    <td><?= h($homeContent->section3_img) ?></td>
                    <td><?= h($homeContent->section4_title) ?></td>
                    <td><?= h($homeContent->section4_content) ?></td>
                    <td><?= h($homeContent->section4_img) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $homeContent->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $homeContent->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $homeContent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $homeContent->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
