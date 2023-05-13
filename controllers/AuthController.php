<?php 
namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;
class AuthController extends Controller{
    public function login(Request $request,Response $response)
    {
        $loginForm = new LoginForm();
        
        if($request->isPost())
        {
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login())
            {
                return $response->redirect('home');
            }
        }
        $this->setLayout('Auth');
        return $this->render('login',[
            'model' => $loginForm
        ]);
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
                Application::$app->session->setFlash('success','Thanks for registering');
                Application::$app->response->redirect('home');
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