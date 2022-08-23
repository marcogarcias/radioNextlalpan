<?php
//header("Content-Type: text/html;charset=utf-8");

class Utils{

	
	/**
	 * obtiene la sección del "head" de admninistración
	 * @param String $str indica el string o array a limpiar
	 */
	public static function headPageAdmin(){ ?>
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<meta charset="UTF-8" />
				<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<title>SECCION DE ADMINISTRADOR</title>
				<link href="../../public/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
				<!-- <link href="../../css/galDinAdmin01.css" rel="stylesheet" /> -->
				<link href="../../public/css/adm.css" rel="stylesheet" />
				<link rel="shortcut.icon" href="img/varios/logoRadioIcono01.ico" type="image/x-icon" />
				<script src="../../public/js/jquery-1.12.0.js"></script>
				<script src="../../public/libs/bootstrap/js/bootstrap.min.js"></script>
				<script src="../../public/libs/jquery.ui/jquery-ui.min.js"></script>
				<script src="../../public/js/Form.js"></script>
				<script src="../../public/js/adm.js"></script>
			</head>	
	<?php
	}

	/**
	 * obtiene la sección "header" con el texto que llega por parámetro
	 * @param String $txt indica el título que tendrá el "header"
	 */
	public static function getHeaderAdmin($txt=null){ ?>
		<header>
			<div class="row">
				<h1><?php echo $txt; ?></h1>
			</div>
		</header>
	<?php
	}

	/**
	 * obtiene la sección del "nav" con el menú de las secciones de admninistración. 
	 * se construye a partir de un array
	 * @param String $sec indica la sección activa
	 */
	public static function getNavAdmin($sec=null, $subSec=null, $param1=null){
		$menu = array('dashboard'=>array('title'=>'Dashboard', 'url'=>'index.php'),
			'patrocinadores'=>array('title'=>'Patrocinadores', 'dropdown'=>
														array('addPatrocinadores'=>array('title'=>'Agregar', 'url'=>'patrocinadoresAdd.php'),
															'listPatrocinadores'=>array('title'=>'Listar', 'url'=>'patrocinadoresList.php'),
															'order'=>array('title'=>'Modificar orden', 'url'=>'patrocinadoresChangeOrder.php'))),
			'slider'=>array('title'=>'Slider Principal', 'dropdown'=>
														array('add'=>array('title'=>'Agregar', 'url'=>'#'),
															'list'=>array('title'=>'Listar', 'url'=>'#'),
															'order'=>array('title'=>'Modificar orden', 'url'=>'#'))),
			'programacion'=>array('title'=>'Programación', 'dropdown'=>
														array('add'=>array('title'=>'Agregar', 'url'=>'#'),
															'list'=>array('title'=>'Listar', 'url'=>'#'))));
	 ?>
	 	<nav>
			<ul class="nav nav-pills">
			<?php
			foreach($menu as $k => $val) { 
				$active = $k==$sec ? 'active' : null;
				$dropdpwn = isset($val['dropdown']) && is_array($val['dropdown']) && count($val['dropdown']) ? true : false;
				$dropdpwnA = $dropdpwn ? 'class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"' : '';
				?>
				<li role="presentation" class="<?php echo $active.' '.($dropdpwn ? 'dropdpwn' : ''); ?>">
					<a href="<?php echo isset($val['url']) ? $val['url'] : '#'; ?>" <?php echo $dropdpwnA; ?>>
						<?php echo $val['title']; ?>
						<?php echo $dropdpwn ? '<span class="caret"></span>' : ''; ?>
					</a>
				<?php
					if($dropdpwn){
						echo '<ul class="dropdown-menu">';
						foreach ($val['dropdown'] as $k_ => $val_) {
							$activeSub = $k_==$subSec ? 'active' : null;
							echo '<li class="'.$activeSub.'"><a href="'.(isset($val_['url']) ? $val_['url'] : '#').'">'.$val_['title'].'</a></li>';
						}
						echo '</ul>';
					}
				?>
				</li>
			<?php
			}
			?>	
			</ul>
		</nav>
	<?php
	}
	/**
	 * obtiene los datos del usuario (información)
	 * 
	 */	
	public static function getUserDataAdmin(){
		$email = isset($_SESSION["email"]) ? $_SESSION["email"] : null;
		$nombre = isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : null;
		$ap = isset($_SESSION["ap"]) ? $_SESSION["ap"] : null;
		$am = isset($_SESSION["am"]) ? $_SESSION["am"] : null; ?>
		<div class="row">
			<div class="col-md-12">
				<div class="dropdown userData">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuDivider" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
						<?php echo $email; ?> 
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
						<li><a href="#">Nombre: <?php echo $nombre; ?></a></li>
						<li><a href="#">AP: <?php echo $ap; ?></a></li>
						<li><a href="#">AM: <?php echo $am; ?></a></li>
						<li role="separator" class="divider"></li>
						<li><a href="#">Editar</a></li>
						<li><a href="logout.php">Salir</a></li>
					</ul>
				</div>
			</div>
		</div>
		<hr style="height:1px; background-color:#337AB7;" />
<?php
	}

