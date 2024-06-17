<head>
    <style>
        
        body {
    background-color: #000; /* Fond noir */
    color: #fff;
    font-family: Arial, sans-serif;
}

/* Style pour le titre avec animation de saut */
h1 {
    color: #ff4500; /* Orange Red */
    text-align: center;
    font-size: 48px;
    margin-top: 50px;
    text-shadow: 2px 2px 4px rgba(255, 69, 0, 0.5);
    display: inline-block;
    position: relative;
}

h1 span {
    display: inline-block;
    animation: jump 0.5s infinite;
}

h1 span:nth-child(odd) {
    animation-delay: 0.1s;
}

h1 span:nth-child(even) {
    animation-delay: 0.2s;
}

@keyframes jump {
    0%, 100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-10px);
    }
}

/* Style du tableau */
table {
    background-color: transparent;
    border-collapse: collapse;
    color: #ff8c00; /* Dark Orange */
    width: 100%;
    animation: slideIn 1s ease-in-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

th, td {
    border: 1px solid #ff8c00; /* Dark Orange border */
    padding: 15px;
    text-align: center;
    font-size: 18px;
    color: #ccc; /* Light grey text for better contrast */
}

th {
    background-color: #1a1a1a; /* Dark background for table headers */
    color: #ff4500; /* Orange Red */
    text-transform: uppercase;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(255, 69, 0, 0.5);
}

td {
    background-color: #333; /* Dark background for table cells */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(255, 140, 0, 0.5); /* Dark Orange shadow */
    color: #ffcc99; /* Light orange text for better readability */
}

tr:nth-child(even) td {
    background-color: #4d4d4d; /* Lighter background for even rows */
}

tr:hover td {
    background-color: #ff8c00; /* Highlight on hover */
    color: #000;
}

/* Style des boutons */
.btn {
    color: #fff;
    border: none;
    padding: 8px 15px;
    margin: 2px;
    font-size: 16px;
    cursor: pointer;
    background: linear-gradient(45deg, #ff4500, #ff8c00); /* Gradient from Orange Red to Dark Orange */
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(255, 69, 0, 0.5); /* Orange Red shadow */
    transition: background 0.3s, transform 0.3s;
    animation: btnPulse 4s infinite; /* Temporary animation for buttons */
}

@keyframes btnPulse {
    0%, 100% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.1);
    }
}

.btn:hover {
    background: linear-gradient(45deg, #ff8c00, #ff4500); /* Reverse gradient on hover */
    transform: scale(1.1);
}

/* Style de la barre de recherche */
.search-container {
    margin-bottom: 20px;
    text-align: center;
}

.search-box {
    padding: 8px;
    border-radius: 20px;
    border: 2px solid #ff4500; /* Orange Red border */
    background-color: transparent;
    color: #fff;
    width: 300px;
    font-size: 16px;
}

    </style>
</head>
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
        <a href="<?= PATH ?>/main"><button  class="btn btn-warning">Retour a la list </button></a>
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

