<h1>Modification d'un type de Biere</h1>
<div class="text-center">
<form action="<?= PATH ?>/typebieres/modif_sauve/<?= $typebiere['ID_TYPE'] ?>" method="POST">
        <div class="form-group">
          <label for="Id">Code Type :</label>
          <input type="text" class="form-control" placeholder="Saisir un Code" name="Id" id="Id"
          value=<?= $typebiere['ID_TYPE'] ?> readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom Continent:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom"
          value=<?= $typebiere['NOM_TYPE'] ?> required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/typebieres"><button  class="btn btn-warning">Retour à la liste</button></a></div>