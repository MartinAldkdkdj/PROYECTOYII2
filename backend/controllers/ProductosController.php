<?php

namespace backend\controllers;

class ProductosController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
