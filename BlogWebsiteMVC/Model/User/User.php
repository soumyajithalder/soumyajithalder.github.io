<?php

namespace User;

use Dbc\Dbc;

/**
 * Provides User model to signup and login users.
 */
class User extends Dbc {

  /**
   * Function handles signing up users.
   *
   * @param string $name
   *   Stores fullname of users.
   * @param string $username
   *   Stores username of users.
   * @param string $password
   *   Stores password for users.
   *
   * @return bool
   *   Returns false if no of $row is 0.
   */
  public function signup_user($name, $username, $password) {
    $username = $username;
    $password = $password;

    $sql = "SELECT * FROM users WHERE uname ='".$username."'";

    $check = $this->db->query($sql);
    $row = $check->num_rows;

    if ($row == 0) {
      $sql1 = "INSERT INTO users (uname,password,fullname) VALUES ('".$username."','".$password."','".$name."')";
      $result = mysqli_query($this->db, $sql1);
      return $result;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Function handles logging in users and checks wrong username.
   *
   * @param string $username
   *   Stores username of users.
   * @param string $password
   *   Stores password for users.
   */
  public function login_check($username, $password) {
    $username = $username;
    $password = $password;
    $sql2 = "SELECT uid from users WHERE uname='".$username."' and password='".$password."'";
    $result = mysqli_query($this->db, $sql2);
    $data = mysqli_fetch_array($result);
    $row = $result->num_rows;

    if ($row == 1) {
      $_SESSION['login'] = TRUE;
      $_SESSION['uid'] = $data['uid'];
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Function handles getting session info.
   *
   * @return _SESSION[login]
   *   Return login info in $_SESSION
   */
  public function get_session() {
    return $_SESSION['login'];
  }

  /**
   * Function handles logout of user and destroys session after loggin out.
   */
  public function logout() {
    $_SESSION['login'] = FALSE;
    session_destroy();
  }

}
?>
