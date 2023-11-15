<!DOCTYPE html>
<html>
  <head>
    <title>Formulaire de commande</title>
    <?php
      // Vérifier si le formulaire a été soumis
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les valeurs du formulaire
        $nom = $_POST["nom"];
        $adresse = $_POST["adresse"];
        $produit = $_POST["produit"];
        $prix = $_POST["prix"];

        // Créer une chaîne avec les informations de commande
        $commande = "Nom: $nom\nAdresse: $adresse\nProduit: $produit\nPrix: $prix\n";

        // Chemin du fichier de commande
        $cheminFichier = "commandes.txt";

        // Chemin du dossier de sauvegarde
        $dossierSauvegarde = "sauvegarde_commandes/";

        // Stocker les informations dans le fichier principal
        file_put_contents($cheminFichier, $commande, FILE_APPEND | LOCK_EX);

        // Créer une copie de sauvegarde dans le dossier spécifié
        if (!is_dir($dossierSauvegarde)) {
          // Créer le dossier s'il n'existe pas
          mkdir($dossierSauvegarde, 0777, true);
        }

        // Générer un nom de fichier unique pour la copie de sauvegarde
        $nomFichierSauvegarde = $dossierSauvegarde . 'commande_' . date('YmdHis') . '.txt';

        // Copier le contenu dans le fichier de sauvegarde
        file_put_contents($nomFichierSauvegarde, $commande);

        echo "Commande enregistrée avec succès.";
      }
    ?>
  </head>

  <body>
    <h1>Formulaire de commande</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required><br><br>
      <label for="adresse">Adresse :</label>
      <textarea name="adresse" id="adresse" required></textarea><br><br>
      <label for="produit">Produit :</label>
      <input type="text" name="produit" id="produit" required><br><br>
      <label for="prix">Prix :</label>
      <input type="number" name="prix" id="prix" required><br><br>
      <input type="submit" value="Envoyer">
    </form>
  </body>
</html>