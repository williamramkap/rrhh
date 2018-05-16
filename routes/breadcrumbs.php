<?php

Breadcrumbs::register('payroll', function ($breadcrumbs, $year, $month) {
    $breadcrumbs->push('Planilla de '.$year.' - '.$month);
});
Breadcrumbs::register('payroll_edit', function ($breadcrumbs, $year, $month) {
    $breadcrumbs->push('Edición de la planilla de '.$year.' - '.$month);
});
