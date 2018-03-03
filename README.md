# Intimacy
Integer manipulation calculator 

#Deployment instruction

1. Unzip the package.
2. Upload all folders and files to your server.
3. Your index.php file needs to be accessible from a browser, so that should go in your public_html folder.
4. Move application and system folders above the web root.

-/home/site_name
 -public_html
  -index.html
  -.htaccess
  -system
 -application

5. Within index.php you'll need to update $system_path and $application_folder to reflect the location and name of your system and application folders. 
You can use an absolute path or a relative path. Relative path shown below:

$system_path = '../../system'.
$application_folder = '../../application'.

6. Open the application/config/config.php file with a text editor and set your base URL
