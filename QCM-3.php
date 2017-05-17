<?php
// Si formulaire envoyé par POST, déclarer les variables	
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

//inclusion du formulaire sous forme d'array fourni par le client, ici le système est limité à max 9 questions pour assurer une vérification correcte
	include 'questionnaire.php';

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
		<div class=container>

		<?php
		// si POST sousmis, générer le correctif
		if ($submitted){
			correctifGen($formulaire);
		}
		// si POST pas soumis, générer le formulaire
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
		</div>

	</body>
</html>

<?php

// Générateur de formulaire
	function questionGen($questionnaire){
		// Déclaration des variables
		global $questionsMultiples;
		$questionsMultiples = [];
		$num = 0;
		// Parcourrir le questionnaire
		foreach ($questionnaire as $question) {
			$num++;
			echo "<div class='form-group'>";
			// Numéro de la question
			echo "<h4>Question " . $num . "</h4>";
			// Enoncé de la question
			echo "<p class='question'>" . $question[0] . "</p>";
			// Parcourir les champs des questions skipant le 1er champ (énoncé)
		 	for ($i = 1; $i <=3; $i++) {
				// Génération d'un code d'identification réponse reprenant le numéro de la question concernée et si la réponse est correcte (1er champs) ou non (2ème et 3ème champs)
				$codeRep = $num . '-' . $i ;
				// Générer le contenu du choix radio
				$choixHtml = "<div class='radio'> <label for='" . $codeRep . "'> <input type='radio' name='Q" . $num . "' id='" . $codeRep. "' value='" . $codeRep . "'>" . $question[$i] . "</label> </div>";
				// ajouter le choix radio dans un array
				array_push($questionsMultiples, $choixHtml);
			}
			// Mélanger les choix afin de les restituer dans un ordre aléatoire
			shuffle($questionsMultiples);
			foreach ($questionsMultiples as $choixHtml) {	
				echo $choixHtml;
			}
			// Vider l'array pour la question suivante
			$questionsMultiples = [];
			echo "</div>";
		}
		// inclure le nombre de questions en input hidden
	echo " <div style='display: none' class='form-group'>
						<input name='submitted' value=" . $num . ">
					</div> ";
	}

// Générateur de correctif
	function correctifGen($formulaire){
	// Calcul et affichage du résultat
		 // créer un array sur base des codes réponses reprenant le numéro de la question et la réponse de l'étudiant (1, 2 ou 3)
		$repStudent = [];
		foreach ($formulaire as $key => $value) {
			if ((substr($key, 0, 1)) == 'Q') {
				$codeQ = substr($key, 1, 1);
				$codeR = substr($value, 2, 1);
				$repStudent[$codeQ] = $codeR;
			}
		}
		// compter les points positif, 1 est la réponse correcte
		$good = 0;
		foreach ($repStudent as $codeQ => $codeR) {
			if ($codeR == 1){
				$good++;
			}
		}
		// compter les points négatifs, 2 et 3 sont incorrectes
		$wrong = 0;
		foreach ($repStudent as $codeQ => $codeR) {
			if ($codeR == 2 OR $codeR == 3){
				$wrong++;
			}
		}
		// calculer le résultat et préparer un message en fonction
		global $nbsubmitted;
		global $prenom;
		$resultat = 100*(($good - $wrong)/$nbsubmitted);
		if ($resultat > 50){
			$msg = 'Bravo '. $prenom . ', ton résultat est de ' . $resultat . '%!';
		}
		else {
			$msg = $prenom . ', va falloir bosser. Ton résultat est de '. $resultat . '%!';
		}
		echo "<p class='resultat'>" . $msg . "</p>";

	//  Affichage du correctif
		?><p>
		<br>
		<!-- Affichage de la légende -->
		<p class='good'>  Correction  </p>
		<p class='response'>  -1 point  </p>
		<p class='responsegood'>  +1 point  </p>
		</p>
		<?php
		// Déclaration des variables
		$num = 0;
		global $questionnaire;

		// Parcourrir le questionnaire
		foreach ($questionnaire as $question) {
			$num++;
			echo "<div class='form-group'>";
			echo "<h4>Question " . $num . "</h4>";
			// Enoncé de la question
			echo "<p>" . $question[0] . "</p>";
			// Parcourir les champs des questions skipant le 1er champ (énoncé)
			 	for ($i = 1; $i <=3; $i++) {
					// Ajout d'une classe pour la réponse entrée par l'étudiant
					$class1 = "";
					if ($i == $repStudent[$num]) {
						$class1 = "response";
					}
					// Ajout d'une classe pour la réponse correcte
					$class2 = "";
					if ($i == 1){
						$class2 = "good";
					}
					// Concaténation de la classe à appliquer
					$class = "class='" . $class1 . $class2 . "'";
	
					// Générer le contenu du choix
					$choixHtml = "<p " . $class . ">" . $question[$i] . "</p>";
					echo $choixHtml;
				}
			echo "</div>";
		}
	}
?>