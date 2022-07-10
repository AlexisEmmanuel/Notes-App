<?php require_once './controller/notes.php'; ?>


<!doctype html>
<html lang="en">

<head>
  <?php require_once './templates/head.php'; ?>
  <title>Notes App</title>
</head>

<body>
  <div class="row w-100">
    <div class="col-3">
      <div class="container mt-5">
        <h2>Notes App</h2>
        <div class="mt-4">
          <a href="?v=createNote" class="btn btn-primary">Create Note</a>
        </div>
      </div>
    </div>
    <div class="col-9">
      <div class="container mt-5 col">
        <h2>Notes:</h2>
        <?php if (isset($error)) { ?>
          <h1 class="text-center">
            <?php echo $error; ?>
          </h1>
        <?php } ?>
        <div class="row row-cols-2">
          <?php foreach ($dates as $note) { ?>
            <div class="card">
              <div class="card-body pb-2">
                <h5 class="card-title"><?php echo $note['title_note']; ?></h5>
                <p class="card-text"><?php echo $note['content_note']; ?></p>
                <div class="">
                  <a href="?v=editNote&id=<?php echo $note['id_note']; ?>" class="btn btn-primary">Edit card</a>
                  <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete card</button>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete the note?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Do not delete</button>
          <a href="?v=deleteNote&id=<?php echo $note['id_note']; ?>" type="button" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
  <?php require_once './templates/body.php'; ?>
</body>

</html>