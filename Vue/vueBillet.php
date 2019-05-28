<?php $this->titre = "Mon Blog - " . $billet['titre']; ?>

<article>
    <div>
        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        <time><?= $billet['dateBillet'] ?></time>
    </div>
    <p><?= $billet['contenu'] ?></p>
</article>
<hr />
<div>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>
</div>
<?php foreach ($commentaires as $commentaire): ?>
<p><?= $commentaire['auteur'] ?> dit :</p>
<p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>
<hr />
<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>