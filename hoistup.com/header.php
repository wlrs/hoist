<!doctype html>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->

    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title><?=$page['title']?><? if($page['url'] != '/') echo " | Hoist" ?></title>

        <? if($_SERVER['SERVER_NAME'] == 'hoistup.com'){ ?>
            <script type="text/javascript" src="http://use.typekit.com/qvc8urq.js"></script>
            <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <? } ?>

        <link href="/style.css" rel="stylesheet">

        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body lang="en">

        <div id="header">
            <div id="logo">
                <h1><a class="brand" href="/">Hoist</a></h1>
            </div>

            <ul id="nav">
                <? foreach($hoist->groups['nav'] as $link){ ?>
                    <li<? if ($link['active']) echo ' class="active"'; ?>><a href="<?= $link['url'] ?>"><?= $link['title'] ?></a></li>
                <? } ?>
            </ul>
        </div>
   
    <? /*

        //you would normally do something like this for page headlines:

        <div id="page_title">
            <h2><?=$page['headline']?></h2>
        </div>
        
        */
    ?>

        <div id="content">