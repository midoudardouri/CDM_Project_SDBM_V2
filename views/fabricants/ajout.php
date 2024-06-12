<h1>Ajout d'un Fabricant</h1>

<form action="<?= PATH ?>/fabricants/ajout_sauve" method="POST">
        <div class="form-group">
          <label for="Nom">Nom des Fabricants : </label>
          <input type="text" class="form-control" placeholder="Saisir un fabricant" name="Nom" id="Nom" />
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/fabricants"><button  class="btn btn-warning">Retour à la liste</button></a>