	public static function getFooterAdmin(){ ?>
		<footer>
			<div class="row">
				Radio Nextlalpan 2016
			</div>
		</footer>
<?php
	}
	/**
	 * retorna un array asociativo o numérico extrayendo los datos de una consulta sql
	 * @param Object $result objeto que contiene la consulta sql
	 * @param String $assoc indica que columna será el índice del array. Si no se especifica alguno será un array numérico
	 * 
	 */
	public static function sqlToArray($result=null, $assoc=false){
		$res = array();
		if($result){
			while ($fila = $result->fetch_assoc()) {
				$assoc ? $res[$fila[$assoc]] = $fila
					: array_push($res, $fila);
			}
			//$result->close();
		}
		return $res;
	}
	/**
	 * retorna un array asociativo o numérico extrayendo los datos de una consulta sql
	 * @param Array $list lista de datos (array) que contienen los valores de los opcions. Ejemplo: array(1=>array('idEstado'=>1, 'estado'=>'mexico'), 1=>array('idEstado'=>2, 'estado'=>'puebla'));
	 * @param String $valOpt indica el índice de la lista que contendrá el valor "value" de los options,
	 *		si no se le manda alguno toma el índice port defecto de la lista
	 * @param String $txtOpt indica el índice de la lista que contendrá el texto a mostrar de los options
	 *		si no se le manda alguno toma el índice por defecto de la lista
	 * @param String $selected se busca dicho valor en la lista y al encontrarlo pone un "selected" en el option
	 * 
	 */
	public static function getSelectOptions($list=null, $valOpt=null, $txtOpt=null, $selected=null){
		$options = '<option value="0" '.($selected ? '' : 'selected').'>Elija una opción</option>';
		if(is_array($list) && count($list)){
			foreach($list as $k => $v){
				$val = $valOpt ? $v[$valOpt] : $k;
				$txt = $txtOpt ? $v[$txtOpt] : $k;
				$options.='<option value="'.$val.'" '.($val==$selected ? 'selected' :'').'>'.$txt.'</option>';
			}
		}
		return $options;
	}
	/**
	 * retorna el valor recuperado de una petición post
	 * @param Array $post  post/array que contiene los valores a recuperar
	 * @param String $idx  indica el index a recuperar del post/array asociativo
	 *
	 */
	public static function getIndexPost($post = null, $idx=''){
		return isset($post[$idx]) && $post[$idx] ? $post[$idx] : false;
	}

