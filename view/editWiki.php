<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="container">
        <form id="forms" method="POST">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
            <div class="col">
                    <div class="">
                        <label class="form-label">Titre</label>
                        <input type="text" class="form-control email" name="titre">
                    </div>
                    <div class="">
                        <label class="form-label">Contenu</label>
                        <div><textarea name="contenu" id="" id="" cols="175" rows="5" ></textarea></div>
                    </div>
                    <div class="row mb-3">
                        <div> <label class="col-sm-3 col-form-label">Categorie</label></div>
                        <div class="col-sm-6">
                            <select class="form-select" multiple aria-label="multiple select example" name="id_categorie">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div> <label class="col-sm-3 col-form-label">Tag</label></div>
                            <div class="col-sm-6">
                                <select class="form-select" multiple aria-label="multiple select example" name="tag_id">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
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
                        <a class="btn btn-outline-primary"  href="?route=wiki" role="button">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </form>

    </div>
    </div>
</body>

</html>