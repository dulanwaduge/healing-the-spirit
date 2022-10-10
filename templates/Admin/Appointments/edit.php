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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appointment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Appointments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="appointments form content">
            <?= $this->Form->create($appointment) ?>
            <fieldset>
                <legend><?= __('Edit Appointment') ?></legend>
                <?php
                    echo $this->Form->control('cus_fname');
                    echo $this->Form->control('cus_lname');
                    echo $this->Form->control('cus_phone');
                    echo $this->Form->control('cus_email');
                    echo $this->Form->control('service', ['type' => 'select', 'options' => [1=>'Medium Readings', 2=>'Traditional Japanese Reiki Healing']]);
                    echo $this->Form->control('type', ['type' => 'select', 'options' => [1=>'on-site', 2=>'online']]);
                    echo $this->Form->control('appointment_date');
                    echo $this->Form->control('appointment_time', ['type' => 'select', 'options' => $times]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    $("input[name='appointment_date']").on("change", function() {
        var date = $(this).val();console.log(date);
        $.get("<?=$this->Url->build('/appointments/getTime', []);?>?date=" + date,function(data,status){
            createSelectHtml(data);
        });
    })

    function createSelectHtml(disabled) {
        var time_list = ['9:00 - 10:00', '10:00 - 11:00', '11:00 - 12:00', '13:00 - 14:00', '14:00 - 15:00', '15:00 - 16:00', '16:00 - 17:00'];
        var k = 0;
        var d = '';
        var html = '';
        for (var i in time_list) {
            k = (i | 0) + 1;
            var exists = disabled.indexOf(k);
            if (exists != -1) {
                d = 'disabled';
            } else {
                d = '';
            }
            html += '<option value="' + k + '" ' + d + '>' + time_list[i] + '</option>';
        }
        $("#appointment-time").html(html);
    }
</script>
