<?php 
namespace app\models;
use app\core\Model;
class RegisterModel extends Model{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;
    
    public function register()
    {
        echo "Creating new User";
    }
    public function rules() : array
    {
        return [
            'first_name' => [self::RULE_REQUIRED],
            'last_name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN, 'min' => 8],[self::RULE_MAX,'max' => 14]],
            'confirm_password' => [self::RULE_REQUIRED,[self::RULE_MATCH, 'match' => 'password']]
        ];
    }

}