<?php
	
	if (isset($_POST['submitted'])){
		$submitted = true;
		$nbRepExpected = $_POST['nbRepExpected'];
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$emailStudent = $_POST['email'];
		$emailProf = 'becode@becode.org';
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


	print_r($questionnaire);
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
			echo "submitted really?";
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

			<div style='display: none' class='form-group'>
				<input name="submitted" value="submitted">
			</div>

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
			echo "<p>" . $question[0] . "</p>";
			// Parcourir les champs des questions skipant le 1er champ (énoncé)
			 	for ($i = 1; $i <=3; $i++) {
						// le premier choix est correct
						if ($i == 1){
							$orNot = 'correct';
						}
						// Sinon (3ème ou 4ème champs) orNot est incorrect
						else {
							$orNot = 'incorrect';
						}
					// Générer le contenu du choix en prenant en compte orNot
					$choixHtml = "<div class='radio'> <label for='" . $num . $i . "'> <input type='radio' name='Q" . $num . "' id='" . $num . $i . "' value='".$orNot."'>" . $question[$i] . "</label>";
					echo $choixHtml;
					echo "</div>";
					}
			$num++;
			echo "</div> </div>";
		}
	}
		

?>n as $id => $choix) {
				if ($choix != $question[0])
					$choix = "<div class='radio'> label for='" . $num[$question][] . "'> <input type='radio' name='Q" . $num . "' id='" . $num[$question][$i] . "' value='''"

			}
			$choix = "<div class='radio'> label for='" . $num[$question][] . "'> <input type='radio' name='Q" . $num . "' id='" . $num[$question][$i] . "' value='''"
				}


			echo "label "
				if ($type != 'question'){
			$choice.$num = 	"<div class='radio'> label for='" . $num[$question][$i] . "'> <input type='radio' name='Q" . $num . "' id='" . $num[$question][$i] . "' value='''"
				}
			}
		$num++;
		}

	}