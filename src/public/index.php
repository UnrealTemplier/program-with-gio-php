<?php

declare(strict_types=1);

use App\Debts\Agencies\{DebtCollectionAgency, RockyBalboa, UnknownAgency};
use App\Debts\DebtCollectionService;
use App\Inputs\{Checkbox, Radio, Text};

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

print_line();
print_line();

$agency = new DebtCollectionService();
print_line($agency->collect(new DebtCollectionAgency('Debt Collection Intl.')));
print_line($agency->collect(new RockyBalboa('Rocky Balboa')));
print_line($agency->collect(new UnknownAgency()));