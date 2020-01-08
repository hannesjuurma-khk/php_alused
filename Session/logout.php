<?php

session_start(); // session_start peab kasutama igal lehel, kus soovid sama sessioni jätkata
session_unset(); // sessioonis olevate muutujate puhastamine
session_destroy(); // sessiooni ära kustutamine

?>