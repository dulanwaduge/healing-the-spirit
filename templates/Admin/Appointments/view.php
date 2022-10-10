<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>"<h6> <?= $this->Html->link(__('Edit '), ['action' => 'edit', $appointment->id], ['class' => 'side-nav-item']) ?><h6>
                   <h6> <?= $this->Form->postLink(__('Cancel '), ['action' => 'cancel', $appointment->id], ['confirm' => __('Are you sure you want to delete {0} {1}?', $appointment->cus_fname,$appointment->cus_lname), 'class' => 'side-nav-item']) ?><h6>
                           <h6><?= $this->Html->link(__('List '), ['action' => 'index'], ['class' => 'side-nav-item']) ?><h6>
                                   <h6> <?= $this->Html->link(__('New Appointment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?><h6>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="appointments view content">
            <h3><?= h('Appointment Detail') ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer First Name') ?></th>
                    <td><?= h($appointment->cus_fname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Last Name') ?></th>
                    <td><?= h($appointment->cus_lname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Email') ?></th>
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
                    <th><?= __('Appointment Date') ?></th>
                    <td><?= h($appointment->appointment_date->format("d/m/y")) ?></td>

                </tr>
                <tr>
                    <th><?= __('Appointment Time') ?></th>
                    <td><?= h($appointment->appointment_time) ?></td>
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
