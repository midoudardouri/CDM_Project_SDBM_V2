<body>
    <div class="container">
        <!-- Titre principal avec animation de saut -->
        <h1>
            <span>L</span><span>i</span><span>s</span><span>t</span><span>e</span>
            <span>d</span><span>e</span>
            <span>s</span>
            <span>P</span><span>a</span><span>y</span><span>s</span>
        </h1>

        <!-- Bouton d'ajout -->
        <div style="text-align: center; margin-bottom: 20px;">
            <a href="<?= PATH ?>/lespays/ajout">
                <button type='button' class='btn'>
                    <i class="bi bi-plus-circle"></i>&nbsp;Ajouter
                </button>
            </a>
        </div>

        <!-- Barre de recherche -->
        <div class="search-container">
            <input type="text" class="search-box" id="searchInput" placeholder="Rechercher...">
        </div>

        <!-- Tableau des pays -->
        <table id="countryTable">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Continent</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lespays as $pays): ?>
                <tr>
                    <td><?= $pays['ID_PAYS'] ?></td>
                    <td><?= $pays['NOM_PAYS'] ?></td>
                    <td><?= $pays['NOM_CONTINENT'] ?></td>
                    <td>
                        <a href="<?= PATH ?>/lespays/modif/<?= $pays['ID_PAYS'] ?>" class="btn btn-success">
                            <i class="bi bi-pencil"></i>&nbsp;Modifier
                        </a>
                        <a href="<?= PATH ?>/lespays/suppr/<?= $pays['ID_PAYS'] ?>" class="btn btn-danger">
                            <i class="bi bi-trash"></i>&nbsp;Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>