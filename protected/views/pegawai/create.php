<h1>Tambah Pegawai Baru</h1>

<?php
// Menampilkan pesan jika ada error
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pegawai-form',
    'enableAjaxValidation' => false,
));
?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'nama'); ?>
    <?php echo $form->textField($model, 'nama', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'nama'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'alamat'); ?>
    <?php echo $form->textArea($model, 'alamat', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'alamat'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'telepon'); ?>
    <?php echo $form->textField($model, 'telepon', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'telepon'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'email'); ?>
    <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'email'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'jabatan'); ?>
    <?php echo $form->textField($model, 'jabatan', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'jabatan'); ?>
</div>

<div class="form-group">
    <?php echo CHtml::submitButton('Tambah Pegawai', array('class' => 'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>
