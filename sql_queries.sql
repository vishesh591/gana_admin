ALTER TABLE `users` ADD `role_type` ENUM('Super Admin','Admin','User') NOT NULL AFTER `password`;
ALTER TABLE `users` ADD `parent_id` INT NULL DEFAULT NULL AFTER `role_type`;
ALTER TABLE `users` CHANGE `role_type` `role_type` ENUM('User','Admin','Super Admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

CREATE TABLE `g_release` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `title` VARCHAR(255) NULL , 
    `label_name` VARCHAR(255) NULL , 
    `artist_ids` VARCHAR(255) NULL , 
    `featuring_artist_ids` VARCHAR(255) NULL , 
    `release_type` VARCHAR(255) NULL , 
    `mood_type` VARCHAR(255) NULL , 
    `genre_tpe` VARCHAR(255) NULL , 
    `upc_ean` VARCHAR(255) NULL , 
    `language` VARCHAR(255) NULL , 
    `artwork` VARCHAR(255) NULL , 
    `track_title` VARCHAR(255) NULL , 
    `secondary_track_type` VARCHAR(255) NULL , 
    `instrumental` ENUM('No','Yes') NOT NULL DEFAULT 'No' , 
    `isrc` VARCHAR(255) NULL , 
    `author` VARCHAR(255) NULL , 
    `composer` VARCHAR(255) NULL , 
    `remixer` VARCHAR(255) NULL , 
    `arranger` VARCHAR(255) NULL , 
    `music_producer` VARCHAR(255) NULL , 
    `publisher` VARCHAR(255) NULL , 
    `c_line_year` VARCHAR(255) NULL , 
    `c_line` VARCHAR(255) NULL , 
    `p_line_year` VARCHAR(255) NULL , 
    `p_line` VARCHAR(255) NULL , 
    `production_year` VARCHAR(255) NULL , 
    `track_title_language` VARCHAR(255) NULL , 
    `explicit_song` ENUM('NA','Yes','No') NULL , 
    `lyrics` TEXT NULL , 
    `audio_file` VARCHAR(255) NULL , 
    `stores_ids` VARCHAR(255) NULL , 
    `rights_management_options` VARCHAR(255) NULL , 
    `release_date` VARCHAR(255) NULL , 
    `pre_sale_date` VARCHAR(255) NULL , 
    `original_release_date` VARCHAR(255) NULL , 
    `release_price` VARCHAR(255) NULL , 
    `sale_price` VARCHAR(255) NULL , 
    `t_and_c` TEXT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `g_artists` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `user_id` INT NOT NULL , 
    `artlist_name` VARCHAR(255) NOT NULL , 
    `spotify_id` VARCHAR(255) NULL , 
    `apple_id` VARCHAR(255) NULL , 
    `profile_image` VARCHAR(255) NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `g_labels` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `user_id` INT NOT NULL , 
    `label_name` VARCHAR(255) NOT NULL , 
    `primary_label` VARCHAR(255) NULL , 
    `profile_image` VARCHAR(255) NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

ALTER TABLE `g_users` CHANGE 
`role_type` `role_type` ENUM('Artist','Label','Sub Admin','Super Admin') 
CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

ALTER TABLE `g_labels` 
ADD `created_at` DATETIME NULL AFTER `profile_image`, 
ADD `updated_at` DATETIME NULL AFTER `created_at`, 
ADD `deleted_at` DATETIME NULL AFTER `updated_at`;

ALTER TABLE `g_users` ADD `status` TINYINT NOT NULL DEFAULT '1' AFTER `parent_id`;