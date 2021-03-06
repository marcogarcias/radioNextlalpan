<?php session_start(); ?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan/app/paths.php';
$appPath = PATH.'/app';
$ctrlPath = PATH.'/app/controller';
require_once $appPath.'/Utils.php';
require_once $ctrlPath.'/login/LoginCtrl.php';
require_once $ctrlPath.'/patrocinadores/PatrocinadoresCtrl.php';
$loginCtrl = new LoginCtrl();

if(isset($_POST) && isset($_POST['patrocinador'])){
	$patr = new PatrocinadoresCtrl();
	//$patrocinadores->addPatrocinadores($_POST, $_FILES);
	die('...');
}else
	$loginCtrl->checkActiveSessionCtrl('login');

$patr = new PatrocinadoresCtrl();
$tableCont = Utils::getListForTable($patr);

$error = isset($_SESSION["resSubmit"]['error']) ? $_SESSION["resSubmit"]['error'] : null;
$hide = $error ? '' : 'hide';
$msg = isset($_SESSION["resSubmit"]['msg']) ? $_SESSION["resSubmit"]['msg'] : null;


Utils::headPageAdmin();
?>

<body>
<?php 
/*
$tableCont = array(
	'idT'=>'slider1Order',
	'classT'=>'table-bordered table-hover table-condensed',
	'thead'=>array('Orden', 'Nombre', 'Favorito', 'Vegetariano'), 
	'tbody'=>array(
				array(1, 'George Washington', 'Apple', 'N'),
				array(2, 'xxxxxxx', 'Apple', 'N')));*/

Utils::getHeaderAdmin('RADIO NEXTLALPAN - management');
Utils::getNavAdmin('patrocinadores', 'order');
$table = Utils::getTableSorteable($tableCont);
?>

<section>
	<article>
<?php Utils::getUserDataAdmin(); ?>
	</article>

	<article>
		<div class="row">
			<div class="col-md-12">
				<div id="msg"></div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><strong>Ordenar imágenes del slider</strong></div>
					<div class="panel-body">
					<?php echo $table; ?>
					<button id="btnSaverOrder" class="btn btn-primary">Guardar orden</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg">
				<div class="modal-content" id="logoPatrocinadorDiv">
					<img src="#" width="990" height="225" />
				</div>
			</div>
		</div>
	</article>
</section>

<?php Utils::getFooterAdmin(); ?>
<script>
$(document).ready(function(){
	// http://www.avtex.com/blog/2015/01/27/drag-and-drop-sorting-of-table-rows-in-priority-order/
	
	//Helper function to keep table row from collapsing when being sorted
	var fixHelperModified = function(e, tr) {
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index){
			$(this).width($originals.eq(index).width())
		});
		return $helper;
	};
	//Make diagnosis table sortable
	$("#slider1Order tbody").sortable({
		helper: fixHelperModified,
		stop: function(event,ui) {
			renumber_table('#slider1Order')
		}
	}).disableSelection();
	//Delete button in table rows
	//$('table').on('click','.btn-delete',function() {
	//	tableID = '#' + $(this).closest('table').attr('id');
	//	r = confirm('Delete this item?');
	//	if(r) {
	//		$(this).closest('tr').remove();
	//		renumber_table(tableID);
	//	}
	//});

	$('#btnSaverOrder').on('click', function(){
		/*$('#slider1Order').each(function(idx){
			console.log(idx);
		});*/
		var count = 1;
		var totalRow = $("#slider1Order tbody").children().length;
		var msg = { false:{ 'class': 'danger', 'icon':'remove', 'msg':'Ocurrió un error, no se pudo cambiar el orden de los patrocinadores.' },
					true:{ 'class': 'success', 'icon':'ok', 'msg':'El orden de los patrocinadores cambió correctamente.' }};
		var result = true;
		var msgDiv = '<div class="alert alert-#class#" role="alert">'+
						'<span class="glyphicon glyphicon-#icon#" aria-hidden="true"></span>'+
						'&nbsp;#msg#'+
					'</div>';
		$("#slider1Order tbody tr").each(function (index) {
			var id = $(this).data('idrow');
			var order = $(this).find('.priority').text();
			$.ajax({
				dataType: "json",
				data: {'func':'updateOrderSlider1', 'param1':id, 'param2':order},
				url:   'ajaxAdmin.php',
				type:  'post',
				beforeSend: function(){
					// lo que se hará antes de mandar la petición ajax
				},
				success: function(res){
					// orden guardado
					if(id){
						result && (result = res);
						if(totalRow==count){
							msgDiv = msgDiv.replace('#class#', msg[result].class);
							msgDiv = msgDiv.replace('#msg#', msg[result].msg);
							msgDiv = msgDiv.replace('#icon#', msg[result].icon);
							$('#msg').empty().html(msgDiv);
						}
					}
					count++;
				},
				error:    function(xhr,err){
					console.log("Ocurrio un error, intentelo nuevamente:", xhr);
				}
			});	
		});

		//$('.alert').fadeIn('100000', function(){ console.log('momo'); });
		/*$.ajax({
			dataType: 'json',
			data: {'func':'saveOrderSlider1', 'param1': '', 'param2':''},
			url: 'ajaxAdmin.php',
			type: 'post',
			beforeSend: function(){

			},
			success: function(res){

			},
			error: function(xhr, err)(

			)
		});*/
	});

	$('.logoPatrocinador').on('click', function(){
		var src = $(this).attr('src');
		$('#logoPatrocinadorDiv img').attr('src', src);
	});
});
//Renumber table rows
function renumber_table(tableID) {
	$(tableID + " tr").each(function() {
		count = $(this).parent().children().index($(this));
		$(this).find('.priority').text(count);
	});
}
</script>
</body>
</html>