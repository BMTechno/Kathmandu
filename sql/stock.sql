CREATE TABLE /*TABLE_PREFIX*/t_nc_stock_in_hand (
	pk_i_item_id INT(10) NOT NULL,
	sih_quantity INT(10) NOT NULL,
	stock_object BOOLEAN,

	PRIMARY KEY (pk_i_item_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';