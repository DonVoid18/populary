// ELEMENTOS DEL DOM $
let $video = document.getElementById("video"),
	$canvas = document.getElementById("canvas"),
	$button_capture = document.getElementById("button_capture"),
	$status_fetch = document.getElementById("status_fetchApi"),
	$preloader = document.getElementById("L9");

// FUNCIONES
function supportUserMedia() {
	// para saber si el navegador del usuario tiene soporte de video
	let conditionSupportBrowser = !!(navigator.getUserMedia || (navigator.mozGetUserMedia || navigator.mediaDevices.getUserMedia) || navigator.webkitGetUserMedia || navigator.msGetUserMedia);
	(conditionSupportBrowser) ? goodSupport(): notgoodSupport();	
}
function goodSupport(){
	console.log("This browser has support");
	navigator.mediaDevices.getUserMedia({
		audio: false,
		video: true
	})
	.then(
		(stream)=>{
			console.log("La promesa sido resuelta");
			$video.srcObject = stream;

			// agregamos el evento
			$button_capture.addEventListener("click", drawCanvas);
		}
	)
	.catch((error)=>{
		console.log(error);
	});
}
function notgoodSupport(){	
	alert("this browser does not have support");
}
function drawCanvas(){
	$preloader.classList.add("active");

	let ctx = $canvas.getContext("2d");
	$canvas.width = $video.videoWidth;
	$canvas.height = $video.videoHeight;
	ctx.drawImage($video, 0, 0, $canvas.width, $canvas.height);

	// enviamos la imagen en base64
	sendDataServer();
}
function sendDataServer(){
	let foto = $canvas.toDataURL(); //Esta es la foto, en base 64
	$status_fetch.innerHTML = "Enviando foto. Por favor, espera...";
	fetch("save_images/save_images.php",{
		method: "post",
		body:encodeURIComponent(foto) 
	})
	.then(response => {
		if(response.ok){
			return response.text();
		}else{
			throw "Error en conexión de llamada.";
		}
	})
	.then(data => {
		console.log("url_image: "+data);
		$status_fetch.innerHTML = "Fotografía Subida.";
	})
	.catch((error)=>{
		console.log(error);
	})
	.finally(()=>{
		$preloader.classList.remove("active");
	});
}

supportUserMedia();