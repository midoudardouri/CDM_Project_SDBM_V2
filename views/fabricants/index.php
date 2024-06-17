
<div class="container">
    <!-- Titre principal avec animation de saut -->
    <h1>
        <span>L</span><span>i</span><span>s</span><span>t</span><span>e</span>
        <span>d</span><span>e</span>
        <span>s</span>
        <span>F</span><span>a</span><span>b</span><span>r</span><span>i</span><span>c</span><span>a</span><span>n</span><span>t</span><span>s</span>
    </h1>

    <!-- Bouton d'ajout -->
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="<?= PATH ?>/fabricants/ajout">
            <button type='button' class='btn'>
                <i class="bi bi-plus-circle"></i>&nbsp;Ajouter
            </button>
        </a>
    </div>

    <!-- Barre de recherche -->
    <div class="search-container">
        <input type="text" class="search-box" id="searchInput" placeholder="Rechercher...">
    </div>

    <!-- Tableau des fabricants -->
    <table id="fabricantTable">
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($fabricants as $fabricant): ?>
            <tr>
                <td><?= $fabricant['ID_FABRICANT'] ?></td>
                <td><?= $fabricant['NOM_FABRICANT'] ?></td>
                <td>
                    <a href="<?= PATH ?>/fabricants/modif/<?= $fabricant['ID_FABRICANT'] ?>" class="btn">
                        <i class="bi bi-pencil"></i>&nbsp;Modifier
                    </a>
                    <a href="<?= PATH ?>/fabricants/suppr/<?= $fabricant['ID_FABRICANT'] ?>" class="btn">
                        <i class="bi bi-trash"></i>&nbsp;Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
