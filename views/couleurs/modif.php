<h1>Modification d'un Couleur</h1>

<form action="<?= PATH ?>/Couleurs/modif_sauve/<?= $Couleur['ID_COULEUR'] ?>" method="POST">
        <div class="form-group">
          <label for="Id">Code Couleur :</label>
          <input type="text" class="form-control" placeholder="Saisir un Code" name="Id" id="Id"
          value=<?= $Couleur['ID_COULEUR'] ?> readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom couleur:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom"
          value=<?= $Couleur['NOM_COULEUR'] ?>>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/Couleurs"><button  class="btn btn-warning">Retour à la liste</button></a>