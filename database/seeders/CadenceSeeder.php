<?php

namespace Database\Seeders;

use App\Models\Cadence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CadenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cadences = [
            [
                'name_en' => 'Daily',
                'name_it' => 'Giornaliero',
                'name_de' => 'Täglich',
                'name_fr' => 'Quotidiennement'
            ],
            [
                'name_en' => 'Weekly',
                'name_it' => 'Settimanale',
                'name_de' => 'Wöchentlich',
                'name_fr' => 'Hebdomadaire'
            ],
            [
                'name_en' => 'Monthly',
                'name_it' => 'Mensile',
                'name_de' => 'Monatlich',
                'name_fr' => 'Mensuellement'
            ],
            [
                'name_en' => 'Quartely',
                'name_it' => 'Trimestrale',
                'name_de' => 'Quartalsweise',
                'name_fr' => 'Trimestriellement'
            ],
            [
                'name_en' => 'Half-Yearly',
                'name_it' => 'Semestrale',
                'name_de' => 'Halbjährlich',
                'name_fr' => 'Semestriellement'
            ],
            [
                'name_en' => 'Yearly',
                'name_it' => 'Annuale',
                'name_de' => 'Jährlich',
                'name_fr' => 'Annuellement'
            ]
        ];
        

        foreach ($cadences as $cadenceData) {
            Cadence::create($cadenceData);
        }
    }
}
