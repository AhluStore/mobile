<?php
AhluDBClose();
//reconnect and change database
function registerDBMe(){

  $_file_config = json_decode(file_get_contents(current_app_request_admin()."/db.json"),true);
  $_config = array();
  $_config["host"]="localhost";
  $_config["username"]="root";
  $_config["password"]="";
  $_config["database"]="pgd";
  $_config["prefix"]="me_";

   $_config= array_merge( $_config,$_file_config);
  return $_config;
}
registerDB("registerDBMe");

$role = ROLE?ROLE:"guest";
include_once "gateway_{$role}.php";
?>