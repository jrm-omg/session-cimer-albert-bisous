# Session

Juste un bout de code pour démontrer que oui, utiliser des sessions (sécurisées), c'est pas (forcément) compliqué. J'ai ajouté un maximum de commentaires, en français, dans tous les codes présents dans ce dépot.

🧙🏽‍♂️ Enjoy!

## 1. Création de session

Dans le fichier `session-creer.php` je prépare ma session puis je donne à ma superglobale `$_SESSION["est-ce-que-je-suis-authentifie"]` une valeur `true`

## 2. Vérification de session

Dans le fichier `session-verif.php` je prépare ma session puis je conditionne l'authenticité de la session à :
- la présence de la superglobale `$_SESSION["est-ce-que-je-suis-authentifie"]`
- la valeur de la superglobale `$_SESSION["est-ce-que-je-suis-authentifie"]` qui doit avoir une valeur `true`

## 3. Clôture de session

Dans le fichier `session-terminer.php` je prépare ma session puis je fais le ménage en vidant la superglobale `$_SESSION`