<?php
	session_start();

	include "../cfg.php";
	include "../tarefas/cfg2.php";
	include "../funcoesGerais.php";

	$nome = retornaNome();
	$n_tarefas = 0;
	if($sql_tarefas = mysqli_query($conectar2, "SELECT * FROM ".$_SESSION['usuario']." WHERE t_status=1")){
		$n_tarefas = mysqli_num_rows($sql_tarefas);
	}

	printf("
	<li><div class='user-view'>
		<div class='background'>
    	<img src='../img/bg.jpg'>
    </div>
	  <center><a href='../home_restrita.html'><img src='../img/branco_UFPR.png' width='188vh'></a>
	  <h5 id='nomeID' class='card-title text-light'>%s</h5>
		<hr width='200vh''/>
	</div></li>
	<li><a class='collapsible-header waves-effect' style='text-decoration:none' href='../contador_usuario/painel.html'><i class='material-icons'>star_rate</i>Contador de usuários</a></li>
	<li><a class='collapsible-header waves-effect' style='text-decoration:none' href='../consulta_local/registrar_codigos.html'><i class='material-icons'>star_rate</i>Registrador consulta local</a></li>
	<hr width='200vh''/>
	<li>
	  <ul class='collapsible collapsible-accordion'>
	    <li>
	      <a class='collapsible-header waves-effect' style='text-decoration:none; outline: 0;'><i class='material-icons'>people</i>Estatística de Usuários</a>
	      <div class='collapsible-body'>
	        <ul>
	          <li><a class='waves-effect' style='text-decoration:none' href='../contador_usuario/painel.html'><i class='material-icons'>group_add</i>Contador</a></li>
	          <li><a class='waves-effect' style='text-decoration:none' href='../contador_usuario/adicionar.html'><i class='material-icons'>add</i>Adicionar</a></li>
	          <li><a class='waves-effect' style='text-decoration:none' href='../contador_usuario/historico.html'><i class='material-icons'>history</i>Histórico</a></li>
	          <li><a class='waves-effect' style='text-decoration:none' href='../contador_usuario/alterar.html'><i class='material-icons'>edit</i>Alterar</a></li>
	          <li><div class='divider'></div></li>
	        </ul>
	      </div>
	    </li>
	  </ul>
	</li>

	<li>
	  <ul class='collapsible collapsible-accordion'>
	    <li>
	      <a class='collapsible-header waves-effect' style='text-decoration:none; outline: 0;'><i class='material-icons'>assignment</i>Estatística Consulta Local</a>
	      <div class='collapsible-body'>
	        <ul>
	          <li><a class='waves-effect' style='text-decoration:none' href='../consulta_local/registrar_codigos.html'><i class='material-icons'>note_add</i>Registrar códigos</a></li>
	          <li><a class='waves-effect' style='text-decoration:none' href='../consulta_local/adicionar.html'><i class='material-icons'>add</i>Adicionar</a></li>
	          <li><a class='waves-effect' style='text-decoration:none' href='../consulta_local/historico.html'><i class='material-icons'>history</i>Histórico</a></li>
	          <li><a class='waves-effect' style='text-decoration:none' href='../consulta_local/alterar.html'><i class='material-icons'>edit</i>Alterar</a></li>
	          <li><a class='waves-effect' style='text-decoration:none' href='../consulta_local/baixar.html'><i class='material-icons'>cloud_download</i>Baixar</a></li>
	          <li><div class='divider'></div></li>
	        </ul>
	      </div>
	    </li>
	  </ul>
	</li>

	<li>
	  <ul class='collapsible collapsible-accordion'>
	    <li>
	      <a class='collapsible-header waves-effect' style='text-decoration:none; outline: 0;'><i class='material-icons'>print</i>Estatística de Impressão</a>
	      <div class='collapsible-body'>
	        <ul>
	          <li><a class='waves-effect' style='text-decoration:none' href='../contador_impressoes/painel.html'><i class='material-icons'>playlist_add</i>Contador</a></li>
	          <li><a class='waves-effect' style='text-decoration:none' href='../contador_impressoes/adicionar.html'><i class='material-icons'>add</i>Adicionar</a></li>
	          <li><a class='waves-effect' style='text-decoration:none' href='../contador_impressoes/historico.html'><i class='material-icons'>history</i>Histórico</a></li>
	          <li><a class='waves-effect' style='text-decoration:none' href='../contador_impressoes/alterar.html'><i class='material-icons'>edit</i>Alterar</a></li>
	          <li><div class='divider'></div></li>
	        </ul>
	      </div>
	    </li>
	  </ul>
	</li>

	<li><a class='collapsible-header waves-effect' style='text-decoration:none; outline: 0;' href='../tarefas/home.html'><i class='material-icons'>book</i>Tarefas <span class='badge'>%d</span></a></li>
	<li><a class='collapsible-header waves-effect' style='text-decoration:none; outline: 0;' href='../gerenciar_conta/painel.html'><i class='material-icons'>settings</i>Gerenciar conta</a></li>
	<li><a class='collapsible-header waves-effect waves-yellow' style='text-decoration:none' href='../adm/painel.html'><i class='material-icons'>lock</i>Administração</a></li>
	<li><a class='collapsible-header waves-effect' style='text-decoration:none' href='https://goo.gl/forms/QvhPwxZpUs0IT1Ys1' target='_blank'><i class='material-icons'>bug_report</i>Reportar</a></li>
	<li><a class='collapsible-header waves-effect' style='text-decoration:none' href='https://github.com/krepper/Biblioteca-UFPR-PA/blob/master/README.md#atualizações' target='_blank'><i class='material-icons'>fiber_new</i>Atualizações</a></li>
	<li><a class='collapsible-header waves-effect waves-red' style='text-decoration:none' href='../logout.php'><i class='material-icons'>exit_to_app</i>Sair</a></li>
	<li><a class='collapsible-header waves-effect waves-white' style='text-decoration:none; padding-top: 20px'></li>

	</ul>

	<script>$('.collapsible').collapsible();", $nome, $n_tarefas);
?>
