<?php

if(isset($_POST['submit'])){
  $user = $_POST['Username'];
  $pass = $_POSET['Password'];

  if($user == "zacky" && $pass == 123){
  echo "Login Sukses";
  } else {
  echo "Login Gagal";
  }
}

?>