<h1>Ajout d'un Couleur</h1>
<div class="text-center">
<form action="<?= PATH ?>/couleurs/ajout_sauve" method="POST">
        <div class="form-group">
          <label for="Nom">Nom Couleur:</label>
          <input type="text" class="form-control" placeholder="Saisir un Couleur" name="Nom" id="Nom" required />
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/couleurs"><button  class="btn btn-warning">Retour à la liste</button></div>