CREATE TABLE `Usuarios` (
`UsuarioID` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(20) NOT NULL,
`Clave` varchar(50) NOT NULL,
`DocumentoIdentidad` varchar(25) NOT NULL,
`Rol` int NOT NULL,
PRIMARY KEY (`UsuarioID`) ,
UNIQUE INDEX `IDX_UsuarioID` (`UsuarioID`)
);

CREATE TABLE `Personas` (
`PersonaID` int NOT NULL AUTO_INCREMENT,
`DocumentoIdentidad` varchar(25) NOT NULL,
`Nombres` varchar(50) NOT NULL,
`PrimerApellido` varchar(50) NOT NULL,
`SegundoApellido` varchar(50) NULL,
`Correo` varchar(51) NULL,
`Telefono` varchar(11) NULL,
/*'`DireccionID` int NOT NULL,: comentare este para poder hacer mis primeros mantenimientos'*/
PRIMARY KEY (`PersonaID`) ,
UNIQUE INDEX `IDX_DocumentoIdentidad` (`DocumentoIdentidad`),
UNIQUE INDEX `IDX_PersonaID` (`PersonaID`)
);

CREATE TABLE `Viajes` (
`ViajeID` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(50) NOT NULL,
`DestinoID` int NOT NULL,
`Precio` double NOT NULL,
`Cupo` int NOT NULL,
`FechaPartida` datetime NOT NULL,
`FechaLlegada` datetime NOT NULL,
PRIMARY KEY (`ViajeID`) ,
UNIQUE INDEX `IDX_ViajeID` (`ViajeID`)
);

CREATE TABLE `Reservaciones` (
`ReservacionID` int NOT NULL AUTO_INCREMENT,
`ViajeID` int NOT NULL,
`PersonaID` int NOT NULL,
`Estado` int NOT NULL,
PRIMARY KEY (`ReservacionID`) ,
INDEX `IDX_ReservacionID` (`ReservacionID`)
);

CREATE TABLE `Servicios` (
`ServicioID` int NOT NULL AUTO_INCREMENT,
`ServicioTipoID` int NOT NULL,
`SuplidorID` int NOT NULL,
`Nombre` varchar(255) NOT NULL,
PRIMARY KEY (`ServicioID`) ,
UNIQUE INDEX `IDX_ServicioID` (`ServicioID`)
);

CREATE TABLE `ServiciosTipos` (
`ServicioTipoID` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(50) NOT NULL,
PRIMARY KEY (`ServicioTipoID`) ,
UNIQUE INDEX `IDX_ServicioTipoID` (`ServicioTipoID`)
);

CREATE TABLE `Suplidores` (
`SuplidorID` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(50) NOT NULL,
PRIMARY KEY (`SuplidorID`) ,
INDEX `IDX_Suplidor` (`SuplidorID`)
);

CREATE TABLE `Paises` (
`PaisID` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(50) NOT NULL,
`CodigoISO3` char(3) NOT NULL COMMENT 'Es un codigo iso internacional de 3 caracteres.',
PRIMARY KEY (`PaisID`) ,
UNIQUE INDEX `IDX_PaisID` (`PaisID`),
UNIQUE INDEX `IDX_CodigoISO3` (`CodigoISO3`)
);

CREATE TABLE `Ciudades` (
`CiudadID` int NOT NULL AUTO_INCREMENT,
`PaisID` int NOT NULL,
`Nombre` varchar(50) NOT NULL,
PRIMARY KEY (`CiudadID`) ,
UNIQUE INDEX `IDX_Ciudad` (`CiudadID`)
);

CREATE TABLE `Direcciones` (
`DireccionID` int NOT NULL AUTO_INCREMENT,
`CiudadID` int NOT NULL,
`Descripcion` varchar(500) NOT NULL,
PRIMARY KEY (`DireccionID`) ,
UNIQUE INDEX `IDX_DireccionID` (`DireccionID`)
);

CREATE TABLE `ServiciosEnViajes` (
`ServicioID` int NOT NULL,
`ViajeID` int NOT NULL,
PRIMARY KEY (`ServicioID`, `ViajeID`) 
);

CREATE TABLE `Destinos` (
`DestinoID` int NOT NULL AUTO_INCREMENT,
`DireccionID` int NOT NULL,
`Foto` varchar(255) NOT NULL,
PRIMARY KEY (`DestinoID`) ,
UNIQUE INDEX `IDX_Destino` (`DestinoID`)
);

CREATE TABLE `Pagos` (
`PagoID` int NOT NULL AUTO_INCREMENT,
`ReservacionID` int NOT NULL,
`Estado` int(255) NOT NULL,
`FechaPago` varchar(255) NOT NULL,
`Tipo` int NOT NULL,
PRIMARY KEY (`PagoID`) ,
INDEX `IDX_PagoID` (`PagoID`)
);


ALTER TABLE `Ciudades` ADD CONSTRAINT `FK_CiudadPais` FOREIGN KEY (`PaisID`) REFERENCES `Paises` (`PaisID`);
ALTER TABLE `Direcciones` ADD CONSTRAINT `FK_CiudadDireccion` FOREIGN KEY (`CiudadID`) REFERENCES `Ciudades` (`CiudadID`);
/*'ALTER TABLE `Personas` ADD CONSTRAINT `FK_PersonaDireccion` FOREIGN KEY (`DireccionID`) REFERENCES `Direcciones` (`DireccionID`);'*/
ALTER TABLE `Usuarios` ADD CONSTRAINT `FK_UsuarioPersona` FOREIGN KEY (`DocumentoIdentidad`) REFERENCES `Personas` (`DocumentoIdentidad`);
ALTER TABLE `Destinos` ADD CONSTRAINT `FK_DestinoDireccion` FOREIGN KEY (`DireccionID`) REFERENCES `Direcciones` (`DireccionID`);
ALTER TABLE `Viajes` ADD CONSTRAINT `FK_ViajeADestino` FOREIGN KEY (`DestinoID`) REFERENCES `Destinos` (`DestinoID`);
ALTER TABLE `Reservaciones` ADD CONSTRAINT `FK_ReservacionesViajes` FOREIGN KEY (`ViajeID`) REFERENCES `Viajes` (`ViajeID`);
ALTER TABLE `Reservaciones` ADD CONSTRAINT `FK_ReservacionesPersonas` FOREIGN KEY (`PersonaID`) REFERENCES `Personas` (`PersonaID`);
ALTER TABLE `Servicios` ADD CONSTRAINT `FK_ServicioTipo` FOREIGN KEY (`ServicioTipoID`) REFERENCES `ServiciosTipos` (`ServicioTipoID`);
ALTER TABLE `Servicios` ADD CONSTRAINT `FK_ServicioSuplidor` FOREIGN KEY (`SuplidorID`) REFERENCES `Suplidores` (`SuplidorID`);
ALTER TABLE `ServiciosEnViajes` ADD CONSTRAINT `FK_ServicioDeViaje` FOREIGN KEY (`ServicioID`) REFERENCES `Servicios` (`ServicioID`);
ALTER TABLE `ServiciosEnViajes` ADD CONSTRAINT `FK_ViajeServicio` FOREIGN KEY (`ViajeID`) REFERENCES `Viajes` (`ViajeID`);
ALTER TABLE `Pagos` ADD CONSTRAINT `FK_PagoReservacion` FOREIGN KEY (`ReservacionID`) REFERENCES `Reservaciones` (`ReservacionID`);

