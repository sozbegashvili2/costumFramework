<?php
namespace app\db;
class Database
{
    /**
     * @var \PDO
     */
    public $pdo;

    public function __construct()
    {
        require_once __DIR__ . '/../config.php';

        $servername = $config['host'];
        $username = $config['username'];
        $password = $config['password'];
        $database = $config['database'];
        $this->pdo = new \PDO('mysql:host=localhost;dbname=framework_db', 'root', '');
    }

    public function login($email, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $users = $stmt->fetch();
        if(!$users) {
            return [false,'User not found',''];
        }
        else if (!password_verify($password,$users['password'])) {
            return [false,'invalid password',''];
        }
        else
            return [true,'',$users['firstname']];
    }
    public function register($firstname,$lastname,$email,$pass) {
        $statement = $this->pdo->prepare("SELECT * from users WHERE email = :email ");
        $statement->bindValue(':email',$email);
        $statement->execute();
        $result = $statement->fetch();
         if (!$result) {
             $stmt = $this->pdo->prepare("  INSERT INTO users (firstname, lastname, email,password)
        VALUES (:firstname,:lastname,:email,:password)");
             $password = password_hash($pass,PASSWORD_BCRYPT);
             $stmt->bindParam(':firstname',$firstname);
             $stmt->bindParam(':lastname',$lastname);
             $stmt->bindParam(':email',$email);
             $stmt->bindParam(':password',$password);
             $stmt->execute();
             return true;
         }
else return false;

    }
}