	/**
	 * mueve un archivo mandando por post a una dirección dada
	 * @param Array $file variable del formulario que tiene los datos del archivo subido. Ejm: $_File['logo']
	 * @param String $dirTo indica la dirección a donde se copiará/moverá el archivo subido
	 * @param String $rules indica las reglas a considerar para mover el archivo a la ubicación dada. 
	 	EJM: $rules['formats'] = 'image/jpeg|image/gif|image/png'; indica el tipo de archivo que puede ser para poder ser movido con éxito.
	 	 	$rules['sizeMaxKb'] = '200'; indica el tamaño máximo del archivo para poder ser subido.
	 	 	$rules['dimensionsMin'] = '450|150'; indica el ancho/alto mínimo del archivo para poder ser subido.
	 	 	$rules['dimensionsMax'] = '2700|900'; indica el ancho/alto máximo del archivo para poder ser subido.
	 *
	 */
	public static function updateFile($file=null, $dirTo=null, $rules=array()){
		$fileData = array('res'=>0, 'resMsg'=>'Por comprobar archivo.');
		$fileTmp = isset($file['tmp_name']) && $file['tmp_name'] ? $file['tmp_name'] : null;
		$nameFile = isset($file['name']) && $file['name'] ? $file['name'] : null;
		$dirTo = isset($dirTo) && $dirTo ? $dirTo : null;
		$dirFull = null;
		$format = isset($file['type']) && $file['type'] ? $file['type'] : null;
		$size = isset($file['size']) && $file['size'] ? $file['size'] : 0;
		$size = $size / 1024;

		$formats = isset($rules['formats']) && $rules['formats'] ? $rules['formats'] : 'image/jpeg';
		$sizeMax = isset($rules['sizeMaxKb']) && $rules['sizeMaxKb'] ? $rules['sizeMaxKb'] : 2048;
		$dimMin = isset($rules['dimensionsMin']) && $rules['dimensionsMin'] ? $rules['dimensionsMin'] : '10|10';
		$dimMax = isset($rules['dimensionsMax']) && $rules['dimensionsMax'] ? $rules['dimensionsMax'] : '2500|2500';
		$resize = isset($rules['resize']) && $rules['resize'] ? $rules['resize'] : '990|300';

		if($file && $dirTo){
			if(is_uploaded_file($fileTmp)){
				if(is_file($fileTmp)){
					// comprobando que sea un tipo de archivo indicado en el array "$rules"
					$formats = explode('|', $formats);
					if(in_array($format, $formats)){
						// verificando que el tamaño no supere al indicado en el índice "sizeMaxKb" de las reglas
						if($size <= $sizeMax){
							// verificando las dimenciones mínimas/máximas permitidas
							if(self::checkDimensions($dimMin, $dimMax, $fileTmp)){
								if($format=='image/jpeg' || $format=='image/gif' || $format=='image/png')
									$fileTmp = self::resizeImage($fileTmp, $resize);
								$id = date('dmYHis');
								$nameFile = $id.'-'.$nameFile;
								$dirFull = $dirTo.'/'.$nameFile;
								if(move_uploaded_file($fileTmp, $dirFull)){
									chmod($dirFull, 0777);
									$fileData['success']=array('name'=>$nameFile, 'size'=>$file['size']);
									$fileData['res'] = 1;
									$fileData['resMsg'] = 'El archivo se subió correctamente';
								}else $fileData['resMsg'] = 'El archivo no se logró mover a la carpeta indicada';
							}else $fileData['resMsg'] = 'El archivo no tiene las medidas mínimas o máximas (ancho/alto) requeridas para ser subido.';
						}else $fileData['resMsg'] = 'El archivo supera el tamaño permitido.';
					}else $fileData['resMsg'] = 'El archivo a subir no tiene el formato correcto.';
				}else $fileData['resMsg'] = 'El archivo indicado es un archivo incorrecto.';
			}else $fileData['resMsg'] = 'El archivo no se ha subido correctamente.';
		}else $fileData['resMsg'] = 'No se ha especificado un directorio destino para subir el archivo.';
		return $fileData;
	}

	/**
	 * verifica que una imagen tenga el mínimo/máximo de ancho/alto. Si está dentro del rango devielve true de lo contrario false
	 * @param String $dimMin indica el ancho/alto mínimo de la imagen separados por el símbolo pipe
	 * @param String $dimMax indica el ancho/alto máximo de la imagen separados por el símbolo pipe
	 * @param String $file indica la ruta y nombre del archivo a subir
	 */
	public function checkDimensions($dimMin='10|10', $dimMax='2500|2500', $file=null){
		$dimMin || $dimMin='10|10';
		$dimMax || $dimMax='2500|2500';
		$res = false;
		if(is_string($dimMin) && is_string($dimMax) && is_string($file) && is_file($file)){
			// obteniendo el width/height mínimos
			$dimMin = explode('|', $dimMin);
			$dimMinW = isset($dimMin[0]) && is_numeric($dimMin[0]) ? intval($dimMin[0]) : 10;
			$dimMinH = isset($dimMin[1]) && is_numeric($dimMin[1]) ? intval($dimMin[1]) : 10;

			// obteniendo el width/height máximos
			$dimMax = explode('|', $dimMax);
			$dimMaxW = isset($dimMax[0]) && is_numeric($dimMax[0]) ? intval($dimMax[0]) : 2500;
			$dimMaxH = isset($dimMax[1]) && is_numeric($dimMax[1]) ? intval($dimMax[1]) : 2500;
			
			// obteniendo el width/height de la imagen
			$fileInfo = getimagesize($file);
			$width = $fileInfo[0];
			$height = $fileInfo[1];
			if(($width >= $dimMinW && $height >= $dimMinH) && ($width <= $dimMaxW && $height <= $dimMaxH)){
				$res = true;
			}
		}
		return $res;
	}

