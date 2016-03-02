<?php
	// variables
	$id;
	$nom;
	
	$id=$_GET["id"];
	
	if($id==1){
		$nom="Presidencia Municipal";
	}
	else if($id==2){
		$nom="Sindicatura Municipal";
	}
	else if($id==3){
		$nom="Primera Regiduria";
	}
	else if($id==4){
		$nom="Segunda Regiduria";
	}
	else if($id==5){
		$nom="Tercera Regiduria";
	}
	else if($id==6){
		$nom="Cuarta Regiduria";
	}
	else if($id==7){
		$nom="Quinta Regiduria";
	}
	else if($id==8){
		$nom="Sexta Regiduria";
	}
	else if($id==9){
		$nom="Septima Regiduria";
	}
	else if($id==10){
		$nom="Octava Regiduria";
	}
	else if($id==11){
		$nom="Novena Regiduria";
	}
	else if($id==12){
		$nom="Décima Regiduria";
	}
	else if($id==13){
		$nom="Secretaría del H. Ayuntamiendo";
	}
	else if($id==14){
		$nom="Tesorería";
	}
	else if($id==15){
		$nom="Dirección de Obras Públicas";
	}
	else if($id==16){
		$nom="Contraloría Interno Municipal";
	}
	else if($id==17){
		$nom="Dirección de Seguridad Pública y Protección Civil";
	}
	else if($id==18){
		$nom="Dirección de Catastro Municipal";
	}
	else if($id==19){
		$nom="Dirección de Desarrollo Urbano";
	}
	else if($id==20){
		$nom="Direcció Administrativo del Agua Potable";
	}
	else if($id==21){
		$nom="Dirección Operativa de Agua Potable";
	}
	else if($id==22){
		$nom="Dirección de Limpia";
	}
	else if($id==23){
		$nom="Dirección de Desarrollo Social";
	}
	else if($id==24){
		$nom="Dirección de Ecología";
	}
	else if($id==25){
		$nom="Oficialía Conciliadora y Calificadora";
	}
	else if($id==26){
		$nom="Oficialía Conciliadora y Calificadora";
	}
	else if($id==27){
		$nom="Dirección de Desarrollo Agropecuario";
	}
	else if($id==28){
		$nom="Dirección de Educación";
	}
	else if($id==29){
		$nom="Dirección del Instituto de la Mujer";
	}
	else if($id==30){
		$nom="Dirección de Regulación Comercial y de Servicios";
	}
	else if($id==31){
		$nom="Dirección de Desarrollo Turístico y Artesanal";
	}
	else if($id==32){
		$nom="Dirección de Instituto Municipal de Cultura Física y Deporte de Axapusco";
	}
	else if($id==33){
		$nom="Dirección de Parque Vehícular y Recursos Materiales";
	}
	else if($id==34){
		$nom="Dirección de Casa de Cultura";
	}
	else if($id==35){
		$nom="Dirección de Comunicación Social";
	}
	else if($id==36){
		$nom="Dirección de Recursos Humanos y Desarrollo del Personal";
	}
	else if($id==37){
		$nom="Dirección de Derechos Humanos";
	}
	else if($id==38){
		$nom="Dirección de Desarrollo Integral de la Familia (DIF)";
	}
	else if($id==39){
		$nom="Dirección de Desarrollo económico";
	}
	else if($id==40){
		$nom="Dirección de Asuntos Metropolitanos";
	}
?>

<form class="formDirectorio">
	<span>Mandando mensaje a <?php echo $nom; ?></span>
	<hr />
	
	<label for="dirUsu">Digite su nombre: </label>
	<input type="text" id="dirUsu" name="dirUsu" value="" placeholder="Digite su nombre" />
	<div></div>
	
	<label for="dirCorE">Digite su Correo electr&oacute;nico: </label>
	<input type="text" id="dirCorE" name="dirCorE" value="" placeholder="Digite su correo electr&oacute;nico" />
	
	<label for="dirTel">Digite su tel&eacute;fono: </label>
	<input type="text" id="dirTel" name="dirTel" value="" placeholder="Digite su tel&eacute;fono" />
	
	<label for="dirCom">Seleccione su comunidad: </label>
	<select id="dirCom" name="dirCom">
		<option value="OTRO" selected>OTRO</option>
		<option value="GUADALUPE RELINAS">GUADALUPE RELINAS</option>
		<option value="SAN FELIPE ZACATEPEC">SAN FELIPE ZACATEPEC</option>
		<option value="SAN ANTONIO COAYUCA">SAN ANTONIO COAYUCA</option>
		<option value="RANCHERIA ZACATEPEC">RANCHERIA ZACATEPEC</option>
		<option value="SAN PABLO XUCHITL">SAN PABLO XUCHITL</option>
		<option value="SANTA CRUZ TLAMAPA">SANTA CRUZ TLAMAPA</option>
		<option value="SAN NICOLAS TETEPANTLA">SAN NICOLAS TETEPANTLA</option>
		<option value="TEZONCALLI">TEZONCALLI</option>
		<option value="SANTO DOMINGO AZTACAMECA">SANTO DOMINGO AZTACAMECA</option>
		<option value="ATLA TECUAUTITLAN">ATLA TECUAUTITLAN</option>
		<option value="XALA">XALA</option>
		<option value="FRACCIONAMIENTO XALA">FRACCIONAMIENTO XALA</option>
		<option value="SANTA ANA">SANTA ANA</option>
		<option value="SAN MIGUEL OMETUSCO">SAN MIGUEL OMETUSCO</option>
		<option value="SAN ANTONIO OMETUSCO">SAN ANTONIO OMETUSCO</option>
		<option value="BARRIO AXAPUSCO">BARRIO AXAPUSCO</option>
		<option value="BARRIO SAN MARTIN">BARRIO SAN MARTIN</option>
		<option value="BARRIO SAN ANTONIO">BARRIO SAN ANTONIO</option>
		<option value="SAN BARTOLO ALTO">SAN BARTOLO ALTO</option>
		<option value="SAN BARTOLO BAJO">SAN BARTOLO BAJO</option>
		<option value="HUEYAPAN">HUEYAPAN</option>
		<option value="CONAZA (UNIDAD HABITACIONAL)">CONAZA (UNIDAD HABITACIONAL)</option>
		<option value="COL. CUAUHTEMOC">COL. CUAUHTEMOC</option>
		<option value="SANTA MARIA ACTIPAC">SANTA MARIA ACTIPAC</option>
		<option value="JALTEPEC">JALTEPEC</option>
	</select>
	
	<label for="dirAsu">Asunto: </label>
	<input type="text" id="dirAsu" name="dirAsu" value="" placeholder="Asunto" />
	<div></div>
	
	<label for="dirMen">Mensaje, queja o sugerencia: </label>
	<textarea id="dirMen" name="dirMen" rows="4" placeholder="Mensaje, queja o sugerencia"></textarea>
	<div></div>
	
	<hr />
	<p>
		<input type="button" value="Enviar" class="boton01" onclick="formDirMandarMensaje(<?php echo $id; ?>);" /> <input type="button" value="Cancelar" class="boton01" onclick="cerrarVentanaModal();" />
	</p>
</form>