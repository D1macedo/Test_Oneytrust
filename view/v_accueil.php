<!--
	Formulaire calcul de distance entre 2 adresses
-->

<?php include("../view/v_header.php");?>

<body class="index" background="../css/images/map.png" style="background-size: cover" >
		<div class="container">
			<form id="calculAdd" method="post" action="../controleurs/c_calculAdd.php">
			<div class="header">
          <h3>Oneytrust</h3>
      </div>
      <div class="inputs">
        <h5>Adresse Aller: </h5>
          <input type="text" name="num_A" placeholder="N°" />
          <input type="text" name="rue_A" placeholder="rue" />
          <input type="text" name="cp_A" placeholder="code postal" />
          <input type="text" name="ville_A" placeholder="ville" />
          <input type="text" name="pays_A" placeholder="pays" />
        <h5>Adresse Retour: </h5>
          <input type="text" name="num_R" placeholder="N°" />
          <input type="text" name="rue_R" placeholder="rue" />
          <input type="text" name="cp_R" placeholder="code postal" />
          <input type="text" name="ville_R" placeholder="ville" />
          <input type="text" name="pays_R" placeholder="pays" />
          <input id="submit" type="submit" name="calcul"/><br />
      </div>
			</form>
      <?php
      if (isset($_GET['erreur']))
      {
        if ($_GET['erreur'] == 'calcul')
        {
          echo '<p id="error">Erreur de calcul!';
        }
      }
      elseif(isset($_GET['valide']))
      {
        if ($_GET['valide'] == 'calcul')
        {
        echo '<div class="success">
                <h5>Adresse aller:</h5>'.$_GET['add1'].'
                <h5>Adresse retour:</h5>'.$_GET['add2'].'
                <h5>Distance: '.$_GET['dist'].'</h5>
              </div>';
        }
      }
      ?>
		</div>
	</body>
