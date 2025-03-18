<?php declare(strict_types=1);

arch()->preset()->php();
arch()->preset()->security()->ignoring('shell_exec');
arch()->preset()->laravel();
