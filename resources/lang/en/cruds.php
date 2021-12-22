<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'approved'                  => 'Approved',
            'approved_helper'           => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
        ],
    ],
    'staff' => [
        'title'          => 'Staff',
        'title_singular' => 'Staff',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'startdate'            => 'Startdate',
            'startdate_helper'     => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'job_title'            => 'Job Title',
            'job_title_helper'     => ' ',
            'short_intro'          => 'Short Intro',
            'short_intro_helper'   => 'This is important because if selected as a Author this is the short text throughout the site and in the schema and microdata.',
            'bio'                  => 'Bio',
            'bio_helper'           => 'This is important because if selected as a Author this is the long description on blog / news.  Used in the schema and microdata.',
            'picture'              => 'Picture',
            'picture_helper'       => 'To be selectable as an Author  you need this or a Gravatar registered email.',
            'published'            => 'Published',
            'published_helper'     => ' ',
            'slug'                 => 'Slug',
            'slug_helper'          => ' ',
            'linkedin_link'        => 'Linkedin Link',
            'linkedin_link_helper' => ' ',
            'facebook_link'        => 'Facebook Link',
            'facebook_link_helper' => ' ',
            'youtube_link'         => 'Youtube Link',
            'youtube_link_helper'  => ' ',
            'twitter_link'         => 'Twitter Link',
            'twitter_link_helper'  => ' ',
            'other_link'           => 'Other Link',
            'other_link_helper'    => ' ',
            'staff_email'          => 'Staff Email',
            'staff_email_helper'   => ' ',
            'gravatar'             => 'Gravatar Registered Email',
            'gravatar_helper'      => 'This is the email registered with Gravatar. You need this or a photo uploaded for Microdata to pass.',
            'in_teams'             => 'In Staff Section',
            'in_teams_helper'      => 'Weather to show this staff member in he teams section',
            'is_author'            => 'Is Author',
            'is_author_helper'     => 'Staff member can be used as author in content.',
            'order'                => 'Order',
            'order_helper'         => ' ',
            'list_on_about'        => 'List On About',
            'list_on_about_helper' => ' ',
            'user'                 => 'User',
            'user_helper'          => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'page' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'sub_title'         => 'Sub Title',
            'sub_title_helper'  => ' ',
            'excerpt'           => 'Excerpt',
            'excerpt_helper'    => ' ',
            'path'              => 'Path',
            'path_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'pageManager' => [
        'title'          => 'Page Manager',
        'title_singular' => 'Page Manager',
    ],
    'category' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'published'          => 'Published',
            'published_helper'   => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'homepage'           => 'Homepage',
            'homepage_helper'    => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'blogManager' => [
        'title'          => 'Blog Manager',
        'title_singular' => 'Blog Manager',
    ],
    'discussionManager' => [
        'title'          => 'Discussion Manager',
        'title_singular' => 'Discussion Manager',
    ],
    'topic' => [
        'title'          => 'Topic',
        'title_singular' => 'Topic',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'published'          => 'Published',
            'published_helper'   => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'thread' => [
        'title'          => 'Thread',
        'title_singular' => 'Thread',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'title'                    => 'Title',
            'title_helper'             => ' ',
            'body'                     => 'Body',
            'body_helper'              => ' ',
            'published'                => 'Published',
            'published_helper'         => ' ',
            'photo'                    => 'Photo',
            'photo_helper'             => ' ',
            'additional_photos'        => 'Additional Photos',
            'additional_photos_helper' => ' ',
            'attachments'              => 'Attachments',
            'attachments_helper'       => 'Attach files and documents',
            'closed'                   => 'Closed',
            'closed_helper'            => ' ',
            'slug'                     => 'Slug',
            'slug_helper'              => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'reply' => [
        'title'          => 'Reply',
        'title_singular' => 'Reply',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'author'                   => 'Author',
            'author_helper'            => ' ',
            'published'                => 'Published',
            'published_helper'         => ' ',
            'private'                  => 'Private',
            'private_helper'           => ' ',
            'best_answer'              => 'Best Answer',
            'best_answer_helper'       => ' ',
            'thread'                   => 'Thread',
            'thread_helper'            => ' ',
            'content_area'             => 'Content Area',
            'content_area_helper'      => ' ',
            'attachements'             => 'Attachements',
            'attachements_helper'      => ' ',
            'main_photo'               => 'Main Photo',
            'main_photo_helper'        => ' ',
            'additional_photos'        => 'Additional Photos',
            'additional_photos_helper' => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'videoManager' => [
        'title'          => 'Video Manager',
        'title_singular' => 'Video Manager',
    ],
    'videoContent' => [
        'title'          => 'Video Content',
        'title_singular' => 'Video Content',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'published'                => 'Published',
            'published_helper'         => ' ',
            'public_everywhere'        => 'Public Everywhere',
            'public_everywhere_helper' => ' ',
            'title'                    => 'Title',
            'title_helper'             => ' ',
            'alternate_title'          => 'Alternate Title',
            'alternate_title_helper'   => 'For split testing or other uses if needed.',
            'content_area'             => 'Content Area',
            'content_area_helper'      => ' ',
            'youtube'                  => 'Youtube ID',
            'youtube_helper'           => 'Only the Youtube ID not the whole URL',
            'vimeo'                    => 'Vimeo ID',
            'vimeo_helper'             => 'Only the Vimeo ID not the whole URL',
            'other_video'              => 'Other Video',
            'other_video_helper'       => 'add entire URL / link to video',
            'meta_title'               => 'Meta Title',
            'meta_title_helper'        => 'If you keep your titles under 60 characters,  research suggests that you can expect about 90% of your titles to display properly.',
            'meta_description'         => 'Meta Description',
            'meta_description_helper'  => 'Google\'s New  meta description length is up to 920 pixels, which might allow for up to 158 characters. On mobile devices, the max limit is about 680 pixels and 120 characters',
            'fbt'                      => 'FaceBook Title',
            'fbt_helper'               => ' ',
            'fbd'                      => 'FaceBook Description',
            'fbd_helper'               => 'Make a little different then the main for better SEO results',
            'twt'                      => 'Twitter Tile',
            'twt_helper'               => 'Make a little different then the main for better SEO results',
            'twd'                      => 'Titter Description',
            'twd_helper'               => ' ',
            'notes_area'               => 'Notes Area',
            'notes_area_helper'        => 'Only viewable by admins',
            'video_type'               => 'Video Type',
            'video_type_helper'        => ' ',
            'placeholder'              => 'Placeholder',
            'placeholder_helper'       => '1280x720  | under the 2MB |  JPG, GIF, or PNG',
            'thread'                   => 'Thread',
            'thread_helper'            => ' ',
            'pages'                    => 'Pages',
            'pages_helper'             => ' ',
            'order'                    => 'Order',
            'order_helper'             => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'post' => [
        'title'          => 'Post',
        'title_singular' => 'Post',
        'fields'         => [
            'id'                              => 'ID',
            'id_helper'                       => ' ',
            'category'                        => 'Category',
            'category_helper'                 => ' ',
            'title'                           => 'Title',
            'title_helper'                    => ' ',
            'body_text'                       => 'Body Text',
            'body_text_helper'                => ' ',
            'excerpt'                         => 'Excerpt',
            'excerpt_helper'                  => ' ',
            'featured_image'                  => 'Featured Image',
            'featured_image_helper'           => ' ',
            'meta_title'                      => 'Meta Title',
            'meta_title_helper'               => ' ',
            'meta_description'                => 'Meta Description',
            'meta_description_helper'         => ' ',
            'facebook_title'                  => 'Facebook Title',
            'facebook_title_helper'           => ' ',
            'facebook_desc'                   => 'Facebook Description',
            'facebook_desc_helper'            => ' ',
            'twitter_post_description'        => 'Twitter Post Description',
            'twitter_post_description_helper' => ' ',
            'twitter_post_title'              => 'Twitter Post Title',
            'twitter_post_title_helper'       => ' ',
            'published'                       => 'Published',
            'published_helper'                => ' ',
            'slug'                            => 'Slug',
            'slug_helper'                     => ' ',
            'contributor'                     => 'Contributor',
            'contributor_helper'              => ' ',
            'contributor_link'                => 'Contributor Link',
            'contributor_link_helper'         => ' ',
            'contributor_2'                   => 'Contributor 2',
            'contributor_2_helper'            => ' ',
            'contributor_2_link'              => 'Contributor 2 Link',
            'contributor_2_link_helper'       => ' ',
            'attachments'                     => 'Attachments',
            'attachments_helper'              => 'Upload documents, images, files here',
            'menu_order'                      => 'Menu Order',
            'menu_order_helper'               => ' ',
            'comment_status'                  => 'Comment Status',
            'comment_status_helper'           => ' ',
            'post_password'                   => 'Post Password',
            'post_password_helper'            => 'to make post private',
            'comment_count'                   => 'Comment Count',
            'comment_count_helper'            => ' ',
            'ping_status'                     => 'Ping Status',
            'ping_status_helper'              => 'On or Off',
            'created_at'                      => 'Created at',
            'created_at_helper'               => ' ',
            'updated_at'                      => 'Updated at',
            'updated_at_helper'               => ' ',
            'deleted_at'                      => 'Deleted at',
            'deleted_at_helper'               => ' ',
        ],
    ],
    'timeManagement' => [
        'title'          => 'Time management',
        'title_singular' => 'Time management',
    ],
    'timeWorkType' => [
        'title'          => 'Work types',
        'title_singular' => 'Work type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'timeProject' => [
        'title'          => 'Projects',
        'title_singular' => 'Project',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'timeEntry' => [
        'title'          => 'Time entries',
        'title_singular' => 'Time Entry',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'work_type'         => 'Work Type',
            'work_type_helper'  => ' ',
            'project'           => 'Project',
            'project_helper'    => ' ',
            'start_time'        => 'Start time',
            'start_time_helper' => ' ',
            'end_time'          => 'End time',
            'end_time_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'timeReport' => [
        'title'          => 'Monthly report',
        'title_singular' => 'Monthly report',
        'reports'        => [
            'title'             => 'Reports',
            'title_singular'    => 'Report',
            'timeEntriesReport' => 'Time entries report',
            'timeByProjects'    => 'Report by project',
            'timeByWorkType'    => 'Report by work type',
        ],
    ],
    'faqManagement' => [
        'title'          => 'FAQ Management',
        'title_singular' => 'FAQ Management',
    ],
    'faqCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'faqQuestion' => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'question'          => 'Question',
            'question_helper'   => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'pagesection' => [
        'title'          => 'Pagesection',
        'title_singular' => 'Pagesection',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'section'                 => 'Section',
            'section_helper'          => ' ',
            'section_nickname'        => 'Section Nickname',
            'section_nickname_helper' => ' ',
            'order'                   => 'Order',
            'order_helper'            => ' ',
            'pages'                   => 'Pages',
            'pages_helper'            => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'contentSection' => [
        'title'          => 'Content Sections',
        'title_singular' => 'Content Section',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'section_title'        => 'Section Title',
            'section_title_helper' => ' ',
            'order'                => 'Order',
            'order_helper'         => ' ',
            'section'              => 'Section',
            'section_helper'       => ' ',
            'published'            => 'Published',
            'published_helper'     => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'location'             => 'Location',
            'location_helper'      => ' ',
            'pages'                => 'Pages',
            'pages_helper'         => ' ',
            'posts'                => 'Posts',
            'posts_helper'         => ' ',
            'threads'              => 'Threads',
            'threads_helper'       => ' ',
        ],
    ],
    'contentSectionManager' => [
        'title'          => 'Content Section Manager',
        'title_singular' => 'Content Section Manager',
    ],
];