<?php

require 'NameDay.php';

$nameDay = new NameDay();
$nameDay::refresh();
$nameDay::get(1,1);
$nameDay::get(13,1);