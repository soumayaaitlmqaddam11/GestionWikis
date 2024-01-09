
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		GestionWikis
	</title>

	<link rel="stylesheet" href="assets/styles/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
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
		<h2>Find Your Dream Job</h2>
		<form class="form-inline">
			<div class="form-group mb-2">
				<input type="text" id ="keywords" class="key" name="keywords" placeholder="Keywords">


			</div>
			<div class="form-group mx-sm-3 mb-2">
				<input type="text" name="location"  class="key" placeholder="Location">
			</div>
			<div class="form-group mx-sm-3 mb-2">
				<input type="text" name="company"  class="key" placeholder="Company">
			</div>
			<button type="button" onclick="search()" class="btn btn-primary mb-2">Search</button>
            <div id="results">
            </div>
		</form>
	</section>

	<!--------------------------  card  --------------------->













	
	
    <!-- ---------------------------------------------------->
<script>
	const inputs =document.querySelectorAll(".key");
	console.log(inputs);
    function search(){
        const request =new XMLHttpRequest();
        request.open("GET",`?route=search&key=${inputs[0].value}&company=${inputs[1].value}&location=${inputs[2].value}`);
        request.send();
        request.onreadystatechange=function(){
        if(this.readyState===4 && this.status===200){
            document.getElementById("search").innerHTML="";
			var arr = JSON.parse(this.response);

			arr.forEach(element => {
				
				console.log(element.image_path);

				document.getElementById("search").innerHTML+=	`<article class="postcard light green">
				<a class="postcard__img_link" href="#">
					
					<img class="postcard__img" src="uploads/${element.image_path}" alt="Image Title" />
				</a>
				<div class="postcard__text t-dark">
					<h3 class="postcard__title green">
						<a href="#">
							${element.title}
						</a></h3>
					<div class="postcard__subtitle small">
						<time datetime="2020-05-25 12:00:00">
							<i class="fas fa-calendar-alt mr-2"></i>
							${element.description}
						</time>
					</div>
					<div class="postcard__bar"></div>
					<div class="postcard__preview-txt">
						
					</div>
					<ul class="postcard__tagbox">
						<li class="tag__item"><i class="fas fa-tag mr-2"></i>Maroc</li>
						<li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
						<li class="tag__item play green">
							<a href="#"><i class="fas fa-play mr-2"></i>APPLY NOW</a>
						</li>
					</ul>
				</div>
			</article>`;
			});
        }
        }

    }
  
</script>

 
	<footer>
		<p>© 2023 JobEase </p>
	</footer>
    <!-- <script src="script.js">
    </script> -->
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>