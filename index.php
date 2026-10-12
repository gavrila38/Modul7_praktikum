```php
<?php
session_start();

require_once __DIR__ . "/controller/c_programKerja.php";

$controller = new c_programKerja();
$controller->invoke();
?>
```