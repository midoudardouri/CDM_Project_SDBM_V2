<div class="container">
        <!-- Titre principal avec animation de saut -->
        <h1>
            <span>L</span><span>i</span><span>s</span><span>t</span><span>e</span>
            <span>d</span><span>e</span>
            <span>s</span>
            <span>C</span><span>o</span><span>n</span><span>t</span><span>i</span><span>n</span><span>e</span><span>n</span><span>t</span><span>s</span>
        </h1>

        <!-- Bouton d'ajout -->
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="<?= PATH ?>/continents/ajout">
                <button type='button' class='btn'>
                    <i class="bi bi-plus-circle"></i>&nbsp;Ajouter
                </button>
            </a>
        </div>

        <!-- Barre de recherche -->
        <div class="search-container">
            <input type="text" class="search-box" id="searchInput" placeholder="Rechercher...">
        </div>

        <!-- Tableau des continents -->
        <table id="continentTable">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($continents as $continent): ?>
                <tr>
                    <td><?= $continent['ID_CONTINENT'] ?></td>
                    <td><?= $continent['NOM_CONTINENT'] ?></td>
                    <td>
                        <a href="<?= PATH ?>/continents/modif/<?= $continent['ID_CONTINENT'] ?>" class="btn">
                            <i class="bi bi-pencil"></i>&nbsp;Modifier
                        </a>
                        <a href="<?= PATH ?>/continents/suppr/<?= $continent['ID_CONTINENT'] ?>" class="btn">
                            <i class="bi bi-trash"></i>&nbsp;Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>