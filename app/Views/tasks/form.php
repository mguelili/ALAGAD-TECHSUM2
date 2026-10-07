<h1><?= esc($title) ?></h1>
<?php foreach(($errors??[]) as $error): ?><p class="notice error"><?= esc($error) ?></p><?php endforeach ?>
<form method="post" action="<?= esc($action) ?>"><?= csrf_field() ?>
<label>Title<input name="title" maxlength="150" required value="<?= esc($task['title']??'') ?>"></label>
<label>Date<input type="date" name="task_date" required value="<?= esc($task['task_date']??'') ?>"></label>
<label>Status<select name="status" required><?php foreach(['pending'=>'Pending','in progress'=>'In Progress','completed'=>'Completed'] as $key=>$label): ?><option value="<?= esc($key) ?>" <?= ($task['status']??'pending')===$key?'selected':'' ?>><?= esc($label) ?></option><?php endforeach ?></select></label>
<button type="submit"><?= esc($button) ?></button> <a href="<?= site_url('tasks') ?>">Cancel</a></form>
