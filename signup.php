<?php require_once("initdb.php");
 require_once("modules/mac.php");
if (isset($_SESSION['type']))
 {
  header("Location:$_SESSION[page]");
  _exit();
}
if (isset($_POST["signup"])) {
  if ($_POST["type"] == "mn") 
  {
    if (TRUE === $mysqli->query("INSERT INTO `users` VALUES ('$_POST[ecode]', '$_POST[uname]', '$_POST[pass]', 0, '$_POST[roll]','$mac','1111-11-11 11:11:11','1111-11-11 11:11:11')"))
    {
      if (TRUE === $mysqli->query("INSERT INTO `events`(`code`, `name`, `cat_id`) VALUES ('$_POST[ecode]', '".str_replace("'","&#39;",$_POST['ename'])."', '$_POST[category]')")) 
      {
        $msg = "Manager signup was successful!";
        $s = 1;
      } else
      $mysqli->query("DELETE FROM users WHERE username='$_POST[uname]'");
    }
  } else if ($_POST["type"] == "mk") 
  {
    if (TRUE === $mysqli->query("INSERT INTO users values ('-mk', '$_POST[uname]', '$_POST[pass]', 0, '$_POST[roll]','$mac','1111-11-11 11:11:11','1111-11-11 11:11:11')")) 
    {
      $s = 1;
      $msg = "Marketing Manager signup was successful!";

    }
  } else if ($_POST["type"] == "nu") 
  {
    if (TRUE === $mysqli->query("INSERT INTO users values ('-nu', '$_POST[uname]', '$_POST[pass]', 9, '$_POST[roll]','$mac','1111-11-11 11:11:11','1111-11-11 11:11:11')")) 
    {
      $s = 1;
      $msg = "User signup was successful!";

    }
  } else  if ($_POST["type"] == "pr") 
  {
    if (TRUE === $mysqli->query("INSERT INTO users values ('-pr', '$_POST[uname]', '$_POST[pass]', 0, '$_POST[roll]','$mac','1111-11-11 11:11:11','1111-11-11 11:11:11')")) 
    {
      $msg = "Proofreader signup was successful";
      $s = 1;
    }
  }
  if ($s=1)
    $msg .= "Please wait till an administrator validates your account";
  else
    $msg = "Signup failed";
}
?>