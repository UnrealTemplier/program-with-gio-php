<?php

declare(strict_types=1);

use App\{Boolean, Checkbox, Field, Radio, Text};

require_once './../vendor/autoload.php';
require_once './../helpers.php';

$fields = [
    new Text('Text'),
    new Checkbox('Checkbox'),
    new Radio('Radio'),
];

foreach ($fields as $field) {
    echo $field->render() . '<br/>';
}