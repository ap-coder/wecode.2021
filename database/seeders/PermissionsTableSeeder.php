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
                'title' => 'staff_create',
            ],
            [
                'id'    => 18,
                'title' => 'staff_edit',
            ],
            [
                'id'    => 19,
                'title' => 'staff_show',
            ],
            [
                'id'    => 20,
                'title' => 'staff_delete',
            ],
            [
                'id'    => 21,
                'title' => 'staff_access',
            ],
            [
                'id'    => 22,
                'title' => 'page_create',
            ],
            [
                'id'    => 23,
                'title' => 'page_edit',
            ],
            [
                'id'    => 24,
                'title' => 'page_show',
            ],
            [
                'id'    => 25,
                'title' => 'page_delete',
            ],
            [
                'id'    => 26,
                'title' => 'page_access',
            ],
            [
                'id'    => 27,
                'title' => 'page_manager_access',
            ],
            [
                'id'    => 28,
                'title' => 'category_create',
            ],
            [
                'id'    => 29,
                'title' => 'category_edit',
            ],
            [
                'id'    => 30,
                'title' => 'category_show',
            ],
            [
                'id'    => 31,
                'title' => 'category_delete',
            ],
            [
                'id'    => 32,
                'title' => 'category_access',
            ],
            [
                'id'    => 33,
                'title' => 'blog_manager_access',
            ],
            [
                'id'    => 34,
                'title' => 'discussion_manager_access',
            ],
            [
                'id'    => 35,
                'title' => 'topic_create',
            ],
            [
                'id'    => 36,
                'title' => 'topic_edit',
            ],
            [
                'id'    => 37,
                'title' => 'topic_show',
            ],
            [
                'id'    => 38,
                'title' => 'topic_delete',
            ],
            [
                'id'    => 39,
                'title' => 'topic_access',
            ],
            [
                'id'    => 40,
                'title' => 'thread_create',
            ],
            [
                'id'    => 41,
                'title' => 'thread_edit',
            ],
            [
                'id'    => 42,
                'title' => 'thread_show',
            ],
            [
                'id'    => 43,
                'title' => 'thread_delete',
            ],
            [
                'id'    => 44,
                'title' => 'thread_access',
            ],
            [
                'id'    => 45,
                'title' => 'reply_create',
            ],
            [
                'id'    => 46,
                'title' => 'reply_edit',
            ],
            [
                'id'    => 47,
                'title' => 'reply_show',
            ],
            [
                'id'    => 48,
                'title' => 'reply_delete',
            ],
            [
                'id'    => 49,
                'title' => 'reply_access',
            ],
            [
                'id'    => 50,
                'title' => 'video_manager_access',
            ],
            [
                'id'    => 51,
                'title' => 'video_content_create',
            ],
            [
                'id'    => 52,
                'title' => 'video_content_edit',
            ],
            [
                'id'    => 53,
                'title' => 'video_content_show',
            ],
            [
                'id'    => 54,
                'title' => 'video_content_delete',
            ],
            [
                'id'    => 55,
                'title' => 'video_content_access',
            ],
            [
                'id'    => 56,
                'title' => 'post_create',
            ],
            [
                'id'    => 57,
                'title' => 'post_edit',
            ],
            [
                'id'    => 58,
                'title' => 'post_show',
            ],
            [
                'id'    => 59,
                'title' => 'post_delete',
            ],
            [
                'id'    => 60,
                'title' => 'post_access',
            ],
            [
                'id'    => 61,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 62,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 63,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 64,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 65,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 66,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 67,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 68,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 69,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 70,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 71,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 72,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 73,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 74,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 75,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 76,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 77,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 78,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 79,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 80,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 81,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 82,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 83,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 84,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 85,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 86,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 87,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 88,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 89,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 90,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 91,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 92,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 93,
                'title' => 'pagesection_create',
            ],
            [
                'id'    => 94,
                'title' => 'pagesection_edit',
            ],
            [
                'id'    => 95,
                'title' => 'pagesection_show',
            ],
            [
                'id'    => 96,
                'title' => 'pagesection_delete',
            ],
            [
                'id'    => 97,
                'title' => 'pagesection_access',
            ],
            [
                'id'    => 98,
                'title' => 'content_section_create',
            ],
            [
                'id'    => 99,
                'title' => 'content_section_edit',
            ],
            [
                'id'    => 100,
                'title' => 'content_section_show',
            ],
            [
                'id'    => 101,
                'title' => 'content_section_delete',
            ],
            [
                'id'    => 102,
                'title' => 'content_section_access',
            ],
            [
                'id'    => 103,
                'title' => 'content_section_manager_access',
            ],
            [
                'id'    => 104,
                'title' => 'project_create',
            ],
            [
                'id'    => 105,
                'title' => 'project_edit',
            ],
            [
                'id'    => 106,
                'title' => 'project_show',
            ],
            [
                'id'    => 107,
                'title' => 'project_delete',
            ],
            [
                'id'    => 108,
                'title' => 'project_access',
            ],
            [
                'id'    => 109,
                'title' => 'admin_setting_access',
            ],
            [
                'id'    => 110,
                'title' => 'portfolio_manager_access',
            ],
            [
                'id'    => 111,
                'title' => 'technology_create',
            ],
            [
                'id'    => 112,
                'title' => 'technology_edit',
            ],
            [
                'id'    => 113,
                'title' => 'technology_show',
            ],
            [
                'id'    => 114,
                'title' => 'technology_delete',
            ],
            [
                'id'    => 115,
                'title' => 'technology_access',
            ],
            [
                'id'    => 116,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 117,
                'title' => 'menu_access',
            ],
          [
                'id'    => 118,
                'title' => 'service_create',
            ],
            [
                'id'    => 119,
                'title' => 'service_edit',
            ],
            [
                'id'    => 120,
                'title' => 'service_show',
            ],
            [
                'id'    => 121,
                'title' => 'service_delete',
            ],
            [
                'id'    => 122,
                'title' => 'service_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
