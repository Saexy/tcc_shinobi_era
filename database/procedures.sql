--
-- Sliders
--

DELIMITER $$
CREATE PROCEDURE p_getSlider(IN p_IdSlider INT) NO SQL
BEGIN
	SELECT * FROM tb_sliders WHERE IdSlider=p_IdSlider ORDER BY IdSlider;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE p_listSlider() NO SQL
BEGIN
	SELECT * FROM tb_sliders ORDER BY IdSlider;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE p_insertSlider(IN p_IdSlider INT, IN  p_NomeImgSlider VARCHAR(20), IN	p_CaminhoImgSlider VARCHAR(20), IN p_TituloSlider VARCHAR(150))
BEGIN
	INSERT INTO tb_sliders(IdSlider, NomeImgSlider, CaminhoImgSlider, TituloSlider)
	VALUES(p_IdSlider, p_NomeImgSlider, p_CaminhoImgSlider, p_TituloSlider);
END$$
DELIMITER ;				

DELIMITER $$
CREATE PROCEDURE p_deleteSlider(IN p_IdSlider INT) NO SQL
BEGIN
	DELETE FROM tb_sliders WHERE IdSlider=p_IdSlider;
END $$
DELIMITER ;

DELIMITER $$

DELIMITER $$
CREATE PROCEDURE p_editSlider(IN p_IdSlider INT, IN p_TituloSlider VARCHAR(150)) NO SQL
BEGIN
	UPDATE tb_sliders SET TituloSlider = p_TituloSlider WHERE IdSlider = p_IdSlider;
END $$
DELIMITER ;

--
-- Fases
--

DELIMITER $$
CREATE PROCEDURE p_getFase(IN p_IdFase INT) NO SQL
BEGIN
	SELECT * FROM tb_fases WHERE IdFase=p_IdFase ORDER BY IdFase;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE p_listFase() NO SQL
BEGIN
	SELECT * FROM tb_fases ORDER BY IdFase;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE p_insertFase(IN p_IdFase INT, IN  p_NomeImgFase VARCHAR(20), IN p_CaminhoImgFase VARCHAR(20), IN p_TituloFase VARCHAR(150), IN p_SloganFase text)
BEGIN
	INSERT INTO tb_fases(IdFase, NomeImgFase, CaminhoImgFase, TituloFase, SloganFase)
	VALUES(p_IdFase, p_NomeImgFase, p_CaminhoImgFase, p_TituloFase, p_SloganFase);
END$$
DELIMITER ;				

DELIMITER $$
CREATE PROCEDURE p_deleteFase(IN p_IdFase INT) NO SQL
BEGIN
	DELETE FROM tb_fases WHERE IdFase=p_IdFase;
END $$
DELIMITER ;

DELIMITER $$

DELIMITER $$
CREATE PROCEDURE p_editFase(IN p_IdFase INT, IN p_TituloFase VARCHAR(150), IN p_SloganFase text) NO SQL
BEGIN
	UPDATE tb_fases SET TituloFase=p_TituloFase,SloganFase=p_SloganFase WHERE IdFase = p_IdFase;
END $$
DELIMITER ;

--
-- Users
--

DELIMITER $$
CREATE PROCEDURE p_getLoginUser(IN p_LoginUser varchar(15), IN p_SenhaUser varchar(8)) NO SQL

BEGIN
	SELECT IdUser,LoginUser,SenhaUser,NomeUser FROM tb_user WHERE LoginUser=p_LoginUser AND SenhaUser=p_SenhaUser;
END $$
DELIMITER ;
