CREATE TABLE /*TABLE_PREFIX*/t_nc_websms (
    pk_ws_token VARCHAR(100) NOT NULL,
    ws_signature VARCHAR(100) NOT NULL,
    ws_server VARCHAR(200) NOT NULL,
    ws_status BOOLEAN,
    
    PRIMARY KEY (pk_ws_token)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
