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
imgArray[0] = "img0.jpg";
imgArray[1] = "img1.jpg";
imgArray[2] = "img2.jpg";
imgArray[3] = "img3.jpg";
imgArray[4] = "img4.jpg";
imgArray[5] = "img5.jpg";
imgArray[6] = "img6.jpg";
imgArray[7] = "img7.jpg";
imgArray[8] = "img8.jpg";
imgArray[9] = "img9.jpg";
imgArray[10]= "img10.jpg";
imgArray[11] = "img11.jpg";
imgArray[12] = "img12.jpg";
imgArray[13] = "img13.jpg";
imgArray[14] = "img14.jpg";
imgArray[15] = "img15.jpg";
imgArray[16] = "img16.jpg";
imgArray[17] = "img17.jpg";
imgArray[18] = "img18.jpg";
imgArray[19] = "img19.jpg";

var counterVal = 0

var i = 0;

//Funcao criar nova janela com tamanho fixo
//Utilizada na pagina index.
function novaJanela() {
    var nj = window.open('avaliacaoA.php', '', 'width=1072, height=685');
}

//Função para exibir imagens
function showImage(numImagem) {
    document.getElementById("images").src = "img/" + imgArray[numImagem];
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
    alert("Etapa 01 - FIM");
    window.location.href = 'avaliacaoCA.php';
}

function fimSegundaEtapa() {
    alert("Etapa 02 - FIM");
    window.location.href = 'avaliacaoCB.php';
}

function fimTerceiraEtapa() {
    alert("Etapa 03 - FIM");
    window.location.href = 'avaliacaoCC.php';
}

function fimqQuartaEtapa() {
    alert("Etapa 04 - FIM");
    window.open('index.php', '_blank');
    //window.location.href = 'index.php';
    window.close();
}

//Variaveis
var endArray = imgArray.length; //Fim do array de imagens
// implementação do contador de nextImage()

//Função para contar o array das imagens
var x = 0; 
function nextImage() {
    if (x == endArray) {
        fimPrimeiraEtapa();
    } else {
        //document.getElementById("images").src = "img/"+ imgArray[counterVal];
        showImage(x);
        updateDisplay(x);
        x = x + 1;
        
        //document.getElementById("images").src = imgArray[counterVal].src; --> show image web     
    }
}

////////////////////////////////////////////////////////////////////////////
//Fase01
//arquivo - avaliaçãoC.html

//Objeto - Questões da etapa 01
//nq -> Numero da questão
//status -> Valor da questão (0,1)
//etapa -> Etapa da avaliação (1,2,3,4)
//gp -> Numero do grupo
let questoesProblemaObj = { 
    fisioterapeuta:null,
    paciente:null, 
    avaliacao:null,
    nq: null, 
    status: null, 
    etapa: null, 
    gp:null };


//JSON - Variavel que ira armazenar o arquivo JSON q 
//será enviado para o PHP
var jsonA;

function enviaServidorPhp(jsonY) {
    //Envia para o servidor PHP
    request = new XMLHttpRequest();
    request.open("POST", '../eladeb/controller/avaliacaoControllerCad.php');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("x=" + jsonY);
}

//Função para gerar a classificação do Grupo
function selecionaGrupoPontucao(numeroQuestaoX){
    var grupoPontuacao = 99;
    switch(numeroQuestaoX){
        case 0:
        case 1:
        case 2:
        case 3:
            return grupoPontuacao = 1;
            break;
        case 4:
        case 5:
        case 6:
        case 7:
        case 8:
            return grupoPontuacao = 2;
            break;
        case 9:
        case 10:
        case 11:
        case 12:
            return grupoPontuacao = 3;
            break;
        case 13:
        case 14:
        case 15:
        case 16:
        case 17:
        case 18:
        case 19:
            return grupoPontuacao = 4;
            break;
        default:
            return grupoPontuacao =99;
    }
}

//
var idFisioterapeuta=99;
var idPaciente=99;
var idAvaliacao=99;
const recebePaciente = function (recFisioterapeuta, recPaciente, recAvaliacao){
    this.idFisioterapeuta = recFisioterapeuta;
    this.idPaciente = recPaciente;
    this.idAvaliacao = recAvaliacao;
    //return idPaciente;
}


