<?PHP
	include "conexao.php";
	$id = filter_input(INPUT_POST, 'identificacao', FILTER_SANITIZE_STRING);
	$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$data = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
	$situacao = filter_input(INPUT_POST, 'situation', FILTER_SANITIZE_STRING);
	$sql="UPDATE tarefas SET nome = '$nome', data_tarefa = '$data' WHERE id = '$id'";  
	$contato = $banco -> prepare($sql);
	$contato -> execute();
	$banco= NULL;
?>