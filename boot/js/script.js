$(function() {
 
$('#us2').locationpicker({
   location: {latitude: 11.75330, longitude: 79.78298},   
   radius: 0,
   inputBinding: {
      latitudeInput: $('#lat'),
      longitudeInput: $('#lng'),
      locationNameInput: $('#location')
   },
   enableAutocomplete: true,
   onchanged: function(currentLocation, radius, isMarkerDropped) {
      alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
    }
});
 
 
});
