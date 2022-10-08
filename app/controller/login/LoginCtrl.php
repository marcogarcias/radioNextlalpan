<?php
if(session_id() == '') session_start();

//$serv = $_SERVER['DOCUMENT_ROOT'];
//$pathFile = is_dir($serv) ? $serv : $_SERVER['DOCUMENT_ROOT'].'/radioNextlalpan';
//$pathFile = $pathFile.'/app/paths.php';
//require_once $pathFile;
if($_SERVER['SERVER_NAME'] == "localhost"){
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}/radioNextlalpan");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}/radioNextlalpan");
}else{
  defined("ROOT_PATH") || define('ROOT_PATH', "{$_SERVER['DOCUMENT_ROOT']}");
  defined("URL_PATH") || define('URL_PATH', "http://{$_SERVER['HTTP_HOST']}");
}
require_once ROOT_PATH.'/app/model/login/LoginMd.php';

class LoginCtrl{
	public $model;
	private $path;

	public function __construct(){
		$this->model = new LoginMd();
		$this->path = '../../php/administracion';
		//$this->path = '../../php/administracion';
	}
/**
  * verifica que el usuario exista y que coincida el password
  *
  */
	public function checkUserLoginCtrl($post = null){
		if($post){
			$loginMd = $this->model;
			$email = isset($post['email']) ? $post['email'] : '';
			$pass = isset($post['pass']) ? $post['pass'] : '';
			$res = (object)$loginMd->checkUserLoginMd($email);
			if(is_object($res) && $res->password){
				// comprobando si el password del formulario es el mismo que el de la bd
				if($res->password == $pass){
					self::setSession($res);
					header('location: ' .$this->path.'/index.php');
					exit;
				}else
					$_SESSION["resSubmit"] = array('error' => 'danger', 'msg'=>'Contraseña inválida.');
			}else 
				$_SESSION["resSubmit"] = array('error' => 'danger', 'msg'=>'Correo electrónico inválido.');
			header('location: ' .$this->path.'/login.php');
		}
		return get_defined_vars ();
	}
/**
  * inicializa las variables de sesión de acuerdo a los datos del objeto del usuario
  * @param Object $user indica el objeto del usuario 
  */
	private static function setSession($user){
		if(is_object($user) && $user->password){
			$_SESSION["idUser"]=$user->idUser;
			$_SESSION["nombre"]=$user->nombre;
			$_SESSION["ap"]=$user->ap;
			$_SESSION["am"]=$user->am;
			$_SESSION["email"]=$user->email;
			$_SESSION["pass"]=$user->password;
			$_SESSION["permisos"]=$user->permisos;
			$_SESSION["grupo"]=$user->gru_grupo;
			$_SESSION["grupoPermisos"]=$user->gru_permisos;
		}
	}
	/**
	 * verifica si hay datos de usuario en la sesión, si no existen retorna a la vista del login
	 */
	public function checkActiveSessionCtrl($sessionFail = null, $sessionSuccess = null){
		if(!isset($_SESSION["idUser"]) || !$_SESSION["idUser"] || 
			!isset($_SESSION["email"]) || !$_SESSION["email"] || 
			!isset($_SESSION["pass"]) || !$_SESSION["pass"]){
			// si hay datos faltantes de la sesión, se destruye la misma. 
			// Si se especifica una url para redireccionar ("sessionFail") se redirecciona
			self::sessionDestroy();
			if($sessionFail){
				header('location: ' .$this->path.'/'.$sessionFail.'.php');
				exit;
			}
		}else{
			// si la sesión es correcta y si se especificó una url ($sessionSuccess) se 
			// procede a redireccionar
			if($sessionSuccess){
				header('location: ' .$this->path.'/'.$sessionSuccess.'.php');
				exit;
			}	
		}
	}

	/**
	 * se cierra la sesión del usuario
	 */
	public function logout(){
		self::sessionDestroy();
		header('location: ' .$this->path.'/login.php');
		exit;
	}
	/**
	 * destruye una sesión activa
	 * fuente: http://www.cristalab.com/tutoriales/eliminar-sesiones-en-php-5.3.5-c96438l/
	 */
	public function sessionDestroy(){
		session_destroy();
		$paramCoockies = session_get_cookie_params();
		setcookie(session_name(), 0, 1, $paramCoockies["path"]);
	}
}
?>