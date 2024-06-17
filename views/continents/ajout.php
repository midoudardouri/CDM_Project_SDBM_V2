<h1>Ajout d'un Continent</h1>
<div class="text-center">
<form action="<?= PATH ?>/continents/ajout_sauve" method="POST">
        <div class="form-group">
          <label for="Nom">Nom Continent:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom" required />
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
       
      
       
</form>  
<a href="<?= PATH ?>/continents"><button  class="btn btn-warning">Retour à la liste</button></a> </div>