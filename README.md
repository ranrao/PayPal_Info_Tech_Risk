
* README - PP_RISK APPLICATION
*******************************

The PP_RISK application is based on the Model-View-Controller development pattern. It is built using PIP, an open-source application development framework similar to CodeIgniter for people who build web sites using PHP. The framework has a small footprint with broad compatibility and requires nearly zero configuration.

In PP_RISK application, the MVC software approach permits the web pages to contain minimal scripting since the presentation is separate from the PHP scripting.
The Model represents the data structures. It contains functions that help retrieve information from various views in archer database.
The View folder contains information that is being presented. We have 2 views in this application, heatmap_view and scorecard_view. Views are almost always loaded by Controllers.
The Controller serves as an intermediary between the Model, the View, and any other resources needed to process the HTTP request and generate a web page.


Folder Structure
*************
1. Application:  All the PP_RISK application specific files go in the "application" folder.  Inside the application folder there are folders for all of the specific application entities:

config
controllers
models
views

When PP_RISK loads files it assumes they are in the corresponding folders. So, the files should be in the correct folders.

-- Config: All the application global variables and database settings are setup in the config file. All the steps to connect to the database is done automatically. For this to work database details must be provided in config.php:

$config['db_host'] = ''; // Database host (e.g. localhost)
$config['db_name'] = ''; // Database name
$config['db_username'] = ''; // Database username
$config['db_password'] = ''; // Database password

-- Controllers: Controllers are the driving force of a PP_RISK application. As seen in the URL structure, segments of the URL are mapped to a class and function. These classes are controllers stored in the "application/controller" directory. For example, the URL...

http://10.249.56.184/pp_risk/heatmap/infosec
...would map to the following Controller with the filename heatmap.php and function infosec().

-- Models: In PP_RISK, models are classes whose sole responsibility it is to deal with data from the archer database. There are several functions to retrieve heatmap and scorecard information from the database.

-- Views: View is simply a web page and are almost always loaded by the appropriate Controllers. 

2. Static: The "static" folder in the root contains all static resource files (CSS, JS etc.). The BASE_URL variable config file can be set to help include files in your HTML. For example:

<link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/style.css" type="text/css" media="screen" />

3. System: The PIP framework code is in the system folder can contained PIP framework information that can be ignored. Please DO NOT TOUCH it unless you need to do framework changes.

URL Structure
***********

By default, URLs in PP_RISK are designed to be search-engine and human friendly. Rather than using the standard "query string" approach to URLs that is synonymous with dynamic systems, it uses a segment-based approach:

http://10.249.56.184/pp_risk/heatmap/infosec

By default index.php is hidden in the URL. This is done using the .htaccess file in the root directory.

NOTES:
******
1. .htaccess: It is important to ensure that the .htaccess file in the PP_RISK directory is always included and not missing. It is a directory-level configuration file that includes the rule-set for mod_rewrite module.

2. mod-rewrite: It should be enabled in Apache configuration. It provides a flexible and powerful way to manipulate URLs. No query string approach is used to map the get requests for a cleaner approach.

3. JSON: Please do ensure that the PHP version is JSON compatible. There a few Ajax calls that uses JSON for information exchange. 

4. PHP Version: The current PHP version that PP_RISK works as expected is PHP-5.3.10.
