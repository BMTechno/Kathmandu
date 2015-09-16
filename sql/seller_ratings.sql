CREATE TABLE /*TABLE_PREFIX*/t_nc_seller_ratings (
    pk_i_seller_id INT(10) UNSIGNED NOT NULL,
    pk_i_user_id INT(10) UNSIGNED NOT NULL,
    vote_given INT(10),
    
     PRIMARY KEY (pk_i_seller_id, pk_i_user_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
