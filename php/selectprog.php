<?PHP
	include "conexao.php";
	$prog = "SELECT * FROM tarefas WHERE situacao = 2";
	$faz = $banco -> prepare($prog);
	$faz -> execute();
	foreach ($faz as $progdado){
		$nome_prog = $progdado['nome'];
		$data_prog = $progdado['data_tarefa'];
		echo "<div class='tarefa'>
			<div class='title'>".
				$nome_prog.
			"</div>
			<div class='edit'>
				<img src='../imagens/edit.png'>
			</div>
		 </div>";
	}
?>