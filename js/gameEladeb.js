////////////////////////////////////////////////////////////////////////////
//Fase01
//arquivo - avaliaçãoC.html

//Objeto - Questões da etapa 01
//nq -> Numero da questão
//status -> Valor da questão (0,1)
//etapa -> Etapa da avaliação (1,2,3,4)
//gp -> Numero do grupo
let questoesProblemaObj = 
{ 
    idQuestao: null, 
    paciente:null, 
    avaliacao:null,
    resultado:null,    
    grupoPontuacao: null, 
    etapa: null,  
    //terapeuta:null,
    
};


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

//NivelA
function questoesNaoProblemaA(idQuestao, idPaciente, idAvaliacao, numQuestao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 1;

    //Converte para JSON
    jsonA = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonA);
    console.log(jsonA);
    return true;
}

function questoesProblemaA(idQuestao, idPaciente, idAvaliacao, numQuestao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 1;

    //Converte para JSON
    jsonB = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonB);
    //console.log(jsonB);
    return true;
}

//NivelB
function questoesProblemaBA(idQuestao, idPaciente, idAvaliacao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoBA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 2;

    //Converte para JSON
    jsonBA = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonBA);
    //console.log(jsonB);
    return true;
}

function questoesProblemaBB(idQuestao, idPaciente, idAvaliacao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoBB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 2;

    //Converte para JSON
    jsonBB = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonBB);
    //console.log(jsonB);
    return true;
}

function questoesProblemaBC(idQuestao, idPaciente, idAvaliacao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoBC").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 2;

    //Converte para JSON
    jsonBC = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonBC);
    //console.log(jsonB);
    return true;
}

//Nivel C

function questoesProblemaA(idQuestao, idPaciente, idAvaliacao, numQuestao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 1;

    //Converte para JSON
    jsonB = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonB);
    //console.log(jsonB);
    return true;
}

//NivelB
function questoesProblemaCA(idQuestao, idPaciente, idAvaliacao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoCA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 3;

    //Converte para JSON
    jsonCA = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonCA);
    //console.log(jsonB);
    return true;
}

function questoesProblemaCB(idQuestao, idPaciente, idAvaliacao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoCB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 3;

    //Converte para JSON
    jsonCB = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonCB);
    //console.log(jsonB);
    return true;
}

//NivelD
//NivelB
function questoesProblemaDA(idQuestao, idPaciente, idAvaliacao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoDA").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 4;

    //Converte para JSON
    jsonDA = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonDA);
    //console.log(jsonB);
    return true;
}

function questoesProblemaDB(idQuestao, idPaciente, idAvaliacao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoBB").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 4;

    //Converte para JSON
    jsonDB = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonDB);
    //console.log(jsonB);
    return true;
}

function questoesProblemaDC(idQuestao, idPaciente, idAvaliacao) {    
    //Recebe as questões que tem problema
    resultado = document.getElementById("botaoBC").value;
    grupoPontuacao = selecionaGrupoPontucao(Number(numQuestao));

    //Objeto
    questoesProblemaObj.idQuestao = idQuestao;
    questoesProblemaObj.paciente = idPaciente;
    questoesProblemaObj.avaliacao = idAvaliacao;
    questoesProblemaObj.resultado = resultado;
    questoesProblemaObj.grupoPontuacao = grupoPontuacao;
    questoesProblemaObj.etapa = 4;

    //Converte para JSON
    jsonDC = JSON.stringify(questoesProblemaObj);

    //
    enviaServidorPhp(jsonDC);
    //console.log(jsonB);
    return true;
}