
<section class="connexion_header">
    <h1>Espace Connexion</h1>
</section>

<div class="connexion_container">
	
    <?php if(isset($_SESSION)) { 
        include('view/flashMessages.php');
    } ?>

    <form class="connexion_form" action="index.php?action=login" method="post">
        <input class="email" type="text" name="email" placeholder="Email" id="email" required><br />
        <input class="password" type="password" name="password" placeholder="Mot de passe" id="password" required><br />
        <input class="connexion" type="submit" name="connexion" id="connexion"><br />
    </form>
</div>