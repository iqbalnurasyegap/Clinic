<?php
/* @var $this TransaksiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Transaksis',
);

$this->menu=array(
	array('label'=>'Create Transaksi', 'url'=>array('create')),
	array('label'=>'Manage Transaksi', 'url'=>array('admin')),
);
?>

<h1>Transaksi</h1>
<p><a href="<?php echo Yii::app()->createUrl('transaksi/create'); ?>" class="btn btn-primary">Buat Transaksi Baru</a></p>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
