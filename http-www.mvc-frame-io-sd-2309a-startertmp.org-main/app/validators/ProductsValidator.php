<?php

class ProductsValidator
{
    public static function validateProductsInputFields($data)
    {
        if (empty($data['Product'])) {
            $data['ProductError'] = "U bent verplicht een product in te vullen";
        }
        if (strlen($data['Product']) > 30) {
            $data['ProductError'] = "Uw product heeft meer letters dan is toegestaan (minder 9 is toegestaan), kies een ander.";
        }

        if (empty($data['Barcode'])) {
            $data['BarcodeError'] = "U bent verplicht een barcode in te vullen";
        }
        if (strlen($data['Barcode']) != 13) {
            $data['BarcodeError'] = "De barcode moet precies 13 tekens lang zijn";
        }

        if (!isset($data['IsActief']) || !is_bool($data['IsActief'])) {
            $data['IsActiefError'] = "moet kiezen tussen true of false";
        }

        if (isset($data['Opmerking']) && strlen($data['Opmerking']) > 255) {
            $data['OpmerkingError'] = "De opmerking mag niet meer dan 255 tekens bevatten";
        }

        if (isset($data['DatumAangemaakt']) && !strtotime($data['DatumAangemaakt'])) {
            $data['DatumAangemaaktError'] = "Datum moet een geldige date zijn";
        }

        if (isset($data['DatumGewijzigd']) && !strtotime($data['DatumGewijzigd'])) {
            $data['DatumGewijzigdError'] = "Datum moet een geldige date zijn";
        }

        if (
            empty($data['ProductError']) 
            && empty($data['BarcodeError'])
            && empty($data['IsActiefError'])
            && empty($data['OpmerkingError'])
            && empty($data['DatumAangemaaktError'])
            && empty($data['DatumGewijzigdError'])
        ) {
            $data['isValidView'] = true;
        } else {
            $data['isValidView'] = false;
        }

        return $data;
    }
}