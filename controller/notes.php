<?php

class Notes {
  public function __construct() {
    require_once './model/NotesModel.php';
  }
  /* Get notes */
  public function index() {
    $execute = new NotesModel;
    $dates = $execute -> getAllNotes();
    $error = null;
    if (empty($dates)) {
      $error = "No notes available";
    }
    require_once './view/index.php';
  }
  /* Create notes */
  public function createNote() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $noteTitle = htmlspecialchars($_POST['inputTitle']);
      $noteContent = htmlspecialchars($_POST['inputContent']);
      $error = null;
      if (empty($noteTitle) || empty($noteContent)) {
        $error = "Do not leave empty spaces";
      } else {
        $execute = new NotesModel;
        $execute -> createNewNote($noteTitle, $noteContent);
        header('Location: index.php');
      }
    }
    require_once './view/create.php';
  }
  public function editNote() {
    $id = $_GET['id'];
    if(empty($id)) {
      header('Location: index.php');
    }
    $execute = new NotesModel;
    $note = $execute -> getNote($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $noteTitle = htmlspecialchars($_POST['inputTitle']);
      $noteContent = htmlspecialchars($_POST['inputContent']);
      $error = null;
      if (empty($noteTitle) || empty($noteContent)) {
        $error = "Do not leave empty spaces";
      } else {
        $execute -> updateNote($id, $noteTitle, $noteContent);
      }
    }
    require_once './view/edit.php';
  }
  public function deleteNote() {
    $id = $_GET['id'];
    $execute = new NotesModel;
    $execute -> deleteNote($id);
    header('Location: index.php');
  }
}