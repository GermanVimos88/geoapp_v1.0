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

/*  Inserciones */
INSERT INTO propietario (pro_idpropietario,pro_identificacion,pro_tipo_propietario,pro_primer_apellido,pro_segundo_apellido,pro_primer_nombre,pro_segundo_nombre,pro_tipo_documento,pro_estado_civil,pro_participacion_porcentaje,pro_representante,pro_anio_nacimiento,pro_mes_nacimiento,pro_dia_nacimiento,pro_nacionalidad,pro_email,pro_telefono,pro_ciudad_domicilio,pro_direccion_domicilio,pro_jefe_hogar,pro_personeria_juridica,pro_ruc,pro_razon_social,pro_inscrito,pro_lugar_inscripcion,pro_acuerdo_registro,pro_representante_legal,pro_documento_representante,pro_idrepresentante,pro_email_representante,pro_telefono_representante,pro_conyugue,pro_apellidos_conyugue,pro_nombres_conyugue,pro_tipo_documento_conyugue,pro_identificacion_conyugue,pro_telefono_conyugue,pro_participacion_porcentaje_conyugue,pro_email_conyugue) VALUES 
(1,'1500125621','Posesionario','Manitio','Salagaje','María','Consolación','Cédula','Casado','s/n','0','','','','Ecuatoriana','s/n','s/n','s/n','s/n','0','s/n','','','','','','','','','','','Si','Tanicuche Imbaquingo','César Julio','Cédula','0400322665','s/n','s/n','s/n'),
(2,'0400109153','Natural','Quispe ','Palacios','Ulpiano','Medardo','Cédula','Casado','s/n','0','','','','Ecuatoriana','s/n','s/n','s/n','s/n','0','s/n','','','','','','','','','','','Si','Palma López','Segunda','s/n','s/n','s/n','s/n','s/n'),
(3,'1560000940001','Jurídica','s/n','s/n','s/n','s/n','s/n','s/n','s/n','0','','','','s/n','s/n','s/n','s/n','s/n','0','Pública','1560000940001','GAD Municipal Quijos','Ministerio','','717 Registro oficial','Josué Adalverto Borja Álvarez','RUC','1560000940001','alcaldiaquijos@gmail.com','062320-112','No','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(4,'1590001089001','Jurídica','s/n','s/n','s/n','s/n','s/n','s/n','s/n','0','','','','s/n','s/n','s/n','s/n','s/n','0','s/n','1590001089001','Misión Josefina de Napo','Ministerio','Quito','PO 3294','Prandi Gabriele Giovanni','Cédula','1755118948','','0959573767','No','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(5,'1560000940001','Jurídica','s/n','s/n','s/n','s/n','s/n','s/n','s/n','0','','','','s/n','s/n','s/n','s/n','s/n','0','Pública','1560000940001','GAD Municipal Quijos','Ministerio','Quito','717 Registro oficial','Josué Adalverto Borja Álvarez','RUC','1560000940001','alcaldiaquijos@gmail.com','062320-112','No','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(6,'1500086671','Natural','Zambrano ','García','Enith','Leticia','Cédula','Casado','100','1','1949','Febrero','12','Ecuatoriana','s/n','s/n','Cuyuja','Barrio Central','1','','','','','','','','','','','','No','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(7,'0500222286','Posesionario','Tenorio','s/n','Segundo','Amable','Cédula','Casado','s/n','0','1946','Marzo','31','Ecuatoriana','s/n','s/n','Cuyuja','Barrio Central','0','','','','','','','','','','','','No','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(8,'1500067655','Natural','Manitio','Manitio','Rosa','María Leonor','Cédula','Casado','100','1','1937','Agosto','24','Ecuatoriana','s/n','s/n','Cuyuja','Barrio Central','0','','','','','','','','','','','','Si','Manitio','Manuel','s/n','s/n','s/n','s/n','s/n'),
(9,'1703518850','Natural','Gonzalez','Pillajo','Magda','Avelina','Cédula','Viuda','100','1','1953','Julio','11','Ecuatoriana','s/n','s/n','Cuyuja','Barrio Central','0','','','','','','','','','','','','','','','','','','',''),
(10,'1560000940001','Jurídica','s/n','s/n','s/n','s/n','s/n','s/n','s/n','0','','','','','','','','','','Pública','1560000940001','GAD Municipal Quijos','Ministerio','Quito','717 Registro oficial','Josué Adalverto Borja Álvarez','RUC','1560000940001','alcaldiaquijos@gmail.com','062320-112','','','','','','','','');

INSERT INTO predio (prd_idpredio,prd_idpropietario,prd_identificacion,prd_tipo,prd_clave_catastral,prd_clave_anterior,prd_regimen_tenencia,prd_bloque,prd_piso,prd_unidad,prd_numero_predio) VALUES 
(1,1,'1500125621','Urbano','1507520301001001','1507520301001002000','Unipropiedad','s/n','s/n','s/n','s/n'),
(2,2,'0400109153','Urbano','1507520301001002','1507520301001001000','Unipropiedad','s/n','s/n','s/n','s/n'),
(3,3,'1560000940001','Urbano','1507520301003001','1507520301003001000','Unipropiedad','s/n','s/n','s/n','s/n'),
(4,4,'1590001089001','Urbano','1507520301003002','1507520301003002000','s/n','s/n','s/n','s/n','s/n'),
(5,5,'1560000940001','Urbano','1507520301003003','1507520301003003000','Unipropiedad','s/n','s/n','s/n','s/n'),
(6,6,'1500086671','Urbano','1507520301004001','1507520301004001000','Unipropiedad','s/n','s/n','s/n','3'),
(7,7,'0500222286','Urbano','1507520301004002','1507520301004002000','s/n','s/n','s/n','s/n','s/n'),
(8,8,'1500067655','Urbano','1507520301004003','1507520301004003000','Unipropiedad','s/n','s/n','s/n','11'),
(9,9,'1703518850','Urbano','1507520301004004','1507520301004004000','Unipropiedad','s/n','s/n','s/n','s/n'),
(10,10,'1560000940001','Urbano','1507520301004005','1507520301004005000','Unipropiedad','s/n','s/n','s/n','s/n');

INSERT INTO ubicacion (ubc_idubicacion,ubc_clave_predio,ubc_eje_principal,ubc_codigo_placa_predial,ubc_eje_secundario,ubc_nombre_predio,ubc_sector) VALUES 
(1,'1507520301001001','Calle s/n','s/n','Calle s/n','s/n','Cuyuja'),
(2,'1507520301001002','Calle s/n','s/n','Calle s/n','s/n','Cuyuja'),
(3,'1507520301003001','Vía Interoceánica','s/n','s/n','s/n','Cuyuja'),
(4,'1507520301003002','Vía Interoceánica','s/n','Calle s/n','s/n','Cuyuja'),
(5,'1507520301003003','Vía Interoceánica','s/n','Calle Jesús del Gran Poder','s/n','Cuyuja'),
(6,'1507520301004001','Calle Jesús del Gran Poder','s/n','Calle Oriente','s/n','Barrio Central'),
(7,'1507520301004002','Calle Oriente','s/n','Calle Huila','s/n','Barrio Central'),
(8,'1507520301004003','Calle Huila','s/n','Vía Interoceánica','s/n','Barrio Central'),
(9,'1507520301004004','Vía Interoceánica','s/n','Calle La Hila','s/n','Barrio Central'),
(10,'1507520301004005','Vía Interoceánica','s/n','Calle Huila','s/n','Cuyuja');

INSERT INTO estatus_legal (elg_idestatus_legal,elg_clave_predio,elg_titulo,elg_escritura,elg_celebrado_ante,elg_nombre_numero_notaria,elg_provincia_titulacion,elg_canton_inscripcion,elg_dia_protocolizacion,elg_mes_protocolizacion,elg_anio_protocolizacion,elg_registro_propiedad,elg_tomo,elg_partida,elg_dia_inscripcion_registro_propiedad,elg_mes_inscripcion_registro_propiedad,elg_anio_inscripcion_registro_propiedad,elg_area_segun_titulo,elg_unidad_medida,elg_forma_tenencia,elg_forma_adquisicion,elg_requiere_perfeccionamiento,elg_anios_sin_perfeccionamiento,elg_anios_posesion,elg_pueblo_etnia,elg_adquisicion_sin_titulo,elg_documento_presentado,elg_primer_apellido_posesionario,elg_segundo_apellido_posesionario,elg_primer_nombre_posesionario,elg_segundo_nombre_posesionario,elg_tipo_documento_posesionario,elg_identificacion_posesionario,elg_email_posesionario,elg_telefono_posesionario) VALUES 
(1,'1507520301001001','No','Si ','Notario','s/n','Napo','Quijos','','','','Quijos','s/n','s/n','','','','','m²','s/n','s/n','s/n','2000','2000','','Posesión individual','s/n','','','','','','','',''),
(2,'1507520301001002','Si','Si ','Notario','Primera Quijos','Napo','Quijos','7','Enero','2000','Quijos','025','454','25','Enero','2000','632.23','m²','Propietario','Compra/Venta','s/n','s/n','s/n','s/n','s/n','s/n','Tanicuchi','Imbaquinga','César','Julio','Cédula','0400322665','',''),
(3,'1507520301003001','Si','Si ','Notario','Primera Quijos','Napo','Quijos','30','Abril','1992','Quijos','021','027','29','Abril','1992','4.65','Hectáreas','Propietario','Adjudicación','s/n','s/n','s/n','s/n','s/n','s/n','','','','','','','',''),
(4,'1507520301003002','Si','Si ','Notario','Primera Quijos','Napo','Quijos','28','Abril','1994','Quijos','022','075','27','Mayo','1994','1267.5','m²','Propietario','Donación','s/n','s/n','s/n','s/n','s/n','s/n','','','','','','','',''),
(5,'1507520301003003','Si','Si ','Notario','Primera Quijos','Napo','Quijos','30','Abril','1992','Quijos','021','027','29','Abril','1992','4.65','Hectáreas','Propietario','Adjudicación','s/n','s/n','s/n','s/n','s/n','s/n','','','','','','','',''),
(6,'1507520301004001','Si','Si ','Notario','Quito','Napo','Quijos','3','Septiembre','2004','Quijos','027','083','12','Julio','2007','3452.41','m²','Propietario','Compra/Venta','s/n','s/n','s/n','s/n','s/n','s/n','','','','','','','',''),
(7,'1507520301004002','No','No','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','Si','1999','1999','','Posesión individual','s/n','','','','','','','',''),
(8,'1507520301004003','Si','Si ','Notario','Primera Quijos','Napo','Quijos','13','Septiembre','2002','Quijos','027','341','27','Julio','2002','93.65','m²','Propietario','Compra/Venta','s/n','s/n','s/n','s/n','s/n','s/n','','','','','','','',''),
(9,'1507520301004004','Si','Si ','Notario','Primera Quijos','Napo','Quijos','29','Junio','2000','Quijos','025','675','29','Julio','2000','787.08','m²','Propietario','Compra/Venta','s/n','s/n','s/n','s/n','s/n','s/n','','','','','','','',''),
(10,'1507520301004005','Si','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','','','','','','','','');

INSERT INTO caracteristicas_lote (clt_idcaracteristicas_lote,clt_clave_predio,clt_idubicacion,clt_ocupacion,clt_localizacion_manzana,clt_forma,clt_topografia,clt_cobertura_nativa_predominante,clt_ecosistema_relevante,clt_afectaciones,clt_riesgos,clt_calidad_suelo) VALUES 
(1,'1507520301001001',1,'Edificado','En cabecera','Irregular','A nivel','No tiene','No tiene','No tiene','No tiene','Húmedo'),
(2,'1507520301001002',2,'Edificado','En cabecera','Regular','Bajo nivel','No tiene','No tiene','No tiene','No tiene','Húmedo'),
(3,'1507520301003001',3,'Edificado','En cabecera','Irregular','A nivel','No tiene','No tiene','No tiene','No tiene','Húmedo'),
(4,'1507520301003002',4,'Edificado','Esquinero','Regular','A nivel','No tiene','No tiene','No tiene','No tiene','Húmedo'),
(5,'1507520301003003',5,'No edificado','Esquinero','Regular','A nivel','No tiene','No tiene','No tiene','No tiene','Húmedo'),
(6,'1507520301004001',6,'Edificado','Intermedio','Regular','A nivel','No tiene','No tiene','No tiene','No tiene','Húmedo'),
(7,'1507520301004002',7,'Edificado','Esquinero','Regular','A nivel','No tiene','No tiene','No tiene','No tiene','Húmedo'),
(8,'1507520301004003',8,'Edificado','Intermedio','Irregular','A nivel','No tiene','No tiene','No tiene','No tiene','Húmedo'),
(9,'1507520301004004',9,'Edificado','Intermedio','Regular','A nivel','No tiene','No tiene','No tiene','No tiene','Húmedo'),
(10,'1507520301004005',10,'Edificado','Esquinero','Regular','A nivel','No tiene','No tiene','No tiene','No tiene','Húmedo');

INSERT INTO uso_predio (upd_iduso_predio,upd_clave_predio,upd_uso_principal,upd_uso_secundario,upd_descripcion) VALUES 
(1,'1507520301001001','Residencial','No tiene','-'),
(2,'1507520301001002','Residencial','No tiene','-'),
(3,'1507520301003001','Residencial','No tiene','-'),
(4,'1507520301003002','Religioso','No tiene','-'),
(5,'1507520301003003','Espacio Público','No tiene','-'),
(6,'1507520301004001','Residencial','No tiene','-'),
(7,'1507520301004002','Residencial','No tiene','-'),
(8,'1507520301004003','Residencial','No tiene','-'),
(9,'1507520301004004','Residencial','No tiene','-'),
(10,'1507520301004005','Servicios','No tiene','-');

INSERT INTO infraestructura (inf_idinfraestructura,inf_clave_predio,inf_idubicacion,inf_tipo_via_acceso,inf_rodadura,inf_vias_acceso_adicionales,inf_agua_procedencia,inf_medidor_agua,inf_agua_recepcion,inf_eliminacion_excretas,inf_energia_electrica_procedencia,inf_medidor,inf_energia_electrica_recepcion,inf_eliminacion_basura,inf_telefono_convencional,inf_celular,inf_tv_cable,inf_internet,inf_metodo_riego,inf_disponibilidad_riego,inf_instalaciones_especiales,inf_ascensor,inf_circuito_cerrado_tv,inf_montacarga,inf_sistema_alterno_electricidad,inf_aire_acondicionado,inf_sistema_contra_incendios,inf_gas_centralizado,inf_ventilacion,inf_sistema_voz_datos,inf_alumbrado_publico,inf_recoleccion_basura,inf_transporte_urbano,inf_aseo_calles,inf_alcantarillado,inf_aceras,inf_bordillos) VALUES 
(1,'1507520301001001',1,'Calle','Lastre','No tiene','Red pública','1','Tuberia dentro de la vivienda','Red pública de alcantarillado','Red pública','1','','Carro recolector','0','0','0','0','No tiene','No tiene','No tiene','0','0','0','0','0','0','0','0','0','1','1','0','0','Sanitario','1','1'),
(2,'1507520301001002',2,'Calle','Tierra','No tiene','Red pública','1','Tuberia dentro de la vivienda','Red pública de alcantarillado','Red pública','1','','Carro recolector','0','1','0','0','No tiene','No tiene','No tiene','0','0','0','0','0','0','0','0','0','1','1','0','0','Sanitario','1','1'),
(3,'1507520301003001',3,'Calle','Asfalto','No tiene','Red pública','1','Tuberia dentro de la vivienda','Red pública de alcantarillado','Red pública','1','','Carro recolector','0','0','0','0','No tiene','No tiene','No tiene','0','0','0','0','0','0','0','0','0','1','1','0','0','Sanitario','1','1'),
(4,'1507520301003002',4,'Calle','Lastre','No tiene','Red pública','1','Tuberia dentro de la vivienda','Red pública de alcantarillado','Red pública','1','','Carro recolector','0','0','0','0','No tiene','No tiene','No tiene','0','0','0','0','0','0','0','0','0','1','1','0','0','Sanitario','1','1'),
(5,'1507520301003003',5,'Calle','Asfalto','No tiene','Red pública','0','No tiene','No tiene','Red pública','0','','No tiene','0','0','0','0','No tiene','No tiene','No tiene','0','0','0','0','0','0','0','0','0','1','1','0','0','No tiene','1','1'),
(6,'1507520301004001',6,'Calle','Lastre','No tiene','Red pública','0','Tuberia dentro de la vivienda','Red pública de alcantarillado','Red pública','0','','Carro recolector','0','0','0','0','No tiene','No tiene','No tiene','0','0','0','0','0','0','0','0','0','1','1','0','0','Sanitario','1','1'),
(7,'1507520301004002',7,'Calle','Tierra','No tiene','Red pública','1','Tuberia dentro de la vivienda','Red pública de alcantarillado','Red pública','1','','Carro recolector','1','1','1','0','No tiene','No tiene','No tiene','0','0','0','0','0','0','0','0','0','0','1','0','0','Sanitario','1','1'),
(8,'1507520301004003',8,'Calle','Lastre','No tiene','Red pública','0','Tuberia dentro de la vivienda','Red pública de alcantarillado','Red pública','1','','Carro recolector','0','0','0','0','No tiene','No tiene','No tiene','0','0','0','0','0','0','0','0','0','1','1','0','0','Sanitario','1','1'),
(9,'1507520301004004',9,'Avenida','Asfalto','No tiene','Red pública','1','Tuberia dentro de la vivienda','Red pública de alcantarillado','Red pública','1','','Carro recolector','1','1','1','0','No tiene','No tiene','No tiene','0','0','0','0','0','0','0','0','0','1','1','0','0','Sanitario','1','1'),
(10,'1507520301004005',10,'Avenida','Asfalto','No tiene','No tiene','0','No tiene','No tiene','Red pública','1','','No tiene','0','0','0','0','No tiene','No tiene','No tiene','0','0','0','0','0','0','0','0','0','1','1','0','0','Sanitario','1','1');


INSERT INTO obras_complementarias (obc_idobras_complementarias,obc_clave_predio,obc_idubicacion,obc_idinfraestructura,obc_tipo_obra,obc_dimension_a,obc_dimension_b,obc_dimension_c,obc_cantidad_metros,obc_material,obc_edad,obc_estado) VALUES 
(1,'1507520301001001',1,1,'No tiene','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(2,'1507520301001002',2,2,'No tiene','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(3,'1507520301003001',3,3,'No tiene','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(4,'1507520301003002',4,4,'No tiene','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(5,'1507520301003003',5,5,'No tiene','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(6,'1507520301004001',6,6,'Cerramiento','23','1.5','s/n','34.5','Mixto','5','Bueno'),
(7,'1507520301004002',7,7,'Cerramiento','20','2','s/n','40','Bloque','2','Bueno'),
(8,'1507520301004003',8,8,'No tiene','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(9,'1507520301004004',9,9,'Cerramiento','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(10,'1507520301004005',10,10,'No tiene','s/n','s/n','s/n','s/n','s/n','s/n','s/n');

INSERT INTO construccion_caracteristicas (cdc_idconstruccion_caracteristicas,cdc_clave_predio,cdc_idubicacion,cdc_numero_bloque,cdc_numero_piso,cdc_numero_unidad,cdc_nivel_piso,cdc_condicion_fisica,cdc_uso_constructivo,cdc_valor_cultural,cdc_area_construccion,cdc_anio_construccion,cdc_anio_restauracion,cdc_estado_conservacion,cdc_mamposteria_soportante,cdc_columnas,cdc_vigas,cdc_entrepiso,cdc_cubierta_entrepiso,cdc_gradas,cdc_contrapiso,cdc_paredes,cdc_enlucido_paredes,cdc_elucido_tumbados,cdc_revestimiento_pared_interior,cdc_revestimiento_pared_exterior,cdc_revestimiento_cubierta,cdc_tumbados,cdc_ventanas,cdc_vidrios,cdc_puertas,cdc_closets,cdc_pisos,cdc_proteccion_ventanas,cdc_gradas_acabados,cdc_clasificacion_vivienda,cdc_tipo_vivienda,cdc_condicion_ocupacion,cdc_acabado_piso,cdc_estado_piso,cdc_numero_hogares,cdc_numero_habitantes,cdc_numero_habitaciones,cdc_numero_dormitorios,cdc_espacios_aseo_duchas,cdc_tenencia_vivienda,cdc_telefono_convencional,cdc_cantidad_celulares,cdc_servicio_internet,cdc_total_propiedad_exclusiva,cdc_total_propiedad_comunal,cdc_alicuota_porcentaje) VALUES 
(1,'1507520301001001',1,'1','1','s/n','Calzada','En obra gris','Casa','No tiene','171','1978','s/n','Bueno','No tiene','Hormigón armado','Hierro perfil','No tiene','No tiene','No tiene','Hormigón simple','Bloque','Si tiene','No tiene','No tiene','No tiene','Zinc','No tiene','Madera común','Vidrio común','Madera común','No tiene','Cemento','Si tiene','No tiene','Casa','Particular','Desocupada','Si tiene','Bueno','1','0','2','2','1','Propia','No tiene','0','No tiene','s/n','s/n','s/n'),
(2,'1507520301001001',1,'2','1','s/n','Calzada','Terminada','Casa','No tiene','142','2015','s/n','Regular','No tiene','Madera común','Madera común','No tiene','Madera común','No tiene','Caña','Madera común','No tiene','No tiene','Madera','Madera','Zinc','No tiene','Madera común','No tiene','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Ocupada','No tiene','Bueno','1','2','2','2','1','Propia','No tiene','0','No tiene','s/n','s/n','s/n'),
(3,'1507520301001002',2,'1','1','s/n','Calzada','Terminada','Casa','No tiene','192','1978','s/n','Regular','No tiene','Madera común','Madera común','No tiene','Madera común','No tiene','Caña','Madera común','No tiene','No tiene','Madera','Madera','Zinc','No tiene','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Ocupada','No tiene','Bueno','1','6','2','2','1','Propia','No tiene','3','No tiene','s/n','s/n','s/n'),
(4,'1507520301003001',3,'1','1','s/n','Calzada','Terminada','Casa','No tiene','72','1993','s/n','Bueno','No tiene','Hormigón armado','Madera común','No tiene','Madera común','No tiene','Hormigón simple','Bloque','Si tiene','No tiene','Pintura caucho','Pintura esmalte','Zinc','No tiene','Hierro','Vidrio común','Madera común','No tiene','Cemento','No tiene','No tiene','Casa','Particular','Desocupada','Si tiene','Bueno','0','0','2','2','1','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n'),
(5,'1507520301003001',3,'2','1','s/n','Calzada','Terminada','Otros','No tiene','720','-','s/n','Bueno','No tiene','Hierro perfil','Hierro cercha','No tiene','Hierro perfiles','No tiene','Hormigón simple','Bloque','Si tiene','No tiene','Pintura caucho','Pintura caucho','Steel panel','No tiene','No tiene','No tiene','Metálica reforzada','No tiene','Cemento','No tiene','No tiene','No aplica','Particular','Desocupada','Si tiene','Bueno','0','0','1','0','1','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n'),
(6,'1507520301003002',4,'1','1','s/n','Calzada','Terminada','Iglesia','No tiene','266','1988','2003','Bueno','No tiene','Hormigón armado','Hierro perfil','No tiene','No tiene','No tiene','Hormigón simple','Bloque','Si tiene','No tiene','Pintura esmalte','Pintura esmalte','Zinc','No tiene','Hierro','Vidrio común','Madera común','No tiene','Cerámica','Si tiene','No tiene','No aplica','Particular','Desocupada','Si tiene','Bueno','0','0','3','0','2','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n'),
(7,'1507520301003003',5,'s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(8,'1507520301004001',6,'1','1','s/n','Calzada','Terminada','Casa','No tiene','42','2000','s/n','Regular','No tiene','Hormigón armado','Madera común','No tiene','No tiene','No tiene','Hormigón simple','Bloque','No tiene','No tiene','Pintura esmalte','Pintura esmalte','Zinc','No tiene','Madera común','Vidrio común','Madera común','No tiene','Cerámica','No tiene','No tiene','Casa','Particular','Ocupada','Si tiene','Bueno','1','2','3','2','1','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n'),
(9,'1507520301004001',6,'2','1','s/n','Calzada','Terminada','Casa','No tiene','40','1985','s/n','Regular','No tiene','Madera común','Madera común','No tiene','No tiene','No tiene','Tierra','Madera común','No tiene','No tiene','Pintura esmalte','Pintura esmalte','Zinc','No tiene','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Desocupada','No tiene','Bueno','0','0','3','2','1','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n'),
(10,'1507520301004001',6,'3','1','s/n','Calzada','Terminada','Casa','No tiene','12','1985','s/n','Regular','No tiene','Madera común','Madera común','No tiene','No tiene','No tiene','Tierra','Madera común','No tiene','No tiene','No tiene','No tiene','Zinc','No tiene','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Desocupada','No tiene','Bueno','0','0','2','0','0','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n'),
(11,'1507520301004001',6,'4','1','s/n','Calzada','Terminada','Casa','No tiene','12','1985','s/n','Regular','No tiene','Madera común','Madera común','No tiene','Madera común','No tiene','Hormigón simple','Madera común','No tiene','No tiene','No tiene','Pintura esmalte','Zinc','No tiene','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Desocupada','No tiene','Bueno','0','0','1','0','0','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n'),
(12,'1507520301004002',7,'1','1','s/n','Calzada','Terminada','Casa','No tiene','50','1985','s/n','Bueno','No tiene','Madera común','Madera común','Madera cpmún','Madera común','Madera común','Tierra','Madera común','No tiene','No tiene','Pintura esmalte','Pintura esmalte','No tiene','No tiene','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Ocupada','No tiene','Bueno','1','2','3','2','1','Propia','Si tiene','1','No tiene','s/n','s/n','s/n'),
(13,'1507520301004002',7,'1','2','s/n','Calzada','Terminada','Casa','No tiene','50','1985','s/n','Bueno','No tiene','Madera común','Madera común','No tiene','No tiene','Madera común','No tiene','Madera común','No tiene','No tiene','No tiene','No tiene','Zinc','Madera común','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Ocupada','No tiene','Bueno','0','0','3','0','1','Propia','Si tiene','1','No tiene','s/n','s/n','s/n'),
(14,'1507520301004003',8,'1','1','s/n','Calzada','Terminada','Casa','No tiene','24','1985','s/n','Bueno','No tiene','Madera común','Madera común','No tiene','No tiene','No tiene','Tierra','Madera común','No tiene','No tiene','Pintura esmalte','Pintura esmalte','Zinc','No tiene','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Ocupada','No tiene','Bueno','1','2','2','1','1','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n'),
(15,'1507520301004004',9,'1','1','0','Calzada','Terminada','Casa','No tiene','70','1998','s/n','Bueno','No tiene','Madera común','Madera común','No tiene','No tiene','No tiene','Tierra','Madera común','No tiene','No tiene','Pintura caucho','Pintura caucho','Zinc','Madera común','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Ocupada','No tiene','Bueno','1','3','4','3','1','Propia y totalmente pagada','Si tiene','2','No tiene','s/n','s/n','s/n'),
(16,'1507520301004004',9,'2','1','0','Calzada','Terminada','Casa','No tiene','75','1998','s/n','Bueno','No tiene','Madera común','Madera común','No tiene','No tiene','No tiene','Tierra','Madera común','No tiene','No tiene','Pintura caucho','Pintura caucho','Zinc','Madera común','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Desocupada','No tiene','Bueno','0','0','4','3','1','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n'),
(17,'1507520301004004',9,'3','1','0','Calzada','Terminada','Casa','No tiene','51','1998','s/n','Bueno','No tiene','Madera común','Madera común','No tiene','No tiene','No tiene','Tierra','Madera común','No tiene','No tiene','Pintura caucho','Pintura caucho','Zinc','Madera común','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Desocupada','No tiene','Bueno','0','0','3','2','1','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n'),
(18,'1507520301004004',9,'4','1','0','Calzada','Terminada','Casa','No tiene','60','1982','s/n','Bueno','No tiene','Madera común','Madera común','No tiene','No tiene','No tiene','Tierra','Madera común','No tiene','No tiene','Pintura caucho','Pintura caucho','Zinc','Madera común','Madera común','Vidrio común','Madera común','No tiene','Madera común','No tiene','No tiene','Casa','Particular','Ocupada','No tiene','Bueno','1','4','3','2','1','Propia y totalmente pagada','Si tiene','3','No tiene','s/n','s/n','s/n'),
(19,'1507520301004005',10,'1','1','0','Calzada','Terminada','Malecón','No tiene','60','2000','s/n','Bueno','No tiene','Hormigón armado','Hormigón armado','No tiene','No tiene','No tiene','Hormigón simple','Bahareque','No tiene','No tiene','Calciminas','Pintura caucho','No tiene','Mortero arena-cemento','Hierro','No tiene','Madera común','No tiene','Cerámica','Si tiene','No tiene','No aplica','Particular','Desocupada','Si tiene','Bueno','0','0','2','0','9','Propia y totalmente pagada','No tiene','0','No tiene','s/n','s/n','s/n');

INSERT INTO grafico_predio (grp_idgrafico_predio,grp_clave_predio,grp_link_grafico,grp_link_foto_fachada,grp_descripcion_grafico,grp_calle_norte,grp_calle_sur,grp_calle_este,grp_calle_oeste,grp_area_grafica_lote,grp_dimension_frente,grp_fondo_relativo,grp_coordenada_x,grp_coordenada_y,grp_avaluo_tierras,grp_avaluo_construcciones,grp_avaluo_total,grp_observaciones) VALUES 
(1,'1507520301001001','Archivos/1507520301001001.jpg','','','Área verde','Calle s/n','Área verde','Lote vacío','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(2,'1507520301001002','Archivos/1507520301001002.jpg','','','Área verde','Calle s/n','Área verde','Manitio Salagaje María','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','El propietario es fallecido'),
(3,'1507520301003001','Archivos/1507520301003001.jpg','','','Calle s/n','GAD Municicpal Quijos','Misión Josefina de Napo','Vía Interoceánica','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(4,'1507520301003002','Archivos/1507520301003002.jpg','','','Calle s/n','GAD Municicpal Quijos','Calle Jesús del Gran Poder','GAD Municipal de Quijos','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(5,'1507520301003003','Archivos/1507520301003003.jpg','','','Misión Josefina Napo','Vía Interoceánica','Calle Jesús del Gran Poder','GAD Municipal de Quijos','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','Este predio tiene construido una pileta'),
(6,'1507520301004001','Archivos/1507520301004001.jpg','','','Mancheno Sonia/AGSO','Cruz Carmen/Escuela Manuel Villavicencio ','Leticia Zambrano Gonzales','Calle Jesús del Gran Poder','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','El bloque 1 está obsoleto'),
(7,'1507520301004002','Archivos/1507520301004002.jpg','','','Calle Oriente','Manitio Manitio María','Calle La Wila','Asociación Ganaderos','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(8,'1507520301004003','Archivos/1507520301004003.jpg','','','Tenorio Amable Segundo','s/n','Calle Huila','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(9,'1507520301004004','Archivos/1507520301004004.jpg','','','Tenorio Amable Segundo','Vía Interoceánica','Zambrano González','Reinoso Yánez/Zambrano Gonzalez','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n'),
(10,'1507520301004005','Archivos/1507520301004005.jpg','','','Zambrano/Gonzales Adita Leticia','Vía Interoceánica','Calle Huila','Zambrano Gonzales Silvia Janeth','s/n','s/n','s/n','s/n','s/n','s/n','s/n','s/n','Predio municipal');

INSERT INTO investigacion_predial (inv_idinvestigacion_predial,inv_clave_predio,inv_tipo_informante,inv_apellidos_informante,inv_nombre_informante,inv_telefono_informante,inv_email_informante,inv_propietario_desconocido,inv_otra_fuente_informacion,inv_dimensiones_terreno_irregular,inv_linderos_definidos,inv_nuevo_bloque_numero,inv_ampliacion_bloque_numero,inv_nombre_actualizador,inv_apellido_actualizador,inv_anio_actualizacion,inv_mes_actualizacion,inv_dia_actualizacion,inv_cedula_actualizador,inv_firma_actualizador,inv_nombre_supervisor,inv_apellido_supervisor,inv_cedula_supervisor,inv_anio_supervision,inv_mes_supervision,inv_dia_supervision,inv_firma_supervisor) VALUES 
(1,'1507520301001001','Sin informante','s/n','s/n','s/n','s/n','0','0','1','1','s/n','s/n','Dora','Huatatoca','2017','Abril','28','2100157466','Si','Soledad','Minga','1500921889','2017','Abril','30','Si'),
(2,'1507520301001002','s/n','s/n','s/n','s/n','s/n','0','0','1','1','s/n','s/n','Dora','Huatatoca','2017','Abril','28','2100157466','Si','Soledad','Minga','1500921889','2017','Abril','30','Si'),
(3,'1507520301003001','s/n','s/n','s/n','s/n','s/n','0','0','0','0','s/n','s/n','Dora','Huatatoca','2017','Abril','28','2100157466','Si','Nancy','Malpud','1500829302','2017','Mayo','10','Si'),
(4,'1507520301003002','s/n','s/n','s/n','s/n','s/n','0','0','0','0','s/n','s/n','Dora','Huatatoca','2017','Abril','28','2100157466','Si','Nancy','Malpud','1500829302','2017','Mayo','10','Si'),
(5,'1507520301003003','s/n','s/n','s/n','s/n','s/n','0','0','0','0','s/n','s/n','Dora','Huatatoca','2017','Abril','28','2100157466','Si','Nancy','Malpud','1500829302','2017','Mayo','10','Si'),
(6,'1507520301004001','Ocupante familiar','Zambrano García','Enith Leticia','s/n','s/n','0','0','0','0','s/n','s/n','Dora','Huatatoca','2017','Abril','28','2100157466','Si','Soledad','Minga','1500921889','2017','Abril','30','Si'),
(7,'1507520301004002','Ocupante familiar','Tenorio','Segundo Amable','s/n','s/n','0','1','1','0','s/n','s/n','Dora','Huatatoca','2017','Abril','28','2100157466','Si','Soledad','Minga','1500921889','2017','Abril','30','Si'),
(8,'1507520301004003','Ocupante familiar','Manitio Manitio','Rosa María','s/n','s/n','0','0','0','0','s/n','s/n','Dora','Huatatoca','2017','Abril','28','2100157466','Si','Soledad','Minga','1500921889','2017','Abril','30','Si'),
(9,'1507520301004004','Sin informante','s/n','s/n','s/n','s/n','1','1','1','1','s/n','s/n','David','Rodríguez','2017','Marzo','4','1724405145','Si','Soledad','Minga','1500921889','2017','Abril','30','Si'),
(10,'1507520301004005','Sin informante','s/n','s/n','s/n','s/n','0','1','1','0','s/n','s/n','Dora','Huatatoca','2017','Abril','28','2100157466','Si','Soledad','Minga','1500921889','2017','Abril','30','Si');