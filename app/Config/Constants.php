<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2_592_000);
defined('YEAR')   || define('YEAR', 31_536_000);
defined('DECADE') || define('DECADE', 315_360_000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_LOW instead.
 */
define('EVENT_PRIORITY_LOW', 200);

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_NORMAL instead.
 */
define('EVENT_PRIORITY_NORMAL', 100);

/**
 * @deprecated Use \CodeIgniter\Events\Events::PRIORITY_HIGH instead.
 */
define('EVENT_PRIORITY_HIGH', 10);

/*----------------------------------------------------------------------------*/
/* CUSTOM CONSTANT */
/*----------------------------------------------------------------------------*/

define('STORE_URL', 'https://store.deancoaryp.in/');
define('QUALIFICATION',['1'=>'UG','2'=>'PG','3'=>'Ph. D.']);
define('DEGREE',[
  '1'=>'M.Sc.',
  '2'=>'M.Sc.(Ag.)',
  '3'=>'M.Sc.(Hort.)',
  '4'=>'MBA(ABM)',
  '5'=>'Ph.D',
  '6'=>'Ph.D in Agriculture',
  '7'=>'Ph.D in Horticulture'
]);

define('SUBJECT',[
  '1'=>'Agri business and Rural Management',
  '2'=>'Agricultural Economics',
  '3'=>'Agricultural Extension',
  '4'=>'Agricultural Microbiology',
  '5'=>'Agricultural Statistics',
  '6'=>'Agrometeorology',
  '7'=>'Agronomy',
  '8'=>'Entomology',
  '9'=>'Floriculture and Landscape',
  '10'=>'Forestry',
  '11'=>'Fruit Science',
  '12'=>'Genetics and Plant Breeding',
  '13'=>'Plant Molecular Biology and Biotechnology',
  '14'=>'Plant Pathology',
  '15'=>'Plant Physiology',
  '16'=>'Soil Science and Agricultural Chemistry',
  '17'=>'Vegetable Science'
]);

define('FELLOWSHIP',['1'=>'ICAR - JRF','2'=>'ICAR - SRF','3'=>'ICAR - IF (International)']);
define('EMPLOYMENT_STATUS',['1'=>'Entrepreneur','2'=>'Service - Govt','3'=>'Service - Pvt','4'=>'Farmer','5'=>'Student']);
define('DEPARTMENT',[
  '1'=>'Administration',
  '2'=>'Marketing',
  '3'=>'Finance',
  '4'=>'Teaching',
  '5'=>'Research'
]);

define('_YEAR_',[
  '2000'=>'2000 - 01',
  '2001'=>'2001 - 02',
  '2002'=>'2002 - 03',
  '2003'=>'2003 - 04',
  '2004'=>'2004 - 05',
  '2005'=>'2005 - 06',
  '2006'=>'2006 - 07',
  '2007'=>'2007 - 08',
  '2008'=>'2008 - 09',
  '2009'=>'2009 - 10',
  '2010'=>'2010 - 11',
  '2011'=>'2011 - 12',
  '2012'=>'2012 - 13',
  '2013'=>'2013 - 14',
  '2014'=>'2014 - 15',
  '2015'=>'2015 - 16',
  '2016'=>'2016 - 17',
  '2017'=>'2017 - 18',
  '2018'=>'2018 - 19',
  '2019'=>'2019 - 20',
  '2020'=>'2020 - 21',
  '2021'=>'2021 - 22',
  '2022'=>'2022 - 23',
  '2023'=>'2023 - 24'

]);
