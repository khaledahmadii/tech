<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$html = app('view')->make('index', [
    'interventions_this_month' => 0,
    'interventions_this_year' => 0,
    'technicians_count' => 0,
    'interventions_par_racc' => collect([(object)['type_rac'=>'A','total'=>10], (object)['type_rac'=>'B','total'=>20]]),
    'monthly_interventions' => [],
    'interventions_this_day' => 0,
])->render();
file_put_contents(__DIR__ . '/rendered_index.html', $html);
echo "DONE\n";
