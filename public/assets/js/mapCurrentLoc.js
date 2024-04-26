

let map, infoWindow, directionsService, directionsRenderer, geocoder;

async function initMap() {
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
    "marker"
  );
  geocoder = new google.maps.Geocoder();

  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 7.55, lng: 80.41 },
    zoom: 5,
    restriction: {
      latLngBounds: {
        north: 10.5, 
        south: 5.0, 
        west: 78.5, 
        east: 83.5,
      },
      
      strictBounds: true,
    },
    mapId: "f3e3e3e3e3e3e3e3",
  });

  infoWindow = new google.maps.InfoWindow();

  directionsService = new google.maps.DirectionsService();
  directionsRenderer = new google.maps.DirectionsRenderer();
  directionsRenderer.setMap(map);
  const startValue = document.getElementById("start").value;
  const endValue = document.getElementById("end").value;

  calculateAndDisplayRoute(startValue, endValue);

  async function getPositionData(address) {
    try {
      const results = await new Promise((resolve, reject) => {
        geocoder.geocode({ address: address }, (results, status) => {
          if (status === "OK" && results && results.length > 0) {
            resolve(results);
          } else {
            reject(
              "Geocode was not successful for the following reason: " + status
            );
          }
        });
      });

      const { location } = results[0].geometry;
      return location;
    } catch (error) {
      throw error;
    }
  }

  async function CreateMarker(address, title) {
    try {
      const position = await getPositionData(address);
      console.log("Position data:", position.lat(), ",", position.lng());

      const markerViewWithText = new AdvancedMarkerElement({
        map,
        position: position,
        title: title,
      });
    } catch (error) {
      console.error(error);
    }
  }

  // main();

  function calculateAndDisplayRoute(origin, destination) {
    directionsService.route(
      {
        origin: origin,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING,
      },
      (response, status) => {
        if (status === "OK") {
          directionsRenderer.setDirections(response);
        } else {
          window.alert("Directions request failed due to " + status);
        }
      }
    );
  }

  const onChangeHandler = function () {
    const startValue = document.getElementById("start").value;
    const endValue = document.getElementById("end").value;
    CreateMarker(startValue, "Start");
    calculateAndDisplayRoute(startValue, endValue);
  };

  document.getElementById("start").addEventListener("change", onChangeHandler);
  document.getElementById("end").addEventListener("change", onChangeHandler);

  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
      browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
  }
}

window.initMap = initMap;
// initMap(); // Call initMap to initialize the map

// const current = document.getElementById("current");
// current.addEventListener("click", () => {
//  let test=getCurrentLocationAddress((address) => {
//     console.log(address);
//   });
//   });

// function getCurrentLocationAddress(callback) {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(
//             (position) => {
//                 const pos = {
//                     lat: position.coords.latitude,
//                     lng: position.coords.longitude,
//                 };

//                 // Reverse geocode the current location to get the address
//                 const geocoder = new google.maps.Geocoder();
//                 geocoder.geocode({ location: pos }, (results, status) => {
//                     if (status === "OK") {
//                         if (results[0]) {
//                             const address = results[0].formatted_address;
//                             infoWindow.setPosition(pos);
//                             infoWindow.setContent("Location: " + address);
//                             infoWindow.open(map);
//                             map.setCenter(pos);
//                             document.getElementById("start").value = address;
//                             callback(address);
//                             // console.log(address);

//                             return address;
//                         } else {
//                             // window.alert("No results found");
//                             return "No results found";
//                         }
//                     } else {
//                         // window.alert("Geocoder failed due to: " + status);
//                         return "Geocoder failed due to: " + status;
//                     }
//                 });
//             },
//             () => {
//                 handleLocationError(true, infoWindow, map.getCenter());
//             },
//         );
//     } else {
//         // Browser doesn't support Geolocation
//         handleLocationError(false, infoWindow, map.getCenter());
//     }
// }