//Função do botão Não Problema Etapa01
function questoesProblemaA() {    
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoA = document.getElementById("botaoA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numeroQuestao));

    //Objeto
    questoesProblemaObj.fisioterapeuta = idFisioterapeuta;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.nq = numeroQuestao;
    questoesProblemaObj.status = botaoA;
    questoesProblemaObj.etapa = 1;
    questoesProblemaObj.gp = grupoPontuacao;

    //Converte para JSON
    jsonA = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonA);
    console.log(jsonA);
    nextImage();
    return true;
}

//Função do botão Problema Etapa01
function questoesProblemaB() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoB = document.getElementById("botaoB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numeroQuestao));

    //Objeto
    questoesProblemaObj.fisioterapeuta = idFisioterapeuta;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.nq = numeroQuestao;
    questoesProblemaObj.status = botaoB;
    questoesProblemaObj.etapa = 1;
    questoesProblemaObj.gp = grupoPontuacao;
    
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

//nq -> Numero da questão
//status -> Valor da questão (0,1)
//etapa -> Etapa da avaliação (1,2,3,4)
//gp -> Numero do grupo
let subQuestoesProblemaObj = { 
    fisioterapeuta:null,
    paciente:null, 
    avaliacao:null,
    nq: null, 
    status: null, 
    etapa: null, 
    gp:null };

function questoesProblemaC() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoC = document.getElementById("botaoC").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numeroQuestao));

    //Objeto
    subQuestoesProblemaObj.fisioterapeuta = idFisioterapeuta;
    subQuestoesProblemaObj.paciente = idPaciente;
    subQuestoesProblemaObj.avaliacao = idAvaliacao;
    subQuestoesProblemaObj.nq = numeroQuestao;
    subQuestoesProblemaObj.status = botaoC;
    subQuestoesProblemaObj.etapa = 2;
    subQuestoesProblemaObj.gp = grupoPontuacao;

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
    grupoPontuacao = selecionaGrupoPontucao(Number(numeroQuestao));

    //Objeto
    subQuestoesProblemaObj.fisioterapeuta = idFisioterapeuta;
    subQuestoesProblemaObj.paciente = idPaciente;
    subQuestoesProblemaObj.avaliacao = idAvaliacao;
    subQuestoesProblemaObj.nq = numeroQuestao;
    subQuestoesProblemaObj.status = botaoD;
    subQuestoesProblemaObj.etapa = 2;
    subQuestoesProblemaObj.gp = grupoPontuacao;

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
    grupoPontuacao = selecionaGrupoPontucao(Number(numeroQuestao));

    //Objeto
    subQuestoesProblemaObj.fisioterapeuta = idFisioterapeuta;
    subQuestoesProblemaObj.paciente = idPaciente;
    subQuestoesProblemaObj.avaliacao = idAvaliacao;
    subQuestoesProblemaObj.nq = numeroQuestao;
    subQuestoesProblemaObj.status = botaoE;
    subQuestoesProblemaObj.etapa = 2;
    subQuestoesProblemaObj.gp = grupoPontuacao;

    //Converte para JSON
    jsonE = JSON.stringify(subQuestoesProblemaObj);

    //
    enviaServidorPhp(jsonE);
    console.log(jsonE);
    reavaliacaoNextImage();
    return true;
}

//Recebe o array do BANCO de DADOS/PHP com as questões com problema
var arrayJ = [];
var jj = [];
const recebeQuestoesProblemaFase02 = function (arrayJ) {
    this.jj = arrayJ;
    //return jj;
}

//Exibe as questoes selecionadas com problemas na 1º Etapa
var countZ = 0;

function reavaliacaoNextImage() {
    //console.log(tt);
    if (countZ == (jj.length)) {
        fimSegundaEtapa();
    } else {
        //console.log(z+ " "+j[z])
        showImage(jj[countZ]);
        updateDisplay(jj[countZ]);
        countZ = countZ + 1;
        
    }
}


