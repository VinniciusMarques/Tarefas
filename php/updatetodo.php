<?PHP
	include "conexao.php";
	$id = filter_input(INPUT_POST, 'banana', FILTER_SANITIZE_STRING);
	$helper = filter_input(INPUT_POST, 'condition', FILTER_SANITIZE_STRING);
	if($helper == 1){
		$sql="UPDATE tarefas SET situacao = '2' WHERE id = '$id'";  
		$contato = $banco -> prepare($sql);
		$contato -> execute();
		$fusca= NULL;
	}
	else{
		$sql="UPDATE tarefas SET situacao = '3' WHERE id = '$id'";  
		$contato = $banco -> prepare($sql);
		$contato -> execute();
		$fusca= NULL;
	}
?>
