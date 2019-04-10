<?PHP
	include "conexao.php";
	$done = "SELECT * FROM tarefas WHERE situacao = 3";
	$feito = $banco -> prepare($done);
	$feito -> execute();
	foreach ($feito as $donedado){
		$id_done = $donedado['id'];
		$nome_done = $donedado['nome'];
		$data_done = $donedado['data_tarefa'];
		echo "<div class='tarefa'>
			<div class='title'>".
				$nome_done.
			"</div>
			<div class='edit'>
				<img src='../imagens/edit.png'>
			</div>
			<div class='changeDiv'> 
				<button class='change' id='changeProg' onclick='updatetotodo($id_done)'>A Fazer</button>
			</div>
			<div class='changeDiv'>
				<button class='change' id='changeDone' onclick='updatetoprog($id_done)'>Fazendo</button>
			</div>
		 </div>";
		 
	}
?>