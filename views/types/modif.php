<h1>Modification d'un type de Biere</h1>

<form action="<?= PATH ?>/types/modif_sauve/<?= $type['ID_TYPE'] ?>" method="POST">
        <div class="form-group">
          <label for="Id">Code Continent :</label>
          <input type="text" class="form-control" placeholder="Saisir un Code" name="Id" id="Id"
          value=<?= $type['ID_TYPE'] ?> readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom Continent:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom"
          value=<?= $type['NOM_TYPE'] ?>>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/types"><button  class="btn btn-warning">Retour à la liste</button></a>