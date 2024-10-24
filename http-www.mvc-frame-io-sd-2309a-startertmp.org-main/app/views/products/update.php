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
            <h3>Product bijwerken</h3>
            <form action="<?= URLROOT; ?>/products/update/<?= $data['product']->Id; ?>" method="post">
                <div class="form-group">
                    <label for="Naam">Naam:</label>
                    <input type="text" class="form-control" name="Naam" value="<?= $data['product']->Naam; ?>" required>
                </div>

                <div class="form-group">
                    <label for="Barcode">Barcode:</label>
                    <input type="text" class="form-control" name="Barcode" value="<?= $data['product']->Barcode; ?>" required>
                </div>

                <div class="form-group">
                    <label for="IsActief">Actief:</label>
                    <select class="form-control" name="IsActief">
                        <option value="1" <?= $data['product']->IsActief == 1 ? 'selected' : ''; ?>>Ja</option>
                        <option value="0" <?= $data['product']->IsActief == 0 ? 'selected' : ''; ?>>Nee</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Opmerking">Opmerking:</label>
                    <textarea class="form-control" name="Opmerking"><?= $data['product']->Opmerking; ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Bijwerken</button>
            </form>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <a href="<?= URLROOT; ?>/products/index" class="btn btn-secondary">Terug naar overzicht</a>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>
