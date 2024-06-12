<?php

class Types extends Controller{
    /**
     * Cette méthode affiche la liste des Marques
     *
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Type"
        $this->loadModel('Type');

        // On stocke les Marques dans $Types
        // (Y COMPRIS celles qui n'ont pas de FABRICANT)
        $types = $this->Type->getAll_with_pays_and_fabricant_null();

        // On envoie les données à la vue index
        $this->render('index', compact('Types'));
    }

    /**
     * Méthode permettant d'afficher un continent à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function modif(int $id){
        // On instancie le modèle "Type"
        $this->loadModel('Type');


        // On stocke la marque dans $Type
        $this->Type->id = array(
            'ID_Type' => $id
        );
        $type = $this->Type->getOne();

        // On instancie le modèle "Pays" pour générer le COMBO
        $this->loadModel('Pays');
        $Lespays = $this->Pays->getAll("NOM_PAYS asc");

        // On instancie le modèle "Fabricant" pour générer le COMBO
        $this->loadModel('Fabricant');
        $fabricants = $this->Fabricant->getAll("NOM_FABRICANT asc");

        // On envoie les données à la vue modif
        $this->render('modif', compact('Type', 'Lespays', 'fabricants'));
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
        $id_fab = $_REQUEST['Id_fabricant'];
        $id_pays = $_REQUEST['Id_pays'];

        // print_r($_REQUEST);
        // On instancie le modèle "Type"
        $this->loadModel('Type');

        // On effectue la mise à jour
        $this->Type->update($id, $nom, $id_fab, $id_pays);

        // On redirige vers la liste
        // On stocke les continent dans $Type
        $types = $this->Type->getAll_with_pays_and_fabricant_null();
        
        $message = "Type bien modifiée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('Types', 'message', 'type_message'));
    }


    /**
     * Méthode permettant d'afficher une marque à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function suppr(int $id){
        // On instancie le modèle "Type"
        $this->loadModel('Type');

        // On stocke la marque dans $Type
        $this->Type->id = array(
            'ID_Type' => $id
        );
        $marque = $this->Type->getOne();

        // On envoie les données à la vue modif
        $this->render('suppr', compact('Type'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la SUPPRESSION
     * d'une Type
     *
     * @param  int $id
     * @return void
     */
    public function suppr_sauve(int $id){

        // On instancie le modèle "Type"
        $this->loadModel('Type');

        // On effectue la mise à jour
        $this->Type->delete($id);

        // On redirige vers la liste
        // On stocke les marques dans $Types
        $marques = $this->Type->getAll_with_pays_and_fabricant_null();
        
        $message = "Type bien Supprimée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('Types', 'message', 'type_message'));
    }

    /**
     * Méthode permettant d'afficher le formulaire d'ajout d'une nouvelle Type
     *
     * @param  void
     * @return void
     */
    public function ajout(){

        // On instancie le modèle "Pays"
        $this->loadModel('Pays');
        // On stocke les Pays dans $pays
        $pays = $this->Pays->getAll("NOM_PAYS asc");

        // On instancie le modèle "Fabricant"
        $this->loadModel('Fabricant');
        // On stocke les fabricants dans $fabricants
        $fabricants = $this->Fabricant->getAll("NOM_FABRICANT asc");

        // On affiche le formulaire
        $this->render('ajout', compact('pays','fabricants'));
    }

    /**
     * Méthode permettant d'enregistrer la saisie d'une nouvelle Type
     *
     * @param  void
     * @return void
     */
    public function ajout_sauve(){

        // On recupère les données envoyées par le formulaire
        $nom = $_REQUEST['Nom'];
        $id_fab = $_REQUEST['Id_fabricant'];
        $id_pays = $_REQUEST['Id_pays'];

        // print_r($_REQUEST);

        // On instancie le modèle "Type"
        $this->loadModel('Type');

        // On effectue la mise à jour
        $this->Type->insert($nom, $id_fab, $id_pays);

        // On redirige vers la liste
        // On stocke les marques dans $Types
        $marques = $this->Type->getAll_with_pays_and_fabricant_null();
        
        $message = "Type bien Ajoutée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('Types', 'message', 'type_message'));
    }
}