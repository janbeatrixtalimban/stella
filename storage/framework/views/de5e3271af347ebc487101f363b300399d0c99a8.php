<html>
<head>
  <style>
    /**
 * Copyright 2015 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

 html, body {
  font-family: 'Roboto', 'Helvetica', sans-serif;
}
main, #messages-card {
  height: 100%;
  padding-bottom: 0;
}
#messages-card-container {
  height: calc(100% - 35px);
  padding-bottom: 0;
}
#messages-card {
  margin-top: 15px;
}
.mdl-layout__header-row span {
  margin-left: 15px;
  margin-top: 17px;
}
.mdl-grid {
  max-width: 1024px;
  margin: auto;
}
.material-icons {
  font-size: 36px;
  top: 8px;
  position: relative;
}
.mdl-layout__header-row {
  padding: 0;
  margin: 0 auto;
}
.mdl-card__supporting-text {
  width: auto;
  height: 100%;
  padding-top: 0;
  padding-bottom: 0;
}
#messages {
  overflow-y: auto;
  margin-bottom: 10px;
  height: calc(100% - 80px);
  display: flex;
  flex-direction: column;
}
#message-filler {
  flex-grow: 1;
}
.message-container:first-of-type {
  border-top-width: 0;
}
.message-container {
  display: block;
  margin-top: 10px;
  border-top: 1px solid #f3f3f3;
  padding-top: 10px;
  opacity: 0;
  transition: opacity 1s ease-in-out;
}
.message-container.visible {
  opacity: 1;
}
.message-container .pic {
  background-image: url('/images/profile_placeholder.png');
  background-repeat: no-repeat;
  width: 30px;
  height: 30px;
  background-size: 30px;
  border-radius: 20px;
}
.message-container .spacing {
  display: table-cell;
  vertical-align: top;
}
.message-container .message {
  display: table-cell;
  width: calc(100% - 40px);
  padding: 5px 0 5px 10px;
}
.message-container .name {
  display: inline-block;
  width: 100%;
  padding-left: 40px;
  color: #bbb;
  font-style: italic;
  font-size: 12px;
  box-sizing: border-box;
}
#message-form {
  display: flex;
  flex-direction: row;
  width: calc(100% - 48px);
  float: left;
}
#image-form {
  display: flex;
  flex-direction: row;
  width: 48px;
  float: right;
}
#message-form .mdl-textfield {
  width: calc(100% - 100px);
}
#message-form button, #image-form button {
  width: 100px;
  margin: 15px 0 0 10px;
}
.mdl-card {
  min-height: 0;
}
.mdl-card {
  background: linear-gradient(white, #f9f9f9);
  justify-content: space-between;
}
#user-container {
  position: absolute;
  display: flex;
  flex-direction: row;
  top: 22px;
  width: 100%;
  right: 0;
  padding-left: 10px;
  justify-content: flex-end;
  padding-right: 10px;
}
#user-container #user-pic {
  top: -3px;
  position: relative;
  display: inline-block;
  background-image: url('/images/profile_placeholder.png');
  background-repeat: no-repeat;
  width: 40px;
  height: 40px;
  background-size: 40px;
  border-radius: 20px;
}
#user-container #user-name {
  font-size: 16px;
  line-height: 36px;
  padding-right: 10px;
  padding-left: 20px;
}
#image-form #submitImage {
  width: auto;
  padding: 0 6px 0 1px;
  min-width: 0;
}
#image-form #submitImage .material-icons {
  top: -1px;
}
.message img {
  max-width: 300px;
  max-height: 200px;
}
#mediaCapture {
  display: none;
}
@media  screen and (max-width: 610px) {
  header {
    height: 113px;
    padding-bottom: 80px !important;
  }
  #user-container {
    top: 72px;
    background-color: rgb(3,155,229);
    height: 38px;
    padding-top: 3px;
    padding-right: 2px;
  }
  #user-container #user-pic {
    top: 2px;
    width: 33px;
    height: 33px;
    background-size: 33px;
  }
}
.mdl-textfield__label:after {
  background-color: #0288D1;
}
.mdl-textfield--floating-label.is-focused .mdl-textfield__label {
  color: #0288D1;
}
.mdl-button .material-icons {
  top: -1px;
  margin-right: 5px;
}

    </style>
</head>
<body>
      <!-- Messages container -->
      <div id="messages-card" class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
          <div class="mdl-card__supporting-text mdl-color-text--grey-600">
            <div id="messages">
              <span id="message-filler"></span>
            </div>
            <form id="message-form" action="#">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="message">
                <label class="mdl-textfield__label" for="message">Message...</label>
              </div>
              <button id="submit" disabled type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                Send
              </button>
            </form>
            <form id="image-form" action="#">
              <input id="mediaCapture" type="file" accept="image/*" capture="camera">
              <button id="submitImage" title="Add an image" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--amber-400 mdl-color-text--white">
                <i class="material-icons">image</i>
              </button>
            </form>
          </div>
        </div>
  


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