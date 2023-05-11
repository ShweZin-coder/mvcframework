<?php 
namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;
class AuthController extends Controller{
    public function login(Request $request)
    {
        $this->setLayout('Auth');
        return $this->render('login');
    }
    public function register(Request $request)
    {
        $errors = [];
        $registerModel = new RegisterModel();
        if($request->isPost())
        {
            $registerModel->loadData($request->getBody());
            echo '<pre>';
                var_dump($registerModel);
            echo '</pre>';
            if($registerModel->validate() && $registerModel->register())
            {
                return 'Success';
            }
            return $this->render('register',[
                'model' => $registerModel
            ]);
        }
        return $this->render('register',[
            'model' => $registerModel
        ]);
    }
}