<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=$page['title']?></title>
    
    <link href="/bootstrap.1.4.0.min.css" rel="stylesheet">
    <!--
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    -->
  </head>

  <body>

      <div class="topbar">
      <div class="topbar-inner">
        <div class="container">
          <a class="brand" href="/">Hoist</a>
          <ul class="nav">
            <? foreach($this->groups['header_nav'] as $link){ ?>
                <li<? if ($link['active']) echo ' class="active"'; ?>><a href="<?= $link['url'] ?>"><?= $link['title'] ?></a></li>    
            <? } ?>
          </ul>
        </div>
      </div>
    </div>

    <h2><?=$page['title']?></h2>