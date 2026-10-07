<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="page-heading">
    <div>
        <p class="eyebrow">Account Management</p>
        <h1><?= esc($title) ?></h1>
        <p class="description">
            User information retrieved from the MySQL database.
        </p>
    </div>

    <div class="record-count">
        <?= count($users) ?> records
    </div>
</section>

<section class="table-card">
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full name</th>
                    <th>Created at</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($users !== []): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td>
                                <?= esc($user['id']) ?>
                            </td>

                            <td class="username">
                                <?= esc($user['username']) ?>
                            </td>

                            <td class="primary-value">
                                <?= esc($user['full_name']) ?>
                            </td>

                            <td>
                                <?= esc($user['created_at']) ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="empty-message">
                            No user records found.
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->endSection() ?>