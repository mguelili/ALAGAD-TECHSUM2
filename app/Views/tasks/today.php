<h1>Today's Tasks</h1>

<?php if(session()->get('logged_in')): ?><p><a href="<?= site_url('tasks/new') ?>">+ New Task</a></p><?php endif ?><p class="subtitle">
    Tasks scheduled for <?= date('F d, Y', strtotime($today)) ?>
</p>

<?php if (empty($tasks)): ?>

    <p>No tasks are scheduled for today.</p>

<?php else: ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Task Title</th>
            <th>Status</th>
            <th>Task Date</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($tasks as $task): ?>
            <?php
                $statusClass = strtolower(
                    str_replace(' ', '-', $task['status'])
                );
            ?>

            <tr>
                <td><?= esc($task['id']) ?></td>
                <td><?= esc($task['title']) ?></td>
                <td>
                    <span class="status <?= esc($statusClass) ?>">
                        <?= esc(ucwords($task['status'])) ?>
                    </span>
                </td>
                <td><?= esc($task['task_date']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php endif; ?>