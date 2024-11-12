<?php

class ProductsValidator
{
    public static function validateProductsInputFields($data)
    {
        if (empty($data['Product'])) {
            $data['ProductError'] = "U bent verplicht een product in te vullen";
        }
        if (strlen($data['Product']) > 30) {
            $data['ProductError'] = "Uw product heeft meer letters dan toegestaan.";
        }

        if (empty($data['Barcode'])) {
            $data['BarcodeError'] = "U bent verplicht een barcode in te vullen";
        }
        if (strlen($data['Barcode']) != 13) {
            $data['BarcodeError'] = "De barcode moet precies 13 tekens lang zijn";
        }

        if (empty($data['Verpakkingseenheid'])) {
            $data['VerpakkingseenheidError'] = "U bent verplicht een verpakkingseenheid in te vullen";
        }
        if (!is_numeric($data['Verpakkingseenheid'])) {
            $data['VerpakkingseenheidError'] = "De verpakkingseenheid moet een nummer zijn";
        }

        if (empty($data['AantalAanwezig'])) {
            $data['AantalAanwezigError'] = "U bent verplicht een aantal aanwezig in te vullen";
        }
        if (!is_numeric($data['AantalAanwezig'])) {
            $data['AantalAanwezigError'] = "Het aantal aanwezig moet een nummer zijn";
        }

        if (
            empty($data['ProductError']) 
            && empty($data['BarcodeError'])
            && empty($data['VerpakkingseenheidError'])
            && empty($data['AantalAanwezigError'])
        ) {
            $data['isValidView'] = true;
        } else {
            $data['isValidView'] = false;
        }

        return $data;
    }
}