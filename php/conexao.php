<?php
	try{//tente
		$banco = new PDO("mysql:host=localhost;dbname=tarefa","root","");//PDO = Php Data Object
		//echo "Conexão efetuada com sucesso!!!";
	}
	catch (PDOException $e){//Se o try der errado Pegue a excessão PDO e coloque na variável (e)
		// testar var_dump($e);
		// teste método echo $e->getCode();
		echo $e->getMessage();//Mostrar o erro com a função getMessage
	}
?>