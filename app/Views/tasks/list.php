<h1>Complete Task List</h1>

<p class="subtitle">
    All tasks are displayed below and ordered by task date.
</p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Task Title</th>
            <th>Status</th>
            <th>Task Date</th>
            <th>Created At</th><?php if(session()->get('logged_in')): ?><th>Actions</th><?php endif ?>
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
                <td><?= esc($task['created_at']) ?></td><?php if(session()->get('logged_in')): ?><td><a href="<?= site_url('tasks/'.$task['id'].'/edit') ?>">Edit</a> <form method="post" action="<?= site_url('tasks/'.$task['id'].'/delete') ?>" style="display:inline" onsubmit="return confirm('Archive this task?')"><?= csrf_field() ?><button type="submit">Archive</button></form></td><?php endif ?>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>