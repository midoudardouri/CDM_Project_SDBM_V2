<div class="container">
    <!-- Titre principal avec animation de saut -->
    <h1>
        <span>L</span><span>i</span><span>s</span><span>t</span><span>e</span>
        <span>d</span><span>e</span>
        <span>s</span>
        <span>T</span><span>y</span><span>p</span><span>e</span><span>s</span>
        <span>d</span><span>e</span>
        <span>B</span><span>i</span><span>è</span><span>r</span><span>e</span>
    </h1>

    <!-- Bouton d'ajout -->
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="<?= PATH ?>/typebieres/ajout">
            <button type='button' class='btn'>
                <i class="bi bi-plus-circle"></i>&nbsp;Ajouter
            </button>
        </a>
    </div>

    <!-- Barre de recherche -->
    <div class="search-container">
        <input type="text" class="search-box" id="searchInput" placeholder="Rechercher...">
    </div>

    <!-- Tableau des types de bière -->
    <table id="typebiereTable">
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($typebieres as $typebiere): ?>
            <tr>
                <td><?= $typebiere['ID_TYPE'] ?></td>
                <td><?= $typebiere['NOM_TYPE'] ?></td>
                <td>
                    <a href="<?= PATH ?>/typebieres/modif/<?= $typebiere['ID_TYPE'] ?>" class="btn">
                        <i class="bi bi-pencil"></i>&nbsp;Modifier
                    </a>
                    <a href="<?= PATH ?>/typebieres/suppr/<?= $typebiere['ID_TYPE'] ?>" class="btn">
                        <i class="bi bi-trash"></i>&nbsp;Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
