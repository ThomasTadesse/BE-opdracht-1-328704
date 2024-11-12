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

        if (
            empty($data['ProductError']) 
            && empty($data['BarcodeError'])
        ) {
            $data['isValidView'] = true;
        } else {
            $data['isValidView'] = false;
        }

        return $data;
    }
}