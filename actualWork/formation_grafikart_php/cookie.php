<?php

setcookie("utilisateur", "John", time() + 60*60*24);
var_dump($_COOKIE);
?>
