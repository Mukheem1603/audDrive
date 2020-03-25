function upload(){
	// var name=prompt("name:");
	var audio=document.getElementById("audio").files[0];
	var audioName=audio.name;
    var storageRef=firebase.storage().ref(`${name}/${audioName}`);
 // var storageRef=firebase.storage().ref();
 // var audRef=storageRef.child(name);

//    var i=0;
//  var sl = firebase.storage().ref();
//  sl.child(`${name}/`).listAll().then(function(result){
// result.items.forEach(function(ar){
// // console.log(":"+ar.toString());
// i++;
// displayAudio(i,ar);
// });
//  });
   
 
    var uploadTask=storageRef.put(audio);
    document.getElementById("prog").style.display="block";
    uploadTask.on('state_changed',function (snapshot) {
        //observe state change events such as progress , pause ,resume
        //get task progress by including the number of bytes uploaded and total
        //number of bytes
        var progress=(snapshot.bytesTransferred/snapshot.totalBytes)*100;
        console.log("upload is " + progress +" done");
        document.getElementById("myProgress").value = progress;
    //       if(progress==100)
    // {
    // document.getElementById("para").style.display="block";	
    // }
    },function (error) {
        //handle error here
        console.log(error.message);
    },function () {
       //handle successful uploads on complete

        uploadTask.snapshot.ref.getDownloadURL().then(function (downloadURL) {
            //get your upload image url here...
            
            // document.getElementById("para").innerHTML="Dear "+name+" ,here is your song ' "+audioName+" ' :";
            myFunction(downloadURL,name,audioName);
         
            console.log(downloadURL);
        });
    });

    
}
function myFunction(downloadURL,name,audioName) {
	var i = document.createElement("H4");
	var songname = audioName.split(".",1);
	var t = document.createTextNode("Dear "+name+" ,here is your song ' "+songname+" ' you just uploaded:");
	i.appendChild(t);
	i.setAttribute("class","cont");
	document.body.appendChild(i);
  var a = document.createElement("AUDIO");
  a.setAttribute("class","audio");
  a.setAttribute("src",downloadURL);
  a.setAttribute("controls","controls");
  document.body.appendChild(a);
}

// function displayAudio(row,audios)
// {
// 	audios.getDownloadURL().then(function(url)
// 	{
//   var xy = document.createElement("AUDIO");
//   xy.setAttribute("src",url);
//   xy.setAttribute("controls","controls");
//     document.getElementById("List").appendChild(xy);

// 	});
// }
