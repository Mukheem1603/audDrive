<!DOCTYPE html>
<html>
<head>
	<title>audDrive</title>
<link rel="icon" href="audiowave.png">
<!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
<style type="text/css">
	@import 'https://fonts.googleapis.com/css?family=Lato';
	* {
	outline: none;
}

body {
	
	font-family: 'Lato';
}

/*👇 for preload play/pause svg 😎*/
body:after {
	position: absolute;
	width: 0;
	height: 0;
	overflow: hidden;
	z-index: -1;
	content: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/163884/play.svg)
		url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/163884/pause.svg);
}
/*.cont{
	margin-bottom: 28px;
}

.cont h3{
	font-family: 'Lato';
	font-size: 50px;
	margin: 0 0 10px 0;
	color: #ccc;
}

.cont time{
	font-family: 'Lato';
	font-size: 12px;
	color: #999;
	
}
	.mejs-container {
	background: #000;
	font-family: Helvetica, Arial;
	text-align: left;
	vertical-align: top;
	text-indent: 0;
	width: 100% !important;
	height: 50px !important;
	border-radius: 5px;
}

.mejs-container .mejs-controls {
	height: 100%;
	background: transparent;
	display: flex;
}

.mejs-controls .mejs-time-rail span,
.mejs-controls .mejs-time-rail a {
	display: block;
	width: 180px;
	height: 100%;
	border-radius: 0px;
	cursor: pointer;
}

.mejs-controls div.mejs-time-rail {
	padding-top: initial;
	height: 100%;
}

.mejs-controls .mejs-time-rail .mejs-time-total {
	margin: 0
}

.mejs-container .mejs-controls .mejs-time {
	color: #fff;
	display: block;
	height: 27px;
	width: auto;
	padding: 0;
	line-height: 25px;
	overflow: hidden;
	text-align: center;
	-moz-box-sizing: content-box;
	-webkit-box-sizing: content-box;
	box-sizing: content-box;
}

.mejs-container .mejs-controls .mejs-time {
	position: absolute;
	color: rgba(256, 256, 256, 0.3);
	right: 10px;
	bottom: 0;
	top: 0;
	margin: auto;
	font-family: 'Lato';
	font-size: 32px;
	pointer-events: none;
}

.mejs-controls .mejs-time-rail .mejs-time-float-corner {
	display: none;
}

.mejs-controls .mejs-time-rail .mejs-time-float {
	position: absolute;
	background: #000;
	width: 46px;
	height: 20px;
	border: none;
	top: -25px;
	margin-left: -18px;
	text-align: center;
	color: #fff;
	border-radius: 3px;
}

.mejs-controls .mejs-time-rail .mejs-time-float-current {
	margin: 0;
	margin-top: 4px;
	width: 100%;
	display: block;
	text-align: center;
	left: 0;
}

.mejs-container .mejs-controls div {
	height: 100%;
	width: 50px;
	position: relative;
}

.mejs-controls .mejs-button button {
	margin: 0;
	padding: 0;
	position: relative;
	height: 100%;
	width: 100%;
	border: 0 !important;
	background: transparent;
	outline: none;
}

.mejs-controls .mejs-play:after {
	position: absolute;
	content: "";
	background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/163884/play.svg) no-repeat;
	width: 17px;
	height: 22px;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	margin: auto;
	transition: all 100ms linear;
	pointer-events: none;
}

.mejs-controls .mejs-pause:after {
	position: absolute;
	content: "";
	background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/163884/pause.svg) no-repeat;
	width: 13px;
	height: 22px;
	top: 0;
	left: 0;
	bottom: 0;
	right: 0;
	margin: auto;
	transition: all 100ms linear;
	pointer-events: none;
}

.mejs-controls .mejs-time-rail .mejs-time-total {
	background: #292929;
}

.mejs-controls .mejs-time-rail .mejs-time-loaded {
	background: #3c3838;
	background-image: -webkit-gradient(linear, 0 0, 100% 100%, color-stop(.25, rgba(255, 255, 255, .2)), color-stop(.25, transparent), color-stop(.5, transparent), color-stop(.5, rgba(255, 255, 255, .2)), color-stop(.75, rgba(255, 255, 255, .2)), color-stop(.75, transparent), to(transparent));
	background-image: -moz-linear-gradient( -45deg, rgba(255, 255, 255, .2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .2) 50%, rgba(255, 255, 255, .2) 75%, transparent 75%, transparent);
	background-size: 50px 50px;
	animation: move 3s linear infinite;
	opacity: 0.1;
}

.mejs-controls .mejs-time-rail .mejs-time-current {
	background: linear-gradient(to right, #03A9F4, #ff00ff);
}

.mejs-controls .mejs-button button:focus {
	outline: none;
}*/

@-webkit-keyframes move {
	0% {
		background-position: 0 0;
	}
	100% {
		background-position: 50px 50px;
	}
}
</style>
</head>
<body>

	<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.12.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>

<script>
	
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDBK6kekknT9fx1t2FugQOnrOqqGrawrdk",
    authDomain: "webplayer-93ba5.firebaseapp.com",
    databaseURL: "https://webplayer-93ba5.firebaseio.com",
    projectId: "webplayer-93ba5",
    storageBucket: "webplayer-93ba5.appspot.com",
    messagingSenderId: "940303196994",
    appId: "1:940303196994:web:7292c36109dfb74e2f1edb",
    measurementId: "G-KQ4JYW2ELZ"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
var name=prompt("name:");
</script>
	<form>
		<h3>UPLOAD YOUR SONG</h3>
		<input type="file" id="audio" accept="audio/*"><br><br>
		<button type="button" onclick="upload()">Upload</button>
	</form>
	<br><br>
	<p style="display: none;" id="prog">PROGRESS BAR: <progress value="0" max="100" id="myProgress"></progress>
</p><br>
<!-- <p id="para" style="display: none;">
	<a id="URL" href=downloadURL target="_blank"><button>PLAY</button></a>
</p> -->
<p id="List">
	List of your songs:
	<br>
</p>

</body>
<script src="upload.js" type="text/javascript"></script>
<script src="listing.js" type="text/javascript"></script>
</html>

<!-- <div class="fileinputs">
  <input type="file" id="audio" accept="audio/*" class="file" />
  <div class="fakefile">
    <input />
    <img src="https://s3.us-east-2.amazonaws.com/upload-icon/uploads/icons/png/12413807531579155689-256.png" />
  </div>
</div> -->
<!-- https://s3.us-east-2.amazonaws.com/upload-icon/uploads/icons/png/12413807531579155689-256.png -->