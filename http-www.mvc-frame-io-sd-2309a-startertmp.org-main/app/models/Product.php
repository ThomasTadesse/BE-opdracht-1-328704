<?php

class Product
{
    private $db;

    public function __construct()
    {
        /**
         * Maak een nieuw database object die verbinding maakt met de 
         * MySQL server
         */
        $this->db = new Database();
    }

    /**
     * Haal alle records op uit de Product-tabel
     */
    public function getProducts()
    {
        try {
            /**
             * Maak een sql-query die de gewenste informatie opvraagt uit de database
             * We gebruiken de stored procedure spGetProducts()
             */
            $sql = 'CALL spGetAllProducts()';
            
            /**
             * Prepare de query voor het PDO object
             */
            $this->db->query($sql);
            
            /**
             * Geef de opgehaalde informatie terug aan de controller
             */
            return $this->db->resultSet();

        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }

    public function createProduct($postArrayData) 
    {
        try {
            /**
             * Maak een sql-query die de ingevulde gegevens van het formulier
             * wegschrijft naar de database
             */
            
            $sql = 'CALL spCreateProduct(
                :naam,
                :barcode,
                :isactief,
                :opmerking,
                :datumaangemaakt,
                :datumgewijzigd,
                
            )';
    
             /**
             * Maak de query $sql gereed voor het PDO database-object
             */
            $this->db->query($sql);
    
            /**
             * We koppelen de waardes uit het formulier aan de parameters in de query
             */
            $this->db->bind(':naam', $postArrayData['Product'], PDO::PARAM_STR);
            $this->db->bind(':barcode', $postArrayData['barcode'], PDO::PARAM_STR);
            $this->db->bind(':isactief', $postArrayData['isactief'], PDO::PARAM_INT);
            $this->db->bind(':opmerking', $postArrayData['opmerking'], PDO::PARAM_STR);
            $this->db->bind(':datumaangemaakt', $postArrayData['datumaangemaakt'], PDO::PARAM_STR);
            $this->db->bind(':datumgewijzigd', $postArrayData['datumgewijzigd'], PDO::PARAM_STR);
    
            /**
             * Voer de query uit zodat de gegevens worden weggeschreven naar de database
             */
            return $this->db->execute();
        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }

    public function getProduct($ProductId)
    {
        try {

            $sql = 'CALL spSelectProductById(:id)';
    
            $this->db->query($sql);
    
            $this->db->bind(':id', $ProductId, PDO::PARAM_INT);
    
            return $this->db->single();

        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }

    }

    public function updateProduct($postArrayData)
    {
        try {
            $sql = 'CALL spUpdateProductById(
                        :id, 
                        :naam,
                        :barcode,
                        :isactief,
                        :opmerking,
                        :datumaangemaakt,
                        :datumgewijzigd
                    )';        
    
            $this->db->query($sql);
    
            $this->db->bind(':naam', $postArrayData['Product'], PDO::PARAM_STR);
            $this->db->bind(':barcode', $postArrayData['barcode'], PDO::PARAM_STR);
            $this->db->bind(':isactief', $postArrayData['isactief'], PDO::PARAM_INT);
            $this->db->bind(':opmerking', $postArrayData['opmerking'], PDO::PARAM_STR);
            $this->db->bind(':datumaangemaakt', $postArrayData['datumaangemaakt'], PDO::PARAM_STR);
            $this->db->bind(':datumgewijzigd', $postArrayData['datumgewijzigd'], PDO::PARAM_STR);
    
            return $this->db->execute();        
        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }

    }

    public function deleteProduct($ProductId)
    {
        try {
            /**
             * Maak een sql-query die een record uit de database verwijdert
             */
    
            $sql = 'CALL spDeleteProductById(:id)';
    
            /**
             * Prepare de query voor het PDO object
             */
            $this->db->query($sql);
    
            /**
             * Koppel de parameter aan de query
             */
            $this->db->bind(':id', $ProductId, PDO::PARAM_INT);
    
            /**
             * Voer de query uit
             */ 
            return $this->db->execute();
        } catch (Exception $e) {
            // Behandel de uitzondering hier, bijvoorbeeld loggen of een foutmelding weergeven
            logger(__LINE__, __METHOD__, __FILE__, $e->getMessage());
        }
    }

}