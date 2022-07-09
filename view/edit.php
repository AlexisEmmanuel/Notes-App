<?php require_once './controller/notes.php'; ?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Edit Note</title>
</head>

<body>
  <div class="container">
    <h1 class="text-center mt-5">EDIT NEW NOTE</h1>
    <form method="POST">
      <?php foreach ($note as $date) { ?>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Edit Note</label>
          <input    name="inputTitle" type="text" class="form-control" 
          id="formGroupExampleInput" placeholder="Note title" 
          value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { echo $noteTitle; } else {echo $date['title_note'];} ?>">
        </div>
        <div class="form-floating mb-3">
          <textarea  name="inputContent" class="form-control" 
          placeholder="Leave a comment here" id="floatingTextarea2" 
          style="height: 100px"><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { echo $noteContent; } else {echo $date['content_note'];} ?></textarea>
          <label for="floatingTextarea2">Note content</label>
        </div>
      <?php } ?>
      <button type="submit" class="btn btn-primary">Edit Note</button>
      <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $error != null) { ?>
        <div class="alert alert-danger mt-5" role="alert">
          <?php echo $error; ?>
        </div>
      <?php } ?>
    </form>
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