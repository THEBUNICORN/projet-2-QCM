<?php
	
	if (isset($_POST['submitted'])){
		$submitted = true;
		$nbsubmitted = $_POST['submitted'];
		$prenom = ucfirst($_POST['prenom']);
		$nom = ucfirst($_POST['nom']);
		$emailStudent = $_POST['email'];
		$emailProf = 'becode@becode.org';
		$formulaire= $_POST;
	}
	else {
		$submitted = false;
	}

	$questionnaire = array(
						array (	'kiki?',
								'kiki',
								'koko',
								'kuku'
								),
						array (	'koko?',
								'koko',
								'kiki',
								'kuku'
								),
						array (	'kuku?',
								'kuku',
								'koko',
								'kiki'
								)
	);

?>

<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	  <link rel="stylesheet" href="perso.css">
	  <TITLE>QCM</TITLE>
	</head>

	<body>

		<h1>QCM</h1>

		<?php
		if ($submitted){
			correctifGen($formulaire);
		}

		else {
		?>
		<form method='POST'>
			<div class='form-group'>
				<h4>Etudiant</h4>
					<label for="prenom">Prenom
						<input id='prenom' name='prenom' class="form-control">
					</label>
					<label for='nom'>Nom
						<input id='nom' name='nom' class="form-control">
					</label>
					<label for='email'>Email
						<input type="email" id='email' name='email' class="form-control">
					</label>
			</div>

			<?php
				questionGen($questionnaire);
			?>

			<div class='form-group'>
				<button type='submit' class="btn btn-default">Vérifier mes réponses</button>
			</div>

		</form>
		<?php
		}
		?>
	</body>
</html>

<?php

	function questionGen($questionnaire){
		// Numérotation des questions commence à 1
		$num = 1;
		// Parcourrir le questionnaire
		foreach ($questionnaire as $question) {
			echo "<div class='form-group'>";
			echo "<h4>Question " . $num . "</h4>";
			// Enoncé de la question
			echo "<p class='question'>" . $question[0] . "</p>";
			// Parcourir les champs des questions skipant le 1er champ (énoncé)
			 	for ($i = 1; $i <=3; $i++) {
					// Génération d'un code d'identification réponse
					$codeRep = $num . '-' . $i ;
	
					// Générer le contenu du choix
					$choixHtml = "<div class='radio'> <label for='" . $codeRep . "'> <input type='radio' name='Q" . $num . "' id='" . $codeRep. "' value='" . $codeRep . "'>" . $question[$i] . "</label>";
					echo $choixHtml;
					echo "</div>";
					}
			$num++;
			echo "</div>";
		}
	echo " <div style='display: none' class='form-group'>
						<input name='submitted' value=" . $num . ">
					</div> ";
	}


	function correctifGen($formulaire){
	 // créer un array avec les codes réponses de l'étudiant
		$repStudent = [];
		foreach ($formulaire as $key => $value) {
			if ((substr($key, 0, 1)) == 'Q') {
				$codeQ = substr($key, 1, 1);
				$codeR = substr($value, 2, 1);
				$repStudent[$codeQ] = $codeR;
			}
		}

	// compter les points
		$good = 0;
		foreach ($repStudent as $codeQ => $codeR) {
			if ($codeR == 1){
				$good++;
			}
		}
	// préparer un message en fonction
		global $nbsubmitted;
		$resultat = 100*($good/$nbsubmitted);
		if ($resultat > 50){
			$msg = 'Bravo '. $prenom . ', ton résultat est de ' . $resultat . '%!';
		}
		else {
			$msg = $prenom . ', va falloir bosser. Ton résultat est de '. $resultat . '%!';
		}
		echo "<p class='resultat'>" . $msg . "</p>";

	// Préparation de l'affichage du correctif
		// Numérotation des questions commence à 1
		?><p>
		<span class='good'>Correction</span>
		<span class='response'>-1 point</span>
		<span class='responsegood'>+1 point</span>
		</p>
		<?php
		$num = 1;
		global $questionnaire;
		// Parcourrir le questionnaire
		foreach ($questionnaire as $question) {
			echo "<div class='form-group'>";
			echo "<h4>Question " . $num . "</h4>";
			// Enoncé de la question
			echo "<p>" . $question[0] . "</p>";
			// Parcourir les champs des questions skipant le 1er champ (énoncé)
			 	for ($i = 1; $i <=3; $i++) {
					// Ajout d'une classe pour la réponse entrée par l'étudiant
					$class1 = "";
					$class2 = "";
					if ($i == $repStudent[$num]) {
						$class1 = "response";
					}
					// Ajout d'une classe pour la réponse correcte
					if ($i == 1){
						$class2 = "good";
					}
					$class = "class='" . $class1 . $class2 . "'";
	
					// Générer le contenu du choix
					$choixHtml = "<p " . $class . ">" . $question[$i] . "</p>";
					echo $choixHtml;
				}
			$num++;
			echo "</div>";
		}
	}
?>