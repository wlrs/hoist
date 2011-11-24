<?

$pages = array(
    array(  
        'url'               =>  '/',
        'title'             =>  'Hoist',
        'content'           =>  'pages/home.php',
        'groups'            =>  'header_nav',
        'header_nav_title'  =>  'Overview'
    ),
    array(
        'url'               =>  '/examples',
        'title'             =>  'Examples',
        'content'           =>  'pages/examples.php',
        'groups'            =>  'header_nav'
    ),
    array(
        'url'               =>  '/pages',
        'title'             =>  'Pages',
        'content'           =>  'pages/pages.php'
    ),
    array(
        'url'               =>  '/groups',
        'title'             =>  'Groups',
        'content'           =>  'pages/groups.php'
    )
);

require 'hoist.php';
$hoist = new hoist($pages);
$hoist->display();