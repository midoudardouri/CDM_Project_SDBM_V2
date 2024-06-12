<h1>Suppression d'un Fabricant</h1>
<form action="<?= PATH ?>/fabricants/suppr_sauve/<?= $Type['ID_FABRICANT'] ?>" method="POST">
        <div class="form-group">
          <label for="Id">Code Type :</label>
          <input fabricant="text" class="form-control" placeholder="Saisir un Code" name="Id" id="Id"
          value=<?= $Type['ID_FABRICANT'] ?> readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom Type:</label>
          <input fabricant="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom"
          value=<?= $Type['NOM_FABRICANT'] ?> readonly> 
        </div>
        <button fabricant="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/fabricants"><button  class="btn btn-warning">Retour à la liste</button></a>