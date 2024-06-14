
<body>
    <div class="container">
        <!-- Titre principal avec animation de saut -->
        <h1>
            <span>L</span><span>i</span><span>s</span><span>t</span><span>e</span>
            <span>d</span><span>e</span>
            <span>s</span>
            <span>C</span><span>o</span><span>u</span><span>l</span><span>e</span><span>u</span><span>r</span><span>s</span>
        </h1>

        <!-- Bouton d'ajout -->
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="<?= PATH ?>/couleurs/ajout">
                <button type='button' class='btn'>
                    <i class="fas fa-plus-circle"></i>&nbsp;Ajouter
                </button>
            </a>
        </div>

        <!-- Barre de recherche -->
        <div class="search-container">
            <input type="text" class="search-box" id="searchInput" placeholder="Rechercher...">
        </div>

        <!-- Tableau des couleurs -->
        <table id="colorTable">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Couleurs as $couleur): ?>
                <tr>
                    <td><?= $couleur['ID_COULEUR'] ?></td>
                    <td><?= $couleur['NOM_COULEUR'] ?></td>
                    <td>
                        <a href="<?= PATH ?>/couleurs/modif/<?= $couleur['ID_COULEUR'] ?>" class="btn btn-primary">
                            <i class="bi bi-pencil"></i>&nbsp;Modifier
                        </a>
                        <a href="<?= PATH ?>/couleurs/suppr/<?= $couleur['ID_COULEUR'] ?>" class="btn btn-danger">
                            <i class="bi bi-trash"></i>&nbsp;Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

