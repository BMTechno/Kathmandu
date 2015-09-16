CREATE TABLE /*TABLE_PREFIX*/t_nc_follow_seller (
    pk_seller_id INT UNSIGNED NOT NULL,
    pk_follower_id INT UNSIGNED NOT NULL,    
    PRIMARY KEY (pk_seller_id, pk_follower_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
