<?php
define('API_URL', 'https://whenisthenextmcufilm.com/api');
# Inicializar una sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la petición pero sin mostrarla por pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Ejecutamos la petición y guardamos resultado
$result = curl_exec($ch);

// Utilizar file_get_contents para obtener API
// $result = file_get_contents(API_URL); // si solo quieres hacer un GET de una APÌ 

$data = json_decode($result, true);

// Cerrar la conexión con cURL
curl_close($ch);


?>

<head>
	<meta charset="UTF-8" />
	<title>La próxima película de Marvel</title>
	<meta name="deacription" content="La próxima película de Marvel" />
	<meta name="viewport" content="whidth=device-width, initial-scale=1.0" />
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<main>

	<head>
		<h2>La próxima película de Marvel</h2>
		<section>
			<img src="<?= $data['poster_url']; ?>" width="200px" alt="Poster de <?= $data['title']; ?>" style="border-radius: 14px" />
		</section>

		<hgroup>
			<h3><?= $data['title']; ?> se estrena en <?= $data['days_until']; ?> días </h3>
			<p>Fecha de estreno: <?= $data['release_date']; ?> </p>
			<p>La siguiente película es: <?= $data['following_production']['title']; ?> </p>
		</hgroup>
	</head>
</main>
<footer>
	<p>2024 Juan C. Castro</p>
</footer>

<style>
	:root {
		color-scheme: light dark;
	}

	html, body {
		height: 100%;
		margin: 0;
		padding: 0;
		display: flex;
		flex-direction: column;
	}

	body {
		display: flex;
		flex-direction: column;
		min-height: 100vh;
		justify-content: space-between;
	}

	main {
		flex: 1;
		display: grid;
		place-content: center;
	}

	h2 {
		justify-content: center;
		text-align: center;
	}

	section {
		display: flex;
		justify-content: center;
		text-align: center;
	}

	hgroup {
		display: flex;
		flex-direction: column;
		justify-content: center;
		text-align: center;
	}

	img {
		margin: 0 auto;
		box-shadow: 3px 2px 6px 2px #1C242E;
	}

	footer p {
		justify-content: center;
		text-align: center;
		color: #7B8495;
		padding: 10px;
	}
</style>
