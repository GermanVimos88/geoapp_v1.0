-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb1` DEFAULT CHARACTER SET utf8 ;
USE `mydb1` ;

-- -----------------------------------------------------
-- Table `mydb1`.`propietario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`propietario` (
  `pro_idpropietario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pro_identificacion` VARCHAR(20) NOT NULL,
  `pro_tipo_propietario` VARCHAR(45) NULL,
  `pro_primer_apellido` VARCHAR(45) NULL,
  `pro_segundo_apellido` VARCHAR(45) NULL,
  `pro_primer_nombre` VARCHAR(45) NULL,
  `pro_segundo_nombre` VARCHAR(45) NULL,
  `pro_tipo_documento` VARCHAR(45) NULL,
  `pro_estado_civil` VARCHAR(45) NULL,
  `pro_participacion_porcentaje` VARCHAR(45) NULL,
  `pro_representante` VARCHAR(45) NULL,
  `pro_anio_nacimiento` VARCHAR(45) NULL,
  `pro_mes_nacimiento` VARCHAR(45) NULL,
  `pro_dia_nacimiento` VARCHAR(45) NULL,
  `pro_nacionalidad` VARCHAR(45) NULL,
  `pro_email` VARCHAR(45) NULL,
  `pro_telefono` VARCHAR(45) NULL,
  `pro_ciudad_domicilio` VARCHAR(45) NULL,
  `pro_direccion_domicilio` VARCHAR(45) NULL,
  `pro_jefe_hogar` VARCHAR(45) NULL,
  `pro_personeria_juridica` VARCHAR(45) NULL,
  `pro_ruc` VARCHAR(45) NULL,
  `pro_razon_social` VARCHAR(45) NULL,
  `pro_inscrito` VARCHAR(45) NULL,
  `pro_lugar_inscripcion` VARCHAR(45) NULL,
  `pro_acuerdo_registro` VARCHAR(45) NULL,
  `pro_representante_legal` VARCHAR(45) NULL,
  `pro_documento_representante` VARCHAR(45) NULL,
  `pro_idrepresentante` VARCHAR(45) NULL,
  `pro_email_representante` VARCHAR(45) NULL,
  `pro_telefono_representante` VARCHAR(45) NULL,
  `pro_conyugue` VARCHAR(45) NULL,
  `pro_apellidos_conyugue` VARCHAR(45) NULL,
  `pro_nombres_conyugue` VARCHAR(45) NULL,
  `pro_tipo_documento_conyugue` VARCHAR(45) NULL,
  `pro_identificacion_conyugue` VARCHAR(45) NULL,
  `pro_telefono_conyugue` VARCHAR(45) NULL,
  `pro_participacion_porcentaje_conyugue` VARCHAR(45) NULL,
  `pro_email_conyugue` VARCHAR(45) NULL,
  PRIMARY KEY (`pro_idpropietario`, `pro_identificacion`),
  UNIQUE INDEX `pro_id_UNIQUE` (`pro_idpropietario` ASC),
  INDEX `pro_ruc_idx` (`pro_ruc` ASC),
  INDEX `pro_razon_social_idx` (`pro_razon_social` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb1`.`predio`   
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`predio` (
  `prd_idpredio` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `prd_codigo_original` VARCHAR(45) NULL,
  `prd_idpropietario` INT UNSIGNED NOT NULL,
  `prd_identificacion` VARCHAR(20) NOT NULL,
  `prd_tipo` VARCHAR(45) NULL,
  `prd_clave_catastral` VARCHAR(20) NOT NULL,
  `prd_clave_anterior` VARCHAR(20) NULL,
  `prd_regimen_tenencia` VARCHAR(45) NULL,
  `prd_bloque` VARCHAR(45) NULL,
  `prd_piso` VARCHAR(45) NULL,
  `prd_unidad` VARCHAR(45) NULL,
  `prd_numero_predio` VARCHAR(45) NULL,
  `prd_observaciones` VARCHAR(400) DEFAULT 'Ninguna',  
  PRIMARY KEY (`prd_idpredio`, `prd_clave_catastral`),
  UNIQUE INDEX `prd_clave_UNIQUE` (`prd_clave_catastral` ASC),
  INDEX `fk_predio_propietario_idx` (`prd_identificacion` ASC),
  CONSTRAINT `fk_idpropietario`
    FOREIGN KEY (`prd_idpropietario`)
    REFERENCES `mydb1`.`propietario` (`pro_idpropietario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb1`.`ubicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`ubicacion` (
  `ubc_idubicacion` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ubc_clave_predio` VARCHAR(20) NOT NULL,
  `ubc_eje_principal` VARCHAR(45) NULL,
  `ubc_codigo_placa_predial` VARCHAR(45) NULL,
  `ubc_eje_secundario` VARCHAR(45) NULL,
  `ubc_nombre_predio` VARCHAR(45) NULL,
  `ubc_sector` VARCHAR(45) NULL,  
  PRIMARY KEY (`ubc_idubicacion`, `ubc_clave_predio`),
  UNIQUE INDEX `ubc_id_UNIQUE` (`ubc_idubicacion` ASC),
  UNIQUE INDEX `ubc_clave_UNIQUE` (`ubc_clave_predio` ASC),
  INDEX `fk_ubicacion_predio_idx` (`ubc_clave_predio` ASC),
  CONSTRAINT `fk_ubicacion_predio`
    FOREIGN KEY (`ubc_clave_predio`)
    REFERENCES `mydb1`.`predio` (`prd_clave_catastral`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb1`.`estatus_legal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`estatus_legal` (
  `elg_idestatus_legal` INT NOT NULL AUTO_INCREMENT,
  `elg_clave_predio` VARCHAR(20) NOT NULL,
  `elg_titulo` VARCHAR(45) NULL,
  `elg_escritura` VARCHAR(45) NULL,
  `elg_celebrado_ante` VARCHAR(45) NULL,
  `elg_nombre_numero_notaria` VARCHAR(45) NULL,
  `elg_provincia_titulacion` VARCHAR(45) NULL,
  `elg_canton_inscripcion` VARCHAR(45) NULL,
  `elg_dia_protocolizacion` VARCHAR(45) NULL,
  `elg_mes_protocolizacion` VARCHAR(45) NULL,
  `elg_anio_protocolizacion` VARCHAR(45) NULL,
  `elg_registro_propiedad` VARCHAR(45) NULL,
  `elg_tomo` VARCHAR(45) NULL,
  `elg_partida` VARCHAR(45) NULL,
  `elg_dia_inscripcion_registro_propiedad` VARCHAR(45) NULL,
  `elg_mes_inscripcion_registro_propiedad` VARCHAR(45) NULL,
  `elg_anio_inscripcion_registro_propiedad` VARCHAR(45) NULL,
  `elg_area_segun_titulo` VARCHAR(45) NULL,
  `elg_unidad_medida` VARCHAR(45) NULL,
  `elg_forma_tenencia` VARCHAR(45) NULL,
  `elg_forma_adquisicion` VARCHAR(45) NULL,
  `elg_requiere_perfeccionamiento` VARCHAR(45) NULL,
  `elg_anios_sin_perfeccionamiento` VARCHAR(45) NULL,
  `elg_anios_posesion` VARCHAR(45) NULL,
  `elg_pueblo_etnia` VARCHAR(45) NULL,
  `elg_adquisicion_sin_titulo` VARCHAR(45) NULL,
  `elg_documento_presentado` VARCHAR(45) NULL,
  `elg_primer_apellido_posesionario` VARCHAR(45) NULL,
  `elg_segundo_apellido_posesionario` VARCHAR(45) NULL,
  `elg_primer_nombre_posesionario` VARCHAR(45) NULL,
  `elg_segundo_nombre_posesionario` VARCHAR(45) NULL,
  `elg_tipo_documento_posesionario` VARCHAR(45) NULL,
  `elg_identificacion_posesionario` VARCHAR(45) NULL,
  `elg_email_posesionario` VARCHAR(45) NULL,
  `elg_telefono_posesionario` VARCHAR(45) NULL,  
  PRIMARY KEY (`elg_idestatus_legal`, `elg_clave_predio`),
  INDEX `fk_estatus_legal_predio_idx` (`elg_clave_predio` ASC),
  CONSTRAINT `fk_estatus_legal_predio`
    FOREIGN KEY (`elg_clave_predio`)
    REFERENCES `mydb1`.`predio` (`prd_clave_catastral`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb1`.`caracteristicas_lote`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`caracteristicas_lote` (
  `clt_idcaracteristicas_lote` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `clt_clave_predio` VARCHAR(20) NOT NULL,
  `clt_idubicacion` INT UNSIGNED NOT NULL,
  `clt_ocupacion` VARCHAR(45) NULL,
  `clt_localizacion_manzana` VARCHAR(45) NULL,
  `clt_forma` VARCHAR(45) NULL,
  `clt_topografia` VARCHAR(45) NULL,
  `clt_cobertura_nativa_predominante` VARCHAR(45) NULL,
  `clt_ecosistema_relevante` VARCHAR(45) NULL,
  `clt_afectaciones` VARCHAR(45) NULL,
  `clt_riesgos` VARCHAR(45) NULL,
  `clt_calidad_suelo` VARCHAR(45) NULL,  
  PRIMARY KEY (`clt_idcaracteristicas_lote`, `clt_clave_predio`),
  INDEX `fk_caracteristicas_lote_ubicacion_idx` (`clt_clave_predio` ASC),
  CONSTRAINT `fk_caracteristicas_lote_predio`
    FOREIGN KEY (`clt_clave_predio`)
    REFERENCES `mydb1`.`ubicacion` (`ubc_clave_predio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_caracteristicas_lote_ubicacion`
    FOREIGN KEY (`clt_idubicacion`)
    REFERENCES `mydb1`.`ubicacion` (`ubc_idubicacion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb1`.`uso_predio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`uso_predio` (
  `upd_iduso_predio` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `upd_clave_predio` VARCHAR(20) NOT NULL,
  `upd_uso_principal` VARCHAR(45) NULL,
  `upd_uso_secundario` VARCHAR(45) NULL,
  `upd_descripcion` VARCHAR(600) NULL,  
  PRIMARY KEY (`upd_iduso_predio`, `upd_clave_predio`),
  UNIQUE INDEX `predioid_UNIQUE` (`upd_iduso_predio` ASC),
  UNIQUE INDEX `clave_UNIQUE` (`upd_clave_predio` ASC),
  INDEX `fk_uso_predio_predio1_idx` (`upd_clave_predio` ASC),
  CONSTRAINT `fk_uso_predio_predio`
    FOREIGN KEY (`upd_clave_predio`)
    REFERENCES `mydb1`.`predio` (`prd_clave_catastral`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb1`.`uso_predio_opciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`uso_predio_opciones` (
  `upo_iduso_predio_opciones` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `upo_clave_predio` VARCHAR(20) NOT NULL,
  `upo_iduso_predio` INT UNSIGNED NOT NULL,
  `upo_descripcion` VARCHAR(45) NULL,  
  PRIMARY KEY (`upo_iduso_predio_opciones`, `upo_clave_predio`),
  INDEX `fk_uso_predio_opciones_uso_predio_idx` (`upo_clave_predio` ASC),
  CONSTRAINT `fk_uso_predio_opciones_predio`
    FOREIGN KEY (`upo_clave_predio`)
    REFERENCES `mydb1`.`uso_predio` (`upd_clave_predio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_uso_predio_opciones_uso_predio`
    FOREIGN KEY (`upo_iduso_predio`)
    REFERENCES `mydb1`.`uso_predio` (`upd_iduso_predio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb1`.`infraestructura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`infraestructura` (
  `inf_idinfraestructura` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `inf_clave_predio` VARCHAR(20) NOT NULL,
  `inf_idubicacion` INT UNSIGNED NOT NULL,
  `inf_tipo_via_acceso` VARCHAR(45) NULL,
  `inf_rodadura` VARCHAR(45) NULL,
  `inf_vias_acceso_adicionales` VARCHAR(45) NULL,
  `inf_agua_procedencia` VARCHAR(45) NULL,
  `inf_medidor_agua` VARCHAR(45) NULL,
  `inf_agua_recepcion` VARCHAR(45) NULL,
  `inf_eliminacion_excretas` VARCHAR(45) NULL,
  `inf_energia_electrica_procedencia` VARCHAR(45) NULL,
  `inf_medidor` VARCHAR(45) NULL,
  `inf_energia_electrica_recepcion` VARCHAR(45) NULL,
  `inf_eliminacion_basura` VARCHAR(45) NULL,
  `inf_telefono_convencional` VARCHAR(45) NULL,
  `inf_celular` VARCHAR(45) NULL,
  `inf_tv_cable` VARCHAR(45) NULL,
  `inf_internet` VARCHAR(45) NULL,
  `inf_metodo_riego` VARCHAR(45) NULL,
  `inf_disponibilidad_riego` VARCHAR(45) NULL,
  `inf_instalaciones_especiales` VARCHAR(45) NULL,
  `inf_ascensor` VARCHAR(45) NULL,
  `inf_circuito_cerrado_tv` VARCHAR(45) NULL,
  `inf_montacarga` VARCHAR(45) NULL,
  `inf_sistema_alterno_electricidad` VARCHAR(45) NULL,
  `inf_aire_acondicionado` VARCHAR(45) NULL,
  `inf_sistema_contra_incendios` VARCHAR(45) NULL,
  `inf_gas_centralizado` VARCHAR(45) NULL,
  `inf_ventilacion` VARCHAR(45) NULL,
  `inf_sistema_voz_datos` VARCHAR(45) NULL,
  `inf_alumbrado_publico` VARCHAR(45) NULL,
  `inf_recoleccion_basura` VARCHAR(45) NULL,
  `inf_transporte_urbano` VARCHAR(45) NULL,
  `inf_aseo_calles` VARCHAR(45) NULL,
  `inf_alcantarillado` VARCHAR(45) NULL,
  `inf_aceras` VARCHAR(45) NULL,
  `inf_bordillos` VARCHAR(45) NULL,    
  PRIMARY KEY (`inf_idinfraestructura`, `inf_clave_predio`, `inf_idubicacion`),
   UNIQUE INDEX `predioid_inf_UNIQUE` (`inf_idinfraestructura` ASC),
  UNIQUE INDEX `claveprd_inf_UNIQUE` (`inf_clave_predio` ASC),
  INDEX `fk_infraestructura_ubicacion_idx` (`inf_clave_predio` ASC),
  CONSTRAINT `fk_infraestructura_predio`
    FOREIGN KEY (`inf_clave_predio`)
    REFERENCES `mydb1`.`ubicacion` (`ubc_clave_predio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_infraestructura_ubicacion`
    FOREIGN KEY (`inf_idubicacion`)
    REFERENCES `mydb1`.`ubicacion` (`ubc_idubicacion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb1`.`obras_complementarias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`obras_complementarias` (
  `obc_idobras_complementarias` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `obc_clave_predio` VARCHAR(20) NOT NULL,
  `obc_idubicacion` INT NOT NULL,
  `obc_idinfraestructura` INT UNSIGNED NOT NULL,
  `obc_tipo_obra` VARCHAR(45) NULL,
  `obc_dimension_a` VARCHAR(45) NULL,
  `obc_dimension_b` VARCHAR(45) NULL,
  `obc_dimension_c` VARCHAR(45) NULL,
  `obc_cantidad_metros` VARCHAR(45) NULL,
  `obc_material` VARCHAR(55) NULL,
  `obc_edad` VARCHAR(45) NULL,
  `obc_estado` VARCHAR(45) NULL,  
  PRIMARY KEY (`obc_idobras_complementarias`, `obc_clave_predio`, `obc_idinfraestructura`),
  INDEX `fk_obras_complementarias_infraestructura_idx` (`obc_clave_predio` ASC),
  CONSTRAINT `fk_obras_complementarias_predio`
    FOREIGN KEY (`obc_clave_predio`)
    REFERENCES `mydb1`.`infraestructura` (`inf_clave_predio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_obras_complementarias_infraestructura`
    FOREIGN KEY (`obc_idinfraestructura`)
    REFERENCES `mydb1`.`infraestructura` (`inf_idinfraestructura`)
    ON DELETE CASCADE
    ON UPDATE CASCADE) 
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb1`.`construccion_caracteristicas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`construccion_caracteristicas` (
  `cdc_idconstruccion_caracteristicas` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cdc_clave_predio` VARCHAR(20) NOT NULL,
  `cdc_idubicacion` INT UNSIGNED NOT NULL,
  `cdc_numero_bloque` VARCHAR(45) NULL,
  `cdc_numero_piso` VARCHAR(45) NULL,
  `cdc_numero_unidad` VARCHAR(45) NULL,
  `cdc_nivel_piso` VARCHAR(45) NULL,
  `cdc_condicion_fisica` VARCHAR(45) NULL,
  `cdc_uso_constructivo` VARCHAR(45) NULL,
  `cdc_valor_cultural` VARCHAR(45) NULL,
  `cdc_area_construccion` VARCHAR(45) NULL,
  `cdc_anio_construccion` VARCHAR(45) NULL,
  `cdc_anio_restauracion` VARCHAR(45) NULL,
  `cdc_estado_conservacion` VARCHAR(45) NULL,
  `cdc_mamposteria_soportante` VARCHAR(45) NULL,
  `cdc_columnas` VARCHAR(45) NULL,
  `cdc_vigas` VARCHAR(45) NULL,
  `cdc_entrepiso` VARCHAR(45) NULL,
  `cdc_cubierta_entrepiso` VARCHAR(45) NULL,
  `cdc_gradas` VARCHAR(45) NULL,
  `cdc_contrapiso` VARCHAR(45) NULL,
  `cdc_paredes` VARCHAR(45) NULL,
  `cdc_enlucido_paredes` VARCHAR(45) NULL,
  `cdc_elucido_tumbados` VARCHAR(45) NULL,
  `cdc_revestimiento_pared_interior` VARCHAR(45) NULL,
  `cdc_revestimiento_pared_exterior` VARCHAR(45) NULL,
  `cdc_revestimiento_cubierta` VARCHAR(45) NULL,
  `cdc_tumbados` VARCHAR(45) NULL,
  `cdc_ventanas` VARCHAR(45) NULL,
  `cdc_vidrios` VARCHAR(45) NULL,
  `cdc_puertas` VARCHAR(45) NULL,
  `cdc_closets` VARCHAR(45) NULL,
  `cdc_pisos` VARCHAR(45) NULL,
  `cdc_proteccion_ventanas` VARCHAR(45) NULL,
  `cdc_gradas_acabados` VARCHAR(45) NULL,
  `cdc_clasificacion_vivienda` VARCHAR(45) NULL,
  `cdc_tipo_vivienda` VARCHAR(45) NULL,
  `cdc_condicion_ocupacion` VARCHAR(45) NULL,
  `cdc_acabado_piso` VARCHAR(45) NULL,
  `cdc_estado_piso` VARCHAR(45) NULL,
  `cdc_numero_hogares` VARCHAR(45) NULL,
  `cdc_numero_habitantes` VARCHAR(45) NULL,
  `cdc_numero_habitaciones` VARCHAR(45) NULL,
  `cdc_numero_dormitorios` VARCHAR(45) NULL,
  `cdc_espacios_aseo_duchas` VARCHAR(45) NULL,
  `cdc_tenencia_vivienda` VARCHAR(45) NULL,
  `cdc_telefono_convencional` VARCHAR(45) NULL,
  `cdc_cantidad_celulares` VARCHAR(45) NULL,
  `cdc_servicio_internet` VARCHAR(45) NULL,
  `cdc_total_propiedad_exclusiva` VARCHAR(45) NULL,
  `cdc_total_propiedad_comunal` VARCHAR(45) NULL,
  `cdc_alicuota_porcentaje` VARCHAR(45) NULL,  
  PRIMARY KEY (`cdc_idconstruccion_caracteristicas`, `cdc_clave_predio`, `cdc_idubicacion`),
  INDEX `fk_construccion_caracteristicas_ubicacion_idx` (`cdc_clave_predio` ASC),
  CONSTRAINT `fk_construccion_caracteristicas_predio`
    FOREIGN KEY (`cdc_clave_predio`)
    REFERENCES `mydb1`.`ubicacion` (`ubc_clave_predio`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_construccion_caracteristicas_ubicacion`
    FOREIGN KEY (`cdc_idubicacion`)
    REFERENCES `mydb1`.`ubicacion` (`ubc_idubicacion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb1`.`grafico_predio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`grafico_predio` (
  `grp_idgrafico_predio` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `grp_clave_predio` VARCHAR(20) NOT NULL,
  `grp_link_grafico` VARCHAR(45) NULL,
  `grp_link_foto_fachada` VARCHAR(45) NULL,
  `grp_descripcion_grafico` VARCHAR(45) NULL,
  `grp_calle_norte` VARCHAR(45) NULL,
  `grp_calle_sur` VARCHAR(45) NULL,
  `grp_calle_este` VARCHAR(45) NULL,
  `grp_calle_oeste` VARCHAR(45) NULL,
  `grp_area_grafica_lote` VARCHAR(45) NULL,
  `grp_dimension_frente` VARCHAR(45) NULL,
  `grp_fondo_relativo` VARCHAR(45) NULL,
  `grp_coordenada_x` VARCHAR(45) NULL,
  `grp_coordenada_y` VARCHAR(45) NULL,
  `grp_avaluo_tierras` VARCHAR(45) NULL,
  `grp_avaluo_construcciones` VARCHAR(45) NULL,
  `grp_avaluo_total` VARCHAR(45) NULL,
  `grp_observaciones` VARCHAR(45) NULL,  
  PRIMARY KEY (`grp_idgrafico_predio`, `grp_clave_predio`),
  INDEX `fk_grafico_predio_predio_idx` (`grp_clave_predio` ASC),
  CONSTRAINT `fk_grafico_predio_predio`
    FOREIGN KEY (`grp_clave_predio`)
    REFERENCES `mydb1`.`predio` (`prd_clave_catastral`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb1`.`investigacion_predial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb1`.`investigacion_predial` (
  `inv_idinvestigacion_predial` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `inv_clave_predio` VARCHAR(20) NOT NULL,
  `inv_tipo_informante` VARCHAR(45) NULL,
  `inv_apellidos_informante` VARCHAR(45) NULL,
  `inv_nombre_informante` VARCHAR(45) NULL,
  `inv_telefono_informante` VARCHAR(45) NULL,
  `inv_email_informante` VARCHAR(45) NULL,
  `inv_propietario_desconocido` VARCHAR(45) NULL,
  `inv_otra_fuente_informacion` VARCHAR(45) NULL,
  `inv_dimensiones_terreno_irregular` VARCHAR(45) NULL,
  `inv_linderos_definidos` VARCHAR(45) NULL,
  `inv_nuevo_bloque_numero` VARCHAR(45) NULL,
  `inv_ampliacion_bloque_numero` VARCHAR(45) NULL,
  `inv_nombre_actualizador` VARCHAR(45) NULL,
  `inv_apellido_actualizador` VARCHAR(45) NULL,
  `inv_anio_actualizacion` VARCHAR(45) NULL,
  `inv_mes_actualizacion` VARCHAR(45) NULL,
  `inv_dia_actualizacion` VARCHAR(45) NULL,
  `inv_cedula_actualizador` VARCHAR(45) NULL,
  `inv_firma_actualizador` VARCHAR(45) NULL,
  `inv_nombre_supervisor` VARCHAR(45) NULL,
  `inv_apellido_supervisor` VARCHAR(45) NULL,
  `inv_cedula_supervisor` VARCHAR(45) NULL,
  `inv_anio_supervision` VARCHAR(45) NULL,
  `inv_mes_supervision` VARCHAR(45) NULL,
  `inv_dia_supervision` VARCHAR(45) NULL,
  `inv_firma_supervisor` VARCHAR(45) NULL,  
  PRIMARY KEY (`inv_idinvestigacion_predial`, `inv_clave_predio`),
  INDEX `fk_investigacion_predial_predio1_idx` (`inv_clave_predio` ASC),
  CONSTRAINT `fk_investigacion_predial_predio`
    FOREIGN KEY (`inv_clave_predio`)
    REFERENCES `mydb1`.`predio` (`prd_clave_catastral`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;