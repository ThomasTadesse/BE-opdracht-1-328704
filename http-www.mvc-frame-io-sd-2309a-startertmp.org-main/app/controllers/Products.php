<?php

class Products extends BaseController
{
    private $ProductModel;

    public function __construct()
    {
        $this->ProductModel = $this->model('Product');
    }

    public function index()
    {
        $data = [
            'title' => 'Overzicht Magazijn Jamin',
            'dataRows' => NULL,
            'message' => NULL,
            'messageColor' => NULL,
            'messageVisibility' => 'display:none'
        ];

        $Products = $this->ProductModel->getProducts();

        if (is_null($Products)) {
            //Foutmelding en in de tabel geen records
            $data['message'] = TRY_CATCH_ERROR;
            $data['messageColor'] = FORM_DANGER_COLOR;
            $data['messageVisibility'] = 'flex';
            $data['dataRows'] = NULL;
            
            header('Refresh:3; ' . URLROOT . '/homepages/index');
        } else {
                $data['dataRows'] = $Products;
        }
        
        $this->view('Products/index', $data);
    }

    /**
     * Creates a new Product.
     *
     * This method is responsible for rendering the create view and passing the necessary data to it.
     *
     * @return void
     */
    public function create()
    {
        $data = [
            'title' => 'Voeg een nieuw product toe',
            'message' => '',
            'messageColor' => 'dark',
            'messageVisibility' => 'display:none;',
            'disableButton' => '',
            'Product' => '',
            'Naam' => '',
            'Barcode' => '',
            'IsActief' => '',
            'Opmerking' => '',
            'DatumAangemaakt' => '',
            'DatumGewijzigd' => '',
            'ProductError' => '',
            'NaamError' => '',
            'BarcodeError' => '',
            'IsActiefError' => '',
            'OpmerkingError' => '',
            'DatumAangemaaktError' => '',
            'DatumGewijzigdError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            /**
             * Maak het $_POST-array schoon van ongewenste tekens en tags
             */
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            /**
             * Doe de post-waarden in het $data array
             */
            $data['Product'] = trim($_POST['Product']);
            $data['Naam'] = trim($_POST['Naam']);
            $data['Barcode'] = trim($_POST['Barcode']);
            $data['IsActief'] = trim($_POST['IsActief']);
            $data['Opmerking'] = trim($_POST['Opmerking']);
            $data['DatumAangemaakt'] = trim($_POST['DatumAangemaakt']);
            $data['DatumGewijzigd'] = trim($_POST['DatumGewijzigd']);
 
            /**
             * Valideer de formuliervelden
             */
            $data = ProductsValidator::validateProductsInputFields($data);
            
            /**
             * We checken of er geen Validatie Errors zijn
             */
            if ( $data['isValidView'] ) {
                /**
                 * Roep de createProduct methode aan van het ProductModel object waardoor
                 * de gegevens in de database worden opgeslagen
                 */
                $result = $this->ProductModel->createProduct($_POST);

                /**
                 * Als er een fout is in de modelmethod dan wordt dit gelogd en gemeld
                 * aan de gebruiker
                 */
                if (is_null($result)) {
                    $data['messageVisibility'] = 'flex';
                    $data['message'] = 'Er is fout opgetreden in de database, u kunt geen product toevoegen';
                    $data['messageColor'] = 'success';
                    $data['disableButton'] = 'disabled';
                } else {
                    $data['messageVisibility'] = '';
                    $data['message'] = 'Uw gegevens zijn opgeslagen. U wordt doorgestuurd naar de overzicht-pagina.';
                    $data['messageColor'] = 'success';

                }
                /**
                 * Na het opslaan van de formulier wordt de gebruiker teruggeleid naar de index-pagina
                 */
                header("Refresh:3; url=" . URLROOT . "/Products/index");
            } else {
                $data['messageVisibility'] = '';
                $data['message'] = 'Er zijn één of meerdere velden niet goed ingevuld';
                $data['messageColor'] = 'danger';

                $this->view('Products/create', $data);
            }
        }

        $this->view('Products/create', $data);
    }

