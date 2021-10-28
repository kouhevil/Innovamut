<?php
$servername = "localhost";
$username = "usr_innovamut";
$password = "BzyKDlB9";
$dbname = "hme_db_usr_innovamut";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT nom, prenom, poids, taille, age FROM Personnes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["nom"]. " - Name: " . $row["prenom"]. " " . $row["taille"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>