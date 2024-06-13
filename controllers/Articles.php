<?php

class Articles extends Controller{
    /**
     * Cette méthode affiche la liste des Marques
     *
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Marque"
        $this->loadModel('Article');

        // On stocke les Marques dans $marques
        // (Y COMPRIS celles qui n'ont pas de FABRICANT)
        $articles = $this->Article->getAll_with_marque_typebiere_couleur();

        // On envoie les données à la vue index
        $this->render('index', compact('articles'));
    }

    /**
     * Méthode permettant d'afficher un continent à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function modif(int $id){
        // On instancie le modèle "Marque" pour générer le COMBO
        $this->loadModel('Marque'); 
        $marques = $this->marque->getAll("NOM_MARQUE asc");

        // On instancie le modèle "Type" pour générer le COMBO
        $this->loadModel('typebiere');
        // On stocke les Couleur dans $typebiere
        $typebieres = $this->typebiere->getAll("NOM_TYPE asc");

        // On instancie le modèle "Couleur" pour générer le COMBO
        $this->loadModel('Couleur');
        // On stocke les Couleur dans $Couleurs
        $Couleurs = $this->Couleur->getAll("NOM_COULEUR");

        
        // On instancie le modèle "Marque"
        $this->loadModel('Article');

        // On stocke la marque dans $marque
        $this->Article->id = array(
            'ID_ARTICLE' => $id
        );
        $articles = $this->Article->getOne();
        // On envoie les données à la vue modif
        $this->render('modif', compact('articles','marques','typebieres','couleurs'));

    }

    /**
     * Méthode permettant de traiter l'enregistrement de la MODIFICATION
     * d'un Continent
     *
     * @param  int $id
     * @return void
     */
    public function modif_sauve(int $id){

        // On recupère les données envoyées par le formulaire
        $id = $_REQUEST['Id'];
        $nom = $_REQUEST['Nom'];
        $id_marq = $_REQUEST['Id_marque'];
        $id_typ = $_REQUEST['Id_type'];
        $id_coul = $_REQUEST['Id_couleur'];
        

        // print_r($_REQUEST);
        // On instancie le modèle "Marque"
        $this->loadModel('Article');

        // On effectue la mise à jour
        $this->Article->update($id, $nom, $id_marq, $id_typ,$id_coul);

        // On redirige vers la liste
        // On stocke les continent dans $marques
        $articles = $this->Article->getAll_with_marque_typebiere_couleur();
        
        $message = "Article bien modifiée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('articles', 'message', 'type_message'));
    }


    /**
     * Méthode permettant d'afficher une marque à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function suppr(int $id){
        // On instancie le modèle "Marque"
        $this->loadModel('Marque'); 
        $marques = $this->Marque->getAll("NOM_MARQUE asc");

        // On instancie le modèle "Type" pour générer le COMBO
        $this->loadModel('typebiere');
        // On stocke les Couleur dans $typebiere
        $typebieres = $this->typebiere->getAll("NOM_TYPE asc");

        // On instancie le modèle "Couleur" pour générer le COMBO
        $this->loadModel('Couleur');
        // On stocke les Couleur dans $Couleurs
        $Couleurs = $this->Couleur->getAll("NOM_COULEUR");

        $this->loadModel('Article');

        // On stocke la marque dans $marque
        $this->Article->id = array(
            'ID_ARTICLE' => $id
        );
        $article = $this->Article->getOne();

        // On envoie les données à la vue modif
        $this->render('suppr', compact('articles','marques','typebieres','couleurs'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la SUPPRESSION
     * d'une MARQUE
     *
     * @param  int $id
     * @return void
     */
    public function suppr_sauve(int $id){
        $id = $_REQUEST['Id'];
        // On instancie le modèle "Article"
        $this->loadModel('Article');
        $this->Article->delete($id);
       
        $articles = $this->Article->getAll_with_marque_typebiere_couleur();
        
        $message = "Article bien Supprimée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('articles', 'message', 'type_message'));
    }

    /**
     * Méthode permettant d'afficher le formulaire d'ajout d'une nouvelle MARQUE
     *
     * @param  void
     * @return void
     */
    public function ajout(){
        // On instancie le modèle "Marque"
        $this->loadModel('Marque'); 
        $marques = $this->marque->getAll("NOM_MARQUE asc");
        // On instancie le modèle "Type" pour générer le COMBO
        $this->loadModel('typebiere');
        // On stocke les Couleur dans $typebiere
        $typebieres = $this->typebiere->getAll("NOM_TYPE asc");

        // On instancie le modèle "Couleur" pour générer le COMBO
        $this->loadModel('Couleur');
        // On stocke les Couleur dans $Couleurs
        $Couleurs = $this->Couleur->getAll("NOM_COULEUR");
        // On affiche le formulaire
        $this->render('ajout', compact('marques','typebieres','Couleurs'));
    }

    /**
     * Méthode permettant d'enregistrer la saisie d'une nouvelle Marque
     *
     * @param  void
     * @return void
     */
    public function ajout_sauve(){

        // On recupère les données envoyées par le formulaire
        $nom = $_REQUEST['Nom'];
        $id_marq = $_REQUEST['Id_marque'];
        $id_typ = $_REQUEST['Id_type'];
        $id_coul = $_REQUEST['Id_couleur'];

        // print_r($_REQUEST);

        // On instancie le modèle "Marque"
        $this->loadModel('Article');

        // On effectue la mise à jour
        $this->Article->insert($nom, $id_marq, $id_typ,$id_coul);

        // On redirige vers la liste
        // On stocke les marques dans $marques
        $articles = $this->Article->getAll_with_marque_typebiere_couleur();
        
        $message = "Article bien Ajoutée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('articles', 'message', 'type_message'));
    }
}