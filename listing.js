 var i=0;
 var sl = firebase.storage().ref();
 sl.child(`${name}/`).listAll().then(function(result){
result.items.forEach(function(ar){
	 var str= ar.toString().split(`${name}/`).pop(-1);
console.log(ar.toString().split(`${name}/`).pop(-1));
i++;
var str1=str.toString();
displayAudio(ar,str1);
});
 });
function displayAudio(audios,name)
{
	audios.getDownloadURL().then(function(url)
	{
		var ol = document.createElement("OL");
		var lb = document.createElement("BR");
		var an = document.createTextNode(name);
  var xy = document.createElement("AUDIO");
  xy.setAttribute("src",url);
  xy.setAttribute("controls","controls");
  ol.appendChild(an);
  document.getElementById("List").appendChild(ol);
    document.getElementById("List").appendChild(xy);
      document.getElementById("List").appendChild(lb);
	});
}