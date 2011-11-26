## Hoist

Hoist is a tiny PHP class that makes it ridiculously easy to build small websites.

### Example

    $pages = array(
        array(  
            'url'       =>  '/',
            'title'     =>  'My Website',
            'content'   =>  'pages/home.php',
            'groups'    =>  'nav',
            'nav_title' =>  'Home',
            'headline'  =>  'Welcome to my site!'
        ),
        array(
            'url'       =>  '/about_me',
            'content'   =>  'pages/about.php',
            'groups'    =>  'nav'
        ),
        array(
            'url'       =>  '/books',
            'content'   =>  'pages/books.php',
            'title'     =>  'My Favorite Books'
        )
    );

    require 'hoist.php';
    $hoist = new hoist($pages);
    $hoist->display();


### Demo

[hoistup.com](http://hoistup.com) is running on Hoist. You can view the source in this project.

### Docs

[Hoist guide](http://hoistup.com/guide)