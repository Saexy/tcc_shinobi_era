CREATE DATABASE IF NOT EXISTS bd_shinobiera DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE bd_shinobiera;

DELIMITER $$

CREATE TABLE tb_user(
    IdUser int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    LoginUser varchar(15) NOT NULL,
    SenhaUser varchar(8) NOT NULL,
    NomeUser varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_sliders (
  IdSlider int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  NomeImgSlider varchar(20) DEFAULT NULL,
  CaminhoImgSlider varchar(20) NOT NULL,
  TituloSlider varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE tb_fases (
  IdFase int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  NomeImgFase varchar(20) DEFAULT NULL,
  CaminhoImgFase varchar(20) NOT NULL,
  TituloFase varchar(150) NOT NULL,
  SloganFase text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;