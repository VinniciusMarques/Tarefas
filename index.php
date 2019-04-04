<!DOCTYPE html>
<html lang="pt-br"> <!-- setando a língua -->
	<head>
		<title>Vinnicius Pierri</title>
		<meta charset = "UTF-8"> <!-- Padrão -->
		<link rel="shortcut icon" type="image/tipo da imagem" href="nome do arquivo">
		<link rel="stylesheet" href="css/materialize.min.css"> <!-- Link Css, Aonde esta o HREF colocar o nome do arquivo-->
		<link rel="stylesheet" href="css/main.css"><!-- Link Css, Aonde esta o HREF colocar o nome do arquivo-->
		
		
	</head>
	<body>
		<header>
		</header>
		<div class="main">
			<div class="todo">
				<div class="box">
					<div class="box-header">
						To Do
					</div>
					<div class="box-content" id="todo-content">
						<div class='preloader-wrapper active'>
							<div class="spinner-layer spinner-red-only">
							  <div class="circle-clipper left">
								<div class="circle"></div>
							  </div><div class="gap-patch">
								<div class="circle"></div>
							  </div><div class="circle-clipper right">
								<div class="circle"></div>
							  </div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<a class="add" id="todo-add">+Adicionar outra tarefa</a>
					</div>
				</div>
			</div>
			<div class="progress">
				<div class="box">
					<div class="box-header">
						In Progress
					</div>
					<div class="box-content" id="prog-content">
						<div class="box-content" id="todo-content">
							<div class='preloader-wrapper active'>
								<div class="spinner-layer spinner-red-only">
								  <div class="circle-clipper left">
									<div class="circle"></div>
								  </div><div class="gap-patch">
									<div class="circle"></div>
								  </div><div class="circle-clipper right">
									<div class="circle"></div>
								  </div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<a class="add" id="prog-add">+Adicionar outra tarefa</a>
					</div>
				</div>
			</div>
			<div class="done">
				<div class="box">
					<div class="box-header">
						Done
					</div>
					<div class="box-content" id="done-content">
						<div class="box-content" id="todo-content">
							
						</div>
					</div>
					<div class="box-footer">
						<a class="add" id="done-add">+Adicionar outra tarefa</a>
					</div>
				</div>
			</div>

		</div>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script>
			$(document).ready(function (){
				$.ajax({
					url: 'php/selecttodo.php',
					success: function(todo) {
						$('#todo-content').html(todo);
					},
					beforeSend: function(){
						
					},
					complete: function(){
						$('.preloader-wrapper active').hide()
					}
				})
			});
			// MOSTRAR O PROGRESS
			$(document).ready(function (){
				$.ajax({
					url: 'php/selectprog.php',
					success: function(prog) {
						$('#prog-content').html(prog);
					},
					beforeSend: function(){
					},
					complete: function(){
					}
				})
			});
			// MOSTRAR O DONE
			$(document).ready(function (){
				$.ajax({
					url: 'php/selectdone.php',
					success: function(done) {
						$('#done-content').html(done);
					},
					beforeSend: function(){
					},
					complete: function(){
					}
				})
			});
			
			$('.tarefa').mouseover(function(){
				$('.edit').show();
			});
			$('.tarefa').mouseout(function(){
				$('.edit').hide();
			});
			
			// $('.click').click(function(){
					// var nome = $("#nome").val();
					// var idade = $("#idade").val();
					// var sexo = $("#sexo").val();
					// if(nome !==''){
					// var dados = {
							// nome:nome,
							// idade:idade,
							// sexo:sexo
						// }
					// $.post('inserir.php', dados)}
					// $.ajax({
						// url: 'arquivo2.php',
						// success: function(data) {
							// $('div').html(data);
							// $("#nome").val("");
							// $("#idade").val("");
							// $("#sexo").val("");
						// },
						// beforeSend: function(){
							// alert("Carregando");
						// },
						// complete: function(){
						// }
				// });
			// });
		</script>
	</body>
</html>