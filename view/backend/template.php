<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="public/stylesheet.css" />
    <!-- <link rel="icon" type="image/png" href=""/> -->
    <title>Espace Admin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="icon" type="image/png" href="./public/images/favicon.png" /><!-- favicon -->


    <!-- Fontawesome Icones -->
    <script src="https://kit.fontawesome.com/504cd5157f.js"></script>

    <!-- Code TinyMCE pour le backend, rediger message-->
    <script src="https://cdn.tiny.cloud/1/68lwibtun0h4ri5ylyau717ps1odqoje8itfty00ym0dg59t/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script>
        tinymce.init({
            selector: "#mytextarea",
            language_url: "./public/langs/fr_FR.js",
            language: "fr_FR",
        });
    </script>
   

    <style>
        a {
            text-decoration: none;
            color: orange;
        }
        header {
            background-color: #8e44ad;
        }
    </style>
</head>

<body>
    <header class="index_header">
        <ul>
        <li><a href="index.php?action=home">
            Accueil
        </a></li>
        <li><a href="index.php?action=logout">
            Déconnexion
        </a></li>
    </ul>
    </header>
     <?= $content ?>
</body>

</html>