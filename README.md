DB data(database name and all other data is CASE SENSITIVE) is in core/ENV.php;
DB version Psql (PostgreSQL) 11.1;
Server Apache/2.4.34;

The DDL is in Migrations folder.

Sample files to Load are in XMLData Folder;

For the Front-end I used bootstrap/css3/html5

For the Back-end I use pure PHP. For tests PHPUnit.
Composer for autoloading.

To run the cronjobs use cron_jobs folder or command:
* * * * * cd /var/www/html/books_loader/vendor; /usr/bin/php /var/www/html/books_loader/cron_jobs/CronBooksLoader.php >> /tmp/php.log 2>&1

Currently it expects that path "/var/www/html/books_loader/vendor" and runs
every minute.