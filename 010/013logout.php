<?php

declare(strict_types=1);
// Recuperamos la información de la sesión
session_start();
// Y la destruimos
session_destroy();
header("Location: 010index.php");
