<?php 
namespace app\core;
use app\core\Router;
use app\core\Request;
use app\core\Response;
use app\core\Controller;
use app\core\Database;
use app\core\DBModel;
use app\core\View;
class Application{
    public string $layout = 'main';
    public string $userClass;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public static Application $app;
    public ?Controller $controller = null;
    public ?DBModel $user;
    public View $view;
    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->view = new View();
        $primaryValue = $this->session->get('user');
        if($primaryValue)
        {
            $primaryKey = $this->userClass::primaryKey();
            $this->user =  $this->userClass::findOne([$primaryKey => $primaryValue]);
        }
        else
        {
            $this->user = null;
        }
        
    }
    public static function isGuest()
    {
        return !self::$app->user;
    }
    public function getController()
    {
        return $this->controller;
    }
    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }
    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error',[
                'exception' => $e
            ]);
        }
    }
    public function login(DBModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user',$primaryValue);
        return true;
    }
    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}