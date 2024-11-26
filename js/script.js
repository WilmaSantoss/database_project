/* NOTÍCIAS RSS */

function carregar() {
    var url = "https://olhardigital.com.br/feed/";
    $.ajax({
        url: "https://api.rss2json.com/v1/api.json?rss_url=" + url,
        type: 'GET',
        success: function(data) {
            var objeto_json = data;
            // ler conteudo 
            var frase = "";
            for (var i = 0; i < Math.min(5, objeto_json.items.length); i++) {
                frase += "Título: <b>" + objeto_json.items[i].title + "</b><br/>";
                frase += objeto_json.items[i].description + "<br/><br/>";
            }
            $("#noticias").html(frase);
        },
        error: function(xhr, status, error) {
            console.log("Erro: " + status + " " + error);
            alert('Ocorreu um erro.');
        }
    });
}


/* ORÇAMENTO */

function validarNome(){
    var texto = document.formDados.nome.value;
    var letras = /^[A-Za-z]+$/;
    if (texto == ''){
        alert('Todos os campos devem ser preenchidos!');
        return false;
    } else if (!letras.test(texto)){
        alert ('Os campos devem conter apenas alfabeto!')
        return false;
    }
}
function validarApelido(){
    var texto = document.formDados.apelido.value;
    var letras = /^[A-Za-z]+$/;
    if (texto == ''){
        alert('Todos os campos devem ser preenchidos!');
        return false;
    } else if (!letras.test(texto)){
        alert ('Os campos devem conter apenas alfabeto!');
        return false;   
    }
}

function validarNumero(){
    var num = document.formDados.numero.value;
    var numeros = /^[0-9]+$/;
    if (num == ''){
        alert('Todos os campos devem ser preenchidos!');
        return false;
    } else if (!numeros.test(num)){
        alert ('Número de telefone incorreto. Deve conter apenas números!');
        return false;
    } else if (num.length!=9){
        alert ('O número de telemóvel deve conter 9 dígitos!')
        return false;
    }
}

function calcularorcamento(){
    var orcamentoTotal = 0;
    var precoTipopagina = 0;
    precoTipopagina = +document.getElementById('tipoPagina').value;
    document.getElementById('tipopaginaValor').value = precoTipopagina;

    const form = document.getElementById('checkboxSeparadores');
    var contar = 0;
    var somaPaginas = 0;
    for (var i = 0; i < form.elements.length; i++){
        const element = form.elements[i];
        if (element.type === "checkbox" && element.checked){
            contar ++ 
            somaPaginas += parseInt(element.value);
        }
    }

    const prazo = +document.getElementById('prazo').value;
    var desconto = 1;
    if (prazo > 0){
        switch (prazo){
            case 1:
                desconto*=.95;
                break;
            case 2:
                desconto*=.9;
                break;
            case 3:
                desconto*=.85;
                break;
            default:
                desconto*=.8;
                break;
        }
    }

    const resul = document.getElementById("resultado");
    orcamentoTotal = (precoTipopagina + somaPaginas)* desconto;
    resul.innerHTML = `Números de páginas selecionadas: ${contar}. Valor total do orçamento: ${orcamentoTotal}.`;
}

/* CONTACTO */

function validarNomeCont(){
    var texto = document.dadosCont.nomeCont.value;
    var letras = /^[A-Za-z]+$/;
    if (texto == ''){
        alert('Todos os campos devem ser preenchidos!');
        return false;
    } else if (!letras.test(texto)){
        alert ('Os campos devem conter apenas alfabeto!')
        return false;
    }
}

function validarApelidoCont(){
    var texto = document.dadosCont.apelidoCont.value;
    var letras = /^[A-Za-z]+$/;
    if (texto == ''){
        alert('Todos os campos devem ser preenchidos!');
        return false;
    } else if (!letras.test(texto)){
        alert ('Os campos devem conter apenas alfabeto!');
        return false;   
    }
}

function validarNumeroCont(){
    var num = document.dadosCont.numeroCont.value;
    var numeros = /^[0-9]+$/;
    if (num == ''){
        alert('Todos os campos devem ser preenchidos!');
        return false;
    } else if (!numeros.test(num)){
        alert ('Número de telefone incorreto. Deve conter apenas números!');
        return false;
    } else if (num.length!=9){
        alert ('O número de telemóvel deve conter 9 dígitos!')
        return false;
    }
}

function validarEmailCont(){
    var email = document.dadosCont.emailCont.value;
    var regras = /^(.+\@.+\..+)$/;
    if (email == ''){
        alert ('Todos os campos devem ser preenchidos!')
        return false;
    }else if (!regras.test(email)){
        alert ('Email inválido!')
        return false;
    }
}

