<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3" style="display: block;">
        <div class="col-2"></div>
        <div class="col-8 text-center">
            <div class="alert alert-success" role="alert">
                Product is toegevoegd
            </div>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h3>Product overzicht</h3>
            <p><a href="products/create">Nieuw product toevoegen</a></p>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>Naam</th>
                        <th>Barcode</th>
                        <th>Actief</th>
                        <th>Opmerking</th>
                        <th>Datum Aangemaakt</th>
                        <th>Datum Gewijzigd</th>
                        <th>Meer info</th>
                        <th>Wijzigen</th>
                        <th>Verwijderen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='text-center' colspan='7'>Er zijn geen landen bekend</td>
                    </tr>
                    <tr>
                        <td>Product Naam</td>
                        <td>Barcode</td>
                        <td>Actief</td>
                        <td>Opmerking</td>
                        <td>Datum Aangemaakt</td>
                        <td>Datum Gewijzigd</td>
                        <td class='text-center'>
                            <a href='path_to_view_product'>
                                <i class='bi bi-info-circle'></i>
                            </a>
                        </td>
                        <td class='text-center'>
                            <a href='path_to_update_product'>
                                <i class='bi bi-pencil-square'></i>
                            </a>
                        </td>
                        <td class='text-center'>
                            <a href='path_to_delete_product'>
                                <i class='bi bi-trash'></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="path_to_homepage">Homepage</a>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
