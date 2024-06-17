<h1>Suppression d'un Couleur</h1>
<div class="text-center">
<form action="<?= PATH ?>/couleurs/suppr_sauve/<?= $Couleur['ID_COULEUR'] ?>" method="POST">
        <div class="form-group">
          <label for="Id">Code Couleur :</label>
          <input type="text" class="form-control" placeholder="Saisir un Code" name="Id" id="Id"
          value=<?= $Couleur['ID_COULEUR'] ?> readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom Couleur:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom"
          value=<?= $Couleur['NOM_COULEUR'] ?> readonly> 
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/couleurs"><button  class="btn btn-warning">Retour à la liste</button></a></div>