    public function update($ProductId)
    {
        $result = $this->ProductModel->getProduct($ProductId) ?? header("Refresh:3; url=" . URLROOT . "/Products/index");

        $data = [
            'title' => 'Wijzig veld',
            'message' => is_null($result) ? 'Er is een fout opgetreden, wijzigen is niet mogelijk' : '',
            'messageVisibility' => is_null($result) ? 'flex' : 'none',
            'messageColor' => is_null($result) ? 'danger' : '',
            'disableButton' => is_null($result) ? 'disabled' : '',
            'Id' => $result->Id ?? '',
            'Product' => $result->Naam ?? '-',
            'Naam' => $result->Naam ?? '-',
            'Barcode' => $result->Barcode ?? '-',
            'IsActief' => $result->IsActief ?? '-',
            'Opmerking' => $result->Opmerking ?? '-',
            'DatumAangemaakt' => $result->DatumAangemaakt ?? '-',
            'DatumGewijzigd' => $result->DatumGewijzigd ?? '-',
            'ProductError' => '',
            'NaamError' => '',
            'BarcodeError' => '',
            'IsActiefError' => '',
            'OpmerkingError' => '',
            'DatumAangemaaktError' => '',
            'DatumGewijzigdError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['Product'] = trim($_POST['Product']);
            $data['Naam'] = trim($_POST['Naam']);
            $data['Barcode'] = trim($_POST['Barcode']);
            $data['IsActief'] = trim($_POST['IsActief']);
            $data['Opmerking'] = trim($_POST['Opmerking']);
            $data['DatumAangemaakt'] = trim($_POST['DatumAangemaakt']);
            $data['DatumGewijzigd'] = trim($_POST['DatumGewijzigd']);

            /**
             * Valideer de formulierdata
             */
            $data = ProductsValidator::validateProductsInputFields($data);

            /**
             * Wanneer alle error-key values leeg zijn dan kunnen we de update uitvoeren
             */

            if ( $data['isValidView'])
            {
                $result = $this->ProductModel->updateProduct($_POST);

                if (is_null($result)) {
                    $data['messageVisibility'] = 'flex';
                    $data['message'] = 'Het updaten is niet gelukt';
                    $data['messageColor'] = 'danger';
                    $data['disableButton'] = 'disabled';
                } else {
                    $data['messageVisibility'] = 'flex';
                    $data['message'] = 'Het updaten is gelukt';
                    $data['messageColor'] = 'success';
                }
                header("Refresh:3; url=" . URLROOT . "/Products/index");
            } else {
                $data['messageVisibility'] = 'flex';
                $data['message'] = 'U heeft enkele verkeerde waardes ingevuld';
                $data['messageColor'] = 'danger';
            }
            $this->view('Products/update', $data);            
            // header("Refresh:3; url=" . URLROOT . "/Products/index");
        }
            
            
            
            
        

        $this->view('Products/update', $data);
    }

    public function delete($ProductId)
    {
       $result = $this->ProductModel->deleteProduct($ProductId);       

       $data = [
           'title' => 'Overzicht magazijn Jamin',
           'message' => is_null($result) ? 'Er is een fout opgetreden het record is niet verwijderd' : 'Het record is verwijderd, u wordt doorgestuurd naar het overzicht',
           'messageVisibility' => is_null($result) ? 'flex' : 'flex',
           'messageColor' => is_null($result) ? 'danger' : 'success',
       ];

       header("Refresh:3; " . URLROOT . "/Products/index");

        $Products = $this->ProductModel->getProducts();

        if (is_null($Products)) {
            //Foutmelding en in de tabel geen records
            $data['message'] = TRY_CATCH_ERROR;
            $data['messageColor'] = FORM_DANGER_COLOR;
            $data['messageVisibility'] = '';
            $data['dataRows'] = NULL;
            
            header('Refresh:3; ' . URLROOT . '/homepages/index');
        } else {
                $data['dataRows'] = $Products;
        }       

        $this->view('Products/index', $data);
    }

    public function spGetAllProducts()
    {
        $Products = $this->ProductModel->getProducts();

        if (is_null($Products)) {
            //Foutmelding en in de tabel geen records
            $data['message'] = TRY_CATCH_ERROR;
            $data['messageColor'] = FORM_DANGER_COLOR;
            $data['messageVisibility'] = 'flex';
            $data['dataRows'] = NULL;
            
            header('Refresh:3; ' . URLROOT . '/homepages/index');
        } else {
                $data['dataRows'] = $Products;
        }
        
        $sql = "CALL spGetAllProducts()";

        $this->view('Products/index', $data);
    }
    
} 