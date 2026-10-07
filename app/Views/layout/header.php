<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Tasks for Today') ?></title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #171525;
            color: white;
        }

        nav {
            background: #30265c;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
        }

        .brand {
            color: #9b7cff;
            font-weight: bold;
            font-size: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            width: 80%;
            margin: 35px auto;
            padding: 35px;
            background: #211d35;
            border-radius: 10px;
            min-height: 500px;
        }

        h1 {
            color: #9b7cff;
        }

        label { display:block; margin:16px 0; } input,select { display:block; margin-top:6px; padding:10px; min-width:260px; } button { padding:9px 14px; cursor:pointer; } .notice { padding:10px; background:#30265c; } .error { color:#ffb3b3; } table { width:100%; border-collapse:collapse; } td,th { padding:10px; border-bottom:1px solid #51496f; text-align:left; }
        footer {
            text-align: center;
            color: #d7cfff;
            padding: 25px;
        }
    </style>
</head>

<body>

<nav>
    <div class="brand">Tasks for Today</div>

    <div>
        <a href="<?= base_url('/') ?>">Welcome</a>
        <a href="<?= base_url('/tasks') ?>">Task List</a>
        <a href="<?= base_url('/profile') ?>">Profile</a>
        <a href="<?= base_url('/about') ?>">About</a>
        <?php if(session()->get('logged_in')): ?><a href="<?= site_url('tasks/new') ?>">New Task</a><form method="post" action="<?= site_url('logout') ?>" style="display:inline"><?= csrf_field() ?><button type="submit">Log out</button></form><?php else: ?><a href="<?= site_url('login') ?>">Log in</a><?php endif ?>
    </div>
</nav>

<main class="container"><?php foreach(['success','error'] as $flash): if($message=session()->getFlashdata($flash)): ?><p class="notice <?= $flash ?>"><?= esc($message) ?></p><?php endif; endforeach ?>