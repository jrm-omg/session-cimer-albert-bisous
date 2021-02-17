<?php

  // dès qu'on veut faire appelle à des sessions
  // on a toujours le même genre de charabia au début

  @ini_set("session.cookie_httponly", 1); // facultatif, permet d'éviter de se faire voler le cookie de session via du JS
  @ini_set("session.cookie_samesite", "Strict"); // facultatif, permet d'éviter de se faire poutrer par une faille CSRF
  session_name("session-cimer-albert"); // facultatif, permet d'avoir un nom de session unique, choisissez-en un bien à vous
  session_start(); // obligatoire, on démarre la session
  session_regenerate_id(); // facultatif, permet de régénérer la valeur stockée dans le cookie de session et d'assurer une certaine authenticité

  // nous sommes dans le fichier session-verif.php
  // donc on veut vérifier que la session, si elle existe, est valide
  // je rappelle que nous avons estimé dans le fichier "session-creer.php"
  // qu'une session, pour être valide, devait posséder une variable superglobale $_SESSION["est-ce-que-je-suis-authentifie"] définie à true
  // on va donc simplement vérifier ici que c'est bien le cas

  if (
    isset($_SESSION["est-ce-que-je-suis-authentifie"])
    AND $_SESSION["est-ce-que-je-suis-authentifie"] === true
  ) {
    echo "<h1>:)</h1><pre>yes, ta session est valide</pre>";
  } else {
    echo "<h1>:(</h1><pre>nooooo, ta session n'est pas valide</pre>";
  }
  
  // voilà c'est tout
  // là aussi on peut débugger $_SESSION pour voir ce qu'il y a dedans

  echo "<pre>pour info, la superglobale SESSION contient : ";
  var_dump($_SESSION);
  echo "</pre>";
  
  echo "<p>Tu peux triturer ta session, en effaçant ou en changeant la valeur du cookie par exemple, puis recharge cette page pour voir si la session est toujours valide, ou pas. Une fois que tu te seras suffisamment amusé tu pourras également <a href='session-terminer.php'>fermer</a> ou <a href='session-creer.php'>créer</a> la session</p>";