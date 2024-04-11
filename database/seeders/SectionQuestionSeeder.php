<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'title_en' => 'Risk description',
                'title_it' => 'Descrizione del rischio',
                'title_de' => 'Beschreibung des Risikos',
                'title_fr' => 'Description des risques',
                'display_order' => 10,
                'original' => true,
                'questions' => [
                    [
                        'title_en' => 'More detailed description of the risk',
                        'title_it' => 'Descrizione più dettagliata del rischio',
                        'title_de' => 'Detaillierte Beschreibung des Risikos',
                        'title_fr' => 'Description plus détaillée du risque',
                        'display_order' => 10,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Other observations (related risks, fraud, ...)',
                        'title_it' => 'Altre osservazioni (rischi correlati, frodi, ...)',
                        'title_de' => 'Andere Beobachtungen (zugehörige Risiken, Betrug, ...)',
                        'title_fr' => 'Autres observations (risques liés, fraude, ...)',
                        'display_order' => 20,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'The risk compared to last year',
                        'title_it' => 'Il rischio confrontato con l\'anno scorso',
                        'title_de' => 'Das Risiko im Vergleich zum letzten Jahr',
                        'title_fr' => 'Le risque comparé à l\'année dernière',
                        'display_order' => 30,
                        'original' => true,
                    ],
                ],
            ],
            [
                'title_en' => 'Causes of risk',
                'title_it' => 'Cause del rischio',
                'title_de' => 'Ursachen des Risikos',
                'title_fr' => 'Causes du risque',
                'display_order' => 20,
                'original' => true,
                'questions' => [
                    [
                        'title_en' => 'Risk triggers, accounting accounts and cost centres affected',
                        'title_it' => 'Inneschi del rischio, conti di contabilità e centri di costo coinvolti',
                        'title_de' => 'Risikotriggern, betroffene Buchungskonten und Kostenstellen',
                        'title_fr' => 'Déclencheurs de risque, comptes comptables et centres de coût affectés',
                        'display_order' => 10,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Sentinel indicators of risk',
                        'title_it' => 'Indicatori sentinella del rischio',
                        'title_de' => 'Wächterindikatoren des Risikos',
                        'title_fr' => 'Indicateurs sentinelles du risque',
                        'display_order' => 20,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Reference scenario and negative consequences',
                        'title_it' => 'Scenario di riferimento e conseguenze negative',
                        'title_de' => 'Referenzszenario und negative Konsequenzen',
                        'title_fr' => 'Scénario de référence et conséquences négatives',
                        'display_order' => 30,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Communication in the event of an error or negative event',
                        'title_it' => 'Comunicazione in caso di errore o evento negativo',
                        'title_de' => 'Kommunikation im Falle eines Fehlers oder negativen Ereignisses',
                        'title_fr' => 'Communication en cas d\'erreur ou d\'événement négatif',
                        'display_order' => 40,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Other observations and reference documents',
                        'title_it' => 'Altre osservazioni e documenti di riferimento',
                        'title_de' => 'Weitere Beobachtungen und Referenzdokumente',
                        'title_fr' => 'Autres observations et documents de référence',
                        'display_order' => 50,
                        'original' => true,
                    ],
                ],
            ],
            [
                'title_en' => 'Risk assessment',
                'title_it' => 'Valutazione del rischio',
                'title_de' => 'Risikobewertung',
                'title_fr' => 'Évaluation des risques',
                'display_order' => 30,
                'original' => true,
                'questions' => [
                    [
                        'title_en' => 'Description of the PROBABILITY of the described risk occurring',
                        'title_it' => 'Descrizione della PROBABILITÀ dell\'occorrenza del rischio descritto',
                        'title_de' => 'Beschreibung der WAHRSCHEINLICHKEIT des beschriebenen Risikos',
                        'title_fr' => 'Description de la PROBABILITÉ de l\'occurrence du risque décrit',
                        'display_order' => 10,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Definition of IMPACT in the event of the described risk occurring',
                        'title_it' => 'Definizione di IMPATTO nel caso in cui si verifichi il rischio descritto',
                        'title_de' => 'Definition von AUSWIRKUNGEN im Falle des beschriebenen Risikos',
                        'title_fr' => 'Définition de l\'IMPACT en cas de réalisation du risque décrit',
                        'display_order' => 20,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Likelihood and impact indicators',
                        'title_it' => 'Indicatori di probabilità e impatto',
                        'title_de' => 'Wahrscheinlichkeits- und Auswirkungsindikatoren',
                        'title_fr' => 'Indicateurs de probabilité et d\'impact',
                        'display_order' => 30,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Risk factor estimation',
                        'title_it' => 'Stima del fattore di rischio',
                        'title_de' => 'Risikofaktorschätzung',
                        'title_fr' => 'Estimation du facteur de risque',
                        'display_order' => 40,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Description of the control activity',
                        'title_it' => 'Descrizione dell\'attività di controllo',
                        'title_de' => 'Beschreibung der Kontrollaktivität',
                        'title_fr' => 'Description de l\'activité de contrôle',
                        'display_order' => 50,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Documentation used for the control',
                        'title_it' => 'Documentazione utilizzata per il controllo',
                        'title_de' => 'Für die Kontrolle verwendete Dokumentation',
                        'title_fr' => 'Documentation utilisée pour le contrôle',
                        'display_order' => 60,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Observations and comments on control',
                        'title_it' => 'Osservazioni e commenti sul controllo',
                        'title_de' => 'Beobachtungen und Kommentare zur Kontrolle',
                        'title_fr' => 'Observations et commentaires sur le contrôle',
                        'display_order' => 70,
                        'original' => true,
                    ],
                ],
            ],
            [
                'title_en' => 'Evaluation of the effectiveness of key control',
                'title_it' => 'Valutazione dell\'efficacia del controllo chiave',
                'title_de' => 'Bewertung der Wirksamkeit der Schlüsselkontrolle',
                'title_fr' => 'Évaluation de l\'efficacité du contrôle clé',
                'display_order' => 40,
                'original' => true,
                'questions' => [
                    [
                        'title_en' => 'Are there substitute collaborators for this control?',
                        'title_it' => 'Ci sono collaboratori sostitutivi per questo controllo?',
                        'title_de' => 'Gibt es Ersatzmitarbeiter für diese Kontrolle?',
                        'title_fr' => 'Y a-t-il des collaborateurs de remplacement pour ce contrôle?',
                        'display_order' => 10,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Has the control been carried out?',
                        'title_it' => 'È stato effettuato il controllo?',
                        'title_de' => 'Wurde die Kontrolle durchgeführt?',
                        'title_fr' => 'Le contrôle a-t-il été effectué?',
                        'display_order' => 20,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Was the control carried out at the stipulated frequency?',
                        'title_it' => 'Il controllo è stato effettuato con la frequenza prevista?',
                        'title_de' => 'Wurde die Kontrolle in der vorgeschriebenen Häufigkeit durchgeführt?',
                        'title_fr' => 'Le contrôle a-t-il été effectué à la fréquence stipulée?',
                        'display_order' => 30,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Is there a directive or regulation governing control?',
                        'title_it' => 'Esiste una direttiva o regolamento che disciplina il controllo?',
                        'title_de' => 'Gibt es eine Anweisung oder Verordnung, die die Kontrolle regelt?',
                        'title_fr' => 'Y a-t-il une directive ou un règlement régissant le contrôle?',
                        'display_order' => 40,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Has the described risk manifested itself?',
                        'title_it' => 'Il rischio descritto si è manifestato?',
                        'title_de' => 'Hat sich das beschriebene Risiko manifestiert?',
                        'title_fr' => 'Le risque décrit s\'est-il manifesté?',
                        'display_order' => 50,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Are the control documents traceable, well kept, stamped and dated?',
                        'title_it' => 'I documenti di controllo sono tracciabili, ben conservati, timbrati e datati?',
                        'title_de' => 'Sind die Kontrolldokumente nachvollziehbar, gut aufbewahrt, gestempelt und datiert?',
                        'title_fr' => 'Les documents de contrôle sont-ils traçables, bien conservés, timbrés et datés?',
                        'display_order' => 60,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Was an improvement introduced to the key control compared to the previous year?',
                        'title_it' => 'È stato introdotto un miglioramento al controllo chiave rispetto all\'anno precedente?',
                        'title_de' => 'Wurde im Vergleich zum Vorjahr eine Verbesserung in der Schlüsselkontrolle eingeführt?',
                        'title_fr' => 'Une amélioration a-t-elle été introduite dans le contrôle clé par rapport à l\'année précédente?',
                        'display_order' => 70,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Fraud risk assessment',
                        'title_it' => 'Valutazione del rischio di frode',
                        'title_de' => 'Bewertung des Betrugsrisikos',
                        'title_fr' => 'Évaluation du risque de fraude',
                        'display_order' => 80,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Observations and comments on the key control performed',
                        'title_it' => 'Osservazioni e commenti sul controllo chiave effettuato',
                        'title_de' => 'Beobachtungen und Kommentare zur durchgeführten Schlüsselkontrolle',
                        'title_fr' => 'Observations et commentaires sur le contrôle clé effectué',
                        'display_order' => 90,
                        'original' => true,
                    ],
                ],
            ],
            [
                'title_en' => 'Objectives and improvement measures for key control',
                'title_it' => 'Obiettivi e misure di miglioramento per il controllo chiave',
                'title_de' => 'Ziele und Verbesserungsmaßnahmen für die Schlüsselkontrolle',
                'title_fr' => 'Objectifs et mesures d\'amélioration pour le contrôle clé',
                'display_order' => 50,
                'original' => true,
                'questions' => [
                    [
                        'title_en' => 'Objectives and improvement measures to be introduced for key control',
                        'title_it' => 'Obiettivi e misure di miglioramento da introdurre per il controllo chiave',
                        'title_de' => 'Ziele und Verbesserungsmaßnahmen für die Schlüsselkontrolle einzuführen',
                        'title_fr' => 'Objectifs et mesures d\'amélioration à introduire pour le contrôle clé',
                        'display_order' => 10,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Final remarks',
                        'title_it' => 'Osservazioni finali',
                        'title_de' => 'Abschließende Bemerkungen',
                        'title_fr' => 'Remarques finales',
                        'display_order' => 20,
                        'original' => true,
                    ],
                ],
            ],
            [
                'title_en' => 'Certification of the evaluation',
                'title_it' => 'Certificazione della valutazione',
                'title_de' => 'Zertifizierung der Bewertung',
                'title_fr' => 'Certification de l\'évaluation',
                'display_order' => 60,
                'original' => true,
                'questions' => [
                    [
                        'title_en' => 'Place and date of evaluation',
                        'title_it' => 'Luogo e data della valutazione',
                        'title_de' => 'Ort und Datum der Bewertung',
                        'title_fr' => 'Lieu et date de l\'évaluation',
                        'display_order' => 10,
                        'original' => true,
                    ],
                    [
                        'title_en' => 'Evaluation/self-evaluation carried out by',
                        'title_it' => 'Valutazione/Autovalutazione effettuata da',
                        'title_de' => 'Bewertung/Selbstbewertung durchgeführt von',
                        'title_fr' => 'Évaluation/Auto-évaluation effectuée par',
                        'display_order' => 20,
                        'original' => true,
                    ],
                ],
            ]
        ];

        foreach ($sections as $id => $section) {
            $sectionData = Section::create([
                'title_en' => $section['title_en'],
                'title_it' => $section['title_it'],
                'title_de' => $section['title_de'],
                'title_fr' => $section['title_fr'],
                'display_order' => $section['display_order'],
                'original' => $section['original']
            ]);

            foreach ($section['questions'] as $key => $question) {
                Question::create([
                    'section_id' => $sectionData->id,
                    'title_en' => $question['title_en'],
                    'title_it' => $question['title_it'],
                    'title_de' => $question['title_de'],
                    'title_fr' => $question['title_fr'],
                    'display_order' => $question['display_order'],
                    'original' => $question['original']
                ]);
            }
        };
    }
}
