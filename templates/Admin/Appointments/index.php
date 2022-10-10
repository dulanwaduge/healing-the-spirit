<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment[]|\Cake\Collection\CollectionInterface $appointments
 */

echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block'=> true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block'=> true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block'=> true]);
?>
<div class="appointments index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Appointments') ?></h1>
        <!--<a href="<#?= $this->Url->build(['action' => 'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Appointment</a>-->
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>

                <th><?= $this->Paginator->sort('cus_fname') ?></th>
                <th><?= $this->Paginator->sort('cus_lname') ?></th>
                <th><?= $this->Paginator->sort('cus_email') ?></th>
                <th><?= $this->Paginator->sort('service') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('appointment_date') ?></th>
                <th><?= $this->Paginator->sort('appointment_time') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($appointments as $appointment): ?>
                <tr>

                    <td><?= h($appointment->cus_fname) ?></td>
                    <td><?= h($appointment->cus_lname) ?></td>
                    <td><?= h($appointment->cus_email) ?></td>
                    <td><?= h($appointment->service) ?></td>
                    <td><?= h($appointment->type) ?></td>
                    <td><?= h($appointment->appointment_date->format("d/m/y")) ?></td>
                    <td><?= h($appointment->appointment_time) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $appointment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appointment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appointment->id], ['confirm' => __('Are you sure you want to delete {0} {1} appointment?', $appointment->cus_fname,$appointment->cus_lname)]) ?>
                        <?= $this->Form->postLink(__('Cancel'), ['action' => 'cancel', $appointment->id], ['confirm' => __('Are you sure you want to cancel {0} {1} appointment?', $appointment->cus_fname,$appointment->cus_lname)]) ?>
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

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });



    </script>
</div>
