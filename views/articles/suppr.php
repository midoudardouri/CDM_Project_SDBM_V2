<h1>Suppression d'un Pays</h1>

<form action="<?= PATH ?>/articles/suppr_sauve/<?= $article['ID_ARTICLE'] ?>" method="POST">
        <div class="form-group">
          <label for="Nom">Code:</label>
          <input type="text" class="form-control" value=<?= $article['ID_ARTICLE'] ?> name="Id" id="Id" readonly />
        </div>
        <div class="form-group">
          <label for="Nom">Nom Article:</label>
          <input type="text" class="form-control" value='<?= $article['NOM_ARTICLE'] ?>' name="Nom" id="Nom" readonly/>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/articles"><button  class="btn btn-warning">Retour à la liste</button></a>