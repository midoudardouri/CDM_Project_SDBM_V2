<h1>Suppression d'un tpe de Biere</h1>
<form action="<?= PATH ?>/types/suppr_sauve/<?= $type['ID_TYPE'] ?>" method="POST">
        <div class="form-group">
          <label for="Id">Code Type :</label>
          <input type="text" class="form-control" placeholder="Saisir un Code" name="Id" id="Id"
          value=<?= $type['ID_TYPE'] ?> readonly>
        </div>
        <div class="form-group">
          <label for="Nom">Nom Type:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom"
          value=<?= $type['NOM_TYPE'] ?> readonly> 
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/types"><button  class="btn btn-warning">Retour à la liste</button></a>