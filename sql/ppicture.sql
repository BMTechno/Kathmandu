CREATE TABLE /*TABLE_PREFIX*/t_nc_profile_picture (
    pk_i_id INT NOT NULL,
    fk_user_id INT NOT NULL,
    pic_ext VARCHAR(10),
    
     PRIMARY KEY (pk_i_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
