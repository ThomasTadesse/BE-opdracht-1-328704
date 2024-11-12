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

    SELECT  PROD.Id         AS ProductId,
            PROD.Naam,
            PROD.Barcode,
            PROD.Verpakkingseenheid,
            PROD.AantalAanwezig,
            PROD.IsActief,
            PROD.Opmerking,
            PROD.DatumAangemaakt,
            PROD.DatumGewijzigd
    FROM    Product AS PROD

    ORDER BY PROD.Id DESC;

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spGetAllProducts();

********************************************************/
