<?php

use App\Permission;
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
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 19,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 20,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 21,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 22,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 23,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 24,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 25,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 26,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 27,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 28,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 29,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 30,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 31,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 32,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 33,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 34,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 35,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 36,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 37,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 38,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 39,
                'title' => 'task_create',
            ],
            [
                'id'    => 40,
                'title' => 'task_edit',
            ],
            [
                'id'    => 41,
                'title' => 'task_show',
            ],
            [
                'id'    => 42,
                'title' => 'task_delete',
            ],
            [
                'id'    => 43,
                'title' => 'task_access',
            ],
            [
                'id'    => 44,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 45,
                'title' => 'configuration_access',
            ],
            [
                'id'    => 46,
                'title' => 'status_create',
            ],
            [
                'id'    => 47,
                'title' => 'status_edit',
            ],
            [
                'id'    => 48,
                'title' => 'status_show',
            ],
            [
                'id'    => 49,
                'title' => 'status_delete',
            ],
            [
                'id'    => 50,
                'title' => 'status_access',
            ],
            [
                'id'    => 51,
                'title' => 'category_create',
            ],
            [
                'id'    => 52,
                'title' => 'category_edit',
            ],
            [
                'id'    => 53,
                'title' => 'category_show',
            ],
            [
                'id'    => 54,
                'title' => 'category_delete',
            ],
            [
                'id'    => 55,
                'title' => 'category_access',
            ],
            [
                'id'    => 56,
                'title' => 'client_access',
            ],
            [
                'id'    => 57,
                'title' => 'debtor_create',
            ],
            [
                'id'    => 58,
                'title' => 'debtor_edit',
            ],
            [
                'id'    => 59,
                'title' => 'debtor_show',
            ],
            [
                'id'    => 60,
                'title' => 'debtor_delete',
            ],
            [
                'id'    => 61,
                'title' => 'debtor_access',
            ],
            [
                'id'    => 62,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 63,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 64,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 65,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 66,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 67,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 68,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
