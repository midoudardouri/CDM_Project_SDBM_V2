<?php

class Fabricants extends Controller{
    /**
     * Cette méthode affiche la liste des Marques
     *
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Fabricant"
        $this->loadModel('fabricant');

        // On stocke les Marques dans $Fabricants
        // (Y COMPRIS celles qui n'ont pas de FABRICANT)
        $fabricants = $this->fabricant->getAll();
        $scriptJS = "$(document).ready(function () {
            // Fonction de recherche
            $('#searchInput').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#fabricantTable tbody tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        })";

        // On envoie les données à la vue index
        $this->render('index', compact('fabricants','scriptJS'));
    }

    /**
     * Méthode permettant d'afficher un continent à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function modif(int $id){
        // On instancie le modèle "Fabricant"
        $this->loadModel('fabricant');


        // On stocke la marque dans $Fabricant
        $this->fabricant->id = array(
            'ID_FABRICANT' => $id
        );
        $fabricant = $this->fabricant->getOne();

        // On envoie les données à la vue modif
        $this->render('modif', compact('fabricant'));
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

        // On instancie le modèle "Fabricant"
        $this->loadModel('fabricant');

        // On effectue la mise à jour
        $this->fabricant->update($id, $nom);

        // On redirige vers la liste
        // On stocke les continent dans $Fabricant
        $fabricants = $this->fabricant->getAll();
        $scriptJS = <<<SCRIPT
Swal.fire({
  position: "top-end",
  icon: "success",
  title: "Continent bien modifié",
  showConfirmButton: false,
  timer: 1500
});
SCRIPT;
        
        $message = "Fabricant bien modifiée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('fabricants', 'message', 'type_message','scriptJS'));
    }


    /**
     * Méthode permettant d'afficher une marque à partir de son ID
     *
     * @param  int $id
     * @return void
     */
    public function suppr(int $id){
        // On instancie le modèle "Fabricant"
        $this->loadModel('Fabricant');

        // On stocke la marque dans $Fabricant
        $this->Fabricant->id = array(
            'ID_FABRICANT' => $id
        );
        $fabricant = $this->Fabricant->getOne();

        // On envoie les données à la vue modif
        $this->render('suppr', compact('fabricant'));
    }

    /**
     * Méthode permettant de traiter l'enregistrement de la SUPPRESSION
     * d'une Fabricant
     *
     * @param  int $id
     * @return void
     */
    public function suppr_sauve(int $id){

        $id = $_REQUEST['Id'];
        // On instancie le modèle "Fabricant"
        $this->loadModel('Fabricant');

        // On effectue la mise à jour
        $this->Fabricant->delete($id);

        // On redirige vers la liste
        // On stocke les marques dans $Fabricants
        $fabricants = $this->Fabricant->getAll();
        $scriptJS = $scriptJS = <<<SCRIPT
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
          },
          buttonsStyling: false
        });
        
        swalWithBootstrapButtons.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
              title: "Deleted!",
              text: "Your file has been deleted.",
              icon: "success"
            });
          } else if (
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire({
              title: "Cancelled",
              text: "Your imaginary file is safe :)",
              icon: "error"
            });
          }
        });
        SCRIPT;
        $message = "Fabricant Bien Supprimé";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('fabricants', 'message', 'type_message','scriptJS'));
    }

    /**
     * Méthode permettant d'afficher le formulaire d'ajout d'une nouvelle Fabricant
     *
     * @param  void
     * @return void
     */
    public function ajout(){
        $this->render('ajout', array());
    }

    /**
     * Méthode permettant d'enregistrer la saisie d'un nouveau Fabricant
     *
     * @param  void
     * @return void
     */
    public function ajout_sauve(){

        // On recupère les données envoyées par le formulaire
        $nom = $_REQUEST['Nom'];

        // On instancie le modèle "Fabricant"
        $this->loadModel('Fabricant');

        // On effectue la mise à jour
        $this->Fabricant->insert($nom);

        // On redirige vers la liste
        // On stocke les marques dans $Fabricants
        $fabricants = $this->Fabricant->getAll();
        $scriptJS = <<<SCRIPT
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Continent bien Ajouté",
          showConfirmButton: false,
          timer: 1500
        });
        SCRIPT;
        
        $message = "Fabricant bien Ajoutée";
        $type_message = "success";
        // On envoie les données à la vue index
        $this->render('index', compact('fabricants', 'message', 'type_message','scriptJS'));
    }
}