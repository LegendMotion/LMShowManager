<!-- Dark mode -->
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script>
  function addDarkmodeWidget() {
    new Darkmode().showWidget();
  }
  window.addEventListener('load', addDarkmodeWidget);

  const options = {
  bottom: '64px', // default: '32px'
  right: 'unset', // default: '32px'
  left: '32px', // default: 'unset'
  time: '0.5s', // default: '0.3s'
  mixColor: '#fff', // default: '#fff'
  backgroundColor: '#EEEEEE',  // default: '#fff'
  buttonColorDark: '#100f2c',  // default: '#100f2c'
  buttonColorLight: '#fff', // default: '#fff'
  saveInCookies: false, // default: true,
  label: '🌓', // default: ''
  autoMatchOsTheme: true // default: true
}
</script>

<!-- Dark mode CSS -->

<style type="text/css">
  .darkmode--activated a {
  color: white;
}

  .darkmode--activated td {
  color: white;
}

  .darkmode--activated a:hover {
  color: #04fbfb;
}


  .darkmode--activated .card {
  background-color: #282828;
  color: white;
}

  .darkmode--activated .modal-header {
  background-color: #181818;
  color: white;
}

  .darkmode--activated .form-label {
  color: white;
}

  .darkmode--activated .modal-body {
  background-color: #282828;
  color: white;
}

  .darkmode--activated .modal-footer {
  background-color: #181818;
  color: white;
}

  .darkmode--activated .btn-dark {
  background-color: white;
  color: black;
}



</style>