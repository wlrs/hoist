<h2 class='home'><?=$page['headline']?></h2>

<p>
    Hoist is a lightweight system that makes it ridiculously easy to build small websites with PHP.
</p>

<p>
    How easy? <a href="https://github.com/wlrs/hoist/blob/master/demo/index.php">Look at the actual code that powers this site</a>:
</p>

<pre class="prettyprint">
<? 
    $code = file_get_contents('index.php');
    $code = preg_replace("/^<\?\s+/" , '', $code);
    echo htmlentities($code);
?>
</pre>

<p>
    Hoist minimizes the pain of setting up templates and nice URLs and allows you to worry about the important stuff like content and layout.
</p>

<p>
    <a href="https://github.com/wlrs/hoist">Get the code on Github</a> and <a href="/guide">consult the guide</a>. You can have a site running with Hoist in minutes.
</p>