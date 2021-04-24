<?php
class User
{
    /**
     * Define static variable
     */
    private $user_id;
    private $username;
    private $user_email;
    private $password;
    private $permission_id;
    private $permission_name;
    private $errors;

    /**
     * Constructor
     */
    public function __construct($username = "", $user_email = "", $password = "", $permission_id = "", $permission_name = "", $user_id = 0)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->user_email = $user_email;
        $this->password = $password;
        $this->permission_id = $permission_id;
        $this->permission_name = $permission_name;
        $this->errors = array();
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPermissionId()
    {
        return $this->permission_id;
    }

    /**
     * @return mixed
     */
    public function getPermissionName()
    {
        return $this->permission_name;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    function login($email, $password)
    {
        if (empty($email) || empty($password)) {
            $this->errors[] = "Minden mező kitöltése kötelező!";
            return false;
        }

        include_once "../database/db.php";
        $db = db::get();

        $selectString = "SELECT * FROM USERS WHERE USER_EMAIL=".$db->escape($email);
        $row = $db->getRow($selectString);
        if ($row != 0) {
            $passhash = password_verify($password, $row['PASSWORD']);
            if ($passhash == false) {
                $this->errors[] = "Email/jelszó hibás!";
                return false;
            } elseif ($passhash === true) {
                //$user = new User($row["USERNAME"], $row["USER_EMAIL"], $row["PASSWORD"], $row["PERMISSION_ID"], $row["PERMISSION_NAME"], $row["USER_ID"]);
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION["USER"] = $row;
                return true;
            }
        } else {
            $this->errors[] = "Email/jelszó hibás!";
            return false;
        }
        return false;
    }

    function register($username, $user_email,$password,$permission_id,$permission_name)
    {
        if (
            empty($username) ||
            empty($user_email) ||
            empty($password) ||
            empty($permission_id) ||
            empty($permission_name)
        ) {
            $this->errors[] = "Minden mező kitöltése kötelező!";
            return false;
        } else {
            if(User::user_exist($username, $user_email)){
                $this->errors[] = "Ezzel az e-mail cím vagy felhasználónév foglalt!";
                return false;
            }else{
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                include_once "../database/db.php";
                $db = db::get();
                $queryString =
                    "INSERT INTO 
                            USERS(USER_ID, USERNAME, USER_EMAIL, PASSWORD, PERMISSION_ID, PERMISSION_NAME) 
                        VALUES 
                            (SEQ_USERS.NEXTVAL,".$db->escape($username).",".$db->escape($user_email).",".$db->escape($hashPassword).",".$db->escape($permission_id).",".$db->escape($permission_name).")";
                $db->executeQuery($queryString);
                return true;
            }
        }
    }

    static function logout(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION["USER"]);
    }

    static function user_exist($username, $email){
        include_once "../database/db.php";
        $db = db::get();

        $selectString = "SELECT * FROM USERS WHERE USER_EMAIL=".$db->escape($email)." OR USERNAME=".$db->escape($username);
        $row = $db->getRow($selectString);
        if(empty($row)){
            return false;
        }else{
            return true;
        }
    }
}