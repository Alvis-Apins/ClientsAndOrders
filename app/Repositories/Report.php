<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface Report
{
    public function getReportData():array;
}
