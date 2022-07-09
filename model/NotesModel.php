<?php
class NotesModel{
  private $db; 
  private $notes; 
  private $note; 
  public function __construct() {
    $this->db = Connection::database();
  }
  public function getAllNotes() {
    $stmtp = $this->db -> prepare("SELECT * FROM `notes` ORDER BY id_note DESC");
    $stmtp -> execute();
    $this->notes = $stmtp->fetchAll();
    return $this->notes;
  }
  public function getNote($id) {
    $stmtp = $this->db->prepare("SELECT * FROM `notes` WHERE id_note = :id");
    $stmtp -> execute(array(':id' => $id));
    $this->note = $stmtp->fetchAll();
    return $this->note;
  }
  public function createNewNote($title, $content) {
    $stmtp = $this->db->prepare(
      "INSERT INTO `notes` (`id_note`, `title_note`, `content_note`) VALUES (NULL, '$title', '$content')"
    );
    $stmtp -> execute();
  }
  public function updateNote($id, $title, $content) {
    $stmtp = $this->db -> prepare("UPDATE `notes` SET `content_note` = :content , `title_note` = :title WHERE `notes`.`id_note` = :id");
    $stmtp -> execute(array(
      ':title' => $title,
      ':content' => $content,
      ':id' => $id
    ));
    header('Location: index.php');
  }
  public function deleteNote($id) {
    $stmtp = $this->db->prepare("DELETE FROM `notes` WHERE `notes`.`id_note` = :id");
    $stmtp -> execute(array(':id' => $id));
  }
}