<?php
session_start();
$id = $_POST['id_bouteille'];
$vol = $_POST['volume'];
var_dump($vol);
$year = $_POST['annee'];
$note = $_POST['note'];
$demande = $_POST['demande'];

$pdo = new PDO('sqlite:new_cave.db');

$statement = $pdo->query("SELECT ANNEES.id_annee, ANNEES.quantite
                        FROM ANNEES, FLACONS, MILLESIMES
                        WHERE ANNEES.id_bouteille = $id and ANNEES.id_flacon = FLACONS.id_flacon 
                        and FLACONS.volume = '$vol' and ANNEES.id_millesime = MILLESIMES.id_millesime 
                        and MILLESIMES.annee = $year and ANNEES.note = $note;");

if ($statement === FALSE){
    die('Erreur SQL');
}

$results = $statement->fetchAll();
$id_annee = $results[0][0];
echo $id_annee;
$prev_qte = $results[0][1];
echo $prev_qte;
if ($prev_qte - $demande === 0){
    $query = $pdo->prepare('DELETE FROM ANNEES WHERE id_annee = :id_annee');
    $query->execute([
        'id_annee' => $id_annee
    ]);
    echo 'Delete';
}else {
    $query = $pdo->prepare('UPDATE ANNEES SET quantite = :quantite WHERE id_annee = :id_annee');
    $query->execute([
        'quantite' => ($prev_qte-$demande),
        'id_annee' => $id_annee
    ]);
    echo 'Moins';
}


header("Location:../index.php");