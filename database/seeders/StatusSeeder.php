<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            ['name_en' => 'In progress', 'name_it' => 'In corso', 'name_de' => 'In Bearbeitung', 'name_fr' => 'En cours'],
            ['name_en' => 'Defined', 'name_it' => 'Definito', 'name_de' => 'Definiert', 'name_fr' => 'Défini'],
            ['name_en' => 'Deleted', 'name_it' => 'Cancellato', 'name_de' => 'Gelöscht', 'name_fr' => 'Supprimé'],
        ];        

        foreach ($status as $statusData) {
            Status::create($statusData);
        }
    }
}
