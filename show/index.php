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
          <h2 class="mb-3">Alle show</h2>
          <p>Her finner du en liste over alle aktive show</p>
          <a href="edit-show.php" class="btn btn-dark"><i class="fas fa-plus"></i> Legg til</a>
          <br>
          <br>


 <!-- Show eksempel -->
<a href="show.php">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Tittel</h5>
    <p><strong>Start dato:</strong> 12.12.12</p>
    <p><strong>Start tid:</strong> 12:00</p>
    <strong>Beskrivelse:</strong><br>
    <p>Her finner du show beskrivelsen</p>
    <hr>
    <a href="#YOUTUBE LINK" class="btn-dark btn"><i class="fas fa-edit"></i> Rediger detaljer</a>
<br>
</div>
</div>
</a>
<br>
<!-- Show eksempel slutt -->

 <!-- Show eksempel -->
<a href="show.php">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Tittel</h5>
    <p><strong>Start dato:</strong> 12.12.12</p>
    <p><strong>Start tid:</strong> 12:00</p>
    <strong>Beskrivelse:</strong><br>
    <p>Her finner du show beskrivelsen</p>
    <hr>
    <a href="#YOUTUBE LINK" class="btn-dark btn"><i class="fas fa-edit"></i> Rediger detaljer</a>
<br>
</div>
</div>
</a>
<br>
<!-- Show eksempel slutt -->

 <!-- Show eksempel -->
<a href="show.php">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Tittel</h5>
    <p><strong>Start dato:</strong> 12.12.12</p>
    <p><strong>Start tid:</strong> 12:00</p>
    <strong>Beskrivelse:</strong><br>
    <p>Her finner du show beskrivelsen</p>
    <hr>
    <a href="#YOUTUBE LINK" class="btn-dark btn"><i class="fas fa-edit"></i> Rediger detaljer</a>
<br>
</div>
</div>
</a>
<br>
<!-- Show eksempel slutt -->

 

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
