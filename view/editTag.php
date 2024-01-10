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
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control first_name" name="nom"
                            value="<?= htmlspecialchars($tag['nom']); ?>">
                    </div>

                </div>

            <div class="d-flex w-100 justify-content-center">
                <p class="error text-danger"></p>
                <button type="submit" class="btn btn-success btn-block mb-4 me-4 save">Enregistrer les
                    modifications</button>
                <div class="col-sm-3">
                    <div class="d-grid">
                        <a class="btn btn-outline-primary"  href="?route=tags" role="button">Cancel</a>
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