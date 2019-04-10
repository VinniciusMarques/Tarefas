<?PHP
	include "conexao.php";
	$todo = "SELECT * FROM tarefas WHERE situacao = 1";
	$afazer = $banco -> prepare($todo);
	$afazer -> execute();
	foreach ($afazer as $tododado){
		$id_todo = $tododado['id'];
		$nome_todo = $tododado['nome'];
		$data_todo = $tododado['data_tarefa'];
		echo "<div class='tarefa'>
			<div class='title'>".
				$nome_todo."
			</div>
			<div class='edit'>
				<img src='../imagens/edit.png' onclick='modal($id_todo,\"".$nome_todo.",".$data_todo."\")'>
			</div>
			<div class='changeDiv'> 
				<button class='change' id='changeProg' onclick='updatetoprog($id_todo)'>Em progresso</button>
			</div>
			<div class='changeDiv'>
				<button class='change' id='changeDone' onclick='updatetodone($id_todo)'>Terminado</button>
			</div>
		 </div>";
	}
?>
<div class='modal' id="modaledittodo" style="display: none">
  <!-- Modal -->
  <div class='modal-dialog'>
	<div class='modal-content'>
	  <div class='modal-header'>
		  <button type='button' class='close' data-dismiss='delete_modal' onclick="cancelar()">&times;</button>
		   <h4 class='modal-title'>Editar Tarefa</h4>
	  </div>
	  <div class='modal-body'>
		<p id="banana"></p>
		<input type="hidden"  id="idtodo" name="idtodo"></input>
		<input type="text" placeholder="Descrição da Tarefa"   id="nometodo" name="nometodo"></input>
		<input type="date" placeholder="Data" id="datatodo"  name="datatodo"></input>
		<input type="hidden"id="situacaotodo" name="situacao" value="1"></input>
	  </div>
	  <div class='modal-footer'>
		  <input type='button' class='btn btn-default' id="buttontodoedit" value='Sim'  onclick="editar()" name='sim'></input>
		  <button type='button' class='btn btn-default' data-dismiss='modal' onclick="cancelar()">Não</button>
		  <input type='text' name="deletar" id="id_apagar" style="display:none"></input>
		</div>
	</div>
  </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
<script>
	$('.tarefa').mouseover(function(){
		$('.edit').show();
	});
	$('.tarefa').mouseout(function(){
		$('.edit').hide();
	});
	//EDIT
	function modal(a,n){
		document.getElementById('modaledittodo').style.display = "block"
		var id = a;
		var nome=n;
		var separado = nome.split(",");
		document.getElementById("idtodo").value = id;
		document.getElementById("nometodo").value = separado[0];
		document.getElementById("datatodo").value = separado[1];
		document.getElementById("banana").innerHTML = 'Editando a tarefa:<b style="color:red;">'+separado[0]+'</b>?';
	}
	// function editar(){
		$('#buttontodoedit').click(function(){
			var id = $("#idtodo").val();
			var nome = $("#nometodo").val();
			var data = $("#datatodo").val();
			var situacao = $("#situacaotodo").val();
			if(nome !==''){
				var dados = {
					identificacao:id,
					name:nome,
					date:data,
					situation:situacao
				}
			}
			$.post('php/edit.php',dados,function(retorna){
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
	// }
	//ALERTFY
	function updatetoprog(idpar){
		alertify.warning(idpar + '|| Mudado para Progress ');
		var helper = 1;
		var dados = {banana:idpar, condition:helper}
		$.post('php/updatetodo.php',dados,function(retorna){
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
	}
	function updatetodone(idpar){
		alertify.success(idpar + '|| Mudado para Done ');
		var helper = 2;
		var dados = {banana:idpar, condition:helper}
		$.post('php/updatetodo.php',dados,function(retorna){
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
	}
</script>