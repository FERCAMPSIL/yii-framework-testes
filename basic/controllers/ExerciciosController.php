<?php

namespace app\controllers;

use app\models\Pessoas;
use app\models\CadastroModel;
use yii\base\Controller;
use yii;


 class ExerciciosController extends Controller{

    public function actionFormulario(){
        $CadastroModel= new CadastroModel();
        $post=Yii::$app->request->post();

        if($CadastroModel->load($post) && $CadastroModel->validate()){

            return $this->render('formulario-confirmaçao' , [
                'model'=>$CadastroModel
            ]);

        }else{

            return $this->render('formulario' , [
                'model'=>$CadastroModel
            ]);
        }

        
    }

    public function actionPessoas(){

        $pessoas = Pessoas::find()->orderBy('nome')->all();

        echo'<pre>'; print_r($pessoas);
    }
 }
?>