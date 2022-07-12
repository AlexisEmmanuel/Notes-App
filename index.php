<?php

require_once './config/routes.php';
require_once './config/db.php';
require_once './controller/notes.php';

$execute = new Notes;
if (isset($_GET['v'])) {
  $action = $_GET['v'];
  $execute -> $action();
} else {
  $execute -> getNotes();
}