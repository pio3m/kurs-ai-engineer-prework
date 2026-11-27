<?php
// Skopiuj jako config.php (nie trafia do repo) i ustaw własne hasło do panelu api/admin.php.
return [
    'admin_password' => '',  // puste = panel wyłączony
    // Zalecane na hostingu (wymagane na nginx): baza poza folderem strony, np.:
    // 'db' => '/home/uzytkownik/slajdy-dane/sugestie.sqlite',
];
