<?php

require_once './config/routes.php';
require_once './config/db.php';
require_once './controller/notes.php';

$controller = new Notes;
$controller -> getNotes();