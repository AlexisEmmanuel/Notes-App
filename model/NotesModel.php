<?php
class NotesModel{
  private $db; 
  private $notes; 
  public function __construct() {
    $this->db = Connection::database();
    /* $this->notes = array(); */
  }
  public function getAllNotes() {
    $stmtp = $this->db -> prepare("SELECT * FROM `notes`");
    $stmtp -> execute();
    $this->notes = $stmtp->fetchAll();
    
    return $this->notes;
  }
}