	/**
	 * redimenciona una imagen de acuerdo a las dimenciones dadas
	 * @param String $file indica la url y nombre de la imagen a redimencionar
	 * @param String $width indica el ancho al cual se redimencionará la imagen
	 * @param String $height indica el alto al cual se redimencionará la imagen
	 *
	 */
	public function resizeImage($file = null, $resize=null){
		$resize || $resize = '900|300';
		if(is_file($file)){
			$destiny = $file;
			$resize = explode('|', $resize);
			$width = isset($resize[0]) && is_numeric($resize[0]) ? intval($resize[0]) : 900;
			$height = isset($resize[1]) && is_numeric($resize[1]) ? intval($resize[1]) : 300;
			$fileInfo = getimagesize($file);
			$widthFile = $fileInfo[0];
			$heightFile = $fileInfo[1];
			$mime = $fileInfo['mime'];
			$quality = 100;
			//Creamos una variable imagen a partir de la imagen original
			chmod($file, 0777);
			switch ($mime) {
				case 'image/jpeg':
					$fileNew = imagecreatefromjpeg($file);		
					break;
				case 'image/gif':
					$fileNew = imagecreatefromgif($file);		
					break;
				case 'image/png':
					$fileNew = imagecreatefrompng($file);
					break;
				default:
					$fileNew = imagecreatefromjpeg($file);
					break;
			}	
			//Creamos una imagen en blanco de tamaño $width por $height.
			$tmp=imagecreatetruecolor($width, $height);	
	
			//Copiamos $fileNew sobre la imagen que acabamos de crear en blanco ($tmp)
			imagecopyresampled($tmp, $fileNew, 0, 0, 0, 0, $width, $height, $widthFile, $heightFile);
	
			//Se destruye variable $fileNew para liberar memoria
			imagedestroy($fileNew);
			//chmod($tmp, 0777);
			//Se crea la imagen final en el directorio indicado
			imagejpeg($tmp, $file, $quality);			
		}
		return $file;
	}
	/**
	  * retorna la estructura de una tabla con drag and drop sobre sus filas.
	  * La tabla es llenada de a cuerdo con la estructura del array enviado "@listContent"
	  * @param Array $listContent indica el array con la información necesaria para llenar la tabla con el contenido.
	  * 	Incliuye un id para la tabla si se quierte especificar, las clases que se le quieren
	  *		agregar a la tabla, el titulo de las columnas que tendrá la tabla (thead) y
	  *		el contenido del cuerpo de la tabla (tbody). La estructura del array es:
	  * $listContent= array(
			'idTable'=>'slider1Order', // id que tendrá la tabla. No es obligatorio
			'classT'=>'table-bordered table-hover table-condensed', // clases que tendrá la tabla: [table-bordered: pone bordes a la tabla, columnas y filas], [table-hover: se ilumnina la fila al pasar el puntero sobre ella], [table-condensed: hace la tabla mas estrecha.]. No es obligatorio.
			'thead'=>array('Orden', 'Nombre', 'Favorito', 'Vegetariano'), // titulo de las columnas que tendrá la tabla. No es obligatorio.
			'tbody'=>array(array(1, 'George Washington', 'Apple', 'N', 'idRow'=>50), contendio de la tabla. Si es obligatorio. El índice "idRow" indica el id que tiene la fila, no es el orden de la tabla.
				array(2, 'John Adams', 'Pear', 'Y', 'idRow'=>10),
				array(3, 'Thomas Jefferson', 'Banana', 'Y', 'idRow'=>15),
				array(4, 'Ben Franklin', 'Kumquat', 'N', 'idRow'=>102)));
	  */
	public static function getTableSorteable($listContent=array()){
		$list = $listContent;
		$table='Sin datos que mostrar.';
		$classT = isset($list['classT']) ? $list['classT'] : '';
		$thead = $tbody = $tbody_ = $class = $data = null;
		$id = isset($list['idT']) ? $list['idT'] : '';
		$cont=0;
		if(count($list) && isset($list['tbody']) && count($list['tbody'])){
			// creando el "thead" de la tabla si es que se ha especificado
			if(isset($list['thead'])){
				foreach ($list['thead'] as $k => $v)
					$thead.='<th>'.$v.'</th>';
			}
			// creando el "tbody" de la tabla si es que se ha especificado
			foreach ($list['tbody'] as $k => $v){
				foreach ($v as $k_ => $v_){
					$class= !$cont ? 'class="priority"' : '';
					$k_ == 'idRow' && $data = $v_;
					$k_ !== 'idRow' && ($tbody_.='<td '.$class.'>'.$v_.'</td>');
					$cont = 1;
				}
				$tbody.='<tr data-idRow="'.$data.'">'.$tbody_.'</tr>';
				$tbody_='';
				$cont = 0;
			}
			// comprobando que la tabla tenga contenido
			if($tbody){
				$table = 
					'<div class="table-responsive">
						<table class="table '.$classT.'" id="'.$id.'">'
							.($thead ? '<thead><tr>'.$thead.'</tr></thead>' : '' ).
							'<tbody><tr>
								'.$tbody.'	
							</tr></tbody>
						</table>
					</div>';
			}
		}
		return $table;
	}

