

$(document).ready(function () {

    $('#btnTesteInsert').click(function (e) {
        console.log('clicou');

    });

    // Ação ao clicar nos botões de avaliação
    $('.btn-group .btn').click(function () {
        var selectedValue = $(this).text();
        $('#idNota').val(selectedValue);
    });

    let arrayPerguntas = [];
    //Carrega as perguntas
    $.ajax({
        url: '../src/get_perguntas.php', // Caminho do arquivo PHP
        type: 'GET',
        dataType: 'json', // Espera uma resposta JSON
        data: {
            idStatus: 'A' // Somente perguntas ativas
        },
        async: false,
        success: function (data) {
            // Manipula a resposta JSON
            if (data.length > 0) {
                $.each(data, function (index, pergunta) {
                    arrayPerguntas.push({
                        id_pergunta: pergunta.id_pergunta,
                        ds_pergunta: pergunta.ds_pergunta
                    });

                });

            } else {

                console.log('Erro ao buscar pergunta');
            }
        },
        error: function (xhr, status, error) {
            // Manipula erros
            console.error("Erro na requisição: " + error);
            $('#perguntas').html('<p>Erro ao carregar setores.</p>');
        }


    });



    let idPergunta = 0;

    // Busca a primeira pergunta
    retornaPergunta(idPergunta);

    function retornaPergunta(idPergunta) {

        var qtdPerguntas = arrayPerguntas.length;
        

        if (idPergunta < qtdPerguntas) {
            $('#dsPergunta').text((idPergunta + 1) + ' - ' + arrayPerguntas[idPergunta].ds_pergunta);
            $('#idPergunta').val(arrayPerguntas[idPergunta].id_pergunta);

            if (idPergunta == (qtdPerguntas - 1)) {
                $('#divFeedback').show();
            }

        } else {
            // Terminou as perguntas
            window.location.href = "obrigado.php";
        }


    }


    $('#btnProx').click(function (e) {
        var nrNota = $('#idNota').val();
        var nrPergunta = $('#idNota').val();
        var idDispositivo = $('#idDispositivo').val();
        var idUltPergunta = idPergunta == (arrayPerguntas.length - 1);

        console.log(nrNota.length);
        console.log( 'idDispositivo ' +  idDispositivo.length + ' ' + idDispositivo);
 
        if ( (nrNota.length > 0  &&  idDispositivo.length > 0) || idUltPergunta ) {
            insereResposta(idUltPergunta);
            idPergunta++;
            retornaPergunta(idPergunta);
            $('#idNota').val('');
            $('#divErro').html('');
        } else {
            $('#divErro').html('<div class="alert alert-danger" role="alert"> Erro: escolha a nota e o dispositivo para prosseguir!</div>');
        }

    });

    // Função para salvar as respostas
    function insereResposta(idUltPergunta) {
        var notaNula = 'N';
        
        if(idUltPergunta){
            notaNula = 'S';
        }

        console.log('notaNula ' + notaNula);

        $.ajax({
            url: '../src/respostas.php',
            type: 'POST',
            data: {
                id_setor: 1, 
                id_pergunta: $('#idPergunta').val(), 
                id_dispositivo: $('#idDispositivo').val(), 
                nr_nota_resposta: $('#idNota').val(), 
                ds_feedback: $('#dsFeedback').val(),
                nota_nula: notaNula
            },
            success: function (response) {

                console.log(response);
              
            },
            error: function (xhr, status, error) {
                console.log('Erro na requisição AJAX:', error);
            }
        });
    }

});