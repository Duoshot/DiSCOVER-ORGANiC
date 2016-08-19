# DiSCOVER ORGANiC
A website showcasing a database for organic and health food stores.

## TO GET RUNNING:
### First option - Running locally:
1. Make sure you have a local webserver, PHP 5.3 or greater, and mySQL (we used WAMP to bundle all of this)
2. Create a new database called 'manoriev_discover-organic' and import the database state provided in 'manoriev_discover-organic.sql'
  * For this and any subsequent steps, we used phpMyAdmin for importing, creating DBs, users, etc.
3. Create a mySQL user with the username 'manoriev_root' and password 'D!5cover0rganic'
  * Make sure the user has all available privileges for the previously created DB
4. With the webserver running, upload all source files provided to the relevant 'www' or 'public_html' directory
5. Visit http://localhost/index.php for the main user-facing page, or http://localhost/index2.html for the poweruser page (NOTE: less user friendly)

### Second option - Running off server:
1. Visit http://manorievachon.com
2. You should be prompted by basic http authentication; enter username 'root' and password 'D!5cover0rganic'
3. You should be redirected to the main page. As with locally, visit http://manorievachon.com/index2.html for poweruser page
