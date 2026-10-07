<h1>User Profile</h1>

<?php if (!$user): ?>

    <p>No user record was found.</p>

<?php else: ?>

<div class="profile-card">
    <div class="profile-row">
        <strong>User ID:</strong>
        <?= esc($user['id']) ?>
    </div>

    <div class="profile-row">
        <strong>Username:</strong>
        <?= esc($user['username']) ?>
    </div>

    <div class="profile-row">
        <strong>Full Name:</strong>
        <?= esc($user['full_name']) ?>
    </div>

    <div class="profile-row">
        <strong>Email:</strong>
        <?= esc($user['email']) ?>
    </div>

    <div class="profile-row">
        <strong>Account Created:</strong>
        <?= esc($user['created_at']) ?>
    </div>
</div>

<?php endif; ?>