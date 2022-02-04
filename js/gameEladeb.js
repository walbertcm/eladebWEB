
//Cria o array de imagens
const imagensArray = new Array();

//calcula o tamanho do array
fimImagensArray = imagensArray.length;

function showImage(numImagem) {
    document.getElementById("images").src = "img/" + imgArray[numImagem];
}


function proximaImagem(enderecoImagem){
    if(x==fimImagensArray){
        
    }else{
        showImage(x);
        x=x+1;
    }
}