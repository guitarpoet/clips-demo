test:
	phpunit
migrate:
	@mysql -u root -e "drop database if exists demo_dev"
	@mysql -u root -e "create database demo_dev"
	@clips phinx migrate
c:
	@mysql -u root demo_dev
