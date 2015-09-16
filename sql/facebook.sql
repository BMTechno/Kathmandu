CREATE TABLE /*TABLE_PREFIX*/t_nc_facebook (
    pk_fb_api_id VARCHAR(100) NOT NULL,
    fb_api_secret VARCHAR(100) NOT NULL,
    fb_connection VARCHAR(100) NOT NULL,
    fb_status BOOLEAN,
    
     PRIMARY KEY (pk_fb_api_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
