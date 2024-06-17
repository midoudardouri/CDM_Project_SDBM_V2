<h1>Modification d'un article</h1>

<form action="<?= PATH ?>/articles/modif_sauve/<?= $article['ID_ARTICLE'] ?>" method="POST">
        <div class="form-group">
          <label for="Nom">Code:</label>
          <input type="text" class="form-control" value=<?= $article['ID_ARTICLE'] ?> name="Id" id="Id" readonly />
        </div>
        <div class="form-group">
          <label for="Nom">Nom Article:</label>
          <input type="text" class="form-control" value='<?= $article['NOM_ARTICLE'] ?>' name="Nom" id="Nom" />
        </div>
<!-- COMBO marque -->
        <div class="form-group">
          <label for="Nom">Marque:</label>
          <select name="Id_Marque" id="Id_Marque" class="form-control"/>
            <?php foreach($marques as $marque): ?>
                <?php
                    $selected = "";
                    if ($article['ID_MARQUE'] == $marque['ID_MARQUE']) {
                        $selected = " selected ";
                    }
                ?>
                <option value=<?= $marque['ID_MARQUE'] ?><?=  $selected ?>><?= $marque['NOM_MARQUE'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <!-- COMBO couleur -->
        <div class="form-group">
          <label for="Nom">couleur:</label>
          <select name="Id_Couleur" id="Id_Couleur" class="form-control" />
            <?php foreach($Couleurs as $Couleur): ?>
                <option value=<?php
                      echo $Couleur['ID_COULEUR'];
                      if ($article['ID_COULEUR'] == $Couleur['ID_COULEUR']) {
                           echo " selected";
                      }
                     ?>>
                    <?= $Couleur['NOM_COULEUR'] ?>
                </option>
            <?php endforeach ?>
          </select>
        </div>
        <!-- COMBO  type Biere  -->
        <div class="form-group">
          <label for="Nom">Type Biere:</label>
          <select name="Id_type" id="Id_type" class="form-control" />
            <?php foreach($typebieres as $typebiere): ?>
                <option value=<?php
                      echo $typebiere['ID_TYPE'];
                      if ($article['ID_TYPE'] == $typebiere['ID_TYPE']) {
                           echo " selected";
                      }
                     ?>>
                    <?= $typebiere['NOM_TYPE'] ?>
                </option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="text-center"><div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="<?= PATH ?>/articles"><button  class="btn btn-warning">Retour à la liste</button></a>
        </div>
</form>  
