<?php

namespace backend\controllers;

use common\models\Book;
use common\models\Bookfile;
use common\models\Bookimg;
use common\models\BookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Book models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $bookimage = new Bookimg();
        $bookimage = $bookimage->find()->where(['bookid' => $id])->all();

        $bookfile = new Bookfile();
        $bookfile = $bookfile->find()->where(['bookid' => $id])->one();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'bookimage' => $bookimage,
            'bookfile' => $bookfile,
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Book();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
                $model->bookFiles = UploadedFile::getInstance($model, 'bookFiles');
                $imageName = time();

                $bookfile = new Bookfile();
                $bookfile->bookid = $model->id;
                $bookfile->path = $model->bookFiles->baseName.$imageName.'.'.$model->bookFiles->extension;
                $bookfile->save();

                foreach ($model->imageFiles as $imageFile) {
                    $bookimage = new Bookimg();
                    $bookimage->bookid = $model->id;
                    $bookimage->path  = $imageFile->baseName.$imageName.'.'.$imageFile->extension;
                    $bookimage->save();
                }
                if ($model->uploadimg($imageName) && $model->uploadfile($imageName)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                echo 'xatolik'; die();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
              
        if ($this->request->isPost) {
            $del = Bookimg::find()->where(['bookid'=>$id])->all();
            foreach($del as $item){
                unlink('uploads/bookimgs/'.$item->path);
            }
            Bookimg::deleteAll([
                'bookid' => $id,
            ]);

            $delf = Bookfile::find()->where(['bookid'=>$id])->one();
            unlink('uploads/bookfiles/'.$delf->path);
            Bookfile::deleteAll([
                'bookid' => $id,
            ]);

            if ($model->load($this->request->post()) && $model->save()) {
                $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
                $model->bookFiles = UploadedFile::getInstance($model, 'bookFiles');
                $imageName = time();

                $bookfile = new Bookfile();
                $bookfile->bookid = $model->id;
                $bookfile->path = $model->bookFiles->baseName.$imageName.'.'.$model->bookFiles->extension;
                $bookfile->save();

                foreach ($model->imageFiles as $imageFile) {
                    $bookimage = new Bookimg();
                    $bookimage->bookid = $model->id;
                    $bookimage->path  = $imageFile->baseName.$imageName.'.'.$imageFile->extension;
                    $bookimage->save();
                }
                if ($model->uploadimg($imageName) && $model->uploadfile($imageName)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                echo 'xatolik'; die();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $del = Bookimg::find()->where(['bookid'=>$id])->all();
        foreach($del as $item){
            unlink('uploads/bookimgs/'.$item->path);
        }
        Bookimg::deleteAll([
            'bookid' => $id,
        ]);
        
        $delf = Bookfile::find()->where(['bookid'=>$id])->one();
        unlink('uploads/bookfiles/'.$delf->path);
        Bookfile::deleteAll([
            'bookid' => $id,
        ]);

        $this->findModel($id)->delete();        

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
