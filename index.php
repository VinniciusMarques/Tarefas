<!DOCTYPE html>
<html lang="pt-br"> <!-- setando a língua -->
	<head>
		<title>Tarefas</title>
		<!--<meta charset = "UTF-8"> <!-- Padrão -->
		<!--<link rel="shortcut icon" type="image/tipo da imagem" href="nome do arquivo">-->
		<link rel="stylesheet" href="css/materialize.min.css"> <!-- Link Css, Aonde esta o HREF colocar o nome do arquivo-->
		<link rel="stylesheet" href="css/main.css"><!-- Link Css, Aonde esta o HREF colocar o nome do arquivo-->
		<link rel="stylesheet" href="css/pace.css"><!-- Link Css, Aonde esta o HREF colocar o nome do arquivo-->
		<link rel="stylesheet" href="css/alertify.css"><!-- Link Css, Aonde esta o HREF colocar o nome do arquivo-->
		<link rel="stylesheet" href="css/themes/semantic.css"><!-- Link Css, Aonde esta o HREF colocar o nome do arquivo-->
		<link rel="stylesheet" href="css/modal.css"><!-- Link Css, Aonde esta o HREF colocar o nome do arquivo-->
		<script src="pace/pace.js"></script>
		<script src="/alertfy/alertify.js"></script>
		
	</head>
	<body>
		<header>
		</header>
		<div class="main">
			<div class="pace"></div>
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
						<a class="add" id="todo-add" onclick="callmodaltodo()">+Adicionar outra tarefa</a>
					</div>
				</div>
			</div>
			<div class="progresss">
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
						<a class="add" id="prog-add" onclick="callmodalprog()">+Adicionar outra tarefa</a>
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
						<a class="add" id="done-add" onclick="callmodaldone()">+Adicionar outra tarefa</a>
					</div>
				</div>
			</div>
			 <div class='modal' id="modaltodo" style="display: none">
              <!-- Modal -->
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='delete_modal' onclick="cancelar()">&times;</button>
                       <h4 class='modal-title'>Adicionar Tarefa</h4>
                  </div>
                  <div class='modal-body'>
					<input type="text" placeholder="Descrição da Tarefa" id="nometodo" name="nometodo"></input>
					<input type="date" placeholder="Data" id="datatodo" name="datatodo"></input>
					<input type="hidden"id="situacaotodo" name="situacao" value="1"></input>
                  </div>
                  <div class='modal-footer'>
					  <input type='button' class='btn btn-default' id="buttontodo" value='Sim' name='sim'></input>
					  <button type='button' class='btn btn-default' data-dismiss='modal' onclick="cancelar()">Não</button>
					  <input type='text' name="deletar" id="id_apagar" style="display:none"></input>
               	 	</div>
                </div>
              </div>
            </div>
			
			 <div class='modal' id="modalprog" style="display: none">
              <!-- Modal -->
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='delete_modal' onclick="cancelar()">&times;</button>
                       <h4 class='modal-title'>Adicionar Tarefa</h4>
                  </div>
                  <div class='modal-body'>
					<input type="text" placeholder="Descrição da Tarefa" id="nomeprog" name="nomeprog"></input>
					<input type="date" placeholder="Data" id="dataprog" name="dataprog"></input>
					<input type="hidden"id="situacaoprog" name="situacaoprog" value="2"></input>
                  </div>
                  <div class='modal-footer'>
					  <input type='button' class='btn btn-default' value='Sim' name='sim' id="buttonprog"></input>
					  <button type='button' class='btn btn-default' data-dismiss='modal' onclick="cancelar()">Não</button>
					  <input type='text' name="deletar" id="id_apagar" style="display:none"></input>
               	 	</div>
                </div>
              </div>
            </div>
			
			 <div class='modal' id="modaldone" style="display: none">
              <!-- Modal -->
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                      <button type='button' class='close' data-dismiss='delete_modal' onclick="cancelar()">&times;</button>
                       <h4 class='modal-title'>Adicionar Tarefa</h4>
                  </div>
                  <div class='modal-body'>
					<input type="text" placeholder="Descrição da Tarefa" id="nomedone" name="nomedone"></input>
					<input type="date" placeholder="Data" id="datadone" name="datadone"></input>
					<input type="hidden"id="situacaodone" name="situacaodone" value="3"></input>
                  </div>
                  <div class='modal-footer'>
					  <input type='button' class='btn btn-default' value='Sim' name='sim' id="buttondone"></input>
					  <button type='button' class='btn btn-default' data-dismiss='modal' onclick="cancelar()">Não</button>
					  <input type='text' name="deletar" id="id_apagar" style="display:none"></input>
               	 	</div>
                </div>
              </div>
            </div>
		</div>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script>
			//PRELOADER
			$(document).ready(function (){
			});
			//MOSTRAR O TODO
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
						$('.preloader-wrapper active').hide()
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
						$('.preloader-wrapper active').hide()
					}
				})
			});
			// MODAL TODO
			function callmodaltodo(){
				document.getElementById('modaltodo').style.display = "block";
			}
			// MODAL PROG
			function callmodalprog(){
				document.getElementById('modalprog').style.display = "block";
			}
			// MODAL DONE
			function callmodaldone(){
				document.getElementById('modaldone').style.display = "block";
			}
			// FECHAR MODAIS
			function cancelar(){
				document.getElementById('modaltodo').style.display = "none";
				document.getElementById('modalprog').style.display = "none";
				document.getElementById('modaldone').style.display = "none";
				document.getElementById('modaledittodo').style.display = "none"
				document.getElementById('modaleditprog').style.display = "none"
				document.getElementById('modaleditdone').style.display = "none"
			}
			// ADICIONAR TODO
			$('#buttontodo').click(function(){
					var nome = $("#nometodo").val();
					var data = $("#datatodo").val();
					var situacao = $("#situacaotodo").val();
					if(nome !==''){
						var dados = {
							name:nome,
							date:data,
							situation:situacao
						}
					}
					$.post('php/add.php',dados,function(retorna){
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
						$.ajax({
							url: 'php/selectprog.php',
							success: function(prog) {
								$('#prog-content').html(prog);
							},
							beforeSend: function(){
							},
							complete: function(){
								$('.preloader-wrapper active').hide()
							}
						})
						$.ajax({
							url: 'php/selectdone.php',
							success: function(done) {
								$('#done-content').html(done);
							},
							beforeSend: function(){
							},
							complete: function(){
								$('.preloader-wrapper active').hide()
							}
						})
					})
					document.getElementById('modaltodo').style.display = "none";

			});
			
			// ADICIONAR PROG
			$('#buttonprog').click(function(){
					var nome = $("#nomeprog").val();
					var data = $("#dataprog").val();
					var situacao = $("#situacaoprog").val();
					if(nome !==''){
						var dados = {
							name:nome,
							date:data,
							situation:situacao
						}
					}
					$.post('php/add.php',dados,function(retorna){
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
						$.ajax({
							url: 'php/selectprog.php',
							success: function(prog) {
								$('#prog-content').html(prog);
							},
							beforeSend: function(){
							},
							complete: function(){
								$('.preloader-wrapper active').hide()
							}
						})
						$.ajax({
							url: 'php/selectdone.php',
							success: function(done) {
								$('#done-content').html(done);
							},
							beforeSend: function(){
							},
							complete: function(){
								$('.preloader-wrapper active').hide()
							}
						})
					})
					document.getElementById('modalprog').style.display = "none";

			});
			
			// ADICIONAR DONE
			$('#buttondone').click(function(){
					var nome = $("#nomedone").val();
					var data = $("#datadone").val();
					var situacao = $("#situacaodone").val();
					if(nome !==''){
						var dados = {
							name:nome,
							date:data,
							situation:situacao
						}
					}
					$.post('php/add.php',dados,function(retorna){
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
						$.ajax({
							url: 'php/selectprog.php',
							success: function(prog) {
								$('#prog-content').html(prog);
							},
							beforeSend: function(){
							},
							complete: function(){
								$('.preloader-wrapper active').hide()
							}
						})
						$.ajax({
							url: 'php/selectdone.php',
							success: function(done) {
								$('#done-content').html(done);
							},
							beforeSend: function(){
							},
							complete: function(){
								$('.preloader-wrapper active').hide()
							}
						})
					})
					document.getElementById('modaldone').style.display = "none";

			});
		</script>
	</body>
</html>