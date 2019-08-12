<!--
On calcul la distance entre les 2 adresses saisies
-->
<?php
  include("../modeles/m_calculAdd.php");

    //Contrôle de saisie des données du formulaire
    if(empty($_POST['num_A'])|| empty($_POST['rue_A']) || empty($_POST['cp_A']) || empty($_POST['ville_A']) || empty($_POST['pays_A'])
        || empty($_POST['num_R']) || empty($_POST['rue_R']) || empty($_POST['cp_R']) || empty($_POST['ville_R']) || empty($_POST['pays_R'])){
      header("location: ../view/v_accueil.php?erreur=calcul");
    }
    else {
      $addressFrom = $_POST['num_A']." rue ".$_POST['rue_A']." ".$_POST['cp_A']." ".$_POST['ville_A']." ".$_POST['pays_A'];
      $addressTo   = $_POST['num_R']." rue ".$_POST['rue_R']." ".$_POST['cp_R']." ".$_POST['ville_R']." ".$_POST['pays_R'];
      // On récupère la distance en km
      $getDistance = getDistance($addressFrom, $addressTo);
      if($getDistance=="NAN km"){
        header("location: ../view/v_accueil.php?erreur=calcul");
      }
      else {
        //on renvoie la distance
        header("location: ../view/v_accueil.php?valide=calcul&dist=".$getDistance."&add1=".$addressFrom."&add2=".$addressTo);
      }
    }

?>
