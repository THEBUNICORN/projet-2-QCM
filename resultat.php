<?php

	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

	if (isset($_POST['nbRepExpected'])){
		$nbRepExpected = $_POST['nbRepExpected'];
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$emailStudent = $_POST['email'];
		$emailProf = 'becode@becode.org';
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
				echo (checkIfComplete($nbRepExpected, 10));
				echo (verif($nbRepExpected, $prenom));
				//sendResult();
			?>

			</p>

	</body>
</html>

<?php
	function checkIfComplete($nbRepExpected, $nbRepToBe){
		if ($nbRepExpected != $nbRepToBe){
			echo "Réponds à toutes les questions pour avoir ton résultat";
		}
	}

	function verif($nbRepExpected, $prenom){
		$good = 0;
		for ($i = 1; $i < $nbRepExpected; $i++){
			if ($_POST['Q'.$i] == 'correc'){
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

	function sendResult($emailProf, $emailStudent){
		$objetProf = 'Résultats QCM de '.$prenom.' '.upperCase($nom);
		$messageProf = 'Le résultat de '.$prenom.' '.upperCase($nom). 'est de '.$resultat;
		$objetStudent = 'Ton ésultats QCM';
		$messageStudent = 'Le résultat est de '.$resultat;
		mail($emailProf, $objetProf, $messageProf);
		mail($emailStudent, $objetStudent, $messageStudent);
	}
?>
