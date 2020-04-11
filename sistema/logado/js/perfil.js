// PÁGINA PERFIL

//Clicar na imagem e abrir para trocar
jQuery(function($){
var fileDiv = document.getElementById("upload");
var fileInput = document.getElementById("upload-image");
console.log(fileInput);
fileInput.addEventListener("change",function(e){
    var files = this.files
    showThumbnail(files)
},false)

fileDiv.addEventListener("click",function(e){
    $(fileInput).show().focus().click().hide();          //função para exibir a imagem caso o usuário altere os dados
    e.preventDefault();
},false)

fileDiv.addEventListener("dragenter",function(e){
    e.stopPropagation();
    e.preventDefault();
},false);

fileDiv.addEventListener("dragover",function(e){
    e.stopPropagation();
    e.preventDefault();
},false);

fileDiv.addEventListener("drop",function(e){
    e.stopPropagation();
    e.preventDefault();

    var dt = e.dataTransfer;
    var files = dt.files;

    showThumbnail(files)
},false);

function showThumbnail(files) {
    loadImage(files[0]);
    counter = 0;
    function loadImage( file ) {
        var canvas = document.createElement("canvas"),
            img = new Image();
        
        img.onload = function() {
            var w = img.width/10 , h = img.height/10;
            canvas.width = w;
            canvas.height = h;
            var ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0, w, h);
            var sourceX = img.width * 0.30,
                sourceY = img.height * 0.30,
                sourceWidth = img.width * 0.40,
                sourceHeight = img.height * 0.40;
            ctx.drawImage(img, sourceX, sourceY, sourceWidth, sourceHeight, 0, 0, w, h);
            URL.revokeObjectURL( img.src );
            img = null;

            if (files.length > counter) {
                counter++;
                loadImage(files[counter]);
            }
        };

        var URL = window.URL || window.webkitURL;
        
        img.src = URL.createObjectURL( file );
        
        var thumbnail = document.getElementById("thumbnail");
        thumbnail.appendChild(canvas);

        document.getElementById('upload').style.display = 'none';
    }
}    
});

function mostrarSenha(){
    var tipo = document.getElementById("senha");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}