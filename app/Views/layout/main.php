<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title><?= esc($title ?? 'POS Application') ?></title>

    <link
        rel="stylesheet"
        href="<?= base_url('css/style.css') ?>"
    >
</head>

<body>
    <header class="site-header">
        <div class="navigation-container">
            <a class="brand" href="<?= site_url('/') ?>">
                POS Application
            </a>

            <nav class="navigation">
                <a href="<?= site_url('customer-accounts') ?>">
                    Customer Accounts
                </a>

                <a href="<?= site_url('user-accounts') ?>">
                    User Accounts
                </a>
            </nav>
        </div>
    </header>

    <main class="main-container">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="site-footer">
        <p>IT0049 – Web System Technologies</p>
    </footer>
</body>
</html>