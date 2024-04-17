

<html>
  <head>
    <title>Geolocation</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script type="module" src="<?php echo URLROOT ?>/public/assets/js/mapCurrentLoc.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT ?>/public/assets/css/mapCurrentLoc.css" />

  </head>
  <body>
    <div id="map"></div>

    <div class="dir_container">
    <div>
<strong>Start: </strong>
<select id="start">
  <option value="Aluthgama,Srilanka">Aluthgama</option>
  <option value="Kirulapone, srilanka">Kirulapona</option>

</select>
<strong>End: </strong>
<select id="end" >
  <option value="matara, Srianka">Matara</option>
  <option value="Galle, Srilanka">Galle</option>

</select>

<button id="current">Get current address</button>
</div>
</div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLEAPI ?>&callback=initMap&v=weekly&libraries=advanced-markers"
      defer
    ></script>

  </body>
</html>