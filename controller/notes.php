<?php

class Notes {
  private $execute;
  public function __construct() {
    require_once './model/NotesModel.php';
    $this->execute = new NotesModel;
  }
  /* Get notes */
  public function getNotes() {
    $dates = $this->execute -> getAllNotes();
    $error = null;
    $limitOfChars = 140;
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
        $this->execute -> createNewNote($noteTitle, $noteContent);
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
    $note = $this->execute -> getNote($id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $noteTitle = htmlspecialchars($_POST['inputTitle']);
      $noteContent = htmlspecialchars($_POST['inputContent']);
      $error = null;
      if (empty($noteTitle) || empty($noteContent)) {
        $error = "Do not leave empty spaces";
      } else {
        $this->execute -> updateNote($id, $noteTitle, $noteContent);
      }
    }
    require_once './view/edit.php';
  }
  public function deleteNote() {
    $id = $_GET['id'];
    $this->execute -> deleteNote($id);
    header('Location: index.php');
  }
  public function readNote() {
    $id = $_GET['id'];
    if(empty($id)) {
      header('Location: index.php');
    }
    $note = $this->execute -> getNote($id);
    require_once './view/read.php';
  }
}