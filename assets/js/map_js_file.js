let map = null, infoWindow = null;
function addYourLocationButton(mapArg, marker)
{
    var controlDiv = document.createElement('div');

    var firstChild = document.createElement('button');
    firstChild.style.backgroundColor = '#fff';
    firstChild.style.border = 'none';
    firstChild.style.outline = 'none';
    firstChild.style.width = '40px';
    firstChild.style.height = '40px';
    firstChild.style.borderRadius = '2px';
    firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
    firstChild.style.cursor = 'pointer';
    firstChild.style.marginRight = '10px';
    firstChild.style.padding = '0px';
    firstChild.title = 'Your Location';
    controlDiv.appendChild(firstChild);

    var secondChild = document.createElement('div');
    secondChild.style.margin = '10px';
    secondChild.style.width = '18px';
    secondChild.style.height = '18px';
    secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
    secondChild.style.backgroundSize = '180px 18px';
    secondChild.style.backgroundPosition = '0px 0px';
    secondChild.style.backgroundRepeat = 'no-repeat';
    secondChild.id = 'you_location_img';
    firstChild.appendChild(secondChild);

    google.maps.event.addListener(mapArg, 'dragend', function () {
        $('#you_location_img').css('background-position', '0px 0px');
    });

    firstChild.addEventListener('click', function () {
        var imgX = '0';
        var animationInterval = setInterval(function () {
            if (imgX == '-18')
                imgX = '0';
            else
                imgX = '-18';
            $('#you_location_img').css('background-position', imgX + 'px 0px');
        }, 500);
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                marker.setPosition(latlng);
                mapArg.setCenter(latlng);
                clearInterval(animationInterval);
                $('#map' + map_num).val(position.coords.latitude + ',' + position.coords.longitude);
                infoWindow.close();
                $('#you_location_img').css('background-position', '-144px 0px');
            });
        } else {
            clearInterval(animationInterval);
            $('#you_location_img').css('background-position', '0px 0px');
        }
    });

    controlDiv.index = 1;
    mapArg.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
}
function initMap() {
    if (navigator.geolocation) {
        var options = {timeout: 60000};
        navigator.geolocation.getCurrentPosition
                (getLocation, errorHandler, options);
    } else {
        alert("Geolocation is not supported by this browser.");
    }

} // close function here

function errorHandler(err) {
    if (err.code == 1) {
        alert("Error: Access is denied!");
    } else if (err.code == 2) {
        alert("Error: Position is unavailable!");
    }
}

function getLocation(position)
{
    var myLatlng = {lat: position.coords.latitude, lng: position.coords.longitude};
    var url = window.location.href;
    if (url.indexOf("edit") !== -1) {
        //alert($('#map2').val());
        
        if ($('#map' + map_num).val()) {
            var latlag = $('#map' + map_num).val().split(',');
             myLatlng = new google.maps.LatLng(parseFloat(latlag[0]), parseFloat(latlag[1]));
        }
        
       
    }

    const map = new google.maps.Map(document.getElementById('map'), {
        center: myLatlng, //{ lat: position.coords.latitude, lng:position.coords.longitude },
        zoom: 15.5,
         mapTypeId: "roadmap"
    });
    const marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        //title:$('#map' + map_num).val()
    });

    map.setCenter(myLatlng);
    // To add the marker to the map, call setMap();
    //marker.setMap(map);

    addYourLocationButton(map, marker);
    // Create the initial InfoWindow.
    infoWindow = new google.maps.InfoWindow({
        //content: "Click the map to get Lat/Lng!",
        //position: myLatlng,
    });
    infoWindow.open(map);
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });
        infoWindow.setContent(
                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                );
        //alert(map_num+mapsMouseEvent.latLng.toJSON().lat + ',' + mapsMouseEvent.latLng.toJSON().lng)
        $('#map' + map_num).val(mapsMouseEvent.latLng.toJSON().lat + ',' + mapsMouseEvent.latLng.toJSON().lng);
        infoWindow.open(map);
        //$('.close').trigger('click');
    });


}