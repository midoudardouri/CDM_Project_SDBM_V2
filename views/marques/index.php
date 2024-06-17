<body>
    <div class="container">
        <!-- Titre principal avec animation de saut -->
        <h1>
            <span>L</span><span>i</span><span>s</span><span>t</span><span>e</span>
            <span>d</span><span>e</span>
            <span>s</span>
            <span>M</span><span>a</span><span>r</span><span>q</span><span>u</span><span>e</span><span>s</span>
        </h1>

        <!-- Bouton d'ajout -->
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="<?= PATH ?>/marques/ajout">
                <button type='button' class='btn'>
                    <i class="bi bi-plus-circle"></i>&nbsp;Ajouter
                </button>
            </a>
            <a href="<?= PATH ?>/main"><button  class="btn btn-warning">Retour a la list </button></a>
        </div>

        <!-- Barre de recherche -->
        <div class="search-container">
            <input type="text" class="search-box" id="searchInput" placeholder="Rechercher...">
        </div>

        <!-- Tableau des marques -->
        <table id="marqueTable">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Fabricant</th>
                    <th>Pays</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($marques as $marque): ?>
                <tr>
                    <td><?= $marque['ID_MARQUE'] ?></td>
                    <td><?= htmlspecialchars($marque['NOM_MARQUE']) ?></td>
                    <td><?= $marque['NOM_FABRICANT'] ?></td>
                    <td><?= $marque['NOM_PAYS'] ?></td>
                    <td>
                        <a href="<?= PATH ?>/marques/modif/<?= $marque['ID_MARQUE'] ?>" class="btn btn-success">
                            <i class="bi bi-pencil"></i>&nbsp;Modifier
                        </a>
                        <a href="<?= PATH ?>/marques/suppr/<?= $marque['ID_MARQUE'] ?>" class="btn btn-danger">
                            <i class="bi bi-trash"></i>&nbsp;Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>