<h1>Pendaftaran Pasien Baru</h1>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'pendaftaran-form',
    'enableAjaxValidation' => false,
)); ?>

<div class="form">
    <div class="row">
        <?php echo $form->labelEx($model, 'nama'); ?>
        <?php echo $form->textField($model, 'nama'); ?>
        <?php echo $form->error($model, 'nama'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'alamat'); ?>
        <?php echo $form->textArea($model, 'alamat'); ?>
        <?php echo $form->error($model, 'alamat'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'tanggal_lahir'); ?>
        <?php echo $form->dateField($model, 'tanggal_lahir'); ?>
        <?php echo $form->error($model, 'tanggal_lahir'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Daftar'); ?>
    </div>
</div>

<?php $this->endWidget(); ?>
