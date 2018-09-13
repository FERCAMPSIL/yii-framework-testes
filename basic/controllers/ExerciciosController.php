<?php

namespace app\controllers;

use app\models\Pessoas;
use yii\data\Pagination;
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

        $query = Pessoas::find();
        $pagination = new Pagination([
            'defaultPageSize'=>3,
            'totalCount'=>$query->count()
        ]);

        $pessoas= $query->orderBy('nome')
                        ->offset($pagination->offset)
                        ->limit($pagination->limit)
                        ->all();

        return $this->render('pessoas',[
            'pessoas'=>$pessoas,
            'pagination'=>$pagination
        ]);
                    
    }
 }
?>