	/**
	  * obtieneprimero una lista con los registros de la base de datos de los logos 
	  * del slider visibles, posteriormente formatea el array cambiando la estructura
	  * @param Object $obj indica un objeto de la clase Patrocinadores, si no
	  * 	se indica se crea.
	  */
	public static function getListForTable($obj=null){
		$obj = $obj ? $obj : $patr = new PatrocinadoresCtrl();
		$imgMin;
		$tableCont = array(
			'idT'=>'slider1Order',
			'classT'=>'table-hover',
			'thead'=>array('ORDEN', 'PATROCINADOR', 'IMAGEN', 'MINIATURA'),
			'tbody'=>array());
		// extrayendo los registros de los patrocinadores
		$cols = 'p.idPatrocinadores, p.sliderOrder, p.nombre, p.logoName, p.logoUrl';
		$filter = 'AND p.sliderVisible=1 ORDER BY p.sliderOrder ASC';
		$sliderPatr = $obj->getImgsSlider1Actives(null, $cols, $filter);
		// dando formato al array para mandarlo a la función que crea la tabla sorteable
		foreach ($sliderPatr as $k => $v) {
			$imgMin = '<img src="../../'.$v['logoUrl'].'/'.$v['logoName'].'" class="logoPatrocinador" width="250" height="90" data-toggle="modal" data-target=".bs-example-modal-lg" />';
			$tableCont['tbody'][]=array($v['sliderOrder'], $v['nombre'], $v['logoName'], $imgMin, 'idRow'=>$v['idPatrocinadores']);
		}
		return $tableCont;
	}

	/**
	 * Limpia el string de entradas html, javascript, styles y comentarios
	 * @param String $str indica el string o array a limpiar
	 */
	public static function cleanStr($str=null){
		$output;
		if($str){
			$search = array(
		    	'@<script [^>]*?>.*?@si',            // Strip out javascript
		    	'@< [/!]*?[^<>]*?>@si',            // Strip out HTML tags
		    	'@<style [^>]*?>.*?</style>@siU',    // Strip style tags properly
		    	'@< ![sS]*?--[ tnr]*>@'         // Strip multi-line comments
		  	);
		 
		    $output = preg_replace($search, '', $str);
		}
		return $output;
	}

	/**
	 * Sanitiza agregando una contrabarra a las comillas simples, dobles, backslash y carácteres null
	 * @param String $str indica el string o array a limpiar
	 */
	public static function sanitize($link=null, $str=null){
		$output;
		if($link && $str){
			if (is_array($str)) {
				foreach($str as $var=>$val) {
					$output[$var] = self::sanitize($link, $val);
				}
			}else {
				if (get_magic_quotes_gpc()) {
					$str = stripslashes($str);
				}
				$str  = self::cleanStr($str);
				$output = mysqli_real_escape_string($link, $str);
				var_dump($output);
			}
		}
		return $output;
	}

	public function echo_($str=null){
		echo '<pre>';
		print_r($str);
		echo '</pre>';
	}
}
?>