CREATE TABLE /*TABLE_PREFIX*/t_nc_paypal (
    pk_pp_username VARCHAR(100) NOT NULL,
    pp_password VARCHAR(100) NOT NULL,
    pp_signature VARCHAR(100) NOT NULL,
    pp_server VARCHAR(200) NOT NULL,
    pp_status BOOLEAN,
    
     PRIMARY KEY (pk_pp_username)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
