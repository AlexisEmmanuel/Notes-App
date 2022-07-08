<?php

class Notes {
  public function __construct() {
    require_once './model/NotesModel.php';
  }
  public function getNotes() {
    $db = new NotesModel;
    $dates = $db -> getAllNotes();

    require_once './view/index.view.php';
  }
}