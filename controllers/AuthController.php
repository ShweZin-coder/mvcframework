<?php 
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;
class AuthController extends Controller{
    public function login(Request $request)
    {
        $this->setLayout('Auth');
        return $this->render('login');
    }
    public function register(Request $request)
    {
        $errors = [];
        $User = new User();
        if($request->isPost())
        {
            $User->loadData($request->getBody());
            if($User->validate() && $User->save())
            {
                Application::$app->response->redirect('/');
            }
            return $this->render('register',[
                'model' => $User
            ]);
        }
        return $this->render('register',[
            'model' => $User
        ]);
    }
}