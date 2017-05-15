<?php

	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

	if (isset($_POST['nbRepExpected'])){
		$nbRepExpected = $_POST['nbRepExpected'];
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		//checkIfComplete($repExpected);
	}

?>

<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	  <TITLE>QCM</TITLE>
	</head>

	<body>

		<h1>Résultats</h1>
			<p>

			<?php
				echo (verif($nbRepExpected, $prenom));
			?>

			</p>

	</body>
</html>

<?php
	/*function checkIfComplete($nbRepExpected){
		if ($nbRep != $nbRep){
			echo "Réponds à toutes les questions pour avoir ton résultat";
		}
	}*/

	function verif($nbRepExpected, $prenom){
		$good = 0;
		for ($i = 1; $i < $nbRepExpected; $i++){
			if ($_POST['Q'.$i] == 'true'){
				$good = $good + 1;
			}
		}
		$resultat = 100*($good/$nbRepExpected);
		if ($resultat > 50){
			return 'Bravo '. $prenom . ', ton résultat est de ' . $resultat . '%!';
		}
		else {
			return $prenom . ', va falloir bosser. Ton résultat est de '. $resultat . '%!';
		}
	}
?>
