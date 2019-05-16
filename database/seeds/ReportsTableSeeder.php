<?php
use Illuminate\Database\Seeder;
use App\Models\Report;
class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::create([
            'title' => 'Spam',
        ]);
        Report::create([
            'title' => 'Rules Violation',
        ]);
        Report::create([
            'title' => 'Harashment',
        ]);
        Report::create([
            'title' => 'Infringes copyright',
        ]);
    }
}
