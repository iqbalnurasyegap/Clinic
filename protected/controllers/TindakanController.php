<?php

class TindakanController extends Controller
{
    /**
     * @var string Layout default untuk tampilan. Menggunakan layout dua kolom 'column2'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // kontrol akses untuk operasi CRUD
            'postOnly + delete', // hanya mengizinkan penghapusan via POST
        );
    }

    /**
     * Aturan kontrol akses.
     * @return array aturan kontrol akses
     */
    public function accessRules()
    {
        return array(
            array('allow', // izinkan semua pengguna untuk 'index' dan 'view'
                'actions' => array('index', 'view'),
                'users' => array('pegawai','dokter','admin'),
            ),
            array('allow', // izinkan pengguna terotentikasi untuk 'create' dan 'update'
                'actions' => array('create', 'update'),
                'users' => array('dokter','admin'),
            ),
            array('allow', // izinkan admin untuk 'admin' dan 'delete'
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',  // larang semua pengguna
                'users' => array('*'),
            ),
        );
    }

    /**
     * Tampilkan model tertentu.
     * @param integer $id ID model yang akan ditampilkan
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Membuat model baru.
     * Jika berhasil, redirect ke halaman 'view'.
     */
    public function actionCreate()
    {
        $model = new Tindakan;

        // Validasi AJAX jika diperlukan
        if (isset($_POST['Tindakan'])) {
            $model->attributes = $_POST['Tindakan'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Mengupdate model tertentu.
     * Jika berhasil, redirect ke halaman 'view'.
     * @param integer $id ID model yang akan diupdate
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Validasi AJAX jika diperlukan
        if (isset($_POST['Tindakan'])) {
            $model->attributes = $_POST['Tindakan'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Menghapus model tertentu.
     * Jika berhasil, redirect ke halaman 'admin'.
     * @param integer $id ID model yang akan dihapus
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // Jika request menggunakan AJAX (dari grid view admin), tidak perlu redirect
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Menampilkan daftar semua model.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Tindakan');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Mengelola semua model.
     */
    public function actionAdmin()
    {
        $model = new Tindakan('search');
        $model->unsetAttributes(); // kosongkan nilai default
        if (isset($_GET['Tindakan'])) {
            $model->attributes = $_GET['Tindakan'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Mengambil data model berdasarkan primary key yang diberikan pada variabel GET.
     * Jika model tidak ditemukan, akan muncul exception HTTP.
     * @param integer $id ID model yang akan dimuat
     * @return Tindakan model yang dimuat
     * @throws CHttpException jika model tidak ditemukan
     */
    public function loadModel($id)
    {
        $model = Tindakan::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'Halaman yang Anda minta tidak ada.');
        }
        return $model;
    }

    /**
     * Melakukan validasi AJAX.
     * @param Tindakan $model model yang akan divalidasi
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tindakan-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
