//Array para armazenar as imagens
var imgArray = new Array();
imgArray[0] = new Image();
imgArray[1] = new Image();
imgArray[2] = new Image();
imgArray[3] = new Image();
imgArray[4] = new Image();
imgArray[5] = new Image();
imgArray[6] = new Image();
imgArray[7] = new Image();
imgArray[8] = new Image();
imgArray[9] = new Image();
imgArray[10] = new Image();
imgArray[11] = new Image();
imgArray[12] = new Image();
imgArray[13] = new Image();
imgArray[14] = new Image();
imgArray[15] = new Image();
imgArray[16] = new Image();
imgArray[17] = new Image();
imgArray[18] = new Image();
imgArray[19] = new Image();

//Codigo para imagem da  web
//imgArray[0].src ="http://www.terra.com.br/img1.jpeg";

//Codigo para imagem do diretorio local
imgArray[0] = "img1.jpg";
imgArray[1] = "img2.jpg";
imgArray[2] = "img3.jpg";
imgArray[3] = "img4.jpg";
imgArray[4] = "img5.jpg";
imgArray[5] = "img6.jpg";
imgArray[6] = "img7.jpg";
imgArray[7] = "img8.jpg";
imgArray[8] = "img9.jpg";
imgArray[9] = "img10.jpg";
imgArray[10] = "img11.jpg";
imgArray[11] = "img12.jpg";
imgArray[12] = "img13.jpg";
imgArray[13] = "img14.jpg";
imgArray[14] = "img15.jpg";
imgArray[15] = "img16.jpg";
imgArray[16] = "img17.jpg";
imgArray[17] = "img18.jpg";
imgArray[18] = "img19.jpg";
imgArray[19] = "img20.jpg";

var counterVal = 0

var i = 0;

//Funções de uso geral
//Funcao criar nova janela com tamanho fixo
function novaJanela() {
    var nj = window.open('avaliacaoB.html', '', 'width=800, height=600');
}

//Função para exibir imagens
function showImage(j) {
    document.getElementById("images").src = "img/" + imgArray[j];
}

//Exibe o numero da imagem
function updateDisplay(val) {
    document.getElementById("counter-label").innerHTML = val;
}

function updateDisplayNecessidade(valB) {
    document.getElementById("counter-labelA").innerHTML = valB;
}

//Redirecionadores com alert
function fimPrimeiraEtapa() {
    alert("Fim da Etapa 01  ");
    window.location.href = 'avaliacaoCA.php';
}

function fimSegundaEtapa() {
    alert("Fim da Etapa 02  ");
    window.location.href = 'avaliacaoCB.html';
}

function fimTerceiraEtapa() {
    alert("Fim da Etapa 03  ");
    window.location.href = 'avaliacaoCC.php';
}

function fimqQuartaEtapa() {
    alert("Fim da Etapa 04  ");
}

//Variaveis
var endArray = imgArray.length; //Fim do array de imagens
var x = 0; // implementação do contador de nextImage()

//Função para contar o array das imagens
function nextImage() {
    if (x == endArray) {
        fimPrimeiraEtapa();
    } else {
        //document.getElementById("images").src = "img/"+ imgArray[counterVal];
        showImage(x);
        //counterVal++;
        x = x + 1;
        updateDisplay(x);
        //document.getElementById("images").src = imgArray[counterVal].src; --> show image web     
    }
}

////////////////////////////////////////////////////////////////////////////
//Fase01
//arquivo - avaliaçãoC.html

//Objeto 
let questoesProblemaObj = { nq: null, status: null, etapa: null };

//JSON
var jsonA;

function enviaServidorPhp(jsonY) {
    //Envia para o servidor PHP
    request = new XMLHttpRequest();
    request.open("POST", '../eladeb/controller/avaliacaoControllerCad.php');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("x=" + jsonY);
}

function questoesProblemaA() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoA = document.getElementById("botaoA").value;
    //Objeto
    questoesProblemaObj.nq = numeroQuestao;
    questoesProblemaObj.status = botaoA;
    questoesProblemaObj.etapa = 1;
    //Converte para JSON
    jsonA = JSON.stringify(questoesProblemaObj);
    //
    enviaServidorPhp(jsonA);
    console.log(jsonA);
    nextImage();
    return true;
}

function questoesProblemaB() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoB = document.getElementById("botaoB").value;
    //Objeto
    questoesProblemaObj.nq = numeroQuestao;
    questoesProblemaObj.status = botaoB;
    questoesProblemaObj.etapa = 1;
    //Converte para JSON
    jsonB = JSON.stringify(questoesProblemaObj);
    //
    enviaServidorPhp(jsonB);
    console.log(jsonB);
    nextImage();
    return true;
}

////////////////////////////////////////////////////////////////////////////
//Fase 02, arquivo --  avaliaçãoCA.html
//Avaliação dos problemas

//Objeto 
let subQuestoesProblemaObj = { nq: null, status: null, etapa: null };

function questoesProblemaC() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoC = document.getElementById("botaoC").value;
    //Objeto
    subQuestoesProblemaObj.nq = numeroQuestao;
    subQuestoesProblemaObj.status = botaoC;
    subQuestoesProblemaObj.etapa = 2;
    //Converte para JSON
    jsonC = JSON.stringify(subQuestoesProblemaObj);
    //
    enviaServidorPhp(jsonC);
    console.log(jsonC);
    reavaliacaoNextImage();
    return true;
}

function questoesProblemaD() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoD = document.getElementById("botaoD").value;
    //Objeto
    subQuestoesProblemaObj.nq = numeroQuestao;
    subQuestoesProblemaObj.status = botaoD;
    subQuestoesProblemaObj.etapa = 2;
    //Converte para JSON
    jsonD = JSON.stringify(subQuestoesProblemaObj);
    //
    enviaServidorPhp(jsonD);
    console.log(jsonD);
    reavaliacaoNextImage();
    return true;
}

