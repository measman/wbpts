# wbpts
Web based Projection Transformation System

Introduction
1.1	Overview
The web based projection transformation system is web tool which enables to transform one projection system to another defined projection system of vector file like shapefile. 
 It can be available in web browser like Google chrome, Mozilla Firefox, Internet explorer etc.
1.2	Goals and Objectives
The main objective of this project is to allow users to transform vector data from one projection system to another projection system.

1.3	Scope
This system will provide users with the ability to transform projection one shape file at a time.














Fig: Data Flowchart

1.4	Used Technologies

Web Server: Apache
Language: PHP, HTML, Javascript/JQuery/AJAX
Database: Postgresql with PostGIS
Tool used: shp2pgsql and pgsql2shp
Data Supported: Shapefile

1.5	To Setup the shp2pgsql and pgsql2shp:
First run the following command in cmd.
“psql –username postgres”
if it doesn’t run then set the below value to the environment variable ‘PATH’.
“C:\Program Files\PostgreSQL\9.3\bin” (For windows 7)
And type pgsql2shp in cmd and hit enter. It should display the usage and option available of given command.
NOTE: PHP ver 5.2 or above should be used to work these two tools in web platform.
That’s it.

1.6	To Setup projection parameter in PostGIS Database

1)	Open PgAdmin  and create a database to store the data.  
create database  ‘dbname’;
2)	Enable the postgis extension on the database.
create extension postgis;
3)	Insert all the projection parameter to the table ‘spatial_ref_sys’ which appears after the enabling the postgis extension. For example inserting projection parameter WGS84 UTM zone 45N to database table.

INSERT into spatial_ref_sys (srid, auth_name, auth_srid, proj4text, srtext) values ( 932645, 'epsg', 32645, '+proj=utm +zone=45 +ellps=WGS84 +datum=WGS84 +units=m +no_defs ', 'PROJCS["WGS 84 / UTM zone 45N",GEOGCS["WGS 84",DATUM["WGS_1984",SPHEROID["WGS 84",6378137,298.257223563,AUTHORITY["EPSG","7030"]],AUTHORITY["EPSG","6326"]],PRIMEM["Greenwich",0,AUTHORITY["EPSG","8901"]],UNIT["degree",0.01745329251994328,AUTHORITY["EPSG","9122"]],AUTHORITY["EPSG","4326"]],UNIT["metre",1,AUTHORITY["EPSG","9001"]],PROJECTION["Transverse_Mercator"],PARAMETER["latitude_of_origin",0],PARAMETER["central_meridian",87],PARAMETER["scale_factor",0.9996],PARAMETER["false_easting",500000],PARAMETER["false_northing",0],AUTHORITY["EPSG","32645"],AXIS["Easting",EAST],AXIS["Northing",NORTH]]');







QGIS Coordinate systems and Projections

WGS 84
+proj=longlat +datum=WGS84 +no_defs
EPSG:4326

WGS 84 / UTM zone 44N
+proj=utm +zone=44 +datum=WGS84 +units=m +no_defs
EPSG:432644

WGS 84 / UTM zone 45N
+proj=utm +zone=45 +datum=WGS84 +units=m +no_defs
EPSG:32645
--------------------------------------------------------------------------------
Unknown datum based upon the Everest (1830 Definition) ellipsoid
+proj=longlat +a=6377299.36559538 +b=6356098.359005156 +no_defs
EPGS:4042

Everest 1830 
+proj=longlat +a=6377299.36559538 +b=6356098.359005156 +towgs84=296.2,731.5,273,0,0,0,0 +no_defs
USER:100006

Everest_1830 / MUTM _81
+proj=tmerc +lat_0=0 +lon_0=81 +k=0.9999 +x_0=500000 +y_0=0 +a=6377299.36559538 +b=6356098.359005156 +towgs84=296.2,731.5,273,0,0,0,0 +units=m +no_defs
USER:100000

Everest_1830 / MUTM _84
+proj=tmerc +lat_0=0 +lon_0=84 +k=0.9999 +x_0=500000 +y_0=0 +a=6377299.36559538 +b=6356098.359005156 +towgs84=296.2,731.5,273,0,0,0,0 +units=m +no_defs
USER:100003

Everest_1830 / MUTM _87
+proj=tmerc +lat_0=0 +lon_0=87 +k=0.9999 +x_0=500000 +y_0=0 +a=6377299.36559538 +b=6356098.359005156 +towgs84=296.2,731.5,273,0,0,0,0 +units=m +no_defs
USER:10004
------------------------------------------------------------------------------------------------------------------
Unknown datum based upon the Everest 1830 (1937 Adjustment) ellipsoid
+proj=longlat +a=6377276.345 +b=6356075.41314024 +no_defs
EPGS:4015

Nepal Nagarkot
+proj=longlat +a=6377276.345 +b=6356075.41314024 +towgs84=282,726,254,0,0,0,0 +no_defs
USER:100005

Nepal_Nagarkot / MUTM _81
+proj=tmerc +lat_0=0 +lon_0=81 +k=0.9999 +x_0=500000 +y_0=0 +a=6377276.345 +b=6356075.41314024 +towgs84=282,726,254,0,0,0,0 +no_defs
USER:100007


Nepal_Nagarkot / MUTM _84
+proj=tmerc +lat_0=0 +lon_0=84 +k=0.9999 +x_0=500000 +y_0=0 +a=6377276.345 +b=6356075.41314024 +towgs84=282,726,254,0,0,0,0 +no_defs
USER:100008

Nepal_Nagarkot / MUTM _87
+proj=tmerc +lat_0=0 +lon_0=84 +k=0.9999 +x_0=500000 +y_0=0 +a=6377276.345 +b=6356075.41314024 +towgs84=282,726,254,0,0,0,0 +no_defs
USER:100009


