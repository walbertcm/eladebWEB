////////////////////////////////////////////////////////////////////////////
//Fase01
//arquivo - avaliaçãoC.html

//Objeto - Questões da etapa 01
//nq -> Numero da questão
//status -> Valor da questão (0,1)
//etapa -> Etapa da avaliação (1,2,3,4)

    let questoesProblemaObj = { 
            idQuestao      :null, 
            paciente       :null, 
            avaliacao      :null,
            resultado      :null,    
            grupoPontuacao :null, 
            etapa          :null,  
    };

    let objAvaliacao = {
            idAvaliacao        : null,
            idCenario          : null,
            idTerapeuta        : null,
            idPaciente         : null,
            etapa              : null,
            numquestao         : null,
            resultado          : null,
            grupoPontuacao     : null,
            avaliacaoRealizada : null,
    }

function enviaServidorPhpCadastroAvaliacao(jsonArquivo) {
    //Envia para o servidor PHP
    request = new XMLHttpRequest();
    request.open("POST", '../../userpaciente/include/avaliacaoControllerCadNovaAvaliacao.php');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("novaQuestao=" + jsonArquivo);
}


function enviaServidorPhp(jsonY) {
    //Envia para o servidor PHP
    request = new XMLHttpRequest();
    request.open("POST", '../../userpaciente/include/avaliacaoControllerCad.php');
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("questao=" + jsonY);
}


//Função para gerar a classificação do Grupo
function selecionaGrupoPontucao(numeroQuestaoX){
    var grupoPontuacao = 99;
    switch(numeroQuestaoX){
        case 0:
        case 1:
        case 2:
        case 3:
        case 4:
            return grupoPontuacao = 1;
            break;
        case 5:
        case 6:
        case 7:
        case 8:
        case 9:
            return grupoPontuacao = 2;
            break;
        case 10:
        case 11:
        case 12:
        case 13:
            return grupoPontuacao = 3;
            break;        
        case 14:
        case 15:
        case 16:
        case 17:
        case 18:
        case 19:
        case 20:
            return grupoPontuacao = 4;
            break;
        default:
            return grupoPontuacao =99;
    }
}

/////////////////////////////////////////////////////////
function cadastraQuestaoNovoNivel(idAvaliacao, idCenario, idTerapeuta, idPaciente, etapa, numQuestao){
 
//Objeto
    objAvaliacao.idAvaliacao        = Number(idAvaliacao);
    objAvaliacao.idCenario          = Number(idCenario);
    objAvaliacao.idTerapeuta        = Number(idTerapeuta);
    objAvaliacao.idPaciente         = Number(idPaciente);
    objAvaliacao.etapa              = Number(etapa);
    objAvaliacao.numquestao         = Number(numQuestao);
    objAvaliacao.resultado          = Number(0);
    objAvaliacao.grupoPontuacao     = Number(0);
    objAvaliacao.avaliacaoRealizada = Number(0);

 //Converte para JSON
    jsonObjAvaliacao = JSON.stringify(objAvaliacao);

 //Envia para o servidor efetivar o cadastro
 enviaServidorPhpCadastroAvaliacao(jsonObjAvaliacao);
 //console.log(jsonA);
 return true;
}

/////////////////////////////////////////////////////////
//NivelA
function questoesProblemaA(idQuestao, idPaciente, idAvaliacao, numQuestao){    
    //Recebe as questões que tem problema
    resultado      = document.getElementById("botaoAA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 1;

    //Converte para JSON
    jsonAA = JSON.stringify(questoesProblemaObj);

    enviaServidorPhp(jsonAA);
    return true;
}

function questoesProblemaAB(idQuestao, idPaciente, idAvaliacao, numQuestao){    
    //Recebe as questões que tem problema
    resultado      = document.getElementById("botaoAB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 1;

    //Converte para JSON
    jsonAB = JSON.stringify(questoesProblemaObj);

    enviaServidorPhp(jsonAB);
    //console.log(jsonB);
    return true;
}

/////////////////////////////////////////////////////////
//NivelB
function questoesProblemaBA(idQuestao, idPaciente, idAvaliacao){    
    //Recebe as questões que tem problema
    resultado      = document.getElementById("botaoBA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 2;

    //Converte para JSON
    jsonBA = JSON.stringify(questoesProblemaObj);

    enviaServidorPhp(jsonBA);
    //console.log(jsonB);
    return true;
}

function questoesProblemaBB(idQuestao, idPaciente, idAvaliacao) {    
    //Recebe as questões que tem problema
    resultado      = document.getElementById("botaoBB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 2;

    //Converte para JSON
    jsonBB = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonBB);
    //console.log(jsonB);
    return true;
}

function questoesProblemaBC(idQuestao, idPaciente, idAvaliacao){    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoBC").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 2;

    //Converte para JSON
    jsonBC = JSON.stringify(questoesProblemaObj);

    enviaServidorPhp(jsonBC);
    return true;
}

/////////////////////////////////////////////////////////
//Nivel C

function questoesProblemaCA(idQuestao, idPaciente, idAvaliacao, numQuestao){    
    //Recebe as questões que tem problema
    resultado      = document.getElementById("botaoCA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 3;

    //Converte para JSON
    jsonCA = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonCA);
    //console.log(jsonB);
    return true;
}

function questoesProblemaCB(idQuestao, idPaciente, idAvaliacao, numQuestao){    
    //Recebe as questões que tem problema
    resultado      = document.getElementById("botaoCB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 3;

    //Converte para JSON
    jsonCB = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonCB);
    //console.log(jsonB);
    return true;
}

//Nivel D
function questoesProblemaCA(idQuestao, idPaciente, idAvaliacao){    
    resultado      = document.getElementById("botaoCA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 3;

    //Converte para JSON
    jsonCA = JSON.stringify(questoesProblemaObj);

    enviaServidorPhp(jsonCA);
    //console.log(jsonB);
    return true;
}

function questoesProblemaCB(idQuestao, idPaciente, idAvaliacao){    
    resultado      = document.getElementById("botaoCB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 3;

    //Converte para JSON
    jsonCB = JSON.stringify(questoesProblemaObj);

    enviaServidorPhp(jsonCB);
    //console.log(jsonB);
    return true;
}

//NivelD
function questoesProblemaDA(idQuestao, idPaciente, idAvaliacao) {    
    resultado      = document.getElementById("botaoDA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 4;

    //Converte para JSON
    jsonDA = JSON.stringify(questoesProblemaObj);

    enviaServidorPhp(jsonDA);
    return true;
}

function questoesProblemaDB(idQuestao, idPaciente, idAvaliacao){    
    resultado      = document.getElementById("botaoDB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 4;

    //Converte para JSON
    jsonDB = JSON.stringify(questoesProblemaObj);

    enviaServidorPhp(jsonDB);
    return true;
}

function questoesProblemaDC(idQuestao, idPaciente, idAvaliacao){    
    resultado      = document.getElementById("botaoDC").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao      = idQuestao;
    questoesProblemaObj.paciente       = idPaciente;
    questoesProblemaObj.avaliacao      = idAvaliacao;
    questoesProblemaObj.resultado      = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa          = 4;

    //Converte para JSON
    jsonDC = JSON.stringify(questoesProblemaObj);

    enviaServidorPhp(jsonDC);
    return true;
}