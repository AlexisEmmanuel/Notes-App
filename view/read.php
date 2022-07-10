<?php require_once './controller/notes.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <?php require_once './templates/head.php'; ?>
  <title>Notes App</title>
</head>

<body>
  <?php foreach ($note as $data) { ?>
    <section class="container">
      <header class="mt-3 d-flex">
        <h2 class="text-left"><?php echo $data['title_note'] ?></h2>
        <a href="?v=editNote&id=<?php echo $data['id_note']; ?>" class="pl-5">Edit card</a>
        <a href="?v=deleteNote&id=<?php echo $data['id_note']; ?>" type="button" class="pl-5">Delete</a>
      </header>
      <p class="text-left"><?php echo $data['content_note'] ?></p>
    <?php } ?>
    </section>
    <?php require_once './templates/body.php'; ?>
</body>

</html>