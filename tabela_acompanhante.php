﻿

<!DOCTYPE html> 
<html>
<head>
	<title>Consulta acompanhante</title>
   <link rel="stylesheet" type="text/css" href="tema1.css">
   <style>
      body{background:#ffffff;}
   </style>
</head>
 
<body>
	<!-- TABELA PRINCIPAL -->
	<table cellspacing="0" align="center" width="800px" bgcolor="#ffffff"><tr><td>


		<!-- CABEÇALHO -->
		<table cellspacing="1" cellpadding="7" width="100%" bgcolor="#90ee90">
			<!-- Linha com logo, slogan e nome do site-->
			<tr>
				<td rowspan="2" align="right" width="20%">
					<img src="logo.png" width="80px">
				</td>
          	<td align="right" valign="top">
					<form action="home_login.html" method="POST">
      			<input type="submit" name="logout" value="LOGOUT">
   				</form>
				</td>
			</tr>
			<tr>
				<td align="center"><img src="nome.png" width="95%"></td>
			</tr>
		</table>


		<!-- Linha com links de navegação -->
		<table cellpadding="5" cellspacing="4" width="100%" border="0	" bgcolor="#e6e6fa">
			<tr align="center">
				<td bgcolor="#3b5898" width="12%"><a href="home_secretaria.php">Início</a></td>
				<td bgcolor="#3b5898" width="12%"><a href="conheca.html">Conheça </a></td>
				<td bgcolor="#3b5898" width="12%"><a href="planos.html">Planos</a></td>
				<td bgcolor="#3b5898" width="12%"><a href="exames.html">Exames</a></td>
				<td bgcolor="#3b5898" width="12%"><a href="contato.html">Contato</a></td>

				<td> </td>
			</tr>
		</table>


		<!-- CORPO DO SITE  E MENU DO SITE-->
		<table cellpadding="15" width="100%" align="left" bgcolor="#ffffff">
		<colgroup>
  			<col width="20%">
         <col width="80%">
		</colgroup>

		<tr>
			<td valign="top" bgcolor="#90ee90">

				<!--coluna esquerda-->
				<table align="center" width="100%" cellspacing="7">
				<tr><td bgcolor="#3b5898" align="center">
					<a href="agendar_exame.html">Novo<br>exame</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="cadastro_paciente.html">Cadastrar<br>paciente</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="cadastro_acompanhante.html">Cadastrar<br>acompanhante</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="cadastro_medico.html">Cadastrar<br>Médico</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="cadastro_sala.html">Cadastrar<br>Sala</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="cadastro_secretaria.html">Cadastrar<br>Secretária</a></td></tr>

				<tr><td bgcolor="#3b5898" align="center">
					<a href="tabela_acompanhante.php">Consultar<br>Acompanhante</a></td></tr>
					
				</table>
         </td>
			<td>

<!--coluna central-->

<?php

include ("bdfunc.php");
  
//prepara uma tabela. cabecalho primeiro
  echo"<div class='rolagem'>".
		"<table width='800' border='5' cellpadding='4' align='center' bgcolor='BLACK'>".
			"<tr align='center' bgcolor='#EAEAEA'>".
				"<td colspan='5'><b>Acompanhantes</b></td>".
			"</tr>".
			"<tr align='center' bgcolor='#EAEAEA'>".
				"<td>SUS Paciente</td>".
				"<td colspan='2'>Nome Paciente</td>".
				"<td>Nome Acompanhante</td>".
				"<td>RG Acompanhante</td>".
			"</tr>";

  $conexao = conecta("Man12", "userman12", "userman12");

  // executa uma busca por dados
$cadeia = "SELECT nsus_paciente,pnome,unome,nome_acomp,rg_acomp FROM acompanhante,paciente WHERE nsus_paciente = nsus ORDER BY nsus_paciente;";
$resultado = consulta($conexao, "$cadeia");
$linhas = pg_numrows($resultado);

for ($cl=0; $cl<$linhas; $cl++){
	// recupera campos do resultado
	$SUS = pg_result($resultado, $cl, 0);
	$Pnome = pg_result($resultado, $cl, 1);
	$Unome = pg_result($resultado, $cl, 2);
	$Acomp = pg_result($resultado, $cl, 3);
	$RG = pg_result($resultado, $cl, 4);

	echo "<tr align='center' bgcolor='#EAEAEA'>".
		"<td>". $SUS. "</td>".
		"<td>". $Pnome. "</td>".
		"<td>". $Unome. "</td>".
		"<td>". $Acomp. "</td>".
		"<td>". $RG. "</td>".
		"</tr>";
}
echo "</table></div>";

desconecta($conexao);
?>
<!--fim coluna central-->
			</td>

<!--coluna direita-->
<!--			<td bgcolor="#90ee90"></td>      -->



		</tr>
	</table>
	<!-- RODAPÉ DO SITE-->
	<table align="center">
		<tr>
			<td>
				<br><br><br>
			</td>
		</tr>
	</table>
   </td></tr></table>
</body>

</html>
