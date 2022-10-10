<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
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
<div class="part4">

    <h1>Creating a New Blog</h1>
    <?= $this->Form->create($blog,['enctype'=>"multipart/form-data"]) ?>
    <div class="main">
        <div class="align-middle">


            <div class="line">

                <?php
                echo $this->Form->control('title', array('label'=>'Title','pattern' => '([a-zA-Z]+[a-zA-Z\s]+)', 'maxlength'=>'100','class'=>'form-control input-lg','title'=>'First name can only use letters and be a maximum of 100 characters long'));
                if ($this->Form->isFieldError('title')) {
                    echo $this->Form->error('title');
                } ?></div>

            <div class="form-group">
                <input type="file" name="featured_image" class="form-control" class="featured_image">
            </div>



            <div class="line">

                <?php
                echo $this->Form->control('author', array('label'=>'Author','pattern' => '([a-zA-Z]+[a-zA-Z\s]+)', 'maxlength'=>'100','class'=>'form-control input-lg','title'=>'Name can only use letters and be a maximum of 100 characters long'));
                if ($this->Form->isFieldError('author')) {
                    echo $this->Form->error('author');
                } ?></div>

            <div class="time">
                <?php echo $this->Form->label('Date');
                echo $this->Form->date('date');?>
            </div>
            <div class="line">

                <?php
                echo $this->Form->control('content', array('label'=>'Text Content','type'=>'textarea','pattern' => '([a-zA-Z]+[a-zA-Z\s]+)', 'maxlength'=>'5000','class'=>'form-control input-lg','title'=>'Text Content can only use letters and be a maximum of 5000 characters long'));
                if ($this->Form->isFieldError('content')) {
                    echo $this->Form->error('content');
                } ?></div>
        </div>
        <?= $this->Form->button(__('Add Blog'), ['class' => 'button']) ?>
    </div>



    </div>

    <?= $this->Form->end() ?>
