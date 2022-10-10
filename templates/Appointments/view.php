<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Appointment'), ['action' => 'edit', $appointment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Appointment'), ['action' => 'delete', $appointment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Appointments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Appointment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="appointments view content">
            <h3><?= h($appointment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cus Fname') ?></th>
                    <td><?= h($appointment->cus_fname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cus Lname') ?></th>
                    <td><?= h($appointment->cus_lname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cus Email') ?></th>
                    <td><?= h($appointment->cus_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Service') ?></th>
                    <td><?= h($appointment->service) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($appointment->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($appointment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Appointment Date') ?></th>
                    <td><?= h($appointment->appointment_date) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Cus Phone') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($appointment->cus_phone)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
