<?php

class PendaftaranController extends Controller
{
    public $layout = '//layouts/column2';

    // Action untuk menampilkan form pendaftaran pasien baru
    public function actionCreate()
    {
        $model = new Pasien;

        // Cek apakah form pendaftaran pasien dikirimkan
        if (isset($_POST['Pasien'])) {
            $model->attributes = $_POST['Pasien'];
            if ($model->save()) {
                // Redirect ke halaman view setelah sukses menyimpan data pasien
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        // Render view form pendaftaran pasien
        $this->render('create', array(
            'model' => $model,
        ));
    }

    // Action untuk melihat detail pasien yang sudah terdaftar
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    // Fungsi untuk memuat data pasien berdasarkan ID
    public function loadModel($id)
    {
        $model = Pasien::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Pasien tidak ditemukan.');
        return $model;
    }
}
