<html>
<head>
</head>
<body>

<script src="https://www.gstatic.com/firebasejs/5.5.4/firebase.js"></script>
<script>

  var config = {
    apiKey: "AIzaSyAtMz-aYbBgztSHcqBajYPCuYgzpjfiCTE",
    authDomain: "stella-baad9.firebaseapp.com",
    databaseURL: "https://stella-baad9.firebaseio.com",
    projectId: "stella-baad9",
    storageBucket: "stella-baad9.appspot.com",
    messagingSenderId: "227591005760"
  };
  firebase.initializeApp(config);

  var database = firebase.database();
  let r = Math.random().toString(36).substring(7);
  let y = Math.random().toString(36).substring(7);

  function writeUserData(sender_id, receiver_id, messages) {
  firebase.database().ref('messages/wuqg1/'+ y + '/').set({
    sender_id: sender_id,
    receiver_id: receiver_id,
    messages : messages
  });
}

function loadMessages() {
  var callback = function(snap) {
    var data = snap.val();
    alert(data.messages);
  };

  firebase.database().ref('messages/wuqg1/').limitToLast(12).on('child_added', callback);
  firebase.database().ref('messages/wuqg1/').limitToLast(12).on('child_changed', callback);
}

 writeUserData(1, "MAMA MO", "GG BEA HAHAHAHA");

loadMessages();

</script>
</body>
</html>

<html>
<head>
</head>
<body>