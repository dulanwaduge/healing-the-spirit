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
        //        'select' => '<select name="{{name}}" class="form-select" {{attrs}}> {{content}}</select>',
        //        'option' => '<option value="{{value}}" class="form-option" {{attrs}}>{{text}}</option>'
    ];

$this->Form->setTemplates($formTemplate);

?>

<div class="booking">

    <!--part1-->



    <!--part2-->
    <div class="part2">
        <!--
        <div class="">
            <h3 class="title">Make An Appointment With Jim</h3>
            <p class="desc">Our services can be booked from Monday to Friday (9am-5pm) with each service being provided for one hour. If you would like to experience one of our services, fill in your details below!</p>
        </div>
        <div class="right">

            <img src="<?=$this->Url->build("/")?>img/4.png"/>
        </div>-->

    </div>





    <!--part4-->
    <div class="part4">

        <h1>Make An Appointment With Jim</h1>


        <?= $this->Form->create($appointment) ?>
        <div class="main">
            <div class="left">
                <h2 class="headtitle">Some information about you:</h2>
                <div class="line">
                    <h4 class="headtitle">First Name:</h4>
                    <?php echo $this->Form->control('cus_fname', array('label'=>'','pattern' => '([a-zA-Z]+[a-zA-Z\s]+)', 'maxlength'=>'30','class'=>'form-control input-lg','title'=>'First name can only use letters and be a maximum of 30 characters long'));
                    if ($this->Form->isFieldError('first_name')) {
                        echo $this->Form->error('first_name');
                    } ?></div>
                <div class="line">
                    <h4 class="headtitle">Last Name:</h4>
                    <?php echo $this->Form->control('cus_lname', array('label'=>'','pattern' => '([a-zA-Z]+[a-zA-Z\s]+)','maxlength'=>'30','class'=>'form-control input-lg','title'=>'Last name can only use letters and be a maximum of 30 characters long'));
                    if ($this->Form->isFieldError('last_name')) {
                        echo $this->Form->error('last_name');
                    }?></div>
                <div class="line">
                    <h4 class="headtitle">Phone Number:</h4>
                    <?php echo $this->Form->control('cus_phone', array('label'=>'','maxlength'=>'10','minlength'=>'10','class'=>'form-control input-lg',
                        'title'=>'Phone number has to be 10 digit.','type'=>'number'));
                    ?></div>
                <div class="line">
                    <h4 class="headtitle">Email:</h4>
                    <?php echo $this->Form->control('cus_email', array('label'=>'','maxlength'=>'50','class'=>'form-control input-lg',
                        'pattern'=>"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$",'title'=>'Email requires @ symbol and can only be a maximum of 50 characters long','type' => 'email'));
                    ?></div>
                <td <h7 class="headtitle"><em>All fields are mandatory.</em></h7> </td>
            </div>

            <div class="right">
                <div class="line">
                <h2 class="headtitle">I would like to book an appointment at:</h2>

                <div class="time">
                    <h4 class="headtitle">Appointment Date:</h4>
                    <?php #echo $this->Form->label('Appointment Date');
                    echo $this->Form->date('appointment_date', ["min" => date("Y-m-d")]);?>
                </div>
                <div class="times">
                    <h4 class="headtitle">Appointment Time:</h4>
                    <?php #echo $this->Form->label('Appointment Time');
                    echo $this->Form->select('appointment_time', $time, ['empty' => 'Select Time']);?>
                </div>
                <div class="line">
                    <h4 class="headtitle">Service:</h4>
                    <?php #echo $this->Form->label('Service');
                    echo $this->Form->select('service', [1=>'Medium Readings', 2=>'Traditional Japanese Reiki Healing'], ['empty' => 'Select Service']);?>
                </div>
                <div class="line">
                    <h4 class="headtitle">Service Environment:</h4>
                    <?php #echo $this->Form->label('Service Environment');
                    echo $this->Form->select('type', [1=>'on-site', 2=>'online'], ['empty' => 'Select Type']);?>
                </div>
                <?= $this->Form->button(__('Add Appointment'), ['class' => 'button']) ?><br/>
                <!--<a href="javascript:;" class="button cancel">Cancel Appointment</a>-->
                </div>

        </div>

        <?= $this->Form->end() ?>





    </div>

</div>
<script>
    $("input[name='appointment_date']").on("change", function() {
        var date = $(this).val();
        $.get("/3/team05-app_fit3047/app/appointments/getTime?date=" + date,function(data,status){
            createSelectHtml(data);
        });
    })

    $(".cancel").on("click", function() {
        var email = window.prompt("please enter your email");
        if (email!=null && email!=""){
            var url = "<?=$this->Url->build('/appointments/index?action=cancel', []);?>" + "&email=" + email;
            $.get("<?=$this->Url->build('/appointments/setSession', []);?>" + "?action=cancel&email=" + email, function() {
                location.href = url;
            });
        }
    })

    function createSelectHtml(disabled) {
        var time_list = ['9:00 - 10:00', '10:00 - 11:00', '11:00 - 12:00', '13:00 - 14:00', '14:00 - 15:00', '15:00 - 16:00', '16:00 - 17:00'];
        var k = 0;
        var d = '';
        var html = '<label for="appointment-time" class="form-label">Appointment Time</label><select name="appointment_time" required="required"><option value="" selected="selected">Select Time</option>';
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
        $(".times").html(html);
    }
</script>
