<!doctype html>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->

    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title><?=$page['title']?></title>

        <link href="/style.css" rel="stylesheet">
        <link href="/prettify.css" rel="stylesheet">

        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body lang="en">

        <div id="header_logo">
            <h1><a class="brand" href="/">Hoist</a></h1>
        </div>

        <ul id="nav">
            <? foreach($hoist->groups['nav'] as $link){ ?>
                <li<? if ($link['active']) echo ' class="active"'; ?>><a href="<?= $link['url'] ?>"><?= $link['title'] ?></a></li>
            <? } ?>
        </ul>

   
    <? /*
        <div id="page_title">
            <h2><?=$page['headline']?></h2>
        </div>
        */
    ?>

        <div id="content">