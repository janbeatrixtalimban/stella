<html>
<head>
</head>
<body>

<script src="https://www.gstatic.com/firebasejs/5.5.4/firebase.js"></script>
<script>

// Initialize Firebase
var config = {
    apiKey: "AIzaSyD393WRQ08gODfVS9AQk66BGSvd5Rk4Bkw",
    authDomain: "stella-1cab5.firebaseapp.com",
    databaseURL: "https://stella-1cab5.firebaseio.com",
    projectId: "stella-1cab5",
    storageBucket: "stella-1cab5.appspot.com",
    messagingSenderId: "823233182115"
  };
  firebase.initializeApp(config);

  var database = firebase.database();
  let r = Math.random().toString(36).substring(7);
  let y = Math.random().toString(36).substring(7);

  function writeUserData(sender_id, receiver_id, messages) {
  firebase.database().ref('messages/5iagj/' + y + '/').set({
    sender_id: name,
    receiver_id: email,
    messages : messages
  });
}
var sortable = [];
var starCountRef = firebase.database().ref('/messages/5iagj/');
starCountRef.on('value', function(snapshot) {
    for (var vehicle in snapshot.val()) {
    sortable.push([vehicle, snapshot.val()[vehicle]]);
}
for(var hello in sortable)
{
    alert(sortable[hello][1].messages);
}
});
 writeUserData(1, "MAMA MO", "beatrixtalimban@gmail.com", "2ndsdull");
</script>
</body>
</html>