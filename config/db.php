<?php

class Connection {
  public static function database() {
    try {
      $server = "mysql: server=".SERVER."; dbname=".DBNAME.";";
      $conn = new PDO($server, DBUSER, DBPASS);
      /* echo 'Ok'; */
      return $conn;
    } catch (PDOException $th) {
      echo 'Error: '.$th->getMessage();
    }
  }
}