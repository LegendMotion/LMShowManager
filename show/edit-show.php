<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>LegendMotion - Show System</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body style="background-color: #EEEEEE;">
    <?php include 'DarkMode.php';?>
    <!-- Start your project here-->
    <div class="container">
      <div class="row">
        <div class="text-left">
          <img
            class="mb-4" style="max-width: 100%;"
            src="logo.png"/><br>
          <a href="index.php" class="btn btn-dark"><i class="fas fa-angle-left"></i> Tilbake</a>
          </div>
<p></p>

<!-- Settings -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Legg til/Redigere show</h5>

<form>
  

<p><strong>Tittel:</strong></p>
  <input type="text" name="tittel" class="form-control">
<br>
<p><strong>Start dato:</strong></p>
  <input type="date" name="dato" class="form-control">
<br>
<p><strong>Start tid:</strong></p>
  <input type="time" name="tid" class="form-control">
<br>
<p><strong>Beskrivelse:</strong></p>
  <textarea name="beskrivelse" id="editor"></textarea>
<br>

</form>

<br>
<a href="save-show.php" type="button" class="btn btn-dark"><i class="fas fa-save"></i> Lagre</a>
<a href="delete-show.php" type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Slett show</a>


  </div>
</div>
<p></p>
<p></p>


        </div>
      </div>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <!-- CKEditor -->
    <script src="ckeditor/build/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

</script>


  </body>
</html>
