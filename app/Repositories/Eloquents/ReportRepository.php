<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ReportRepositoryInterface;
use App\Models\Report;

class ReportRepository extends BaseRepository implements ReportRepositoryInterface
{
    /**
     * Specify Model class name
     */
    public function getModel()
    {
        return Report::class;
    }
}
