<?PHP
	include "conexao.php";
	$prog = "SELECT * FROM tarefas WHERE situacao = 2";
	$faz = $banco -> prepare($prog);
	$faz -> execute();
	foreach ($faz as $progdado){
		$id_prog = $progdado['id'];
		$nome_prog = $progdado['nome'];
		$data_prog = $progdado['data_tarefa'];
		echo "<div class='tarefa'>
			<div class='title'>".
				$nome_prog.
			"</div>
			<div class='edit'>
				<img src='../imagens/edit.png' onclick='modal($id_prog,\"".$nome_prog.",".$data_prog."\")'>
			</div>
		 
			<div class='changeDiv'> 
				<button class='change' id='changeProg' onclick='updatetotodo($id_prog)'>A Fazer</button>
			</div>
			<div class='changeDiv'>
				<button class='change' id='changeDone' onclick='updatetodone($id_prog)'>Terminado</button>
			</div>
			</div>";
	}
?>
<div class='modal' id="modaleditprog" style="display: none">
  <!-- Modal -->
  <div class='modal-dialog'>
	<div class='modal-content'>
	  <div class='modal-header'>
		  <button type='button' class='close' data-dismiss='delete_modal' onclick="cancelar()">&times;</button>
		   <h4 class='modal-title'>Editar Tarefa</h4>
	  </div>
	  <div class='modal-body'>
		<p id="banana"></p>
		<input type="hidden"  id="idprog" name="idprog"></input>
		<input type="text" placeholder="Descrição da Tarefa"   id="nomeprog" name="nomeprog"></input>
		<input type="date" placeholder="Data" id="dataprog" name="dataprog"></input>
		<input type="hidden"id="situacaoprog" name="situacaoprog" value="1"></input>
	  </div>
	  <div class='modal-footer'>
		  <input type='button' class='btn btn-default' id="buttontodoedit" value='Sim' onclick="editar()" name='sim'></input>
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
	// EDIT
	function modal(a,n){
		document.getElementById('modaleditprog').style.display = "block"
		var id = a;
		var nome=n;
		var separado = nome.split(",");
		document.getElementById("idprog").value = id;
		document.getElementById("nomeprog").value = separado[0];
		document.getElementById("dataprog").value = separado[1];
		document.getElementById("banana").innerHTML = 'Editando a tarefa:<b style="color:red;">'+separado[0]+'</b>?';
	}
	function editar(){
		$('#buttontodoedit').click(function(){
			var id = $("#idprog").val();
			var nome = $("#nomeprog").val();
			var data = $("#dataprog").val();
			var situacao = $("#situacaoprog").val();
			if(nome !==''){
				var dados = {
					id:id,
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
			document.getElementById('modaleditprog').style.display = "none";
			});
	}
	// ALERTFY
	function updatetotodo(idpar){
		alertify.error(idpar + '|| Mudado para To Do ');
		var helper = 1;
		var dados = {banana:idpar, condition:helper}
		$.post('php/updateprog.php',dados,function(retorna){
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
		$.post('php/updateprog.php',dados,function(retorna){
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