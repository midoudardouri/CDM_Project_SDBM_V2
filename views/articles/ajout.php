<h1>Ajout d'un Pays</h1>

<form action="<?= PATH ?>/articles/ajout_sauve" method="POST">
        <div class="form-group">
          <label for="Nom">Nom Article:</label>
          <input type="text" class="form-control" placeholder="Saisir un Nom" name="Nom" id="Nom" />
        </div>
        <!-- Marque combo -->
        <div class="form-group">
          <label for="Nom">Marque:</label>

          <select name="Id_Marque" id="Id_Marque" class="form-control"/>
            <?php foreach($marques as $marque): ?>
                <option value=<?= $marque['ID_MARQUE'] ?>><?= $marque['NOM_MARQUE'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <!-- couleur combo -->
        <div class="form-group">
          <label for="Nom">couleur:</label>
          <select name="Id_Couleur" id="Id_Couleur" class="form-control"/>
            <?php foreach($Couleurs as $couleur): ?>
                <option value=<?= $couleur['ID_COULEUR'] ?>><?= $couleur['NOM_COULEUR'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <!-- type Biere combo -->
        <div class="form-group">
          <label for="Nom">Type Biere:</label>
          <select name="Id_type" id="Id_type" class="form-control"/>
            <?php foreach($typebieres as $typebiere): ?>
                <option value=<?= $typebiere['ID_TYPE'] ?>><?= $typebiere['NOM_TYPE'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>  
<a href="<?= PATH ?>/articles"><button  class="btn btn-warning">Retour à la liste</button></a>