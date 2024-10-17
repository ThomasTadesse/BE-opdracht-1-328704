/******************************************************
-- Doel: Inserten van een record in de tabel Product op
*******************************************************
-- Versie:  01
-- Datum:   17-10-2024
-- Auteur:  Thomas Tadesse
******************************************************/

-- Selecteer de juiste database voor je stored procedure
use `magazijn-jamin`;

-- Verwijder de oude stored procedure
DROP PROCEDURE IF EXISTS spCreateProduct;

-- Verander even tijdelijk de opdrachtprompt naar //
DELIMITER //

CREATE PROCEDURE spCreateProduct(
    IN Naam         VARCHAR(255),
    IN Barcode      VARCHAR(13),
    IN IsActief     BIT(1),
    IN Opmerking    VARCHAR(255),
    IN DatumAangemaakt DATETIME(6),
    IN DatumGewijzigd DATETIME(6)
)
BEGIN

    INSERT INTO Product (
        Naam,
        Barcode,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    ) VALUES (
        Naam,
        Barcode,
        IsActief,
        Opmerking,
        DatumAangemaakt,
        DatumGewijzigd
    );

END //
DELIMITER ;

/************* debug code stored procedure **************

CALL spCreateProduct('Test', '1234567890123', 1, 'Test', '2024-09-26 12:44:25', '2024-09-26 12:44:25');

********************************************************/



