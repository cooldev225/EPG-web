1. EPG damon installing
How to Install Webgraber+Plus on Linux Ubunto 18.04: 

1- You need to set a web server (apache2 or nginx) and sent the output of wg++ aka guide.xml 
 (you may want to compress first as gx or xz) to /var/www/html/epg /
then you can access it with http://myipaddress/epg/guide.xml or whatever you want to call it.

2- For daily update you can set in crontab a line exaample everyday at 2 at night:
0 2 * * * /home/ubuntu/Desktop/.wg++/run.sh

3- Installtion Steps: 
Check this link: http://webgrabplus.com/documentation/installation/linux

Note: 
just replace with new version step 4 as follow:
mono link here https://www.mono-project.com/download/stable/#download-lin


Requirements:

1- Able to get single or multi TV channel programs schedule and out format should be XMLTV format up to 7 days.
2- Able to get single or multi TV channel programs schedule in XML format and post it through URL up to 7 days.
3- Able to correct the time in the Admin dashboard.
4- Website to sell the EPG data (subscription-based)
5- Admin dashboard to monitor the users & subscriptions. (We can WHMCS billing if possible)
6- I will provide domain, so I can host the XMLTV file through URL for single or multi TV Channel or per country.
7- I will provide a VPS server in order to run the software/ script and crone job schedule to get the EPG data from websites/ sources.

Very Important Note:
Please submit your proposal only if you have done a similar project before.

Example for EPG website: https://epgguide.net/
Example for Grabber software:: http://www.webgrabplus.com/

https://www.osn.com/en-eg/watch/tv-schedule

Looking forward to hearing from you!
Thanks


Also, you can login to this Webgrab+Plus Forum for more info about the installation & people discussion:
User Avatar
http://webgrabplus.com/use

-----------------------------------------------------------------------------------------------
project is codeigniter3.2 version, database is mysql
