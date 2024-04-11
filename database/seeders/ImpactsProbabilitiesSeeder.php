<?php

namespace Database\Seeders;

use App\Models\Impact;
use App\Models\Probability;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImpactsProbabilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create impacts data
        $impacts = [
            ['name_en' => 'Negligible', 'name_it' => 'Trascurabile', 'name_de' => 'Geringfügig', 'name_fr' => 'Négligeable'],
            ['name_en' => 'Minor', 'name_it' => 'Minore', 'name_de' => 'Klein', 'name_fr' => 'Mineur'],
            ['name_en' => 'Moderate', 'name_it' => 'Moderato', 'name_de' => 'Mäßig', 'name_fr' => 'Modéré'],
            ['name_en' => 'Significant', 'name_it' => 'Significativo', 'name_de' => 'Bedeutend', 'name_fr' => 'Significatif'],
            ['name_en' => 'Catastrophic', 'name_it' => 'Catastrofico', 'name_de' => 'Katastrophal', 'name_fr' => 'Catastrophique'],
        ];

        // Create probabilities data
        $probabilities = [
            ['name_en' => 'Rare', 'name_it' => 'Raro', 'name_de' => 'Selten', 'name_fr' => 'Rare'],
            ['name_en' => 'Unlikely', 'name_it' => 'Improbabile', 'name_de' => 'Unwahrscheinlich', 'name_fr' => 'Peu probable'],
            ['name_en' => 'Possible', 'name_it' => 'Possibile', 'name_de' => 'Möglich', 'name_fr' => 'Possible'],
            ['name_en' => 'Probable', 'name_it' => 'Probabile', 'name_de' => 'Wahrscheinlich', 'name_fr' => 'Probable'],
            ['name_en' => 'Almost certain', 'name_it' => 'Quasi certo', 'name_de' => 'So gut wie sicher', 'name_fr' => 'Presque certain'],
        ];


        // Seed impacts
        foreach ($impacts as $impactData) {
            Impact::create($impactData);
        }

        // Seed probabilities
        foreach ($probabilities as $probabilityData) {
            Probability::create($probabilityData);
        }
    }
}
