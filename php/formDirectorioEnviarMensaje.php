<?php
	// variables
	$id=$usuario=$de=$tel=$com=$asunto=$mensaje02=$para=$headers=$headers02="";
	
	// comprobando que la variable "id" tenga contenido
	if(isset($_POST["id"])){
		if($_POST["id"]==1)
			$para="gilbertoramirez.presidente@axapusco.gob.mx";
		else if($_POST["id"]==2)
			$para="josejuancoronel.sindico@axapusco.gob.mx";
		else if($_POST["id"]==3)
			$para="nicolaselizaldemendieta.regidor@axapusco.gob.mx";
		else if($_POST["id"]==4)
			$para="martinsoteroecheverria.regidor@axapusco.gob.mx";
		else if($_POST["id"]==5)
			$para="jorgeborjacruz.regidor@axapusco.gob.mx";
		else if($_POST["id"]==6)
			$para="blancaamaliaborja.regidora@axapusco.gob.mx";
		else if($_POST["id"]==7)
			$para="normaangelicamartinez.regidora@axapusco.gob.mx";
		else if($_POST["id"]==8)
			$para="andresramirezespinoza@axapusco.gob.mx";
		else if($_POST["id"]==9)
			$para="juanolmedogarcia.regidor@axapusco.gob.mx";
		else if($_POST["id"]==10)
			$para="patriciaaracelirodriguez.regidora@axapusco.gob.mx";
		else if($_POST["id"]==11)
			$para="julianalvareztexocotitla.regidor@axapusco.gob.mx";
		else if($_POST["id"]==12)
			$para="juanortegaramos.regidor@axapusco.gob.mx";
		else if($_POST["id"]==13)
			$para="hugoalbertolira.secretario@axapusco.gob.mx";
		else if($_POST["id"]==14)
			$para="juangonzalez.tesorero@axapusco.gob.mx";
		else if($_POST["id"]==15)
			$para="raulaguilarillan.director@axapusco.gob.mx";
		else if($_POST["id"]==16)
			$para="arlethcoronelhernandez.contralora@axapusco.gob.mx";
		else if($_POST["id"]==17)
			$para="jesussuarezmorquecho.director@axapusco.gob.mx";
		else if($_POST["id"]==18)
			$para="juandedioshernandez.director@axapusco.gob.mx";
		else if($_POST["id"]==19)
			$para="martinianogonzalezmadrigal.director@axapusco.gob.mx";
		else if($_POST["id"]==20)
			$para="armandohernandezgomez.director@axapusco.gob.mx";
		else if($_POST["id"]==21)
			$para="victorlopezroldan.director@axapusco.gob.mx";
		else if($_POST["id"]==22)
			$para="hilariodegregoriohernandez.director@axapusco.gob.mx";
		else if($_POST["id"]==23)
			$para="miriamnayelihernandez.directora@axapusco.gob.mx";
		else if($_POST["id"]==24)
			$para="pablomacariogarcia.director@axapusco.gob.mx";
		else if($_POST["id"]==25)
			$para="davidborjaalcazar.oficialconciliador@axapusco.gob.mx";
		else if($_POST["id"]==26)
			$para="";
		else if($_POST["id"]==27)
			$para="lauracamarilloromero.directora@axapusco.gob.mx";
		else if($_POST["id"]==28)
			$para="marioyescasmorales.director@axapusco.gob.mx";
		else if($_POST["id"]==29)
			$para="mariaelenagarcia.directora@axapusco.gob.mx";
		else if($_POST["id"]==30)
			$para="zenonjaenhernandez.director@axapusco.gob.mx";
		else if($_POST["id"]==31)
			$para="vicentefloresluna.director@axapusco.gob.mx";
		else if($_POST["id"]==32)
			$para="fernandoocampolopez.director@axapusco.gob.mx";
		else if($_POST["id"]==33)
			$para="miguelangelramirez.director@axapusco.gob.mx";
		else if($_POST["id"]==34)
			$para="irmamagdalenacoronel.directora@axapusco.gob.mx";
		else if($_POST["id"]==35)
			$para="ramonborjamolina.director@axapusco.gob.mx";
		else if($_POST["id"]==36)
			$para="enriquefrancoramirez.director@axapusco.gob.mx";
		else if($_POST["id"]==37)
			$para="gaudenciogarciaolmedo.director@axapusco.gob.mx";
		else if($_POST["id"]==38)
			$para="isabelgonzalezmeneses.directora@axapusco.gob.mx";
		else if($_POST["id"]==39)
			$para="joseguadalupegarcia.director@axapusco.gob.mx";
		else if($_POST["id"]==40)
			$para="mariadolorescruz.directora@axapusco.gob.mx";
		else
			$para="";
		
		// recuperando valores del formulario
		$id=$_POST["id"];
		$usuario=$_POST["dirUsu"];
		$de=$_POST["dirCorE"];
		if($de=="vacio")
			$de="anonimo@hotmail.com";
		$tel=$_POST["dirTel"];
		$com=$_POST["dirCom"];
		$asunto=$_POST["dirAsu"];
		$mensaje="\n <br />
		<div style='background: #eee; border: 3px solid #999; border-radius: 15px; padding: 15px; font-weight: bold;'>".
		"Has recibido un mensaje de: ".$usuario."<hr width='95%' />".
		"Contenido del mensaje: <p>".$_POST["dirMen"]."</p>".
		"</div>";
		
		$headers="MIME-Version:1.0;\r\n";
		$headers.="Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
		$headers.="From: ".$de." \r\n";
		$headers.="To: $para; \r\n Subject:$asunto \r\n";
		
		if(mail($para, $asunto, $mensaje, $headers)){ ?>
			<div class="formDirectorio">
				<label>GRACIAS <?php echo $usuario; ?>. se ha recibido el comentario.</label>
			<hr />
			<p>
				<input type="button" value="Cerrar ventana" class="boton01" onclick="cerrarVentanaModal();" />
			</p>
			</div>
			<?php
		}
		else{
			echo "FALLO el envio.";
		}
		// se comprueba si dejo un correo, si es el caso se le manda una contestacion a su correo
		if(!$de=="vacio"){
			$de="axapusco.gob.mx";
			$para=$de;
			$asunto="Gracias";
			$mensaje02="\n <br />
			<div style='background: #eee; border: 3px solid #999; border-radius: 15px; padding: 15px; font-weight: bold;'>".
			"Muchas gracias ".$usuario." por tu comentario, tu mensaje fue el siguiente: <hr width='95%' />".
			"Contenido del mensaje: <p>".$_POST["dirMen"]."</p>".
			"</div>";
			
			$headers02="MIME-Version:1.0;\r\n";
			$headers02.="Content-type: text/html; \r\n charset=iso-8859-1; \r\n";
			$headers02.="From: ".$de." \r\n";
			$headers02.="To: $para; \r\n Subject:$asunto \r\n";
			if(mail($para, $asunto, $mensaje02, $headers02)){ ?>
				<div class="formDirectorio">
					<label>GRACIAS <?php echo $usuario; ?>. se ha recibido el comentario.</label>
				<hr />
				<p>
					<input type="button" value="Cerrar ventana" class="boton01" onclick="cerrarVentanaModal();" />
				</p>
				</div>
				<?php
			}
			else{
				echo "FALLO el envio.";
			}
		}
	}
	else{
		echo "<h3>Error al procesar los datos.</h3>";
	}
?>