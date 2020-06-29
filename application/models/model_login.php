<?php
class Model_Login extends Model
{
  public function get_data()
	{

  }

  public function log_in()
	{
    $DB = new DB();
    $name = strip_tags($_REQUEST['name']);
    $pass = strip_tags($_REQUEST['password']);
    $sql = "SELECT * FROM users WHERE name = '$name' AND pass = '$pass'";
    $data = $DB->execute($sql);
    return $data;
  }
}
