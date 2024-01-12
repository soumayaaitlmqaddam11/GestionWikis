<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
<body>
    <div class="container">

     <form action= "?route=addTag" id="forms" method="POST" enctype="multipart/form-data">
                            <div class="row mb-4">
                            
                              <div class="col">
                              <div class="">
                                <label class="form-label" >Nom</label>
                              <input type="text" class="form-control email"name="nom" >
                            </div>
                              </div>
                            </div>
                          
                               
                                    <div class="row mb-3">
                                        <div class="offset-sm-3 col-sm-3">
                                            <div class="d-grid">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <div class="d-grid">
                                                <a class="btn btn-outline-primary" href="?route=tags" role="button">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
    </form>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <script src="dashboard.js"></script>
        <script src="agents.js"></script>  
</body>
</html>