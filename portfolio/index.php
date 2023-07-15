

<!-- W powyższym kodzie łączymy się z bazą danych i wykonujemy zapytanie o wszystkie realizacje. 
Następnie, jeśli istnieją jakieś realizacje, wyświetlamy je na stronie w postaci kart. 
W przeciwnym razie wyświetlamy komunikat o braku realizacji.

Po napisaniu kodu HTML, CSS, PHP i SQL, należy umieścić pliki na serwerze. 
Należy również utworzyć bazę danych i dodać kilka przykładowych realizacji. 
Po umieszczeniu plików na serwerze i dodaniu realizacji do bazy danych, 
strona Portfolio powinna działać poprawnie i wyświetlać przykładowe realizacje. -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Moje Portfolio</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Moje Portfolio</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="#">Strona główna</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">O mnie</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Realizacje</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Kontakt</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Witaj na moim portfolio!</h1>
			<p class="lead">Jestem programistą i chciałbym Ci przedstawić moje najnowsze realizacje.</p>
		</div>
	</div>
	<div class="container">
	<?php
// łączymy się z bazą danych
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "portfolio";
// Tworzymy połączenie z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzamy, czy udało się połączyć z bazą danych
if ($conn->connect_error) {
    die("Nie udało się połączyć z bazą danych: " . $conn->connect_error);
}

// Zapytanie do bazy danych o wszystkie realizacje
$sql = "SELECT * FROM realizacje";
$result = $conn->query($sql);

// Wyświetlamy realizacje na stronie
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4">';
        echo '<div class="card">';
        echo '<img src="' . $row["obrazek"] . '" class="card-img-top">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["tytul"] . '</h5>';
        echo '<p class="card-text">' . $row["opis"] . '</p>';
        echo '<a href="#" class="btn btn-primary">Więcej</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Brak realizacji do wyświetlenia.";
}

// Zamykamy połączenie z bazą danych
$conn->close();
?>
		<div class="row">
			<div class="col-sm-4">
				<div class="card">
					<img class="card-img-top" src="realizacja1.jpg" alt="Realizacja 1">
					<div class="card-body">
						<h5 class="card-title">Realizacja 1</h5>
						<p class="card-text">Opis realizacji 1.</p>
						<a href="#" class="btn btn-primary">Więcej</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<img class="card-img-top" src="realizacja2.jpg" alt="Realizacja 2">
					<div class="card-body">
						<h5 class="card-title">Realizacja 2</h5>
						<p class="card-text">Opis realizacji 2.</p>
						<a href="#" class="btn btn-primary">Więcej</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card">
					<img class="card-img-top" src="realizacja3.jpg" alt="Realizacja 3">
					<div class="card-body">
						<h5 class="card-title">Realizacja 3</h5>
                        <p class="card-text">Opis realizacji 3.</p>
                        <a href="#" class="btn btn-primary">Więcej</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>                    
    </body>
</html>

