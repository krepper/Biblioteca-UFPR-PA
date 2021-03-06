// geral
// function mensagem_error(cabecalho, mensagem){
// 	$("#mensagemID").html("<div class='ui floating red message'><div class='content'><div class='header'>"+cabecalho+"</div><p>"+mensagem+"</p></div></div>");
// }

// function autenticacao(){
// 	$.post("../root/secoes/usuarios/autentica.php", {}, function(data){
// 		if (data === "#false") {
// 			document.getElementById("carregando").style.display = "none";
// 			document.getElementById("passou").style.display = "block";
// 		} else {
//          window.location = "painel.php";
// 		}
// 	});
// }

// function autenticacao_restrita(){
//    $.post("../root/secoes/usuarios/autentica.php", {}, function(data){
// 		if (data == "#true") {
// 			document.getElementById("carregando").style.display = "none";
// 			document.getElementById("passou").style.display = "block";
// 		} else {
//          window.location = "login.html";
// 		}
// 	});
// }

// function camposVazios(campos){
// 	for(var campo in campos){
// 		if($("#"+campos[campo]).val().length === 0){
// 			return true;
// 		}
// 	}

// 	return false;
// }


// function criar_toast(mensagem, tempo, tipo){
// 	Materialize.toast(mensagem, tempo, tipo);
// }

// /*
// 	DATA: 15/01/2019
// 	INFO: TRATAR RETORNOS DO PHP
// 	ERROR: --
// */
// function tratarRetorno(data){
// 	var retorno = JSON.parse(data);

// 	if("status" in retorno){
// 		if(retorno.status){
// 			criar_toast('<i class="material-icons">check</i>', 1000, "toast-verde");
// 		} else {
// 			criar_toast('<i class="material-icons">close</i>', 1000, "toast-vermelho");
// 		}
// 	} 

// 	if("div" in retorno){
// 		$("#"+retorno.div).html(retorno.mensagem);
// 	}
// }


// function atualizarCodigos(){
// 	$.post("../root/funcoes/atualizar.php", {}, function(data){
// 		tratarRetorno(data);
// 	});
// }

// /*
// 	DATA: 18/01/2019
// 	ERROR: --
// */
//  function alterarConsultaLocal(numero, codigo){
// 	$("#id_alterarCod_CL").attr("value", numero);
// 	$("#codigo_alterarCod_CL").attr("value", codigo);
// 	$("#modalEditar").modal("open");
//  	//$.post("../root/funcoes/alterar.php", {cod: "c6de7fbf077bcf8bb10322faac8b6207decb05ab", stat: "ALTERAR", id: numero})
// }

// // login.html
// $("#loginform").submit(function() {
//    var usuario = $("#usuario").val();
//    var senha = $("#senha").val();
	
// 	$.post("../root/secoes/usuarios/logar.php", {usuario: usuario, senha: senha}, function(data){
// 		if(data === "#true"){
//          window.location = "painel.php";
//       } else {
// 			mensagem_error("Opss...", "Nome de usuário ou senha está incorreto");
//       }
// 	});

//    return false;
// });

/*
	@ VARIÁVEIS GLOBAL
*/

// PAGINAS
var LOGIN = "http://localhost/paginas/login.html";
var PAINEL = "http://localhost/paginas/painel/painel.php";

// PHP/SCRIPTS
var TABELA = "http://localhost/root/templates/Menu.php";
var CA_CONTADOR = "http://localhost/root/scripts/CA_contador.php";
var US_ENTRAR = "http://localhost/root/scripts/US_entrar.php";



function toastTrue(){
	Materialize.toast("<i class='material-icons'>check</i>", 1000, "toast-verde");
}

function toastFalse(){
	Materialize.toast("<i class='material-icons'>close</i>", 1000, "toast-vermelho");
}

function menu(){
   $.get(TABELA, function(data){
      var str = data+"<script>$('.collapsible').collapsible();</script>";
		$("#menuID").html(str);
   });
}

function imprimirTabela(conteudo) {
	var imprimir = document.getElementById(conteudo).innerHTML;
	tela_impressao = window.open("about:blank");
	tela_impressao.document.write(imprimir);
	tela_impressao.window.print();
	tela_impressao.window.close();
}

function tratarRetorno(data){
	// 	var retorno = JSON.parse(data);
	
	// 	if("status" in retorno){
	// 		if(retorno.status){
	// 			criar_toast('<i class="material-icons">check</i>', 1000, "toast-verde");
	// 		} else {
	// 			criar_toast('<i class="material-icons">close</i>', 1000, "toast-vermelho");
	// 		}
	// 	} 
	
	// 	if("div" in retorno){
	// 		$("#"+retorno.div).html(retorno.mensagem);
	// 	}
	var docs = data;

	if(typeof data === "string"){
		try {
			docs = JSON.parse(data);
		} catch (e) {
			return tratarRetorno("{status: false, mensagem: \"DADOS NÃO ESPERADOS\"");
		}
	}



}
	
/**
 * - funcao = 0 -> ATUALIZAR CONTADOR
 *	- funcao = 1 -> ADICIONAR
 *	- funcao = -1 -> DECREMENTAR
 *
 * @param {int} funcao
 */
function atualizarContador(funcao){
	$.post(CA_CONTADOR, {stat: funcao}, function(data){
		data = JSON.parse(data);

		if("status" in data){
			if(data.status === true){
				$("#contador").html(data.mensagem);
				return true;
			}
		}

		return toastFalse();
	});
}

function zeroFrente(n){
	var x = parseInt(n);
	if(x<10 && x>0){
		return "0"+x;
	}
	return x;
}

function formatarData(dia, mes, ano){
	return ano+"-"+zeroFrente(mes)+"-"+zeroFrente(dia);
}


$("#fm1_login").submit(function(){

	$.post(US_ENTRAR, {usuario: $("#fm1_usuario").val(), senha: $("#fm1_senha").val()}, function(retorno){
		data = JSON.parse(retorno);
		
		if("status" in data){
			if(data.status === true){
				window.location = PAINEL;
			}
		}

		return toastFalse();
	});

	return false;
});