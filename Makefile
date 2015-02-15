migrate:
	@mysql -u root -e "drop database demo_dev"
	@mysql -u root -e "create database demo_dev"
	@clips phinx migrate
