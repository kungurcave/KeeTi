# KeeTi (Keeper of Times)
Простейший микропрофайлер PHP-кода. Сообщает время выполнения программы между несколькими точками.
## Использование
1. Файл *keeti.php* скопировать в каталог. Настроить, если нужно, в нем константу *KEETI_ROOTFOLDER*. В ней прописывается папка, которая отбрасывается при печати имени файла в сообщении с результатом.
2. В начале кода включить файл, вставить вызовы в точках измерения и в конце вызвать функцию, показывающую результат. Результат выдается через яваскрипт-функцию *alert*.

**Пример:**
```PHP
// какой-то код

require_once('keeti.php');

// какой-то код

keeti_Point(__FILE__,__LINE__);

// какой-то код

keeti_Point(__FILE__,__LINE__);

// какой-то код

keeti_Point(__FILE__,__LINE__);
keeti_Result();

// какой-то код
```

Результат будет примерно такой:
*Файл, строки => время (количество)

functionstest.php -583 => 0 (1)
functionstest.php 583-633 => 0 (1)
functionstest.php 633-635 => 0.01 (1)
functionstest.php 635-641 => 0 (1)
functionstest.php 641-746 => 0 (1)
functionstest.php 746-748 => 0.01 (1)
functionstest.php 748-788 => 0 (1)
functionstest.php 788-788 => 0.205 (19)
functionstest.php 788-1065 => 0.002 (1)*

При повторах время показывается общее сложенное.
