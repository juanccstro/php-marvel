<?php
define('API_URL', 'https://whenisthenextmcufilm.com/api');

// --- Obtener datos desde API ---
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);

$data = json_decode($result, true);

// --- Función simple para mensaje según los días restantes ---
function diasRestantes($dias) {
    if ($dias <= 0) return "¡Ya se ha estrenado!";
    if ($dias <= 30) return "Falta muy poco… ¡se viene algo grande!";
    if ($dias <= 100) return "Queda cada vez menos, hype aumentando.";
    return "Paciencia… aún falta bastante.";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>La próxima película de Marvel</title>
    <meta name="description" content="Consulta cuándo se estrena la próxima película del Universo Marvel." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<body>

    <main>

        <h2>La próxima película del Universo Marvel</h2>

        <section>
            <img src="<?= $data['poster_url']; ?>" width="220"
                alt="Poster de <?= $data['title']; ?>"
                style="border-radius: 14px" />
        </section>

        <hgroup>
            <h3><?= $data['title']; ?> se estrena en <?= $data['days_until']; ?> días</h3>
            <p><strong>Fecha de estreno:</strong> <?= $data['release_date']; ?></p>
            <p><strong>Sinopsis:</strong> <?= $data['overview']; ?></p>

            <p style="margin-top: 10px; font-style: italic;">
                <?= diasRestantes($data['days_until']); ?>
            </p>

            <hr>

            <p>
                <strong>Siguiente producción confirmada:</strong><br>
                <?= $data['following_production']['title']; ?>
            </p>
        </hgroup>

        <article style="margin-top: 30px; text-align:center; opacity:0.75;">
            <small>
                Datos ofrecidos por la API pública
                <strong>whenisthenextmcufilm.com</strong>
            </small>
        </article>

    </main>

    <footer>
        <p>
            © <?= date('Y'); ?> Juan C. Castro ·
            <a href="https://github.com/juanccstro" target="_blank">GitHub</a>
        </p>
    </footer>

</body>

</html>

<style>
    :root {
        color-scheme: light dark;
    }

    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
    }

    main {
        flex: 1;
        display: grid;
        place-content: center;
        padding: 30px;
        max-width: 700px;
        margin: 0 auto;
    }

    h2 {
        text-align: center;
    }

    section {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
    }

    img {
        margin: 0 auto;
        box-shadow: 3px 2px 6px 2px #1C242E;
    }

    footer p {
        text-align: center;
        color: #7B8495;
        padding: 10px;
        font-size: 0.9rem;
    }

    a {
        color: #7BA1FF;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
