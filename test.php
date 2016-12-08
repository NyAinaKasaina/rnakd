<?php

$dateMe = date_parse_from_format('d-m-Y',strtotime('08-04-1994'));

echo '<pre>';
print_r($dateMe);
echo '</pre>';
