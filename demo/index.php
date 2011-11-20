<?

$pages = array(
    array(  
        'url'               =>  '/',
        'title'             =>  'Hoist',
        'content'           =>  'pages/home.php',
        'groups'            =>  'header_nav'
    ),
    array(
        'url'               =>  '/examples',
        'title'             =>  'Examples',
        'content'           =>  'pages/home.php',
        'groups'            =>  'header_nav'
    ),
    array(
        'url'               =>  '/pages',
        'title'             =>  'Pages',
        'groups'            =>  'pages/pages.php'
    ),
    array(
        'url'               =>  '/groups',
        'title'             =>  'Groups',
        'groups'            =>  'pages/groups.php'
    ),

);

require 'hoist.php';
$hoist = new hoist($pages);
$hoist->display();