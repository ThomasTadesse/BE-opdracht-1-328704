<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 <?= $data['messageVisibility']; ?>">
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
            <p><a href="<?= URLROOT; ?>/products/create" class="btn btn-primary mt-3 mb-3">Nieuw product toevoegen</a></p>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row">
        <div class="col-4"></div>
        <div class="col">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Naam</th>
                        <th>Verpakkingseenheid</th>
                        <th>Aantal aanwezig</th>
                        <th>Algemene info</th>
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
                                <td><?= $product->Barcode ?></td>
                                <td><?= $product->Naam ?></td>
                                <td><?= $product->Verpakkingseenheid ?></td>
                                <td><?= $product->AantalAanwezig ?></td>
                                <td class='text-center'>
                                    <a href='<?= URLROOT ?>/products/view/<?= isset($product->id) ? $product->id : '#' ?>'>
                                        <i class='bi bi-info-circle'></i>
                                    </a>
                                </td>
                                <td class='text-center'>
                                    <a href='<?= URLROOT ?>/products/update/<?= isset($product->id) ? $product->id : '#' ?>'>
                                        <i class='bi bi-pencil-square'></i>
                                    </a>
                                </td>
                                <td class='text-center'>
                                    <a href='<?= URLROOT ?>/products/delete/<?= isset($product->id) ? $product->id : '#' ?>'>
                                        <i class='bi bi-trash'></i>
                                    </a>
                                </td>       
                            </tr>
                        <?php }} ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-secondary mb-3">Homepage</a>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>