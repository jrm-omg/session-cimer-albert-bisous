<?php

  // dès qu'on veut faire appelle à des sessions
  // on a toujours le même genre de charabia au début

  @ini_set("session.cookie_httponly", 1); // facultatif, permet d'éviter de se faire voler le cookie de session via du JS
  @ini_set("session.cookie_samesite", "Strict"); // facultatif, permet d'éviter de se faire poutrer par une faille CSRF
  session_name("session-cimer-albert"); // facultatif, permet d'avoir un nom de session unique, choisissez-en un bien à vous
  session_start(); // obligatoire, on démarre la session
  session_regenerate_id(); // facultatif, permet de régénérer la valeur stockée dans le cookie de session et d'assurer une certaine authenticité

  // nous sommes dans le fichier session-creer.php
  // donc on veut créer une session valide
  // pour créer une session valide, on va simplement donner une valeur à la variable superglobale $_SESSION (qui est de type tableau, comme $_POST, $_GET, etc.)

  $_SESSION["est-ce-que-je-suis-authentifie"] = true;

  // voilà c'est tout
  // on peut débugger $_SESSION pour voir si ça a bien fonctionné

  echo "<pre>pour info, la superglobale SESSION contient : ";
  var_dump($_SESSION);
  echo "</pre>";

  echo "<p>Maintenant que la session est créée, on peut aller éventuellement <a href='session-verif.php'>la vérifier</a></p>";