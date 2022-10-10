<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
$formTemplate =
    [
        'inputContainer' => '<div class="input {{type}} {{required}}">{{content}}</div>',
        'label' => '<label{{attrs}} class="form-label">{{text}}</label>',
        'input' => '<input type="{{type}}" name="{{name}}" class="form-control" {{attrs}}/>',
        'select' => '<select name="{{name}}" class="form-select" {{attrs}}> {{content}}</select>',
        'option' => '<option value="{{value}}" class="form-option" {{attrs}}>{{text}}</option>'
    ];

$this->Form->setTemplates($formTemplate);
//debug($this->Form->getTemplates());

?>

<h1 class="h3 mb-2 text-gray-800">Book a new Appointment</h1>

<?= $this->Form->create($appointment) ?>

<?php
    echo $this->Form->control('cus_fname');
    echo $this->Form->control('cus_lname');
    echo $this->Form->control('cus_phone');
    echo $this->Form->control('cus_email');
    echo $this->Form->select('service', [1=>'Medium Readings', 2=>'Traditional Japanese Reiki Healing'], ['empty' => 'Select Service']);
    echo $this->Form->select('type', [1=>'on-site', 2=>'online'], ['empty' => 'Select Type']);
    echo $this->Form->date('appointment_date', ["min" => date("Y-m-d")]);
?>
<div id="times">
    <?= $this->Form->select('appointment_time', $time, ['empty' => 'Select Time']);?>
</div>
<?= $this->Form->button(__('Add Appointment'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>

<script>
    $("input[name='appointment_date']").on("change", function() {
        var date = $(this).val();
        $.get("<?=$this->Url->build('/appointments/getTime', []);?>?date=" + date,function(data,status){
            createSelectHtml(data);
        });
    })

    function createSelectHtml(disabled) {
        var time_list = ['9:00 - 10:00', '10:00 - 11:00', '11:00 - 12:00', '13:00 - 14:00', '14:00 - 15:00', '15:00 - 16:00', '16:00 - 17:00'];
        var k = 0;
        var d = '';
        var html = '<select name="appointment_time" class="form-select"><option value="" selected="selected">Select Time</option>';
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
        html += '</select>';
        $("#times").html(html);
    }
</script>
