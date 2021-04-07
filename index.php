<?php

/*
 * 1 - Uniquement pour la pratique, reproduisez via mysql workbench le schémas proposé.
 * 2 - Exportez le résultat de manière à créer les tables en base de données.
 * 3 - Ajoutez des utilisateurs, des rôles et ajoutez des données dans la table user_role ( attention, au moins un utilisateur doit avoir deux rôles au moins ).
 * 4 - A l'aide d'un simple print_r, afficher les rôles de chaque utilisateur.
 * 5 - FIN !
 */

require_once $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";

$db = DB::getInstance();

$request = $db->prepare("
                        SELECT user.username, role.role
                        FROM user 
                        INNER JOIN user_role AS ur ON user.id = ur.user_fk
                        INNER JOIN role ON role.id = ur.role_fk
");

$request->execute();

echo "<pre>";
print_r($request->fetchAll());
echo "</pre>";