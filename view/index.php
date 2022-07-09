<?php require_once './controller/notes.php'; ?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>