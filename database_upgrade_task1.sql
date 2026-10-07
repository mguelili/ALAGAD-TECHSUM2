-- Run this once against the existing tasks_today_db database.
ALTER TABLE `users` ADD COLUMN `password` varchar(255) NOT NULL DEFAULT '' AFTER `email`;
ALTER TABLE `tasks` ADD COLUMN `is_archived` tinyint(1) NOT NULL DEFAULT 0 AFTER `created_at`;
UPDATE `users` SET `password` = '$2y$12$BrGoptVlgSUFO/C..yCYJ.eq8g4/QAPvj7kB5sa29fL4AICd3.UsK' WHERE `username` = 'ferrence';
