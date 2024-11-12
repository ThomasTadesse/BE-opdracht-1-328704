<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
  <div class="row mt-3 text-center" style='<?= $data['messageVisibility']; ?>'>
        <div class="col-3"></div>
        <div class="col-6">
            <div class="alert alert-<?= $data['messageColor']; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
        <div class="col-3"></div>
   </div>



  <div class="row mt-3">
    <div class="col-3"></div>
    <div class="col-6">
        <h3><?= $data['title']; ?></h3>
    </div>
    <div class="col-3"></div>
  </div>

  <div class="row mt-3">
    <div class="col-3">
    </div>
    <div class="col-6">
        <form action="<?= URLROOT; ?>/Products/create" method="post">
            <div class="mb-3">
                <label for="inputNameProduct" class="form-label">Naam:</label>
                <input name="Product" type="text" class="form-control" id="inputNameProduct" placeholder="Vul hier de naam van het product in" value="<?= $data['Product']; ?>">
            
                <div class="error">
                    <?= $data['ProductError']; ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="inputNameBarcode" class="form-label">Barcode:</label>
                <input name="Barcode" type="text" class="form-control" id="inputNameBarcode" placeholder="Vul hier de Barcode in" value="<?= $data['Barcode']; ?>" >
            
                <div class="error">
                    <?= $data['BarcodeError']; ?>
                </div>
            
            </div>

            <div class="mb-3">
                <label for="inputNameAllergeen" class="form-label">Allergeen:</label>

                <!-- Hier komt de select -->
                <select name="Allergeen" class="form-select" aria-label="Default select example">
                    <option selected>Allergeen:</option>
                    <?php
                    $allergenen = ['Gluten', 'Gelatine', 'AZO-Kleurstof', 'Lactose', 'Soja'];
                    foreach ($allergenen as $allergeen) {
                        $selected = ($data['Allergeen'] == $allergeen) ? 'selected' : '';
                        echo "<option value=\"$allergeen\" $selected>$allergeen</option>";
                    }
                    ?>
                </select>

                <div class="error">
                    <?= $data['AllergeenError']; ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="inputisActief" class="form-label">Y/N:</label>
                <input name="isActief" type="boolean" class="form-control" id="inputisActief" placeholder="True of False" value="<?= $data['isActief']; ?>">

                <div class="error">
                    <?= $data['isActiefError']; ?>
                </div>
            
            </div>

            <div class="mb-3">
                <label for="inputNameopmerking" class="form-label">Opmerking:</label>
                <input name="opmerking" type="text" class="form-control" id="inputNameopmerking" placeholder="opmerking optioneel" value="<?= $data['opmerking']; ?>" >
            
                <div class="error">
                    <?= $data['opmerkingError']; ?>
                </div>
            
            </div>

            <div class="mb-3">
                <label for="inputNameVerpakkingseenheid" class="form-label">Verpakkingseenheid:</label>
                <input name="Verpakkingseenheid" type="text" class="form-control" id="inputNameVerpakkingseenheid" placeholder="Vul hier de verpakkingseenheid in" value="<?= $data['Verpakkingseenheid']; ?>">
                <div class="error">
                    <?= $data['VerpakkingseenheidError']; ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputNameAantalAanwezig" class="form-label">Aantal Aanwezig:</label>
                <input name="AantalAanwezig" type="text" class="form-control" id="inputNameAantalAanwezig" placeholder="Vul hier het aantal aanwezig in" value="<?= $data['AantalAanwezig']; ?>">
                <div class="error">
                    <?= $data['AantalAanwezigError']; ?>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success" <?= $data['disableButton']; ?> >Sla op</button>
            </div>
        </form>
    </div>
    <div class="col-3">
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-3"></div>
    <div class="col-6">
        <a href="<?= URLROOT; ?>/homepages/index">Homepagina</a>        
    </div>
    <div class="col-3"></div>
  </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>