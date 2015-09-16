CREATE TABLE /*TABLE_PREFIX*/t_nc_customer_testimonial (
    pk_testimonial_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    testimonial_title TEXT NOT NULL,
    testimonial_message TEXT NOT NULL,
    testimonial_image VARCHAR(256),    
    PRIMARY KEY (pk_testimonial_id)
) ENGINE=InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';
