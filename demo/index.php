<?

$pages = array(
    array(  
        'url'       =>  '/',
        'title'     =>  'Hoist',
        'content'   =>  'pages/home.php',
        'groups'    =>  'nav',
        'nav_title' =>  'Overview',
        'headline'  =>  'Build simple websites fast.'
    ),
    array(
        'url'       =>  '/guide',
        'content'   =>  'pages/guide.php',
        'groups'    =>  'nav'
    ),
    array(
        'url'       =>  '/get_it',
        'content'   =>  'pages/get_it.php',
        'groups'    =>  'nav'
    )
);

require 'hoist.php';
$hoist = new hoist($pages);
$hoist->display();