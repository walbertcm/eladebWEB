
//Array para armazenar as imagens
var imgArray = new Array();
imgArray[0] = new Image();
imgArray[1] = new Image();
imgArray[2] = new Image();
imgArray[3] = new Image();
imgArray[4] = new Image();

imgArray[0].src="https://th.bing.com/th/id/OIP.np9ibYx3hWx9twhkbTb79AHaEo?pid=ImgDet&rs=1";
imgArray[1].src="https://th.bing.com/th/id/R.59c33de73c6a9271f77092b44e177b2d?rik=jaoNzzs%2bPGf5ZQ&riu=http%3a%2f%2fwww.iheartteacups.com%2fwp-content%2fuploads%2f2016%2f04%2fIMG_2198.jpg&ehk=9gV5SPGkaDFXdSHVQnGoz6rBW9%2bJpb6Vy%2bxM8kXsKPM%3d&risl=&pid=ImgRaw&r=0";
imgArray[2].src="https://th.bing.com/th/id/OIP.wQhC2mVslrM1mRdmuImVPgHaFb?pid=ImgDet&rs=1";
imgArray[3].src="https://th.bing.com/th/id/OIP.MTKGXMbTUHJq3vwHS0sRagHaIj?pid=ImgDet&rs=1";
imgArray[4].src="https://th.bing.com/th/id/R.42764021a563aaf14a3cb365604f2f71?rik=sl6UJrOlLiWAuQ&riu=http%3a%2f%2ffarm1.staticflickr.com%2f85%2f280159075_29691fdb78_z.jpg&ehk=TcoSnFFqBAkCOPcSzWw6oMaXpr1PMx69fEEvVTb1Vqs%3d&risl=&pid=ImgRaw&r=0";

var counterVal = 0;
var end = imgArray.length - 1;

//Funcao Criar nova Janela
function novaJanela(){
    var nj = window.open('avaliacaoB.html', '', 'width=800, height=600');
}

//Função exibir as imagens
function nextImage(){
    var x = 1;
    
    if (counterVal==end){
        alert("Fim do Teste");
    }else {
        x = x + counterVal++;
        updateDisplay(x);
        document.getElementById("images").src = imgArray[counterVal].src;
    
    }

}

//Atualizar o numero da imagem
function updateDisplay(val){
    document.getElementById("counter-label").innerHTML = val;
}

//Exibe/Oculta os botões
const targetDiv = document.getElementById("third");
const btn = document.getElementById("show");

function hideShow() {
    if (targetDiv.style.display !== "none") {
      targetDiv.style.display = "none";
    } else {
      targetDiv.style.display = "block";
    }
  };