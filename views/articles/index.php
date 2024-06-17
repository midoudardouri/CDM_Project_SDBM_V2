
<div class="container">
    <!-- Titre principal avec animation de saut -->
    <h1>
        <span>L</span><span>i</span><span>s</span><span>t</span><span>e</span>
        <span>d</span><span>e</span>
        <span>s</span>
        <span>A</span><span>r</span><span>t</span><span>i</span><span>c</span><span>l</span><span>e</span><span>s</span>
    </h1>

    <!-- Bouton d'ajout -->
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="<?= PATH ?>/articles/ajout">
            <button type='button' class='btn'>
                <i class="bi bi-plus-circle"></i>&nbsp;Ajouter
            </button>
        </a>
    </div>

    <!-- Barre de recherche -->
    <div class="search-container">
        <input type="text" class="search-box" id="searchInput" placeholder="Rechercher...">
    </div>

    <!-- Tableau des articles -->
    <div class="container-fluid">
        <table id="articleTable" class="table table-hover">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Marque</th>
                    <th>Type</th>
                    <th>Couleur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($articles as $article): ?>
                <tr>
                    <td><?= $article['ID_ARTICLE'] ?></td>
                    <td><?= $article['NOM_ARTICLE'] ?></td>
                    <td><?= $article['NOM_MARQUE'] ?></td>
                    <td><?= $article['NOM_TYPE'] ?></td>
                    <td><?= $article['NOM_COULEUR'] ?></td>
                    <td>
                        <a href="<?= PATH ?>/articles/modif/<?= $article['ID_ARTICLE'] ?>" class="btn">
                            <i class="bi bi-pencil"></i>&nbsp;Modifier
                        </a>
                        <a href="<?= PATH ?>/articles/suppr/<?= $article['ID_ARTICLE'] ?>" class="btn">
                            <i class="bi bi-trash"></i>&nbsp;Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

