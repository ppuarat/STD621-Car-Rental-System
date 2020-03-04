CREATE USER 'crs_app'@'%';
FLUSH PRIVILEGES;


ALTER USER 'crs_app'@'' IDENTIFIED BY 'phpphpphp';

GRANT Usage ON *.* TO 'crs_app'@'';
GRANT Alter ON std621.* TO 'crs_app'@'';
GRANT Index ON std621.* TO 'crs_app'@'';
GRANT Insert ON std621.* TO 'crs_app'@'';
GRANT Select ON std621.* TO 'crs_app'@'';
GRANT References ON std621.* TO 'crs_app'@'';
GRANT Show view ON std621.* TO 'crs_app'@'';
GRANT Trigger ON std621.* TO 'crs_app'@'';
GRANT Update ON std621.* TO 'crs_app'@'';
FLUSH PRIVILEGES;