function questoesProblemaE() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoE = document.getElementById("botaoE").value;
    //Objeto
    subQuestoesProblemaObj.nq = numeroQuestao;
    subQuestoesProblemaObj.status = botaoE;
    subQuestoesProblemaObj.etapa = 2;
    //Converte para JSON
    jsonE = JSON.stringify(subQuestoesProblemaObj);
    //
    enviaServidorPhp(jsonE);
    console.log(jsonE);
    reavaliacaoNextImage();
    return true;
}

//Recebe o array do BANCO de DADOS/PHP com as questões com problema
var j = [];
var jj = [];
const numQuestaoFase02 = function (j) {
    this.jj = j;
    //console.log(jj);
    return jj;
}

//Exibe as questoes selecionadas com problemas na 1º Etapa
var z = 0;
function reavaliacaoNextImage() {
    //console.log(tt);
    if (z == (jj.length - 1)) {
        fimSegundaEtapa();
    } else {
        //console.log(z+ " "+j[z])
        showImage(jj[z]);
        z = z + 1;
        updateDisplay(jj[z]);
    }
}


////////////////////////////////////////////////////////////////////////////
//Fase 03, arquivo -- avaliacaçãoCC.html
//Função para contar o array das imagens
var w = 0;
//endArray - > utiliza o array padrão das imagens originais.. todas
function necessidadeNextImage() {
    if (w == endArray) {
        fimTerceiraEtapa();
    } else {
        showImage(w);
        w = w + 1;
        updateDisplayNecessidade(w);

    }
}
//Objeto 
let questoesNecessidadeObj = { nq: null, status: null, etapa: null };

function questoesNecessidadeA() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-labelA").innerHTML;
    botaoAA = document.getElementById("botaoAA").value;
    //Objeto
    questoesNecessidadeObj.nq = numeroQuestao;
    questoesNecessidadeObj.status = botaoAA;
    questoesNecessidadeObj.etapa = 3;
    //Converte para JSON
    jsonAA = JSON.stringify(questoesNecessidadeObj);
    //
    enviaServidorPhp(jsonAA);
    console.log(jsonAA);
    necessidadeNextImage();
    return true;
}

function questoesNecessidadeB() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-labelA").innerHTML;
    botaoBB = document.getElementById("botaoBB").value;
    //Objeto
    questoesNecessidadeObj.nq = numeroQuestao;
    questoesNecessidadeObj.status = botaoBB;
    questoesNecessidadeObj.etapa = 3;
    //Converte para JSON
    jsonBB = JSON.stringify(questoesNecessidadeObj);
    //
    enviaServidorPhp(jsonBB);
    console.log(jsonBB);
    necessidadeNextImage();
    return true;
}

////////////////////////////////////////////////////////////////////////////
//Fase 04, arquivo --  avaliaçãoCD.html
//Avaliação das necessidades

//Objeto 
let subQuestoesNecessidadesObj = { nq: null, status: null, etapa: null };

function questoesNecessidadeC() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoCC = document.getElementById("botaoCC").value;
    //Objeto
    subQuestoesNecessidadesObj.nq = numeroQuestao;
    subQuestoesNecessidadesObj.status = botaoCC;
    subQuestoesNecessidadesObj.etapa = 4;
    //Converte para JSON
    jsonCC = JSON.stringify(subQuestoesNecessidadesObj);
    //
    enviaServidorPhp(jsonCC);
    console.log(jsonCC);
    reavaliacaoNecessidadeNextImage();
    return true;
}

function questoesNecessidadeD() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoDD = document.getElementById("botaoDD").value;
    //Objeto
    subQuestoesNecessidadesObj.nq = numeroQuestao;
    subQuestoesNecessidadesObj.status = botaoDD;
    subQuestoesNecessidadesObj.etapa = 4;
    //Converte para JSON
    jsonDD = JSON.stringify(subQuestoesNecessidadesObj);
    //
    enviaServidorPhp(jsonDD);
    console.log(jsonDD);
    reavaliacaoNecessidadeNextImage();
    return true;
}

function questoesNecessidadeE() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoEE = document.getElementById("botaoEE").value;
    //Objeto
    subQuestoesNecessidadesObj.nq = numeroQuestao;
    subQuestoesNecessidadesObj.status = botaoEE;
    subQuestoesNecessidadesObj.etapa = 4;
    //Converte para JSON
    jsonEE = JSON.stringify(subQuestoesNecessidadesObj);
    //
    enviaServidorPhp(jsonEE);
    console.log(jsonEE);
    reavaliacaoNecessidadeNextImage();
    return true;
}

//Recebe o array do BANCO de DADOS/PHP com as questões com problema
var k = [];
var kk = [];
const numQuestaoFase03 = function (k) {
    this.kk = k;
    //console.log(jj);
    return kk;
}

//Exibe as questoes selecionadas com problemas na 1º Etapa
var u = 0;
function reavaliacaoNecessidadeNextImage() {
    //console.log(tt);
    if (u == (kk.length - 1)) {
        fimqQuartaEtapa();
    } else {
        //console.log(z+ " "+j[z])
        showImage(kk[u]);
        u = u + 1;
        updateDisplay(kk[u]);
    }
}

//Exibe/Oculta os botões/div's
const targetDiv = document.getElementById("third");
const btn = document.getElementById("show");

function hideShow() {
    if (targetDiv.style.display !== "none") {
        targetDiv.style.display = "none";
    } else {
        targetDiv.style.display = "block";
    }
};
