<?php

var_dump(is_int(1));
echo '<br>';

var_dump(is_int(2)); // is_int can replace is_integer
echo '<br>';

var_dump(is_float(5.3)); // is_float can replace is_real
echo '<br>';

var_dump(is_int(50)); // is_int can replace is_long
echo '<br>';

var_dump(is_float(2.5));
echo '<br>';

var_dump(is_string('Impacta'));
echo '<br>';

var_dump(is_array(array(1, 2, 3)));
echo '<br>';

class Carro {}
$relampagoMcQueen = new Carro();
var_dump(is_object($relampagoMcQueen));
echo '<br>';

class nada{}
$naoExiste = new nada();
var_dump(is_null($naoExiste));
?>
