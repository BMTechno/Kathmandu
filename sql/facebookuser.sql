CREATE TABLE /*TABLE_PREFIX*/t_nc_facebook_user (
    fk_i_user_id VARCHAR(100) NOT NULL,
    facebook_user_id VARCHAR(100) NOT NULL,
    
     PRIMARY KEY (fk_i_user_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
