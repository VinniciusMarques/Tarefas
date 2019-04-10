<?PHP	
	include "conexao.php";
	$id = "";
	$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$data = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
	$situacao = filter_input(INPUT_POST, 'situation', FILTER_SANITIZE_STRING);
	$sql="INSERT INTO tarefas VALUES (?,?,?,?)";  
		$contato = $banco -> prepare($sql);
		$contato -> execute(array ($id,$nome,$data,$situacao));
	$fusca= NULL;
?>