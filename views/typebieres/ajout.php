<h1>Ajout d'un type de Biere</h1>
<div class="text-center">
<form action="<?= PATH ?>/typebieres/ajout_sauve" method="POST">
        <div class="form-group">
          <label for="Nom">Nom Type des Bieres : </label>
          <input type="text" class="form-control" placeholder="Saisir un type" name="Nom" id="Nom"  required/>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/typebieres"><button  class="btn btn-warning">Retour à la liste</button></a></div>