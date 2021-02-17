<?php

  // dès qu'on veut faire appelle à des sessions
  // on a toujours le même genre de charabia au début

  @ini_set("session.cookie_httponly", 1); // facultatif, permet d'éviter de se faire voler le cookie de session via du JS
  @ini_set("session.cookie_samesite", "Strict"); // facultatif, permet d'éviter de se faire poutrer par une faille CSRF
  session_name("session-cimer-albert"); // facultatif, permet d'avoir un nom de session unique, choisissez-en un bien à vous
  session_start(); // obligatoire, on démarre la session
  session_regenerate_id(); // facultatif, permet de régénérer la valeur stockée dans le cookie de session et d'assurer une certaine authenticité

  // nous sommes dans le fichier session-terminer.php
  // bon théoriquement on a même pas besoin des lignes du dessus, parce qu'on va juste faire le ménage ici
  // et virer tout ce qui est en rapport avec la session, c'est parti :

  if (!empty($_SESSION)) $_SESSION = []; // si la variable superglobale n'est pas vide, on la vide (donc adieu $_SESSION["est-ce-que-je-suis-authentifie"] défini à true dans session-creer.php)
  if (isset($_COOKIE[session_name()])) setcookie(session_name(), "", time()-1, "/"); // si on a un cookie de session, on le supprime en lui donnant une date de validité antérieure à cet instant T, pour en savoir plus consultez https://www.php.net/manual/fr/function.setcookie.php
  session_destroy(); // et enfin on ferme la session
  
  // voilà c'est tout
  // là aussi on peut débugger $_SESSION pour voir ce qu'il y a dedans

  echo "<pre>pour info, la superglobale SESSION contient : ";
  var_dump($_SESSION);
  echo "</pre>";
  
  echo "<p>voilou, la session est fermée. Tu peux toujours <a href='session-verif.php'>vérifier</a> ou <a href='session-creer.php'>créer</a> la session si tu veux.</p>";