////////////////////////////////////////////////////////////////////////////
//Fase 03, arquivo -- avaliacaçãoCC.html
//Função para contar o array das imagens
var countW = 0;
//endArray - > utiliza o array padrão das imagens originais.. todas
function necessidadeNextImage() {
    if (countW==endArray) {
        fimTerceiraEtapa();
    } else {
        showImage(countW);
        updateDisplayNecessidade(countW);
        countW = countW + 1;
    }
}
//Objeto 
let questoesNecessidadeObj = { 
    fisioterapeuta:null,
    paciente:null, 
    avaliacao:null,
    nq: null, 
    status: null, 
    etapa: null, 
    gp:null };


function questoesNecessidadeA() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-labelA").innerHTML;
    botaoAA = document.getElementById("botaoAA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numeroQuestao));

    //Objeto
    questoesNecessidadeObj.fisioterapeuta = idFisioterapeuta;
    questoesNecessidadeObj.paciente = idPaciente;
    questoesNecessidadeObj.avaliacao = idAvaliacao;
    questoesNecessidadeObj.nq = numeroQuestao;
    questoesNecessidadeObj.status = botaoAA;
    questoesNecessidadeObj.etapa = 3;
    questoesNecessidadeObj.gp = grupoPontuacao;

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
    grupoPontuacao = selecionaGrupoPontucao(Number(numeroQuestao));

    //Objeto
    questoesNecessidadeObj.fisioterapeuta = idFisioterapeuta;
    questoesNecessidadeObj.paciente = idPaciente;
    questoesNecessidadeObj.avaliacao = idAvaliacao;
    questoesNecessidadeObj.nq = numeroQuestao;
    questoesNecessidadeObj.status = botaoBB;
    questoesNecessidadeObj.etapa = 3;
    questoesNecessidadeObj.gp = grupoPontuacao;


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
let subQuestoesNecessidadesObj = { 
    fisioterapeuta:null,
    paciente:null, 
    avaliacao:null,
    nq: null, 
    status: null, 
    etapa: null, 
    gp:null };

function questoesNecessidadeC() {
    //Recebe as questões que tem problema
    numeroQuestao = document.getElementById("counter-label").innerHTML;
    botaoCC = document.getElementById("botaoCC").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numeroQuestao));

    //Objeto
    subQuestoesNecessidadesObj.fisioterapeuta = idFisioterapeuta;
    subQuestoesNecessidadesObj.paciente = idPaciente;
    subQuestoesNecessidadesObj.avaliacao = idAvaliacao;
    subQuestoesNecessidadesObj.nq = numeroQuestao;
    subQuestoesNecessidadesObj.status = botaoCC;
    subQuestoesNecessidadesObj.etapa = 4;
    subQuestoesNecessidadesObj.gp = grupoPontuacao;

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
    grupoPontuacao = selecionaGrupoPontucao(Number(numeroQuestao));

    //Objeto
    subQuestoesNecessidadesObj.fisioterapeuta = idFisioterapeuta;
    subQuestoesNecessidadesObj.paciente = idPaciente;
    subQuestoesNecessidadesObj.avaliacao = idAvaliacao;
    subQuestoesNecessidadesObj.nq = numeroQuestao;
    subQuestoesNecessidadesObj.status = botaoDD;
    subQuestoesNecessidadesObj.etapa = 4;
    subQuestoesNecessidadesObj.gp = grupoPontuacao;

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
    grupoPontuacao = selecionaGrupoPontucao(Number(numeroQuestao));

    //Objeto
    subQuestoesNecessidadesObj.fisioterapeuta = idFisioterapeuta;
    subQuestoesNecessidadesObj.paciente = idPaciente;
    subQuestoesNecessidadesObj.avaliacao = idAvaliacao;
    subQuestoesNecessidadesObj.nq = numeroQuestao;
    subQuestoesNecessidadesObj.status = botaoEE;
    subQuestoesNecessidadesObj.etapa = 4;
    subQuestoesNecessidadesObj.gp = grupoPontuacao;

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
const recebeQuestoesProblemaFase04 = function (k) {
    this.kk = k;
    return kk;
}

//Exibe as questoes selecionadas com necessidades na 3º Etapa
var countU = 0;
function reavaliacaoNecessidadeNextImage() {
    //console.log(tt);
    if (countU == (kk.length)) {
        fimqQuartaEtapa();
    } else {
        //console.log(z+ " "+j[z])
        showImage(kk[countU]);
        updateDisplay(kk[countU]);
        countU = countU + 1;
        
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
