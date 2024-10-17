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

    SELECT  COUN.Id,
            COUN.Naam,
            COUN.Omschrijving,
            COUN.Prijs,
            COUN.IsActief,
            COUN.Opmerking,
            COUN.DatumAangemaakt,
            COUN.DatumGewijzigd
    FROM    Product AS COUN
    WHERE   COUN.Id = Id;

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spSelectProductById(2);

********************************************************/



