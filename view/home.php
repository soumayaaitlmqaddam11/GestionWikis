
	<?php
use App\Models\TagModel;
use App\Models\WikiModel;

$wikiModel = new WikiModel();
$wikis = $wikiModel->getAllWikisWithCategories();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionWikis</title>

    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</head>

<body>
<header>


<nav class="navbar navbar-expand-md navbar-dark">
	<div class="container">
		<!-- Brand/logo -->
		<a class="navbar-brand" href="#">
			<i class="fas fa-code"></i>
			<h1>GestionWikis &nbsp &nbsp</h1>
		</a>

		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Features</a>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						language
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">FR</a>
						<a class="dropdown-item" href="#">EN</a>
					</div>
				</li>
				<span class="nav-item active">
					<a class="nav-link" href="#">EN</a>
				</span>
				<li class="nav-item">
					<?php if (isset($_SESSION['id'])) { ?>
						<a class="nav-link" href="?route=logout">Logout</a>
					<?php } else { ?>
						<a class="nav-link" href="?route=login">Login</a>
					<?php } ?>
				</li>
			</ul>
		</div>
	</div>
</nav>
</header>

    <section action="#" method="get" class="search">
        <h2>Find Wikis</h2>
        <form class="form-inline" method="post" onsubmit="event.preventDefault(); filterwiki();">
            <div class="form-group mb-2">
                <input type="text" id="title" placeholder="title">


            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" id="categorie" placeholder="categorie">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" id="tag" placeholder="tag">
            </div>
            <a href="?route=search">
                <button type="submit" class="btn btn-primary mb-2">
                   chercher
                </button>
            </a>


        </form>
    </section>

	<div id="results">
    <section class="light">
        <h2 class="text-center py-3">Latest Job Listings</h2>
	<div class="container py-2" id="search">
	<?php
    foreach ($wikis as $wiki): ?>
        <article class="postcard light green">
            <a class="postcard__img_link" href="#">
                <img class="postcard__img" src="/assets/img/logowiki.jpg" alt="Image Title" />
            </a>
            <div class="postcard__text t-dark">
                <h3 class="postcard__title green">
                    <a href="#">
                        <?php echo isset($wiki['titre']) ? $wiki['titre'] : 'Titre non défini'; ?>
                    </a>
                </h3>
                <div class="postcard__subtitle small">
                    <time datetime="2020-05-25 12:00:00">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <?php echo isset($wiki['categorie']) ? $wiki['categorie'] : 'Catégorie non définie'; ?>
                    </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">
                    <?php echo isset($wiki['contenu']) ? $wiki['contenu'] : 'Contenu non défini'; ?>
                </div>
                <ul class="postcard__tagbox">
                    <?php
                    // Inclure la classe TagModel
                    $tagModel = new TagModel();
                    $tags = $tagModel->getTagsByWikiId($wiki['id']);

                    foreach ($tags as $tag): ?>
                        <li class="tag__item">
                            <i class="fas fa-tag mr-2"></i><?php echo isset($tag['nom']) ? $tag['nom'] : 'Nom non défini'; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </article>
    <?php endforeach; ?>
        </div>
		</section>
</div>


	<script>
		
		function filterwiki() {
    let title = document.getElementById('title').value;
    let categorie = document.getElementById('categorie').value;
    let tag = document.getElementById('tag').value;
    let results = document.getElementById("results");

    let data = {};

    if (title.trim() !== '') {
        data.title = title;
    }

    if (categorie.trim() !== '') {
        data.categorie = categorie;
    }

    if (tag.trim() !== '') {
        data.tag = tag;
    }

    if (Object.keys(data).length === 0) {
        window.location.href = "?route=home";
        return;
    }

    $.ajax({
        method: "POST",
        url: "index.php?route=search",
        data: data,
        success: function (response) {
            results.innerHTML = response;
        },
        error: function (error) {
            alert("La recherche n'a pas fonctionné.");
        },
    });

    return false;
}





(function () {
    $.ajax({
        method: "GET",
        url: "index.php?route=search",
        data: {},
        success: function (response) {
            console.log("the response is :", response);

        },
        error: function () {
            alert("it doesn't work");
        },
    });
})();

    </script>


    <footer>
        <p>© 2023 Gestion Wikis </p>
    </footer>
</body>

</html>
