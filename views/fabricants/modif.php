<h1>Modification d'un Fabricant</h1>

<form action="<?= PATH ?>/fabricants/modif_sauve/<?= $fabricant['ID_FABRICANT'] ?>" method="POST">
        <div class="form-group">
          <label for="Id">Code Fabricant :</label>
          <input type="text" class="form-control" placeholder="Saisir un Code" name="Id" id="Id"
          value=<?= $fabricant['ID_FABRICANT'] ?> readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom Continent:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom"
          value=<?= $fabricant['NOM_FABRICANT'] ?>>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/fabricants"><button  class="btn btn-warning">Retour à la liste</button></a>