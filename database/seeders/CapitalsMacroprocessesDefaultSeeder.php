<?php

namespace Database\Seeders;

use App\Models\Capital;
use App\Models\Macroprocess;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CapitalsMacroprocessesDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $capitals = [
            [
                'index' => '01',
                'name_en' => 'Financial Capital',
                'name_it' => 'Capitale Finanziario',
                'name_de' => 'Finanzkapital',
                'name_fr' => 'Capital Financier',
                'macroprocesses' => [
                    ["index" => "01", "name_en" => "Short-term liquidity and publicly traded assets", "name_it" => "Liquidità a breve termine e attività quotate in borsa", "name_de" => "Kurzfristige Liquidität und börsennotierte Vermögenswerte", "name_fr" => "Liquidité à court terme et actifs cotés en bourse"],
                    ["index" => "02", "name_en" => "Accounts receivable for supplies and services", "name_it" => "Crediti per forniture e servizi", "name_de" => "Forderungen aus Lieferungen und Leistungen", "name_fr" => "Créances pour fournitures et services"],
                    ["index" => "03", "name_en" => "Other short-term receivables", "name_it" => "Altri crediti a breve termine", "name_de" => "Andere kurzfristige Forderungen", "name_fr" => "Autres créances à court terme"],
                    ["index" => "04", "name_en" => "Inventories and unbilled service performances", "name_it" => "Inventari e prestazioni di servizi non fatturate", "name_de" => "Inventar und nicht abgerechnete Dienstleistungen", "name_fr" => "Inventaires et prestations de services non facturées"],
                    ["index" => "05", "name_en" => "Accrued income and prepaid expenses", "name_it" => "Ricavi maturati e spese anticipate", "name_de" => "Angelaufene Erträge und vorab bezahlte Aufwendungen", "name_fr" => "Revenus accumulés et dépenses prépayées"],
                    ["index" => "06", "name_en" => "Financial fixed assets", "name_it" => "Attività finanziarie immobilizzate", "name_de" => "Finanzielle Anlagevermögen", "name_fr" => "Actifs financiers immobilisés"],
                    ["index" => "07", "name_en" => "Participations", "name_it" => "Partecipazioni", "name_de" => "Beteiligungen", "name_fr" => "Participations"],
                    ["index" => "08", "name_en" => "Tangible fixed assets", "name_it" => "Immobilizzazioni materiali", "name_de" => "Sachanlagen", "name_fr" => "Actifs corporels"],
                    ["index" => "09", "name_en" => "Intangible fixed assets", "name_it" => "Immobilizzazioni immateriali", "name_de" => "Immaterielle Anlagen", "name_fr" => "Actifs incorporels"],
                    ["index" => "10", "name_en" => "Unpaid share capital or foundation capital", "name_it" => "Capitale sociale non versato o fondi di dotazione", "name_de" => "Nicht eingezahltes Eigenkapital oder Stiftungskapital", "name_fr" => "Capital social non libéré ou capital de dotation"],
                    ["index" => "11", "name_en" => "Liabilities for supplies and services", "name_it" => "Passività per forniture e servizi", "name_de" => "Verbindlichkeiten aus Lieferungen und Leistungen", "name_fr" => "Passifs pour fournitures et services"],
                    ["index" => "12", "name_en" => "Interest-bearing liabilities in the short term", "name_it" => "Passività a breve termine a tasso di interesse", "name_de" => "Kurzfristige verzinsliche Verbindlichkeiten", "name_fr" => "Passifs à court terme portant intérêt"],
                    ["index" => "13", "name_en" => "Other short-term liabilities", "name_it" => "Altre passività a breve termine", "name_de" => "Andere kurzfristige Verbindlichkeiten", "name_fr" => "Autres passifs à court terme"],
                    ["index" => "14", "name_en" => "Accruals and deferred income", "name_it" => "Accantonamenti e redditi differiti", "name_de" => "Rückstellungen und differierte Einkommen", "name_fr" => "Provisions et revenus différés"],
                    ["index" => "15", "name_en" => "Interest-bearing liabilities in the long term", "name_it" => "Passività a lungo termine a tasso di interesse", "name_de" => "Langfristige verzinsliche Verbindlichkeiten", "name_fr" => "Passifs à long terme portant intérêt"],
                    ["index" => "16", "name_en" => "Other long-term liabilities", "name_it" => "Altre passività a lungo termine", "name_de" => "Andere langfristige Verbindlichkeiten", "name_fr" => "Autres passifs à long terme"],
                    ["index" => "17", "name_en" => "Provisions and similar items", "name_it" => "Accantonamenti e poste simili", "name_de" => "Rückstellungen und ähnliche Posten", "name_fr" => "Provisions et postes similaires"],
                    ["index" => "18", "name_en" => "Share capital or foundation capital", "name_it" => "Capitale sociale o capitale di dotazione", "name_de" => "Eigenkapital oder Stiftungskapital", "name_fr" => "Capital social ou capital de dotation"],
                    ["index" => "19", "name_en" => "Legal reserve from capital", "name_it" => "Riserva legale da capitale", "name_de" => "Gesetzliche Rücklage aus Kapital", "name_fr" => "Réserve légale provenant du capital"],
                    ["index" => "20", "name_en" => "Legal reserve from profits", "name_it" => "Riserva legale da utili", "name_de" => "Gesetzliche Rücklage aus Gewinnen", "name_fr" => "Réserve légale provenant des bénéfices"],
                    ["index" => "21", "name_en" => "Optional reserves from profits", "name_it" => "Riserve facoltative da utili", "name_de" => "Freiwillige Rücklagen aus Gewinnen", "name_fr" => "Réserves facultatives provenant des bénéfices"],
                    ["index" => "22", "name_en" => "Own share of capital", "name_it" => "Quota propria di capitale", "name_de" => "Eigenkapitalanteil", "name_fr" => "Part propre du capital"],
                    ["index" => "23", "name_en" => "Carried-forward profit or loss", "name_it" => "Profitto o perdita portato a nuovo", "name_de" => "Übertragenes Ergebnis", "name_fr" => "Bénéfice ou perte reporté"],
                    ["index" => "24", "name_en" => "Profit or loss for the period", "name_it" => "Profitto o perdita dell'esercizio", "name_de" => "Ergebnis der Periode", "name_fr" => "Bénéfice ou perte de l'exercice"],
                    ["index" => "25", "name_en" => "Net amount of revenues from supplies and services", "name_it" => "Importo netto dei ricavi da forniture e servizi", "name_de" => "Nettobetrag der Umsätze aus Lieferungen und Leistungen", "name_fr" => "Montant net des revenus provenant de fournitures et services"],
                    ["index" => "26", "name_en" => "Change in inventories of finished goods and work in progress and unbilled service performances", "name_it" => "Variazione delle rimanenze di prodotti finiti, lavori in corso e prestazioni di servizi non fatturate", "name_de" => "Veränderung der Vorräte an fertigen und unfertigen Erzeugnissen sowie an nicht abgerechneten Leistungen", "name_fr" => "Changement des stocks de produits finis et travaux en cours et prestations de services non facturées"],
                    ["index" => "27", "name_en" => "Cost of materials, costs of goods purchased or produced and services sold", "name_it" => "Costi dei materiali, costi delle merci acquistate o prodotte e servizi venduti", "name_de" => "Materialkosten, Kosten für gekaufte oder hergestellte Waren und für Leistungen", "name_fr" => "Coût des matériaux, coûts des biens achetés ou produits et services vendus"],
                    ["index" => "28", "name_en" => "Administrative and distribution costs", "name_it" => "Costi amministrativi e di distribuzione", "name_de" => "Verwaltungs- und Vertriebskosten", "name_fr" => "Coûts administratifs et de distribution"],
                    ["index" => "29", "name_en" => "Staff costs", "name_it" => "Costi del personale", "name_de" => "Personalaufwand", "name_fr" => "Coûts du personnel"],
                    ["index" => "30", "name_en" => "Other operating costs", "name_it" => "Altri costi operativi", "name_de" => "Andere betriebliche Aufwendungen", "name_fr" => "Autres coûts d'exploitation"],
                    ["index" => "31", "name_en" => "Depreciation and write-downs on fixed assets", "name_it" => "Ammortamenti e svalutazioni di immobilizzazioni", "name_de" => "Abschreibungen und Wertberichtigungen auf Anlagevermögen", "name_fr" => "Amortissements et dépréciations sur immobilisations"],
                    ["index" => "32", "name_en" => "Financial income and expenses", "name_it" => "Risultato finanziario", "name_de" => "Finanzergebnis", "name_fr" => "Résultat financier"],
                    ["index" => "33", "name_en" => "Income and expenses unrelated to operations", "name_it" => "Risultato su partecipazioni e altri risultati", "name_de" => "Ergebnis aus Beteiligungen und sonstige Ergebnisse", "name_fr" => "Résultat sur participations et autres résultats"],
                    ["index" => "34", "name_en" => "Extraordinary, unique or other period-related income and expenses", "name_it" => "Risultati straordinari, unici o altri risultati periodici", "name_de" => "Außerordentliche, einmalige oder andere periodenbezogene Ergebnisse", "name_fr" => "Résultats extraordinaires, uniques ou autres résultats périodiques"],
                    ["index" => "35", "name_en" => "Direct taxes", "name_it" => "Imposte dirette", "name_de" => "Direkte Steuern", "name_fr" => "Impôts directs"],
                    ["index" => "36", "name_en" => "Annual profit or loss", "name_it" => "Profitto o perdita annuo", "name_de" => "Jahresüberschuss oder Jahresfehlbetrag", "name_fr" => "Bénéfice ou perte annuel"],
                    ["index" => "37", "name_en" => "Financial and economic report", "name_it" => "Bilancio finanziario ed economico", "name_de" => "Finanz- und Geschäftsbericht", "name_fr" => "Rapport financier et économique"],
                    ["index" => "38", "name_en" => "Statistical/indicator report", "name_it" => "Rapporto statistico/indicatore", "name_de" => "Statistischer/Indikator-Bericht", "name_fr" => "Rapport statistique/indicateur"],
                    ["index" => "39", "name_en" => "Various reports", "name_it" => "Vari rapporti", "name_de" => "Verschiedene Berichte", "name_fr" => "Divers rapports"],
                    ["index" => "40", "name_en" => "Appendix and similar", "name_it" => "Appendice e simili", "name_de" => "Anhang und Ähnliches", "name_fr" => "Annexe et similaires"],
                ],
            ],
            [
                'index' => '02',
                'name_en' => 'Production Capital',
                'name_it' => 'Capitale di Produzione',
                'name_de' => 'Produktionskapital',
                'name_fr' => 'Capital de Production',
                "macroprocesses" => [
                    ["index" => "01", "name_en" => "Input", "name_it" => "Input", "name_de" => "Eingabe", "name_fr" => "Entrée"],
                    ["index" => "02", "name_en" => "Idea", "name_it" => "Idea", "name_de" => "Idee", "name_fr" => "Idée"],
                    ["index" => "03", "name_en" => "Surveys and studies", "name_it" => "Rilevazioni e studi", "name_de" => "Umfragen und Studien", "name_fr" => "Enquêtes et études"],
                    ["index" => "04", "name_en" => "Research", "name_it" => "Ricerca", "name_de" => "Forschung", "name_fr" => "Recherche"],
                    ["index" => "05", "name_en" => "Development", "name_it" => "Sviluppo", "name_de" => "Entwicklung", "name_fr" => "Développement"],
                    ["index" => "06", "name_en" => "Partners", "name_it" => "Partner", "name_de" => "Partner", "name_fr" => "Partenaires"],
                    ["index" => "07", "name_en" => "Suppliers", "name_it" => "Fornitori", "name_de" => "Lieferanten", "name_fr" => "Fournisseurs"],
                    ["index" => "08", "name_en" => "Financiers", "name_it" => "Finanziatori", "name_de" => "Finanziers", "name_fr" => "Financiers"],
                    ["index" => "09", "name_en" => "Investors", "name_it" => "Investitori", "name_de" => "Investoren", "name_fr" => "Investisseurs"],
                    ["index" => "10", "name_en" => "Government and authorities", "name_it" => "Governo e autorità", "name_de" => "Regierung und Behörden", "name_fr" => "Gouvernement et autorités"],
                    ["index" => "11", "name_en" => "Resource management (inventory, ...)", "name_it" => "Gestione delle risorse (inventario, ...)", "name_de" => "Ressourcenmanagement (Inventar, ...)", "name_fr" => "Gestion des ressources (inventaire, ...)"],
                    ["index" => "12", "name_en" => "Environmental management", "name_it" => "Gestione ambientale", "name_de" => "Umweltmanagement", "name_fr" => "Gestion environnementale"],
                    ["index" => "12", "name_en" => "Agreements and contracts", "name_it" => "Accordi e contratti", "name_de" => "Vereinbarungen und Verträge", "name_fr" => "Accords et contrats"],
                    ["index" => "14", "name_en" => "Purchases", "name_it" => "Acquisti", "name_de" => "Einkäufe", "name_fr" => "Achats"],
                    ["index" => "15", "name_en" => "Laws, regulations, provisions, documentation", "name_it" => "Leggi, regolamenti, disposizioni, documentazione", "name_de" => "Gesetze, Vorschriften, Bestimmungen, Dokumentation", "name_fr" => "Lois, réglementations, dispositions, documentation"],
                    ["index" => "16", "name_en" => "Methodologies and techniques", "name_it" => "Metodologie e tecniche", "name_de" => "Methoden und Techniken", "name_fr" => "Méthodologies et techniques"],
                    ["index" => "17", "name_en" => "Real estate and infrastructure", "name_it" => "Immobili e infrastrutture", "name_de" => "Immobilien und Infrastruktur", "name_fr" => "Immobilier et infrastructure"],
                    ["index" => "18", "name_en" => "Equipment, tools, and machinery", "name_it" => "Attrezzature, strumenti e macchinari", "name_de" => "Ausrüstung, Werkzeuge und Maschinen", "name_fr" => "Équipements, outils et machines"],
                    ["index" => "19", "name_en" => "Maintenance", "name_it" => "Manutenzione", "name_de" => "Wartung", "name_fr" => "Maintenance"],
                    ["index" => "20", "name_en" => "Production", "name_it" => "Produzione", "name_de" => "Produktion", "name_fr" => "Production"],
                    ["index" => "21", "name_en" => "Marketing", "name_it" => "Marketing", "name_de" => "Marketing", "name_fr" => "Marketing"],
                    ["index" => "22", "name_en" => "Communication", "name_it" => "Comunicazione", "name_de" => "Kommunikation", "name_fr" => "Communication"],
                    ["index" => "23", "name_en" => "Image care", "name_it" => "Curare l'immagine", "name_de" => "Imagepflege", "name_fr" => "Soins de l'image"],
                    ["index" => "24", "name_en" => "Sales", "name_it" => "Vendite", "name_de" => "Vertrieb", "name_fr" => "Ventes"],
                    ["index" => "25", "name_en" => "Orders and payments", "name_it" => "Ordini e pagamenti", "name_de" => "Bestellungen und Zahlungen", "name_fr" => "Commandes et paiements"],
                    ["index" => "26", "name_en" => "Invoicing and collections", "name_it" => "Fatturazione e incassi", "name_de" => "Rechnungsstellung und Inkasso", "name_fr" => "Facturation et encaissements"],
                    ["index" => "27", "name_en" => "Customer services and support", "name_it" => "Servizi e supporto clienti", "name_de" => "Kundendienst und Support", "name_fr" => "Services et assistance clientèle"],
                    ["index" => "28", "name_en" => "After-sales", "name_it" => "Post-vendita", "name_de" => "Nach dem Verkauf", "name_fr" => "Après-vente"],
                    ["index" => "29", "name_en" => "Stakeholder feedback", "name_it" => "Feedback degli stakeholder", "name_de" => "Stakeholder-Feedback", "name_fr" => "Feedback des parties prenantes"],
                    ["index" => "30", "name_en" => "Customer loyalty", "name_it" => "Fedelta' del cliente", "name_de" => "Kundenloyalität", "name_fr" => "Fidélité client"],
                    ["index" => "31", "name_en" => "Warranties, replacements, spare parts, refunds", "name_it" => "Garanzie, sostituzioni, pezzi di ricambio, rimborsi", "name_de" => "Garantien, Ersatz, Ersatzteile, Rückerstattungen", "name_fr" => "Garanties, remplacements, pièces de rechange, remboursements"],
                    ["index" => "32", "name_en" => "Continuous improvement", "name_it" => "Miglioramento continuo", "name_de" => "Kontinuierliche Verbesserung", "name_fr" => "Amélioration continue"],
                    ["index" => "33", "name_en" => "Licenses, patents, copyright", "name_it" => "Licenze, brevetti, diritti d'autore", "name_de" => "Lizenzen, Patente, Urheberrecht", "name_fr" => "Licences, brevets, droits d'auteur"],
                    ["index" => "34", "name_en" => "Certifications", "name_it" => "Certificazioni", "name_de" => "Zertifizierungen", "name_fr" => "Certifications"],
                    ["index" => "35", "name_en" => "Audits", "name_it" => "Audit", "name_de" => "Audits", "name_fr" => "Audits"],
                    ["index" => "36", "name_en" => "Output", "name_it" => "Uscita", "name_de" => "Ausgabe", "name_fr" => "Sortie"],
                    ["index" => "37", "name_en" => "Other support activities", "name_it" => "Altre attività di supporto", "name_de" => "Andere Unterstützungsaktivitäten", "name_fr" => "Autres activités de support"],
                    ["index" => "38", "name_en" => "Outsourcing", "name_it" => "Outsourcing", "name_de" => "Outsourcing", "name_fr" => "Externalisation"],
                    ["index" => "39", "name_en" => "Quality management", "name_it" => "Gestione della qualità", "name_de" => "Qualitätsmanagement", "name_fr" => "Gestion de la qualité"],
                    ["index" => "40", "name_en" => "Branches and offices", "name_it" => "Filiali e uffici", "name_de" => "Niederlassungen und Büros", "name_fr" => "Agences et bureaux"],
                    ["index" => "41", "name_en" => "Management and direction", "name_it" => "Gestione e direzione", "name_de" => "Management und Führung", "name_fr" => "Gestion et direction"],
                    ["index" => "42", "name_en" => "Internal control system", "name_it" => "Sistema di controllo interno", "name_de" => "Internes Kontrollsystem", "name_fr" => "Système de contrôle interne"],
                    ["index" => "43", "name_en" => "Audit office", "name_it" => "Ufficio di revisione", "name_de" => "Revisionsbüro", "name_fr" => "Bureau d'audit"],
                    ["index" => "44", "name_en" => "High authority", "name_it" => "Alta autorità", "name_de" => "Hohe Behörde", "name_fr" => "Haute autorité"],
                    ["index" => "45", "name_en" => "Legal actions", "name_it" => "Azioni legali", "name_de" => "Rechtliche Schritte", "name_fr" => "Actions judiciaires"],
                    ["index" => "46", "name_en" => "Other services", "name_it" => "Altri servizi", "name_de" => "Andere Dienstleistungen", "name_fr" => "Autres services"],
                    ["index" => "47", "name_en" => "Indicator management", "name_it" => "Gestione degli indicatori", "name_de" => "Kennzahlenmanagement", "name_fr" => "Gestion des indicateurs"],
                    ["index" => "48", "name_en" => "Reports", "name_it" => "Rapporti", "name_de" => "Berichte", "name_fr" => "Rapports"]
                ]                                
            ],
            [
                'index' => '03',
                'name_en' => 'Human Capital',
                'name_it' => 'Capitale Umano',
                'name_de' => 'Humankapital',
                'name_fr' => 'Capital Humain',
                'macroprocesses' => [
                    ["index" => "01", "name_en" => "Human resources research", "name_it" => "Ricerca delle risorse umane", "name_de" => "Personalrecherchen", "name_fr" => "Recherche des ressources humaines"],
                    ["index" => "02", "name_en" => "Human resources recruitment", "name_it" => "Reclutamento delle risorse umane", "name_de" => "Personalbeschaffung", "name_fr" => "Recrutement des ressources humaines"],
                    ["index" => "03", "name_en" => "Contract management", "name_it" => "Gestione dei contratti", "name_de" => "Vertragsmanagement", "name_fr" => "Gestion des contrats"],
                    ["index" => "04", "name_en" => "Hiring", "name_it" => "Assunzione", "name_de" => "Einstellung", "name_fr" => "Embauche"],
                    ["index" => "05", "name_en" => "Onboarding", "name_it" => "Integrazione", "name_de" => "Onboarding", "name_fr" => "Intégration"],
                    ["index" => "06", "name_en" => "Human resources movement management", "name_it" => "Gestione dei movimenti delle risorse umane", "name_de" => "Bewegungsmanagement von Personal", "name_fr" => "Gestion des mouvements des ressources humaines"],
                    ["index" => "07", "name_en" => "Knowledge, skills, and competencies management", "name_it" => "Gestione delle conoscenze, delle competenze e delle abilità", "name_de" => "Wissens-, Fähigkeits- und Kompetenzmanagement", "name_fr" => "Gestion des connaissances, compétences et aptitudes"],
                    ["index" => "08", "name_en" => "Human resources facilitation", "name_it" => "Facilitazione delle risorse umane", "name_de" => "Personalvermittlung", "name_fr" => "Facilitation des ressources humaines"],
                    ["index" => "09", "name_en" => "Recognitions, bonuses, rewards, ...", "name_it" => "Riconoscimenti, bonus, premi, ...", "name_de" => "Anerkennungen, Boni, Belohnungen, ...", "name_fr" => "Reconnaissances, bonus, récompenses, ..."],
                    ["index" => "10", "name_en" => "Human resources documentation portfolio management", "name_it" => "Gestione del portfolio della documentazione delle risorse umane", "name_de" => "Management des Personal-Dokumentationsportfolios", "name_fr" => "Gestion du portfolio de documentation des ressources humaines"],
                    ["index" => "11", "name_en" => "Regulations and laws", "name_it" => "Regolamenti e leggi", "name_de" => "Vorschriften und Gesetze", "name_fr" => "Réglementations et lois"],
                    ["index" => "12", "name_en" => "Legal actions", "name_it" => "Azioni legali", "name_de" => "Rechtliche Maßnahmen", "name_fr" => "Actions légales"],
                    ["index" => "13", "name_en" => "Unions and other social groups", "name_it" => "Sindacati e altri gruppi sociali", "name_de" => "Gewerkschaften und andere soziale Gruppen", "name_fr" => "Syndicats et autres groupes sociaux"],
                    ["index" => "14", "name_en" => "Social benefits", "name_it" => "Benefici sociali", "name_de" => "Sozialleistungen", "name_fr" => "Avantages sociaux"],
                    ["index" => "15", "name_en" => "Workplace quality and safety", "name_it" => "Qualità e sicurezza sul lavoro", "name_de" => "Arbeitsplatzqualität und -sicherheit", "name_fr" => "Qualité et sécurité sur le lieu de travail"],
                    ["index" => "16", "name_en" => "Conflict management", "name_it" => "Gestione dei conflitti", "name_de" => "Konfliktmanagement", "name_fr" => "Gestion des conflits"],
                    ["index" => "17", "name_en" => "Retirements and early retirements", "name_it" => "Pensionamenti e pensionamenti anticipati", "name_de" => "Pensionierungen und Frühpensionierungen", "name_fr" => "Retraites et préretraites"],
                    ["index" => "18", "name_en" => "Resignation management", "name_it" => "Gestione delle dimissioni", "name_de" => "Kündigungsmanagement", "name_fr" => "Gestion des démissions"],
                    ["index" => "19", "name_en" => "Dismissal management", "name_it" => "Gestione dei licenziamenti", "name_de" => "Entlassungsmanagement", "name_fr" => "Gestion des licenciements"],
                    ["index" => "20", "name_en" => "Leave management", "name_it" => "Gestione delle assenze", "name_de" => "Abwesenheitsmanagement", "name_fr" => "Gestion des congés"],
                    ["index" => "21", "name_en" => "Absence management", "name_it" => "Gestione delle assenze", "name_de" => "Abwesenheitsmanagement", "name_fr" => "Gestion des absences"],
                    ["index" => "22", "name_en" => "Illness management", "name_it" => "Gestione delle malattie", "name_de" => "Krankheitsmanagement", "name_fr" => "Gestion des maladies"],
                    ["index" => "23", "name_en" => "Injury management", "name_it" => "Gestione delle lesioni", "name_de" => "Verletzungsmanagement", "name_fr" => "Gestion des blessures"],
                    ["index" => "24", "name_en" => "Death management", "name_it" => "Gestione dei decessi", "name_de" => "Todesfallmanagement", "name_fr" => "Gestion des décès"],
                    ["index" => "25", "name_en" => "Authorities and social partners", "name_it" => "Autorità e partner sociali", "name_de" => "Behörden und soziale Partner", "name_fr" => "Autorités et partenaires sociaux"],
                    ["index" => "26", "name_en" => "Communication management", "name_it" => "Gestione della comunicazione", "name_de" => "Kommunikationsmanagement", "name_fr" => "Gestion de la communication"],
                    ["index" => "27", "name_en" => "Other related to human resources", "name_it" => "Altre attività relative alle risorse umane", "name_de" => "Sonstiges im Zusammenhang mit Humanressourcen", "name_fr" => "Autres liés aux ressources humaines"],
                    ["index" => "28", "name_en" => "Indicator and improvement management", "name_it" => "Gestione degli indicatori e del miglioramento", "name_de" => "Indikatoren- und Verbesserungsmanagement", "name_fr" => "Gestion des indicateurs et de l'amélioration"],
                    ["index" => "29", "name_en" => "Reports", "name_it" => "Rapporti", "name_de" => "Berichte", "name_fr" => "Rapports"]
                ]
            ],
            [
                'index' => '04',
                'name_en' => 'Social Capital',
                'name_it' => 'Capitale Sociale',
                'name_de' => 'Sozialkapital',
                'name_fr' => 'Capital Social',
                'macroprocesses' => [
                    ["index" => "01", "name_en" => "Relationship and network research", "name_it" => "Ricerca relazioni e network", "name_de" => "Beziehungs- und Netzwerkforschung", "name_fr" => "Recherche sur les relations et le réseau"],
                    ["index" => "02", "name_en" => "Partner relationship research", "name_it" => "Ricerca sulle relazioni con i partner", "name_de" => "Forschung zu Partnerbeziehungen", "name_fr" => "Recherche sur les relations partenariales"],
                    ["index" => "03", "name_en" => "Relationship and network development", "name_it" => "Sviluppo relazioni e network", "name_de" => "Entwicklung von Beziehungen und Netzwerken", "name_fr" => "Développement des relations et du réseau"],
                    ["index" => "04", "name_en" => "Network management", "name_it" => "Gestione del network", "name_de" => "Netzwerkmanagement", "name_fr" => "Gestion du réseau"],
                    ["index" => "05", "name_en" => "Communication management", "name_it" => "Gestione della comunicazione", "name_de" => "Kommunikationsmanagement", "name_fr" => "Gestion de la communication"],
                    ["index" => "06", "name_en" => "Relationship management", "name_it" => "Gestione delle relazioni", "name_de" => "Beziehungsmanagement", "name_fr" => "Gestion des relations"],
                    ["index" => "07", "name_en" => "Group management", "name_it" => "Gestione dei gruppi", "name_de" => "Gruppenmanagement", "name_fr" => "Gestion des groupes"],
                    ["index" => "08", "name_en" => "Shared elements", "name_it" => "Elementi condivisi", "name_de" => "Geteilte Elemente", "name_fr" => "Éléments partagés"],
                    ["index" => "09", "name_en" => "Shared norms, provisions, rules, ...", "name_it" => "Norme, disposizioni, regole condivise, ...", "name_de" => "Geteilte Normen, Bestimmungen, Regeln, ...", "name_fr" => "Normes, dispositions, règles partagées, ..."],
                    ["index" => "10", "name_en" => "Rights and access management", "name_it" => "Gestione dei diritti e degli accessi", "name_de" => "Rechte- und Zugriffsmanagement", "name_fr" => "Gestion des droits et des accès"],
                    ["index" => "11", "name_en" => "Techniques and methodologies", "name_it" => "Tecniche e metodologie", "name_de" => "Techniken und Methoden", "name_fr" => "Techniques et méthodologies"],
                    ["index" => "12", "name_en" => "Infrastructure and tools", "name_it" => "Infrastrutture e strumenti", "name_de" => "Infrastruktur und Werkzeuge", "name_fr" => "Infrastructure et outils"],
                    ["index" => "13", "name_en" => "Contracts and agreements", "name_it" => "Contratti e accordi", "name_de" => "Verträge und Vereinbarungen", "name_fr" => "Contrats et accords"],
                    ["index" => "14", "name_en" => "Values", "name_it" => "Valori", "name_de" => "Werte", "name_fr" => "Valeurs"],
                    ["index" => "15", "name_en" => "Missions", "name_it" => "Missioni", "name_de" => "Missionen", "name_fr" => "Missions"],
                    ["index" => "16", "name_en" => "Visions", "name_it" => "Visioni", "name_de" => "Visionen", "name_fr" => "Visions"],
                    ["index" => "17", "name_en" => "Feedback", "name_it" => "Feedback", "name_de" => "Feedback", "name_fr" => "Retour d'information"],
                    ["index" => "18", "name_en" => "Improvements", "name_it" => "Miglioramenti", "name_de" => "Verbesserungen", "name_fr" => "Améliorations"],
                    ["index" => "19", "name_en" => "Conferences, workshops, exhibitions, ...", "name_it" => "Conferenze, workshop, esposizioni, ...", "name_de" => "Konferenzen, Workshops, Ausstellungen, ...", "name_fr" => "Conférences, ateliers, expositions, ..."],
                    ["index" => "20", "name_en" => "Evaluation and feedback management", "name_it" => "Gestione valutazione e feedback", "name_de" => "Bewertungs- und Feedbackmanagement", "name_fr" => "Gestion de l'évaluation et des retours d'information"],
                    ["index" => "21", "name_en" => "Extra activities", "name_it" => "Attività extra", "name_de" => "Zusätzliche Aktivitäten", "name_fr" => "Activités supplémentaires"],
                    ["index" => "22", "name_en" => "Quality and safety", "name_it" => "Qualità e sicurezza", "name_de" => "Qualität und Sicherheit", "name_fr" => "Qualité et sécurité"],
                    ["index" => "23", "name_en" => "Conflict management", "name_it" => "Gestione dei conflitti", "name_de" => "Konfliktmanagement", "name_fr" => "Gestion des conflits"],
                    ["index" => "24", "name_en" => "Legal actions", "name_it" => "Azioni legali", "name_de" => "Rechtliche Maßnahmen", "name_fr" => "Actions juridiques"],
                    ["index" => "25", "name_en" => "Other related to relationships", "name_it" => "Altri relativi alle relazioni", "name_de" => "Andere im Zusammenhang mit Beziehungen", "name_fr" => "Autres liés aux relations"],
                    ["index" => "26", "name_en" => "Indicator management", "name_it" => "Gestione indicatori", "name_de" => "Indikatorenmanagement", "name_fr" => "Gestion des indicateurs"],
                    ["index" => "27", "name_en" => "Reports", "name_it" => "Rapporti", "name_de" => "Berichte", "name_fr" => "Rapports"]   
                ]                   
            ],
            [
                'index' => '05',
                'name_en' => 'Intellectual Capital',
                'name_it' => 'Capitale Intellettuale',
                'name_de' => 'Intellektuelles Kapital',
                'name_fr' => 'Capital Intellectuel',
                'macroprocesses' => [
                    ["index" => "01", "name_en" => "Zero poverty", "name_it" => "Zero povertà", "name_de" => "Null Armut", "name_fr" => "Zéro pauvreté"],
                    ["index" => "02", "name_en" => "Zero hunger", "name_it" => "Zero fame", "name_de" => "Null Hunger", "name_fr" => "Zéro faim"],
                    ["index" => "03", "name_en" => "Health and well-being", "name_it" => "Salute e benessere", "name_de" => "Gesundheit und Wohlbefinden", "name_fr" => "Santé et bien-être"],
                    ["index" => "04", "name_en" => "Quality education", "name_it" => "Educazione di qualità", "name_de" => "Qualitätsbildung", "name_fr" => "Éducation de qualité"],
                    ["index" => "05", "name_en" => "Gender equality", "name_it" => "Parità di genere", "name_de" => "Geschlechtergleichheit", "name_fr" => "Égalité des sexes"],
                    ["index" => "06", "name_en" => "Clean water and sanitation", "name_it" => "Acqua pulita e servizi igienici", "name_de" => "Sauberes Wasser und Sanitärversorgung", "name_fr" => "Eau propre et assainissement"],
                    ["index" => "07", "name_en" => "Affordable and clean energy", "name_it" => "Energia pulita ed accessibile", "name_de" => "Bezahlbare und saubere Energie", "name_fr" => "Énergie propre et abordable"],
                    ["index" => "08", "name_en" => "Decent work and economic growth", "name_it" => "Lavoro dignitoso e crescita economica", "name_de" => "Anständige Arbeit und Wirtschaftswachstum", "name_fr" => "Travail décent et croissance économique"],
                    ["index" => "09", "name_en" => "Industry, innovation, and infrastructure", "name_it" => "Industria, innovazione ed infrastrutture", "name_de" => "Industrie, Innovation und Infrastruktur", "name_fr" => "Industrie, innovation et infrastructure"],
                    ["index" => "10", "name_en" => "Reduced inequalities", "name_it" => "Riduzione delle disuguaglianze", "name_de" => "Verminderung der Ungleichheiten", "name_fr" => "Réduction des inégalités"],
                    ["index" => "11", "name_en" => "Sustainable cities and communities", "name_it" => "Città e comunità sostenibili", "name_de" => "Nachhaltige Städte und Gemeinden", "name_fr" => "Villes et communautés durables"],
                    ["index" => "12", "name_en" => "Responsible consumption and production", "name_it" => "Consumo e produzione responsabili", "name_de" => "Verantwortungsvoller Konsum und Produktion", "name_fr" => "Consommation et production responsables"],
                    ["index" => "13", "name_en" => "Climate action", "name_it" => "Azione per il clima", "name_de" => "Klimaschutzmaßnahmen", "name_fr" => "Action pour le climat"],
                    ["index" => "14", "name_en" => "Life below water", "name_it" => "Vita sottomarina", "name_de" => "Leben unter Wasser", "name_fr" => "Vie sous-marine"],
                    ["index" => "15", "name_en" => "Life on land", "name_it" => "Vita terrestre", "name_de" => "Leben an Land", "name_fr" => "Vie terrestre"],
                    ["index" => "16", "name_en" => "Peace, justice, and strong institutions", "name_it" => "Pace, giustizia e istituzioni solide", "name_de" => "Frieden, Gerechtigkeit und starke Institutionen", "name_fr" => "Paix, justice et institutions solides"],
                    ["index" => "17", "name_en" => "Partnerships for the goals", "name_it" => "Partnership per gli obiettivi", "name_de" => "Partnerschaften für die Ziele", "name_fr" => "Partenariats pour les objectifs"],
                    ["index" => "18", "name_en" => "Management of natural resource stocks", "name_it" => "Gestione delle risorse naturali", "name_de" => "Management von natürlichen Ressourcen", "name_fr" => "Gestion des stocks de ressources naturelles"],
                    ["index" => "19", "name_en" => "Management of recyclable resource stocks", "name_it" => "Gestione delle risorse riciclabili", "name_de" => "Management von recycelbaren Ressourcen", "name_fr" => "Gestion des stocks de ressources recyclables"],
                    ["index" => "20", "name_en" => "Management of non-recyclable resource stocks", "name_it" => "Gestione delle risorse non riciclabili", "name_de" => "Management von nicht recycelbaren Ressourcen", "name_fr" => "Gestion des stocks de ressources non recyclables"],
                    ["index" => "21", "name_en" => "Indicator and improvement management", "name_it" => "Gestione degli indicatori e del miglioramento", "name_de" => "Indikatoren- und Verbesserungsmanagement", "name_fr" => "Gestion des indicateurs et de l'amélioration"],
                    ["index" => "22", "name_en" => "Reports", "name_it" => "Rapporti", "name_de" => "Berichte", "name_fr" => "Rapports"]
                ]                
            ],
            [
                'index' => '06',
                'name_en' => 'Natural Capital',
                'name_it' => 'Capitale Naturale',
                'name_de' => 'Naturkapital',
                'name_fr' => 'Capital Naturel',
                'macroprocesses' => [
                    ["index" => "01", "name_en" => "Role-competence-training analysis", "name_it" => "Analisi ruolo-competenza-formazione", "name_de" => "Rollen-Kompetenz-Schulungsanalyse", "name_fr" => "Analyse du rôle-compétence-formation"],
                    ["index" => "02", "name_en" => "Qualifications and academic degrees", "name_it" => "Qualifiche e titoli accademici", "name_de" => "Qualifikationen und akademische Grade", "name_fr" => "Qualifications et diplômes académiques"],
                    ["index" => "03", "name_en" => "Skills and knowledge research", "name_it" => "Ricerca di competenze e conoscenze", "name_de" => "Forschung zu Fähigkeiten und Kenntnissen", "name_fr" => "Recherche sur les compétences et les connaissances"],
                    ["index" => "04", "name_en" => "Methodologies for nurturing skills and knowledge", "name_it" => "Metodologie per la crescita di competenze e conoscenze", "name_de" => "Methoden zur Förderung von Fähigkeiten und Wissen", "name_fr" => "Méthodologies pour le développement des compétences et connaissances"],
                    ["index" => "05", "name_en" => "Motivational methodologies", "name_it" => "Metodologie motivazionali", "name_de" => "Motivationsmethoden", "name_fr" => "Méthodologies motivationnelles"],
                    ["index" => "06", "name_en" => "Internal personal growth tools", "name_it" => "Strumenti interni di crescita personale", "name_de" => "Interne Werkzeuge für persönliches Wachstum", "name_fr" => "Outils internes de croissance personnelle"],
                    ["index" => "07", "name_en" => "External personal growth tools", "name_it" => "Strumenti esterni di crescita personale", "name_de" => "Externe Werkzeuge für persönliches Wachstum", "name_fr" => "Outils externes de croissance personnelle"],
                    ["index" => "08", "name_en" => "Conferences, workshops, ...", "name_it" => "Conferenze, workshop, ...", "name_de" => "Konferenzen, Workshops, ...", "name_fr" => "Conférences, ateliers, ..."],
                    ["index" => "09", "name_en" => "Human resources support", "name_it" => "Supporto alle risorse umane", "name_de" => "Unterstützung der Personalabteilung", "name_fr" => "Soutien aux ressources humaines"],
                    ["index" => "10", "name_en" => "Support for disabilities, etc.", "name_it" => "Supporto per disabilità, ecc.", "name_de" => "Unterstützung bei Behinderungen, etc.", "name_fr" => "Soutien aux handicaps, etc."],
                    ["index" => "11", "name_en" => "Career plans", "name_it" => "Piani di carriera", "name_de" => "Karrierepläne", "name_fr" => "Plans de carrière"],
                    ["index" => "12", "name_en" => "Evaluation and feedback management", "name_it" => "Gestione valutazione e feedback", "name_de" => "Bewertungs- und Feedback-Management", "name_fr" => "Gestion de l'évaluation et des retours"],
                    ["index" => "13", "name_en" => "Extra-curricular activities", "name_it" => "Attività extracurriculari", "name_de" => "Außerschulische Aktivitäten", "name_fr" => "Activités parascolaires"],
                    ["index" => "14", "name_en" => "Provisions and regulations", "name_it" => "Norme e regolamenti", "name_de" => "Bestimmungen und Vorschriften", "name_fr" => "Dispositions et réglementations"],
                    ["index" => "15", "name_en" => "Organizations, partners for skills and knowledge support", "name_it" => "Organizzazioni, partner per il supporto a competenze e conoscenze", "name_de" => "Organisationen, Partner für Kompetenz- und Wissensunterstützung", "name_fr" => "Organisations, partenaires pour le soutien aux compétences et connaissances"],
                    ["index" => "16", "name_en" => "Activities for skills and knowledge support", "name_it" => "Attività di supporto a competenze e conoscenze", "name_de" => "Aktivitäten zur Unterstützung von Kompetenzen und Wissen", "name_fr" => "Activités pour le soutien aux compétences et connaissances"],
                    ["index" => "17", "name_en" => "Management of skills and knowledge indicators", "name_it" => "Gestione degli indicatori di competenze e conoscenze", "name_de" => "Management von Kompetenz- und Wissensindikatoren", "name_fr" => "Gestion des indicateurs de compétences et connaissances"],
                    ["index" => "18", "name_en" => "Communication management", "name_it" => "Gestione della comunicazione", "name_de" => "Kommunikationsmanagement", "name_fr" => "Gestion de la communication"],
                    ["index" => "19", "name_en" => "Other related to intellectual activities", "name_it" => "Altre attività legate alle attività intellettuali", "name_de" => "Andere im Zusammenhang mit intellektuellen Aktivitäten", "name_fr" => "Autres liés aux activités intellectuelles"],
                    ["index" => "20", "name_en" => "Indicator and improvement management", "name_it" => "Gestione degli indicatori e del miglioramento", "name_de" => "Indikatoren- und Verbesserungsmanagement", "name_fr" => "Gestion des indicateurs et de l'amélioration"],
                    ["index" => "21", "name_en" => "Reports", "name_it" => "Rapporti", "name_de" => "Berichte", "name_fr" => "Rapports"]
                ]                
            ]
        ];

        foreach ($capitals as $capitalData) {
            // Creazione del capitale
            $capital = new Capital();
            $capital->index = $capitalData['index'];
            $capital->name_en = $capitalData['name_en'];
            $capital->name_it = $capitalData['name_it'];
            $capital->name_de = $capitalData['name_de'];
            $capital->name_fr = $capitalData['name_fr'];
            $capital->save();
        
            foreach ($capitalData['macroprocesses'] as $macroprocess) {
                // Creazione del macroprocesso
                $process = new Macroprocess();
                $process->capital_id = $capital->id;
                $process->index = $macroprocess['index'];
                $process->name_en = $macroprocess['name_en'];
                $process->name_it = $macroprocess['name_it'];
                $process->name_de = $macroprocess['name_de'];
                $process->name_fr = $macroprocess['name_fr'];
                $process->save();
            }
        }        
    }
}
