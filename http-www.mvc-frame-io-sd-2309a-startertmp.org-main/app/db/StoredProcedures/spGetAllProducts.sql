/******************************************************
-- Doel: Opvragen van alle records uit de tabel Product
-- Versie: 01
-- Datum: 17-10-2024
-- Auteur: Thomas Tadesse
******************************************************/

-- Selecteer de juiste database voor je stored procedure
use `magazijn-jamin`;

-- Verwijder de oude stored procedure
DROP PROCEDURE IF EXISTS spGetAllProducts;

-- Verander even tijdelijk de opdrachtprompt naar //
DELIMITER //

CREATE PROCEDURE spGetAllProducts()
BEGIN

    SELECT  COUN.Id,
            COUN.Naam,
            COUN.Opmerking,
            COUN.IsActief,
            COUN.Opmerking,
            COUN.DatumAangemaakt,
            COUN.DatumGewijzigd
    FROM    Product AS COUN
    ORDER BY COUN.Id DESC;

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spGetAllProducts();

********************************************************/



