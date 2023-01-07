<?php

	class Database{

		private $conn;
		private $dbhost = "localhost";
		private $dbuser = "root";
		private $dbpass = "root";
		private $dbname = "mydb";
		
		function __construct(){
			$this->connect_db();
		}

		public function connect_db(){
			$this->conn = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos fallida" . mysqli_connect_error() . mysqli_connect_errno());
			}

		}

		

		//funcion para limpiar variables del formulario html antes de realizar inyecciones sql

		public function limpiar($var){
			$retorno = mysqli_real_escape_string($this->conn, $var);
			return $retorno;
		}	
		

		// Funciones para extraer datos de la tabla "Predio"

		//funcion para gurdar nuevos registros en la base de datos
		public function guardar_predio($clave_catastral,$clave_anterior,$cedula,$tipo,$regimen,$bloque,$piso,$unidad,$numero_predio,$observaciones){
			
			$ultimo_registro = mysqli_query($this->conn, "SELECT MAX(pro_idpropietario) AS maximo FROM propietario") or die ("Problemas en el query".mysqli_error($this->conn));
			$rs = mysqli_fetch_array($ultimo_registro);
			$numero = intval($rs['maximo']) ;	


			$sql = "INSERT INTO predio (prd_idpropietario, prd_tipo, prd_clave_catastral, prd_clave_anterior, prd_identificacion, prd_regimen_tenencia, prd_bloque, prd_piso, prd_unidad, prd_numero_predio, prd_observaciones) VALUES ('$numero', '$tipo', '$clave_catastral', '$clave_anterior', '$cedula', '$regimen', '$bloque', '$piso', '$unidad', '$numero_predio', '$observaciones')";
			$res = mysqli_query($this->conn, $sql);
			//$last_id = mysqli_insert_id($conn);
			if($res){
				return true;
			} else {
				return false;
			}
		

			mysqli_close($conn);


		}


		public function lectura_predio($id){
			$sql = "SELECT * FROM predio WHERE prd_idpredio='$id'";
			$res = mysqli_query($this->conn, $sql);
			return $res; 

			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}


		public function registro_predio($id){
			$sql = "SELECT * FROM predio WHERE prd_idpredio='$id'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}
		


		public function actualizar_predio($tipo,$regimen,$bloque,$piso,$unidad,$numero_predio,$observacion,$id){
		
			//date_default_timezone_set('America/Guayaquil'); 
			//$fecha_edicion = date('Y-m-d H:i:s');

			$sql = "UPDATE predio SET prd_tipo='$tipo', prd_regimen_tenencia='$regimen' , prd_bloque='$bloque', prd_piso='$piso', prd_unidad='$unidad', prd_numero_predio='$numero_predio', prd_observaciones='$observacion' WHERE prd_idpredio='$id'";
			$res = mysqli_query($this->conn, $sql);
			
				

			if($res){
				return true;
			}else{
				return false;
			}
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}



		public function borrar_predio($id){
			$sql = "DELETE FROM predio WHERE prd_idpredio='$id'";
			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		
		// Funciones para extraer datos de la tabla "Estatus legal"		


		public function lectura_estatus_legal($cod_predio){
			$sql = "SELECT elg_idestatus, elg_numero_predio, elg_titulo, elg_escritura, elg_celebrado_ante, elg_nombre_numero_notaria, elg_provincia_titulacion, elg_canton_inscripcion, elg_dia_protocolizacion, elg_mes_protocolizacion, elg_anio_protocolizacion, elg_registro_propiedad, elg_tomo, elg_partida, elg_dia_inscripcion_registro_propiedad, elg_mes_inscripcion_registro_propiedad, elg_anio_inscripcion_registro_propiedad, elg_area_segun_titulo, elg_unidad_medida, elg_forma_tenencia, elg_forma_adquisicion, elg_requiere_perfeccionamiento, elg_anios_sin_perfeccionamiento, elg_anios_posesion, elg_pueblo_etnia, elg_adquisicion_sin_titulo, elg_forma_adquisicion, elg_documento_presentado, elg_primer_apellido_posesionario, elg_segundo_apellido_posesionario, elg_primer_nombre_posesionario, elg_segundo_nombre_posesionario, elg_tipo_documento_posesionario, elg_identificacion_posesionario, elg_email_posesionario, elg_telefono_posesionario FROM estatus_legal WHERE elg_clave_predio = '$cod_predio'";
			$res = mysqli_query($this->conn, $sql);
			return $res; 

			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function codigo_estatus_legal($codigo){
			$sql = "SELECT elg_idestatus_legal FROM estatus_legal WHERE elg_clave_predio='$codigo'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		
		public function registro_estatus_legal($codigo){
			$sql = "SELECT * FROM estatus_legal WHERE elg_clave_predio='$codigo'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function actualizar_estatus_legal($titulo,$escritura,$juez,$notaria,$provincia,$canton,$dia,$mes,$anio,$registro,$tomo,$partida,$dia_inscripcion,$mes_inscripcion,$anio_inscripcion,$area,$unidad,$tenencia,$adquisicion,$perfeccionamiento,$sin_perfeccionamiento,$posesion,$etnia,$adquisicion_no_titulo,$doc_presentado,$primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$tipo_documento,$identificacion,$email,$telefono,$id){
			$sql = "UPDATE estatus_legal SET elg_titulo='$titulo', elg_escritura='$escritura', elg_celebrado_ante='$juez', elg_nombre_numero_notaria='$notaria', elg_provincia_titulacion='$provincia', elg_canton_inscripcion='$canton', elg_dia_protocolizacion='$dia', elg_mes_protocolizacion='$mes', elg_anio_protocolizacion='$anio', elg_registro_propiedad='$registro', elg_tomo='$tomo', elg_partida='$partida', elg_dia_inscripcion_registro_propiedad='$dia_inscripcion', elg_mes_inscripcion_registro_propiedad='$mes_inscripcion', elg_anio_inscripcion_registro_propiedad='$anio_inscripcion', elg_area_segun_titulo='$area', elg_unidad_medida='$unidad', elg_forma_tenencia='$tenencia', elg_forma_adquisicion='$adquisicion', elg_requiere_perfeccionamiento='$perfeccionamiento', elg_anios_sin_perfeccionamiento='$sin_perfeccionamiento', elg_anios_posesion='$posesion', elg_pueblo_etnia='$etnia', elg_adquisicion_sin_titulo='$adquisicion_no_titulo', elg_documento_presentado='$doc_presentado', elg_primer_apellido_posesionario='$primer_apellido', elg_segundo_apellido_posesionario='$segundo_apellido', elg_primer_nombre_posesionario='$primer_nombre', elg_segundo_nombre_posesionario='$segundo_nombre', elg_tipo_documento_posesionario='$tipo_documento', elg_identificacion_posesionario='$identificacion', elg_email_posesionario='$email', elg_telefono_posesionario='$telefono' WHERE elg_idestatus_legal = '$id'";
			$res = mysqli_query($this->conn, $sql);
			return $res; 

			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto	
		}



		// Funciones para extraer datos de la tabla "Investigacion predial"

		public function lectura_investigacion_predial($cod_predio){
			$sql = "SELECT * FROM investigacion_predial WHERE inv_clave_predio='$cod_predio'";
			$res = mysqli_query($this->conn, $sql);
			return $res; 

			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function registro_investigacion_predial($id,$cod_predio){
			$sql = "SELECT * FROM investigacion_pedial WHERE inv_idinvestigacion_predial='$id' AND inv_clave_predio='$cod_predio'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function actualizar_investigacion_predial($informante,$apellidos_inf,$nombres_inf,$telefono_inf,$email_inf,$propietario_desc,$otra_info,$dimensiones_terreno,$linderos,$bloque_numero,$ampliacion_bloque,$nombre_actualizador,$apellido_actualizador,$anio_actualizacion,$mes_actualizacion,$dia_actualizacion,$cedula_actualizador,$firma_actualizador,$nombre_supervisor,$apellidos_supervisor,$cedula_supervisor,$anio_supervision,$mes_supervision,$dia_supervision,$firma_supervisor,$cod_inv,$cod_predio){
			$sql = "UPDATE investigacion_predial SET  inv_tipo_informante='$informante', inv_apellidos_informante='$apellidos_inf', inv_nombre_informante='$nombres_inf', inv_telefono_informante='$telefono_inf', inv_email_informante='$email_inf', inv_propietario_desconocido='$propietario_desc', inv_otra_fuente_informacion='$otra_info', inv_dimensiones_terreno_irregular='$dimensiones_terreno', inv_linderos_definidos='$linderos', inv_nuevo_bloque_numero='$bloque_numero', inv_ampliacion_bloque_numero='$ampliacion_bloque', inv_nombre_actualizador='$nombre_actualizador', inv_apellido_actualizador='$apellido_actualizador', inv_anio_actualizacion='$anio_actualizacion', inv_mes_actualizacion='$mes_actualizacion', inv_dia_actualizacion='$dia_actualizacion', inv_cedula_actualizador='$cedula_actualizador', inv_firma_actualizador='$firma_actualizador', inv_nombre_supervisor='$nombre_supervisor', inv_apellido_supervisor='$apellidos_supervisor', inv_cedula_supervisor='$cedula_supervisor', inv_anio_supervision='$anio_supervision', inv_mes_supervision='$mes_supervision', inv_dia_supervision='$dia_supervision', inv_firma_supervisor='$firma_supervisor' WHERE inv_idinvestigacion_predial = '$cod_inv' AND inv_clave_predio = '$cod_predio'";
			$res = mysqli_query($this->conn, $sql);
			return $res; 

			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto	
		}		

		// public function guardar_investigacion_predial ()      ------ Agrgar nueva inv predial luego de crear predio nuevo


		// Funciones para extraer datos de la tabla "Ubicacion"

		public function lectura_ubicacion (){
			$sql = "SELECT * FROM ubicacion";
			$res = mysqli_query($this->conn, $sql);
			return $res; 

			mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto

		}	

		public function guardar_ubicacion($clave_predio,$eje_principal,$codigo_placa,$eje_secundario,$nombre_predio,$sector){
			
			$sql = "INSERT INTO ubicacion (ubc_clave_predio, ubc_eje_principal, ubc_codigo_placa_predial, ubc_eje_secundario, ubc_nombre_predio, ubc_sector) VALUES ('$clave_predio', '$eje_principal', '$codigo_placa', '$eje_secundario','$nombre_predio','$sector')";
			$res = mysqli_query($this->conn, $sql);
								
			if($res){
				return true;
			} else {
				return false;
			}
		

			mysqli_close($conn);

		}
		
		// Función que devuelve el numero total de predios registrados
		public function ultimo_predio(){
		$ultimo_registro = mysqli_query($this->conn, "SELECT COUNT(*) AS maximo FROM predio") or die ("Problemas en el query".mysqli_error($this->conn));
			$rs = mysqli_fetch_array($ultimo_registro);
			$numero = $rs['maximo'];
			return $numero;
	
			mysqli_close($conn);
		}


		public function actualizar_ubicacion($eje_principal,$codigo_placa,$eje_secundario,$nombre_predio,$sector,$id){
			$sql = "UPDATE ubicacion SET ubc_eje_principal='$eje_principal', ubc_codigo_placa_predial='$codigo_placa', ubc_eje_secundario='$eje_secundario', ubc_nombre_predio='$nombre_predio', ubc_sector='$sector' WHERE ubc_idubicacion='$id'";
			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function registro_ubicacion($id){
			$sql = "SELECT * FROM ubicacion WHERE ubc_clave_predio='$id'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function codigo_ubicacion($id){
			$sql = "SELECT ubc_idubicacion FROM ubicacion WHERE ubc_clave_predio='$id'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}



		// Funciones para extraer datos de la tabla "Propietario"

		public function lectura_propietario (){
			$sql = "SELECT * FROM propietario";
			$res = mysqli_query($this->conn, $sql);
			return $res;
			mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto

		}	

		public function guardar_propietario_nuevo($personeria,$doc,$cedula,$ap1,$ap2,$nombre1,$nombre2,$ruc){
			
		$sql = "INSERT INTO propietario (pro_tipo_propietario, pro_tipo_documento, pro_identificacion, pro_primer_apellido, pro_segundo_apellido, pro_primer_nombre, pro_segundo_nombre, pro_ruc) VALUES ('$personeria', '$doc', '$cedula', '$ap1', '$ap2', '$nombre1', '$nombre2', '$ruc')";
			$res = mysqli_query($this->conn, $sql);
			//$last_id = mysqli_insert_id($conn);
			if($res){
				return true;
			} else {
				return false;
			}
			//mysqli_close($conn);

		}


		public function guardar_propietario($identificacion,$tipo,$primer_apellido,$segundo_apellido,$primer_nombre, $segundo_nombre, $tipo_doc,$estado_civil,$participacion,$representante,$anio_nacimiento,$mes_nacimiento,$dia_nacimiento,$nacionalidad,$email,$telefono,$ciudad_dom,$direccion_dom,$jefe_hogar,$personeria,$ruc,$razon_social,$acuerdo,$rep_legal,$conyugue,$apellidos_conyugue,$nombres_conyugue,$doc_conyugue,$id_conyugue,$telf_conyugue,$porcentaje_conyugue,$email_conyugue){
						
				
				$sql = "INSERT INTO propietario (pro_identificacion,pro_tipo_propietario,pro_primer_apellido,pro_segundo_apellido,pro_primer_nombre,pro_segundo_nombre,pro_tipo_documento,pro_estado_civil,pro_participacion_porcentaje,pro_representante,pro_anio_nacimiento,pro_mes_nacimiento,pro_dia_nacimiento,pro_nacionalidad,pro_email,pro_telefono,pro_ciudad_domicilio,pro_direccion_domicilio,pro_jefe_hogar,pro_personeria_juridica,pro_ruc,pro_razon_social,pro_acuerdo_registro,pro_representante_legal,pro_conyugue,pro_apellidos_conyugue,pro_nombres_conyugue,pro_tipo_documento_conyugue,pro_identificacion_conyugue,pro_telefono_conyugue,pro_participacion_porcentaje_conyugue,pro_email_conyugue) VALUES ('$identificacion','$tipo','$primer_apellido','$segundo_apellido','$primer_nombre','$segundo_nombre','$tipo_doc','$estado_civil','$participacion','$representante','$anio_nacimiento','$mes_nacimiento','$dia_nacimiento','$nacionalidad','$email','$telefono','$ciudad_dom','$direccion_dom','$jefe_hogar','$personeria','$ruc','$razon_social','$acuerdo','$rep_legal','$conyugue','$apellidos_conyugue','$nombres_conyugue','$doc_conyugue','$id_conyugue','$telf_conyugue','$porcentaje_conyugue','$email_conyugue')";
			$res = mysqli_query($this->conn, $sql);
					
			if($res){
				return true;
			} else {
				return false;
			}
		

			mysqli_close($conn);

		}

	
	public function actualizar_propietario($tipo,$primer_apellido,$segundo_apellido,$primer_nombre,$segundo_nombre,$tipo_doc,$estado_civil,$participacion,$representante,$anio_nacimiento,$mes_nacimiento,$dia_nacimiento,$nacionalidad,$email,$telefono,$ciudad_dom,$direccion_dom,$jefe_hogar,$personeria,$ruc,$razon_social,$acuerdo,$rep_legal,$conyugue,$apellidos_conyugue,$nombres_conyugue,$doc_conyugue,$id_conyugue,$telf_conyugue,$porcentaje_conyugue,$email_conyugue,$id_propietario){
									

			$sql = "UPDATE propietario SET pro_tipo_propietario='$tipo',pro_primer_apellido='$primer_apellido',pro_segundo_apellido='$segundo_apellido',pro_primer_nombre='$primer_nombre',pro_segundo_nombre='$segundo_nombre',pro_tipo_documento='$tipo_doc',pro_estado_civil='$estado_civil',pro_participacion_porcentaje='$participacion',pro_representante='$representante',pro_anio_nacimiento='$anio_nacimiento',pro_mes_nacimiento='$mes_nacimiento',pro_dia_nacimiento='$dia_nacimiento',pro_nacionalidad='$nacionalidad',pro_email='$email',pro_telefono='$telefono',pro_ciudad_domicilio='$ciudad_dom',pro_direccion_domicilio='$direccion_dom',pro_jefe_hogar='$jefe_hogar',pro_personeria_juridica='$personeria',pro_ruc='$ruc',pro_razon_social='$razon_social',pro_acuerdo_registro='$acuerdo',pro_representante_legal='$rep_legal',pro_conyugue='$conyugue',pro_apellidos_conyugue='$apellidos_conyugue',pro_nombres_conyugue='$nombres_conyugue',pro_tipo_documento_conyugue='$doc_conyugue',pro_identificacion_conyugue='$id_conyugue',pro_telefono_conyugue='$telf_conyugue',pro_participacion_porcentaje_conyugue='$porcentaje_conyugue',pro_email_conyugue='$email_conyugue' WHERE pro_idpropietario='$id_propietario'";
			$res = mysqli_query($this->conn, $sql);
			
			if($res){
				return true;
			}else{
				return false;
			}
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function registro_propietario($id){
			$sql = "SELECT * FROM propietario WHERE pro_idpropietario='$id'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		
		public function borrar_propietario($id){
			$sql = "DELETE FROM propietario WHERE pro_identificacion='$id'";
			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}	


				// Funciones para extraer datos de la tabla "grafico_predio"


	public function guardar_grafico_predio($clave_predio,$link_grafico,$descripcion,$calle_norte,$calle_sur,$calle_este,$calle_oeste,$area,$dimension,$fondo,$coord_x,$coord_y,$tierras,$construcciones,$total,$observaciones){
			
			$sql = "INSERT INTO grafico_predio (grp_clave_predio, grp_link_grafico, grp_descripcion_grafico, grp_calle_norte, grp_calle_sur, grp_calle_este, grp_calle_oeste, grp_area_grafica_lote, grp_dimension_frente, grp_fondo_relativo, grp_coordenada_x, grp_coordenada_y, grp_avaluo_tierras, grp_avaluo_construcciones, grp_avaluo_total, grp_observaciones) VALUES ('$clave_predio', '$link_grafico', '$descripcion', '$calle_norte', '$calle_sur', '$calle_este', '$calle_oeste', '$area', '$dimension', '$fondo', '$coord_x', '$coord_y', '$tierras', '$construcciones', '$total', '$observaciones')";

			$res = mysqli_query($this->conn, $sql);			
			if($res){
				return true;
			} else {
				return false;
			}		

			mysqli_close($conn);

		}


		public function actualizar_grafico_predio($calle_norte,$calle_sur,$calle_este,$calle_oeste,$area,$dimension,$fondo,$coord_x,$coord_y,$tierras,$construcciones,$total,$descripcion,$observaciones,$id_predio){

			$sql = "UPDATE grafico_predio SET grp_descripcion_grafico='$descripcion', grp_calle_norte='$calle_norte', grp_calle_sur='$calle_sur', grp_calle_este='$calle_este', grp_calle_oeste='$calle_oeste', grp_area_grafica_lote='$area', grp_dimension_frente='$dimension', grp_fondo_relativo='$fondo', grp_coordenada_x='$coord_x', grp_coordenada_y='$coord_y', grp_avaluo_tierras='$tierras', grp_avaluo_construcciones='$construcciones', grp_avaluo_total='$total', grp_observaciones='$observaciones' WHERE grp_idgrafico_predio='$id_predio'";

			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

			public function registro_grafico_predio($id){
			$sql = "SELECT * FROM grafico_predio WHERE grp_clave_predio='$id'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
			}

			public function codigo_grafico_predio($id){
			$sql = "SELECT grp_idgrafico_predio FROM grafico_predio WHERE grp_clave_predio='$id'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
			}


		// Funciones que permiten la extraccion de la tabla "uso_predio"



		public function lectura_uso_predio ($id_predio){

			$sql = "SELECT * FROM uso_predio WHERE upd_iduso_predio = '$id_predio'";
			$res = mysqli_query($this->conn, $sql);
			//$retorno = mysqli_fetch_object($res);
			//return $retorno;
			return $res;
			

			mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto


		}


		public function registro_uso_predio ($clave_predio){
			$sql = "SELECT * FROM uso_predio WHERE upd_clave_predio='$clave_predio'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function codigo_uso_predio ($clave_predio){
			$sql = "SELECT upd_iduso_predio FROM uso_predio WHERE upd_clave_predio='$clave_predio'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function guardar_uso_predio($clave_predio,$uso_principal,$uso_secundario,$descripcion){
			
			$sql = "INSERT INTO uso_predio (upd_clave_predio, upd_uso_principal, upd_uso_secundario, upd_descripcion) VALUES ('$clave_predio', '$uso_principal', '$uso_secundario', '$descripcion')";

			$res = mysqli_query($this->conn, $sql);			
			if($res){
				return true;
			} else {
				return false;
			}
			mysqli_close($conn);

		}

		public function actualizar_uso_predio($uso_principal,$uso_secundario,$descripcion,$id){

			$sql = "UPDATE uso_predio SET upd_uso_principal='$uso_principal', upd_uso_secundario='$uso_secundario', upd_descripcion='$descripcion' WHERE upd_iduso_predio='$id'";
			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}


		// Funciones que permiten la extraccion de la tabla "uso_predio_opciones"


		public function lectura_uso_predio_opciones ($id_predio){

			$sql = "SELECT * FROM uso_predio_opciones WHERE upo_iduso_predio_opciones = '$id_predio'";
			$res = mysqli_query($this->conn, $sql);
			//$retorno = mysqli_fetch_object($res);
			//return $retorno;
			return $res;			
			mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto

		}


		public function registro_uso_predio_opciones ($clave_predio){
			$sql = "SELECT * FROM uso_predio_opciones WHERE upo_clave_predio='$clave_predio'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}


		public function guardar_uso_predio_opciones($clave_predio,$uso_predio,$descripcion){
			
			$sql = "INSERT INTO uso_predio_opciones (upo_clave_predio, upo_iduso_predio, upo_descripcion) VALUES ('$clave_predio', '$uso_predio', '$descripcion')";

			$res = mysqli_query($this->conn, $sql);			
			if($res){
				return true;
			} else {
				return false;
			}
			mysqli_close($conn);

		}

		public function actualizar_uso_predio_opciones($uso_predio,$descripcion,$id_predio){

			$sql = "UPDATE uso_predio_opciones SET upo_iduso_predio='$uso_predio', upo_descripcion='$descripcion' WHERE upo_clave_predio='$id_predio'";
			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}	





// Funciones que permiten la extraccion de la tabla "construccion_caracteristicas"


		public function lectura_construccion_caracteristicas ($clave){

			$sql = "SELECT * FROM construccion_caracteristicas WHERE cdc_clave_predio = '$clave'";
			$res = mysqli_query($this->conn, $sql);
			//$retorno = mysqli_fetch_object($res);
			//return $retorno;
			return $res;			
			mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto

		}


		public function registro_construccion_caracteristicas ($id){
			$sql = "SELECT * FROM construccion_caracteristicas WHERE cdc_idconstruccion_caracteristicas='$id'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}


		public function guardar_construccion_caracteristicas($clave_predio,$idubicacion,$bloque,$piso,$unidad,$nivel,$condiciones,$uso,$valor_cultural,$area,$anio_construccion,$anio_restauracion,$conservacion,$mamposteria,$columnas,$vigas,$entrepiso,$cubierta,$gradas,$contrapiso,$paredes,$enlucido_pared,$enlucido_tumbados,$rev_interior,$rev_exterior,$rev_cubierta,$tumbados,$ventanas,$vidrios,$puertas,$closets,$pisos,$proteccion_v,$gradas_ac,$clasificacion,$tipo,$condicion_ocp,$acabado,$estado_piso,$hogares,$habitantes,$habitaciones,$dormitorios,$espacios_aseo,$tenencia_vivienda,$telefono,$celulares,$internet,$prop_exclusiva,$prop_comunal,$alicuota){
			
			$sql = "INSERT INTO construccion_caracteristicas (cdc_clave_predio, cdc_idubicacion, cdc_numero_bloque, cdc_numero_piso, cdc_numero_unidad, cdc_nivel_piso, cdc_condicion_fisica, cdc_uso_constructivo, cdc_valor_cultural, cdc_area_construccion, cdc_anio_construccion, cdc_anio_restauracion, cdc_estado_conservacion, cdc_mamposteria_soportante, cdc_columnas, cdc_vigas, cdc_entrepiso, cdc_cubierta_entrepiso, cdc_gradas, cdc_contrapiso, cdc_paredes, cdc_enlucido_paredes, cdc_elucido_tumbados, cdc_revestimiento_pared_interior, cdc_revestimiento_pared_exterior, cdc_revestimiento_cubierta, cdc_tumbados, cdc_ventanas, cdc_vidrios, cdc_puertas, cdc_closets, cdc_pisos, cdc_proteccion_ventanas, cdc_gradas_acabados, cdc_clasificacion_vivienda, cdc_tipo_vivienda, cdc_condicion_ocupacion, cdc_acabado_piso, cdc_estado_piso, cdc_numero_hogares, cdc_numero_habitantes, cdc_numero_habitaciones, cdc_numero_dormitorios, cdc_espacios_aseo_duchas, cdc_tenencia_vivienda, cdc_telefono_convencional, cdc_cantidad_celulares, cdc_servicio_internet, cdc_total_propiedad_exclusiva, cdc_total_propiedad_comunal, cdc_alicuota_porcentaje) VALUES ('$clave_predio', '$idubicacion', '$bloque', '$piso', '$unidad', '$nivel', '$condiciones', '$uso', '$valor_cultural', '$area', '$anio_construccion', '$anio_restauracion', '$conservacion', '$mamposteria', '$columnas', '$vigas', '$entrepiso', '$cubierta', '$gradas', '$contrapiso', '$paredes', '$enlucido_pared', '$enlucido_tumbados', '$rev_interior', '$rev_exterior', '$rev_cubierta', '$tumbados', '$ventanas', '$vidrios', '$puertas', '$closets', '$pisos', '$proteccion_v', '$gradas_ac', '$clasificacion', '$tipo', '$condicion_ocp', '$acabado', '$estado_piso', '$hogares', '$habitantes', '$habitaciones', '$dormitorios', '$espacios_aseo', '$tenencia_vivienda', '$telefono', '$celulares', '$internet', '$prop_exclusiva', '$prop_comunal', '$alicuota')";

			$res = mysqli_query($this->conn, $sql);			
			if($res){
				return true;
			} else {
				return false;
			}
			mysqli_close($conn);

		}

		public function actualizar_construccion_caracteristicas($bloque,$piso,$unidad,$nivel,$condiciones,$uso,$valor_cultural,$area,$anio_construccion,$anio_restauracion,$conservacion,$mamposteria,$columnas,$vigas,$entrepiso,$cubierta,$gradas,$contrapiso,$paredes,$enlucido_pared,$enlucido_tumbados,$rev_interior,$rev_exterior,$rev_cubierta,$tumbados,$ventanas,$vidrios,$puertas,$closets,$pisos,$proteccion_v,$gradas_ac,$clasificacion,$tipo,$condicion_ocp,$acabado,$estado_piso,$hogares,$habitantes,$habitaciones,$dormitorios,$espacios_aseo,$tenencia_vivienda,$telefono,$celulares,$internet,$prop_exclusiva,$prop_comunal,$alicuota,$id){

			$sql = "UPDATE construccion_caracteristicas SET cdc_numero_bloque='$bloque', cdc_numero_piso='$piso', cdc_numero_unidad='$unidad', cdc_nivel_piso='$nivel', cdc_condicion_fisica='$condiciones', cdc_uso_constructivo='$uso', cdc_valor_cultural='$valor_cultural', cdc_area_construccion='$area', cdc_anio_construccion='$anio_construccion', cdc_anio_restauracion='$anio_restauracion', cdc_estado_conservacion='$conservacion', cdc_mamposteria_soportante='$mamposteria', cdc_columnas='$columnas', cdc_vigas='$vigas', cdc_entrepiso='$entrepiso', cdc_cubierta_entrepiso='$cubierta', cdc_gradas='$gradas', cdc_contrapiso='$contrapiso', cdc_paredes='$paredes', cdc_enlucido_paredes='$enlucido_pared', cdc_elucido_tumbados='$enlucido_tumbados', cdc_revestimiento_pared_interior='$rev_interior', cdc_revestimiento_pared_exterior='$rev_exterior', cdc_revestimiento_cubierta='$rev_cubierta', cdc_tumbados='$tumbados', cdc_ventanas='$ventanas', cdc_vidrios='$vidrios', cdc_puertas='$puertas', cdc_closets='$closets', cdc_pisos='$pisos', cdc_proteccion_ventanas='$proteccion_v', cdc_gradas_acabados='$gradas_ac', cdc_clasificacion_vivienda='$clasificacion', cdc_tipo_vivienda='$tipo', cdc_condicion_ocupacion='$condicion_ocp', cdc_acabado_piso='$acabado', cdc_estado_piso='$estado_piso', cdc_numero_hogares='$hogares', cdc_numero_habitantes='$habitantes', cdc_numero_habitaciones='$habitaciones', cdc_numero_dormitorios='$dormitorios', cdc_espacios_aseo_duchas='$espacios_aseo', cdc_tenencia_vivienda='$tenencia_vivienda', cdc_telefono_convencional='$telefono', cdc_cantidad_celulares='$celulares', cdc_servicio_internet='$internet', cdc_total_propiedad_exclusiva='$prop_exclusiva', cdc_total_propiedad_comunal='$prop_comunal', cdc_alicuota_porcentaje='$alicuota' WHERE cdc_idconstruccion_caracteristicas='$id'";
			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}	


		// Funciones que permiten la extraccion de la tabla "caracteristicas lote"


		public function lectura_lote ($id_lote){

			$sql = "SELECT * FROM caracteristicas_lote WHERE clt_idcaracteristicas_lote = '$id_lote'";
			$res = mysqli_query($this->conn, $sql);
			//$retorno = mysqli_fetch_object($res);
			//return $retorno;
			return $res;			
			mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto

		}


		public function registro_lote ($clave_predio){
			$sql = "SELECT * FROM caracteristicas_lote WHERE clt_clave_predio='$clave_predio'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function codigo_lote ($clave_predio){
			$sql = "SELECT clt_idcaracteristicas_lote FROM caracteristicas_lote WHERE clt_clave_predio='$clave_predio'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}


		public function guardar_lote($clave_predio,$idubicacion,$ocupacion,$localizacion_manzana,$forma,$topografia,$cobertura_nativa,$ecosistema,$afectaciones,$riesgos,$calidad){
			
			$sql = "INSERT INTO caracteristicas_lote (clt_clave_predio, clt_idubicacion, clt_ocupacion, clt_localizacion_manzana, clt_forma, clt_topografia, clt_cobertura_nativa_predominante, clt_ecosistema_relevante, clt_afectaciones, clt_riesgos, clt_calidad_suelo) VALUES ('$clave_predio', '$idubicacion', '$ocupacion', '$localizacion_manzana', '$forma', '$topografia', '$cobertura_nativa', '$ecosistema', '$afectaciones', '$riesgos', '$calidad')";

			$res = mysqli_query($this->conn, $sql);			
			if($res){
				return true;
			} else {
				return false;
			}
			mysqli_close($conn);

		}

		public function actualizar_lote($ocupacion,$localizacion_manzana,$forma,$topografia,$cobertura_nativa,$ecosistema,$afectaciones,$riesgos,$calidad,$id_predio){

			$sql = "UPDATE caracteristicas_lote SET clt_ocupacion='$ocupacion', clt_localizacion_manzana='$localizacion_manzana', clt_forma='$forma', clt_topografia='$topografia', clt_cobertura_nativa_predominante='$cobertura_nativa', clt_ecosistema_relevante='$ecosistema', clt_afectaciones='$afectaciones', clt_riesgos='$riesgos', clt_calidad_suelo='$calidad' WHERE clt_idcaracteristicas_lote='$id_predio'";
			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}	



		// Funciones que permiten la extraccion de la tabla "Infraestructura"


		public function lectura_infraestructura ($id_infraestructura){

			$sql = "SELECT * FROM infraestructura WHERE inf_idinfraestructura = '$id_infraestructura'";
			$res = mysqli_query($this->conn, $sql);
			//$retorno = mysqli_fetch_object($res);
			//return $retorno;
			return $res;			
			mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto

		}


		public function registro_infraestructura ($clave_predio){
			$sql = "SELECT * FROM infraestructura WHERE inf_clave_predio='$clave_predio'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function codigo_infraestructura ($clave_predio){
			$sql = "SELECT inf_idinfraestructura FROM infraestructura WHERE inf_clave_predio='$clave_predio'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}

		public function guardar_infraestructura($clave_predio,$idubicacion,$tipo_acceso,$rodadura,$vias,$agua_proc,$agua_recepcion,$eliminacion_ex,$energia_proc,$medidor,$energia_recepcion,$basura,$telf_convencional,$celular,$tv_cable,$internet,$riego,$riego_disp,$instalacion_especial,$ascensor,$circuito_tv,$montacarga,$salterno_electricidad,$aire_acondicionado,$sistema_incendios,$gas_central,$ventilacion,$voz_datos,$alumbrado,$rec_basura,$transporte_urbano,$aseo_calles,$alcantarillado,$aceras,$bordillos){
			
			$sql = "INSERT INTO infraestructura (inf_clave_predio, inf_idubicacion, inf_tipo_via_acceso, inf_rodadura, inf_vias_acceso_adicionales, inf_agua_procedencia, inf_agua_recepcion, inf_eliminacion_excretas, inf_energia_electrica_procedencia,inf_medidor, inf_energia_electrica_recepcion, inf_eliminacion_basura, inf_telefono_convencional, inf_celular, inf_tv_cable, inf_internet, inf_metodo_riego, inf_disponibilidad_riego, inf_instalaciones_especiales, inf_ascensor, inf_circuito_cerrado_tv, inf_montacarga, inf_sistema_alterno_electricidad, inf_aire_acondicionado, inf_sistema_contra_incendios, inf_gas_centralizado, inf_ventilacion, inf_sistema_voz_datos, inf_alumbrado_publico, inf_recoleccion_basura, inf_transporte_urbano, inf_aseo_calles, inf_alcantarillado, inf_aceras, inf_bordillos) VALUES ('$clave_predio', '$idubicacion', '$tipo_acceso', '$rodadura', '$vias', '$agua_proc', '$agua_recepcion', '$eliminacion_ex', '$energia_proc', '$energia_recepcion', '$basura', '$telf_convencional', '$celular', '$tv_cable', '$internet', '$riego', '$riego_disp', '$instalacion_especial', '$ascensor', '$circuito_tv', '$montacarga', '$salterno_electricidad', '$aire_acondicionado', '$sistema_incendios', '$gas_central', '$ventilacion', '$voz_datos', '$alumbrado', '$rec_basura', '$transporte_urbano', '$aseo_calles', '$alcantarillado', '$aceras', '$bordillos')";

			$res = mysqli_query($this->conn, $sql);			
			if($res){
				return true;
			} else {
				return false;
			}
			mysqli_close($conn);

		}

		public function actualizar_infraestructura($tipo_acceso,$rodadura,$vias,$agua_proc,$agua_recepcion,$eliminacion_ex,$energia_proc,$medidor,$energia_recepcion,$basura,$telf_convencional,$celular,$tv_cable,$internet,$riego,$riego_disp,$instalacion_especial,$ascensor,$circuito_tv,$montacarga,$salterno_electricidad,$aire_acondicionado,$sistema_incendios,$gas_central,$ventilacion,$voz_datos,$alumbrado,$rec_basura,$transporte_urbano,$aseo_calles,$alcantarillado,$aceras,$bordillos,$id_predio){

			$sql = "UPDATE infraestructura SET inf_tipo_via_acceso='$tipo_acceso', inf_rodadura='$rodadura', inf_vias_acceso_adicionales='$vias', inf_agua_procedencia='$agua_proc', inf_agua_recepcion='$agua_recepcion', inf_eliminacion_excretas='$eliminacion_ex', inf_energia_electrica_procedencia='$energia_proc', inf_medidor='$medidor',inf_energia_electrica_recepcion='$energia_recepcion', inf_eliminacion_basura='$basura', inf_telefono_convencional='$telf_convencional',inf_celular='$celular',inf_tv_cable='$tv_cable',inf_internet='$internet', inf_metodo_riego='$riego', inf_disponibilidad_riego='$riego_disp', inf_instalaciones_especiales='$instalacion_especial', inf_ascensor='$ascensor', inf_circuito_cerrado_tv='$circuito_tv', inf_montacarga='$montacarga', inf_sistema_alterno_electricidad='$salterno_electricidad', inf_aire_acondicionado='$aire_acondicionado', inf_sistema_contra_incendios='$sistema_incendios', inf_gas_centralizado='$gas_central', inf_ventilacion='$ventilacion', inf_sistema_voz_datos='$voz_datos', inf_alumbrado_publico='$alumbrado', inf_recoleccion_basura='$rec_basura', inf_transporte_urbano='$transporte_urbano', inf_aseo_calles='$aseo_calles', inf_alcantarillado='$alcantarillado', inf_aceras='$aceras', inf_bordillos='$bordillos' WHERE inf_idinfraestructura='$id_predio'";
			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}	


		// Funciones que permiten la extraccion de la tabla "obras complementarias"


		public function lectura_obras_complementarias ($id_predio){

			$sql = "SELECT * FROM obras_complementarias WHERE obc_clave_predio = '$id_predio'";
			$res = mysqli_query($this->conn, $sql);
			//$retorno = mysqli_fetch_object($res);
			//return $retorno;
			return $res;			
			mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto

		}


		public function registro_obras_complementarias ($id){
			$sql = "SELECT * FROM obras_complementarias WHERE obc_idobras_complementarias='$id'";
			$res = mysqli_query($this->conn, $sql);
			$retorno = mysqli_fetch_object($res);
			return $retorno;
			//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}


		public function guardar_obras_complementarias($clave_predio,$idubicacion,$idinfraestructura,$obra,$dim_a,$dim_b,$dim_c,$metros,$material,$edad){
			
			$sql = "INSERT INTO obras_complementarias (obc_clave_predio, obc_idubicacion, obc_idinfraestructura, obc_tipo_obra, obc_dimension_a, obc_dimension_b, obc_dimension_c, obc_cantidad_metros, obc_material, obc_edad) VALUES ('$clave_predio', '$idubicacion', '$idinfraestructura', '$obra', '$dim_a', '$dim_b', '$dim_c', '$metros', '$material', '$edad')";

			$res = mysqli_query($this->conn, $sql);			
			if($res){
				return true;
			} else {
				return false;
			}
			mysqli_close($conn);

		}

		public function actualizar_obras_complementarias($obra,$dim_a,$dim_b,$dim_c,$metros,$material,$edad,$estado,$id){

			$sql = "UPDATE obras_complementarias SET obc_tipo_obra='$obra', obc_dimension_a='$dim_a', obc_dimension_b='$dim_b', obc_dimension_c='$dim_c', obc_cantidad_metros='$metros', obc_material='$material', obc_edad='$edad', obc_estado='$estado' WHERE obc_idobras_complementarias='$id'";
			$res = mysqli_query($this->conn, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		//mysqli_close($conn); //evaluar si se cierra o no la conexion en este punto
		}	


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



	}




?>
