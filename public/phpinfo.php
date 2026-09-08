<?php

echo "<h2>PHP Environment Diagnostics - CV. Beranda Teknologi Digital</h2>";
echo "<strong>Active PHP Version:</strong> " . phpversion() . "<br>";
echo "<strong>Server API (SAPI):</strong> " . php_sapi_name() . "<br>";
echo "<strong>Document Root:</strong> " . ($_SERVER['DOCUMENT_ROOT'] ?? '-') . "<br>";
echo "<strong>Script Filename:</strong> " . ($_SERVER['SCRIPT_FILENAME'] ?? '-') . "<br>";
echo "<hr>";
echo "<h3>Loaded PHP Extensions:</h3>";
echo implode(', ', get_loaded_extensions());
