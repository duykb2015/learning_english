<?php
$menu = [
    [
        'url' => base_url('dashboard'),
        'active' => 'dashboard',
        'name' => 'Dashboard',
        'icon' => '<i class="feather icon-home"></i>',
    ],
    [
        'url' => '',
        'active' => 'dashboard/admin',
        'name' => 'Quản lý Tài khoản',
        'icon' => '<i class="feather icon-user"></i>',
        'sub_menu' => [
            [
                'url' => '',
                'name' => 'Quản trị',
                'active' => 'dashboard/admin',
                'sub_menu' => [
                    [
                        'url' => base_url('dashboard/admin'),
                        'name' => 'Danh sách',
                    ],
                    [
                        'url' => base_url('dashboard/admin/detail'),
                        'name' => 'Thêm mới',
                    ],
                ]
            ],
            [
                'url' => '',
                'name' => 'Người dùng',
                'active' => 'dashboard/user',
                'sub_menu' => [
                    [
                        'url' => base_url('dashboard/user/'),
                        'name' => 'Danh sách',
                    ],
                    [
                        'url' => base_url('dashboard/user/detail'),
                        'name' => 'Thêm mới',
                    ],
                ]
            ],
        ]
    ],
    [
        'url' => '',

        'name' => 'Quản lý Danh mục',
        'active' => 'dashboard/category',

        'icon' => '<i class="fa fa-bars"></i>',
        'sub_menu' => [
            [
                'url' => base_url('dashboard/category'),
                'name' => 'Danh sách',
            ],
            [
                'url' => base_url('dashboard/category/detail'),
                'name' => 'Thêm mới',
            ],
        ]
    ],
    [
        'url' => '',
        'active' => 'dashboard/question',
        'name' => 'Quản lý Câu hỏi',
        'icon' => '<i class="fa fa-question-circle-o"></i>',
        'sub_menu' => [
            [
                'url' => base_url('dashboard/question'),
                'name' => 'Danh sách',
            ],
            [
                'url' => base_url('dashboard/question/detail'),
                'name' => 'Thêm mới câu hỏi',
            ],

            [
                'url' => base_url('dashboard/question/upload-excel'),
                'name' => 'Thêm câu hỏi Excel',
            ],
            [
                'url' => '',
                'name' => 'Nhóm câu hỏi',
                'active' => 'dashboard/group-question',
                'sub_menu' => [
                    [
                        'url' => base_url('dashboard/question/group-question-detail'),
                        'name' => 'Danh sách',
                    ],
                    [
                        'url' => base_url('dashboard/question/group-question'),
                        'name' => 'Thêm mới',
                    ],
                ]
            ],

        ]
    ],
    [
        'url' => '',
        'name' => 'Quản lý Đề Thi',
        'active' => 'dashboard/exam',
        'icon' => '<i class="fa fa-list-ol"></i>',
        'sub_menu' => [
            [
                'url' => base_url('dashboard/exam'),
                'name' => 'Danh sách',
            ],
            [
                'url' => base_url('dashboard/exam/detail'),
                'name' => 'Thêm mới',
            ],
        ]
    ],
    [
        'url' => '',
        'active' => 'dashboard/learn',
        'name' => 'Quản lý bài Luyện tập',
        'icon' => '<i class="fa fa-leanpub"></i>',
        'sub_menu' => [
            [
                'url' => '',
                'name' => 'Bài ngữ pháp',
                'active' => 'dashboard/learn',
                'sub_menu' => [
                    [
                        'url' => base_url('dashboard/learn'),
                        'name' => 'Danh sách',
                    ],
                    [
                        'url' => base_url('dashboard/learn/detail'),
                        'name' => 'Thêm mới',
                    ],
                ]
            ],
            [
                'url' => '',
                'name' => 'Bài từ vựng',
                'active' => 'dashboard/learn',
                'sub_menu' => [
                    [
                        'url' => base_url('dashboard/learn/'),
                        'name' => 'Danh sách',
                    ],
                    [
                        'url' => base_url('dashboard/learn/detail'),
                        'name' => 'Thêm mới',
                    ],
                ]
            ],
        ]
    ],
    [
        'url' => '',
        'name' => 'Quản lý Bài viết',
        'active' => 'dashboard/posts',
        'icon' => '<i class="fa fa-info"></i>',
        'sub_menu' => [

            [
                'url' => base_url('dashboard/posts'),
                'name' => 'Danh sách',
            ],
            [
                'url' => base_url('dashboard/posts/detail'),
                'name' => 'Thêm mới',
            ],
        ]
    ],
];
?>

<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Bảng điều khiển</div>
        <ul class="pcoded-item pcoded-left-item">
            <?php foreach ($menu as $row) : ?>
                <?php $classActive = url_is($row['active'] . '*') ? ' pcoded-trigger' : '' ?>
                <li class="<?= !empty($row['url']) ? '' : 'pcoded-hasmenu' ?> <?= $classActive ?>">
                    <a href="<?= !empty($row['url']) ? $row['url'] : 'javascript:void(0)' ?>">
                        <span class="pcoded-micon"><?= $row['icon'] ?></span>
                        <span class="pcoded-mtext"><?= $row['name'] ?></span>
                    </a>
                    <?php if (!empty($row['sub_menu'])) : ?>
                        <ul class="pcoded-submenu">
                            <?php foreach ($row['sub_menu'] as $sub) : ?>
                                <?php if (!empty($sub['sub_menu'])) : ?>
                                    <?php $subClassActive = url_is($sub['active'] . '*') ? ' pcoded-trigger' : '' ?>
                                    <li class="pcoded-hasmenu <?= $subClassActive ?>">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-mtext"><?= $sub['name'] ?></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <?php foreach ($sub['sub_menu'] as $val) : ?>
                                                <li class="<?= url_is(str_replace(base_url(), '', $val['url'])) ? 'active' : '' ?>">
                                                    <a href="<?= $val['url'] ?>">
                                                        <span class="pcoded-mtext"><?= $val['name'] ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </li>
                                <?php else : ?>
                                    <li class="<?= url_is(str_replace(base_url(), '', $sub['url'])) ? 'active' : '' ?>">
                                        <a href="<?= $sub['url'] ?>">
                                            <span class="pcoded-mtext"><?= $sub['name'] ?></span>
                                        </a>
                                    </li>
                                <?php endif ?>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</nav>