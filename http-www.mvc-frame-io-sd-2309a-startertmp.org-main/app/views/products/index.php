<?php require_once APPROOT . '/views/includes/header.php'; ?>


<div class="container">
    <div class="row mt-3" style='<?= $data['messageVisibility']; ?>'>
            <div class="col-2"></div>
            <div class="col-8 text-center">
                <div class="alert alert-<?= $data['messageColor']; ?>" role="alert">
                    <?= $data['message']; ?>
                </div>
            </div>
            <div class="col-2"></div>
   </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h3><?= $data['title']; ?></h3>
            <p><a href="<?= URLROOT; ?>/products/create">Nieuw product toevoegen</a></p>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row">
        <div class="col-4"></div>
        <div class="col">
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
                    <?php if (is_null($data['dataRows'])) { ?>
                        <tr>
                            <td class='text-center' colspan='7'>Er zijn geen producten</td>
                        </tr>                    
                    <?php } else {
                                    foreach ($data['dataRows'] as $product) { ?>
                                    <tr>
                                    <td><?= $product->Naam ?></td>
                                        <td><?= $product->Barcode ?></td>
                                        <td><?= $product->IsActief ?></td>
                                        <td><?= $product->Opmerking ?></td>
                                        <td><?= $product->DatumAangemaakt ?></td>
                                        <td><?= $product->DatumGewijzigd ?></td>

                                        
                                        <td class='text-center'>
                                            <a href='<?= URLROOT  ?>/products/view/<?= $product->Id ?>'>
                                                <i class='bi bi-info-circle'></i>
                                            </a>
                                        </td>
                                        <td class='text-center'>
                                            <a href='<?= URLROOT  ?>/products/update/<?= $product->Id ?>'>
                                                <i class='bi bi-pencil-square'></i>
                                            </a>
                                        </td>
                                        <td class='text-center'>
                                            <a href='<?= URLROOT ?>/products/delete/<?= $product->Id ?>'>
                                                <i class='bi bi-trash'></i>
                                            </a>
                                        </td>         

                                    </tr>
                                <?php }} ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index">Homepage</a>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>