<?php

namespace Database\Seeders;

use App\Models\FraudQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FraudQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fraudQuestions = [
            [
                'title_en' => 'Is there an Internal Control System in the organization?',
                'title_it' => 'Nell\'organizzazione c\'è un Sistema di Controllo Interno?',
                'title_de' => 'Gibt es in der Organisation ein Internes Kontrollsystem?',
                'title_fr' => 'Y a-t-il un système de contrôle interne dans l\'organisation?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'Is there an Audit Office in the organization?',
                'title_it' => 'Nell\'organizzazione c\'è un Ufficio di Revisione?',
                'title_de' => 'Gibt es in der Organisation eine Revision?',
                'title_fr' => 'Y a-t-il un bureau d\'audit dans l\'organisation?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'Are there external audits?',
                'title_it' => 'Avvengono delle revisioni esterne?',
                'title_de' => 'Gibt es externe Revisionen?',
                'title_fr' => 'Y a-t-il des audits externes?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'Is there an anti-fraud system/culture in the organization?',
                'title_it' => 'Nell\'organizzazione c\'è un sistema/una cultura anti-frode?',
                'title_de' => 'Gibt es in der Organisation ein Anti-Betrugssystem/-kultur?',
                'title_fr' => 'Y a-t-il un système/une culture anti-fraude dans l\'organisation?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'For this activity, is there regulation (Law, Directive, Regulation, etc.)?',
                'title_it' => 'Per questa attività, c\'è una regolamentazione (Legge, Direttiva, Regolamento, …)?',
                'title_de' => 'Gibt es für diese Aktivität eine Regelung (Gesetz, Richtlinie, Verordnung usw.)?',
                'title_fr' => 'Pour cette activité, y a-t-il une réglementation (Loi, Directive, Règlement, etc.)?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'For this activity, is there a division of tasks? Is the activity performed by multiple people?',
                'title_it' => 'Per questa attività, c\'è una ripartizione delle funzioni? L\'attività è svolta da più persone?',
                'title_de' => 'Gibt es für diese Aktivität eine Aufgabenteilung? Wird die Aktivität von mehreren Personen durchgeführt?',
                'title_fr' => 'Pour cette activité, y a-t-il une répartition des tâches? L\'activité est-elle réalisée par plusieurs personnes?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'For this activity, are there controls?',
                'title_it' => 'Per questa attività, avvengono dei controlli?',
                'title_de' => 'Gibt es für diese Aktivität Kontrollen?',
                'title_fr' => 'Pour cette activité, y a-t-il des contrôles?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'Is the control of this activity carried out by the person performing the activity?',
                'title_it' => 'Il controllo di questa attività viene svolto da chi esegue l\'attività?',
                'title_de' => 'Wird die Kontrolle dieser Aktivität von der ausführenden Person durchgeführt?',
                'title_fr' => 'Le contrôle de cette activité est-il effectué par la personne qui la réalise?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'Is the control of this activity carried out by multiple people?',
                'title_it' => 'Il controllo di questa attività è svolto da più persone?',
                'title_de' => 'Wird die Kontrolle dieser Aktivität von mehreren Personen durchgeführt?',
                'title_fr' => 'Le contrôle de cette activité est-il effectué par plusieurs personnes?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'In the control phase of this activity, is verification also carried out by higher hierarchical levels (superior/responsible)?',
                'title_it' => 'Nella fase di controllo di questa attività, la verifica viene eseguita anche da livelli gerarchici più alti (superiore/responsabile)?',
                'title_de' => 'Wird in der Kontrollphase dieser Aktivität auch eine Überprüfung durch höhere Hierarchieebenen (Vorgesetzte/Verantwortliche) durchgeführt?',
                'title_fr' => 'Dans la phase de contrôle de cette activité, la vérification est-elle également effectuée par des niveaux hiérarchiques supérieurs (supérieur/responsable)?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'To what hierarchical level does the control of this activity involve employees of the organization?',
                'title_it' => 'Il controllo di questa attività, fino a che livello gerarchico coinvolge i dipendenti dell\'organizzazione?',
                'title_de' => 'Auf welche Hierarchieebene erstreckt sich die Kontrolle dieser Aktivität auf Mitarbeiter der Organisation?',
                'title_fr' => 'À quel niveau hiérarchique le contrôle de cette activité implique-t-il les employés de l\'organisation?',
                'type_answer' => 'Hierarchy'
            ],
            [
                'title_en' => 'One or more people involved in the activity and controls work more than 50 overtime hours?',
                'title_it' => 'Una o più persone coinvolte nell\'attività e nei controlli ha più di 50 ore di straordinari?',
                'title_de' => 'Arbeiten eine oder mehrere Personen, die an der Aktivität und den Kontrollen beteiligt sind, mehr als 50 Überstunden?',
                'title_fr' => 'Une ou plusieurs personnes impliquées dans l\'activité et les contrôles travaillent-elles plus de 50 heures supplémentaires?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'One or more people involved in the activity and controls have more than 40 unused vacation days?',
                'title_it' => 'Una o più persone coinvolte nell\'attività e nei controlli ha più di 40 giorni di vacanze non effettuate?',
                'title_de' => 'Hat eine oder mehrere Personen, die an der Aktivität und den Kontrollen beteiligt sind, mehr als 40 ungenutzte Urlaubstage?',
                'title_fr' => 'Une ou plusieurs personnes impliquées dans l\'activité et les contrôles ont-elles plus de 40 jours de congés non pris?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'Is there a record of the control of this activity, who performed it, when, and what was verified?',
                'title_it' => 'Vi è traccia del controllo di questa attività, di chi l\'ha eseguito, quando e che cosa è stato verificato?',
                'title_de' => 'Gibt es eine Aufzeichnung der Kontrolle dieser Aktivität, wer sie durchgeführt hat, wann und was überprüft wurde?',
                'title_fr' => 'Y a-t-il un enregistrement du contrôle de cette activité, qui l\'a effectué, quand, et qu\'a-t-il été vérifié?',
                'type_answer' => 'boolean'
            ],
            [
                'title_en' => 'Cataloging of possible fraud or illicit act',
                'title_it' => 'Catalogazione della possibile frode o atto illecito',
                'title_de' => 'Katalogisierung möglicher Betrug oder unerlaubter Handlungen',
                'title_fr' => 'Catalogage de possibles fraudes ou actes illicites',
                'type_answer' => 'Fraud'
            ],
            [
                'title_en' => 'Size of the organization:',
                'title_it' => 'Dimensione dell\'organizzazione:',
                'title_de' => 'Größe der Organisation:',
                'title_fr' => 'Taille de l\'organisation :',
                'type_answer' => 'Organisation'
            ],
        ];

        foreach ($fraudQuestions as $id => $question) {
            FraudQuestion::create($question);
        };
    }
}
