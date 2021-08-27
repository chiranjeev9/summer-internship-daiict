<!DOCTYPE html>
<html>
<head>
<title>India's map</title>
<style>
#map {
    width: 1090px;
    height: 600px;
    border: ;
    border-color: blue;
}
</style>
</head>
<body>
    <div id="map"></div>
    <script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 25.30, lng: 80.30},
            zoom: 4
        });
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
</body>
</html>