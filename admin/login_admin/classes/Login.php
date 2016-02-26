<?php
@header('Content-Type: text/html; charset=UTF-8');
/**
* Class login
* handles the user's login and logout process
*/
class Login
{
  /**
  * @var object The database connection
  */
  private $db_connection = null;
  /**
  * @var array Collection of error messages
  */
  public $errors = array();
  /**
  * @var array Collection of success / neutral messages
  */
  public $messages = array();

  /**
  * the function "__construct()" automatically starts whenever an object of this class is created,
  * you know, when you do "$login = new Login();"
  */
  public function __construct()
  {
    // create/read session, absolutely necessary
    session_start();

    // check the possible login actions:
    // if user tried to log out (happen when user clicks logout button)
    if (isset($_GET["logout"])) {
      $this->doLogout();
    }
    // login via post data (if user just submitted a login form)
    elseif (isset($_POST["login"])) {
      $this->dologinWithPostData();
    }
  }

  /**
  * log in with post data
  */
  private function dologinWithPostData()
  {
    // check login form contents
    if (empty($_POST['usuario'])) {
      $this->errors[] = "Username field was empty.";
    } elseif (empty($_POST['senha'])) {
      $this->errors[] = "Password field was empty.";
    } elseif (!empty($_POST['usuario']) && !empty($_POST['senha'])) {

      // create a database connection, using the constants from config/db.php (which we loaded in index.php)
      $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

      // change character set to utf8 and check it
      if (!$this->db_connection->set_charset("utf8")) {
        $this->errors[] = $this->db_connection->error;
      }

      // if no connection errors (= working database connection)
      if (!$this->db_connection->connect_errno) {

        // escape the POST stuff
        $usuario = $this->db_connection->real_escape_string($_POST['usuario']);
        $senha = $this->db_connection->real_escape_string($_POST['senha']);

        // database query, getting all the info of the selected user (allows login via email address in the
        // username field)
        $sql = "SELECT usuario, email, senha
        FROM th_administradores
        WHERE usuario = '" . $usuario . "' AND senha = '".$senha."' ;";
        $result_of_login_check = $this->db_connection->query($sql);

        // if this user exists
        if ($result_of_login_check->num_rows == 1) {

          $_SESSION['logado_admin'] = 1;

          // get result row (as an object)
          $result_row = $result_of_login_check->fetch_object();

          // using PHP 5.5's password_verify() function to check if the provided password fits
          // the hash of that user's password


          // write user data into PHP SESSION (a file on your server)
          $_SESSION['usuario'] = $result_row->usuario;
          $_SESSION['email'] = $result_row->email;
          $_SESSION['logado_admin'] = 1;

        }else{
          echo "<script charset=\"utf-8\">alert('Usuário ou senha inválida');</script>";
        }


      }
    }
  }

    /**
    * perform the logout
    */
    public function doLogout()
    {
      // delete the session of the user
      $_SESSION = array();
      session_destroy();
      // return a little feeedback message
      $this->messages[] = "You have been logged out.";

    }

    /**
    * simply return the current state of the user's login
    * @return boolean user's login status
    */
    public function isUserLoggedIn()
    {
      if (isset($_SESSION['logado_admin']) AND $_SESSION['logado_admin'] == 1) {
        return true;
      }
      // default return
      return false;
    }
  }
