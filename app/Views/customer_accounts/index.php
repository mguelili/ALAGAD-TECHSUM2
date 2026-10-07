<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="page-heading">
    <div>
        <p class="eyebrow">Account Management</p>
        <h1><?= esc($title) ?></h1>
        <p class="description">
            Customer information retrieved from the MySQL database.
        </p>
    </div>

    <div class="record-count">
        <?= count($customers) ?> records
    </div>
</section>

<section class="table-card">
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Email address</th>
                    <th>Phone number</th>
                    <th>Created at</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($customers !== []): ?>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td>
                                <?= esc($customer['id']) ?>
                            </td>

                            <td class="primary-value">
                                <?= esc($customer['full_name']) ?>
                            </td>

                            <td>
                                <?= esc($customer['email']) ?>
                            </td>

                            <td>
                                <?= esc($customer['phone'] ?? 'Not provided') ?>
                            </td>

                            <td>
                                <?= esc($customer['created_at']) ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="empty-message">
                            No customer records found.
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->endSection() ?>