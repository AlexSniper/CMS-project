
<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<title>Document</title>

</head>

<body>

<?php
declare(strict_types=1);

function sum($a, $b): int {
    return $a + $b;
}

var_dump(sum(1, 2));
var_dump(sum(1, 2.5));
?>

</body>

</html>