<?PHP
	include "conexao.php";
	$todo = "SELECT * FROM tarefas WHERE situacao = 1";
	$afazer = $banco -> prepare($todo);
	$afazer -> execute();
	foreach ($afazer as $tododado){
		$nome_todo = $tododado['nome'];
		$data_todo = $tododado['data_tarefa'];
		echo "<div class='tarefa'>
			<div class='title'>".
				$nome_todo.
			"</div>
			<div class='edit'>
				<img src='../imagens/edit.png'>
			</div>
		 </div>";
	}
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
<script>
	$('.tarefa').mouseover(function(){
		$('.edit').show();
	});
	$('.tarefa').mouseout(function(){
		$('.edit').hide();
	});
</script>