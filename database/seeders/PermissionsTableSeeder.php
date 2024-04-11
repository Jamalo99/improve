<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'form_setting_access',
            ],
            [
                'id'    => 18,
                'title' => 'capital_create',
            ],
            [
                'id'    => 19,
                'title' => 'capital_edit',
            ],
            [
                'id'    => 20,
                'title' => 'capital_show',
            ],
            [
                'id'    => 21,
                'title' => 'capital_delete',
            ],
            [
                'id'    => 22,
                'title' => 'capital_access',
            ],
            [
                'id'    => 23,
                'title' => 'macroprocess_create',
            ],
            [
                'id'    => 24,
                'title' => 'macroprocess_edit',
            ],
            [
                'id'    => 25,
                'title' => 'macroprocess_show',
            ],
            [
                'id'    => 26,
                'title' => 'macroprocess_delete',
            ],
            [
                'id'    => 27,
                'title' => 'macroprocess_access',
            ],
            [
                'id'    => 28,
                'title' => 'status_create',
            ],
            [
                'id'    => 29,
                'title' => 'status_edit',
            ],
            [
                'id'    => 30,
                'title' => 'status_show',
            ],
            [
                'id'    => 31,
                'title' => 'status_delete',
            ],
            [
                'id'    => 32,
                'title' => 'status_access',
            ],
            [
                'id'    => 33,
                'title' => 'cadence_create',
            ],
            [
                'id'    => 34,
                'title' => 'cadence_edit',
            ],
            [
                'id'    => 35,
                'title' => 'cadence_show',
            ],
            [
                'id'    => 36,
                'title' => 'cadence_delete',
            ],
            [
                'id'    => 37,
                'title' => 'cadence_access',
            ],
            [
                'id'    => 38,
                'title' => 'impact_create',
            ],
            [
                'id'    => 39,
                'title' => 'impact_edit',
            ],
            [
                'id'    => 40,
                'title' => 'impact_show',
            ],
            [
                'id'    => 41,
                'title' => 'impact_delete',
            ],
            [
                'id'    => 42,
                'title' => 'impact_access',
            ],
            [
                'id'    => 43,
                'title' => 'probability_create',
            ],
            [
                'id'    => 44,
                'title' => 'probability_edit',
            ],
            [
                'id'    => 45,
                'title' => 'probability_show',
            ],
            [
                'id'    => 46,
                'title' => 'probability_delete',
            ],
            [
                'id'    => 47,
                'title' => 'probability_access',
            ],
            [
                'id'    => 48,
                'title' => 'workspace_create',
            ],
            [
                'id'    => 49,
                'title' => 'workspace_edit',
            ],
            [
                'id'    => 50,
                'title' => 'workspace_show',
            ],
            [
                'id'    => 51,
                'title' => 'workspace_delete',
            ],
            [
                'id'    => 52,
                'title' => 'workspace_access',
            ],
            [
                'id'    => 53,
                'title' => 'control_key_create',
            ],
            [
                'id'    => 54,
                'title' => 'control_key_edit',
            ],
            [
                'id'    => 55,
                'title' => 'control_key_show',
            ],
            [
                'id'    => 56,
                'title' => 'control_key_delete',
            ],
            [
                'id'    => 57,
                'title' => 'control_key_access',
            ],
            [
                'id'    => 58,
                'title' => 'section_access',
            ],
            [
                'id'    => 59,
                'title' => 'risk_edit',
            ],
            [
                'id'    => 60,
                'title' => 'risk_delete',
            ],
            [
                'id'    => 61,
                'title' => 'risk_access',
            ],
            [
                'id'    => 62,
                'title' => 'question_create',
            ],
            [
                'id'    => 63,
                'title' => 'question_edit',
            ],
            [
                'id'    => 64,
                'title' => 'question_show',
            ],
            [
                'id'    => 65,
                'title' => 'question_delete',
            ],
            [
                'id'    => 66,
                'title' => 'question_access',
            ],
            [
                'id'    => 67,
                'title' => 'activity_edit',
            ],
            [
                'id'    => 68,
                'title' => 'activity_delete',
            ],
            [
                'id'    => 69,
                'title' => 'activity_access',
            ],
            [
                'id'    => 70,
                'title' => 'manage_control_key_access',
            ],
            [
                'id'    => 71,
                'title' => 'question_answer_edit',
            ],
            [
                'id'    => 72,
                'title' => 'question_answer_delete',
            ],
            [
                'id'    => 73,
                'title' => 'question_answer_access',
            ],
            [
                'id'    => 74,
                'title' => 'period_answer_edit',
            ],
            [
                'id'    => 75,
                'title' => 'period_answer_delete',
            ],
            [
                'id'    => 76,
                'title' => 'period_answer_access',
            ],
            [
                'id'    => 77,
                'title' => 'manage_protocol_access',
            ],
            [
                'id'    => 78,
                'title' => 'protocol_create',
            ],
            [
                'id'    => 79,
                'title' => 'protocol_edit',
            ],
            [
                'id'    => 80,
                'title' => 'protocol_show',
            ],
            [
                'id'    => 81,
                'title' => 'protocol_delete',
            ],
            [
                'id'    => 82,
                'title' => 'protocol_access',
            ],
            [
                'id'    => 83,
                'title' => 'protocol_table_question_edit',
            ],
            [
                'id'    => 84,
                'title' => 'protocol_table_question_delete',
            ],
            [
                'id'    => 85,
                'title' => 'protocol_table_question_access',
            ],
            [
                'id'    => 86,
                'title' => 'fraud_answer_edit',
            ],
            [
                'id'    => 87,
                'title' => 'fraud_answer_delete',
            ],
            [
                'id'    => 88,
                'title' => 'fraud_answer_access',
            ],
            [
                'id'    => 89,
                'title' => 'fraud_question_create',
            ],
            [
                'id'    => 90,
                'title' => 'fraud_question_edit',
            ],
            [
                'id'    => 91,
                'title' => 'fraud_question_show',
            ],
            [
                'id'    => 92,
                'title' => 'fraud_question_delete',
            ],
            [
                'id'    => 93,
                'title' => 'fraud_question_access',
            ],
            [
                'id'    => 94,
                'title' => 'risk_map_create',
            ],
            [
                'id'    => 95,
                'title' => 'risk_map_edit',
            ],
            [
                'id'    => 96,
                'title' => 'risk_map_show',
            ],
            [
                'id'    => 97,
                'title' => 'risk_map_delete',
            ],
            [
                'id'    => 98,
                'title' => 'risk_map_access',
            ],
            [
                'id'    => 99,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
