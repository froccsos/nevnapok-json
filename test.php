<?php

require 'NameDay.php';

$nameDay = new NameDay();
$nameDay::refresh();
echo var_dump($nameDay::get(1,1)['main']);
echo var_dump($nameDay::get(12,6)['main']);
$nameDay::get(13,1);