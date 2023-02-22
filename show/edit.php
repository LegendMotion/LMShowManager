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
            src="logo.png"/>
          <h2 class="mb-3">Show tittel</h2>
          <a href="show.php" class="btn btn-dark"><i class="fas fa-angle-left"></i> Tilbake</a>
          </div>
<p></p>

<!-- Settings -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Legg til/Redigere innslag</h5>

<form>
  
  <p><strong>Nummer:</strong></p>
  <input type="number" name="nummer" class="form-control">
<br>
<p><strong>Tittel:</strong></p>
  <input type="text" name="nummer" class="form-control">
<br>
<p><strong>Konferansier:</strong></p>
<small>Legg inn hva konferansierene skal si her.</small>
  <textarea name="content" id="editor"></textarea>
<br>
<p><strong>Teknisk info:</strong></p>
  <small>Dette feltet fylles normalt ut av de på teknsik. Her legges alt av teknisk informasjon knyttet til innslaget.</small>
  <textarea name="content" id="editor2"></textarea>
<br>
<p><strong>Musikk/Bilde/Film:</strong></p>
<small>Her legges det inn informasjon om det skal spilles av noe musikk, bilde eller film. Legg også inn om musikk skal stoppes på ett hvis punkt. Med mindre musikk leveres på minnepenn fyll ut YouTube link i eget felt.</small>
  <textarea name="content" id="editor3"></textarea>
<br>
<p><strong>Evt YouTube link:</strong></p>
  <input type="text" name="nummer" class="form-control">
<br>
</form>

<br>
<a href="save.php" type="button" class="btn btn-dark"><i class="fas fa-save"></i> Lagre</a>


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

        ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );

            ClassicEditor
        .create( document.querySelector( '#editor3' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


  </body>
</html>
