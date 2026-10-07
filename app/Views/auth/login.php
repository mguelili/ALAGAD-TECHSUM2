<h1>Staff Login</h1>
<?php if($message=session()->getFlashdata('error')): ?><p class="notice error"><?= esc($message) ?></p><?php endif ?>
<?php foreach(($errors??[]) as $error): ?><p class="notice error"><?= esc($error) ?></p><?php endforeach ?>
<form method="post" action="<?= site_url('login') ?>"><?= csrf_field() ?>
<label>Username<input name="username" maxlength="50" required value="<?= esc($username??'') ?>"></label>
<label>Password<input type="password" name="password" required></label><button type="submit">Log in</button>
</form>
