/******************************************************
-- Doel: Updaten van een record in de tabel Product op
         basis van het Id
*******************************************************
-- Versie: 01
-- Datum: 17-10-2024
-- Auteur: Thomas Tadesse
******************************************************/

-- Selecteer de juiste database voor je stored procedure
use `magazijn-jamin`;

-- Verwijder de oude stored procedure
DROP PROCEDURE IF EXISTS spSelectProductById;

-- Verander even tijdelijk de opdrachtprompt naar //
DELIMITER //

CREATE PROCEDURE spSelectProductById(
    IN Id INT UNSIGNED
)
BEGIN

    SELECT  PROD.Id,
            PROD.Naam,
            PROD.Prijs,
            PROD.IsActief,
            PROD.Opmerking,
            PROD.DatumAangemaakt,
            PROD.DatumGewijzigd
    FROM    Product AS PROD
    WHERE   PROD.Id = Id;

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spSelectProductById(2);

********************************************************/



