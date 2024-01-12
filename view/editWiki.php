<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <form id="forms" method="POST" action="?route=updatewiki&id=<?= $wiki['id'] ?>">
            <input type="hidden" name="wiki_id" value="<?= $wiki['id'] ?>">

            <div class="row mb-4">
                <div class="col">
                    <div class="">
                        <label class="form-label">Titre</label>
                        <input type="text" class="form-control email" name="titre" value="<?= htmlspecialchars($wiki['titre'] ?? '') ?>">

                        <label class="form-label">Contenu</label>
                        <textarea name="contenu" cols="175" rows="5"><?= htmlspecialchars($wiki['contenu'] ?? '') ?></textarea>

                        <label class="col-sm-3 col-form-label">Catégorie</label>
                        <div class="col-sm-6">
                            <select class="form-select" name="id_categorie">
                                <option selected>Choisissez une catégorie</option>
                                <?php foreach ($categories as $categorie) : ?>
                                    <option value="<?= $categorie['id'] ?>"><?= htmlspecialchars($categorie['nom']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label class="col-sm-3 col-form-label">Tag</label>
                        <div class="col-sm-6">
                            <select class="form-select" multiple aria-label="multiple select example" name="tag_id[]">
                                <?php foreach ($tags as $tag): ?>
                                    <option value="<?= $tag['id'] ?>">
                                        <?= htmlspecialchars($tag['nom']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex w-100 justify-content-center">
                <p class="error text-danger"></p>
                <button type="submit" class="btn btn-success btn-block mb-4 me-4 save">Enregistrer les
                    modifications</button>
                <div class="col-sm-3">
                    <div class="d-grid">
                        <a class="btn btn-outline-primary" href="?route=wiki" role="button">Annuler</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
