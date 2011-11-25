

<p>
    Hoist is a lightweight system for building small websites with PHP. It makes your job ridiculously easy.
</p>
<p>
    How easy? <a href="https://github.com/wlrs/hoist/tree/master/demo">Look at the code that powers this site</a>:
</p>

<pre class="prettyprint">
<? 
    $code = file_get_contents('index.php');
    $code = preg_replace("/^<\?\s+/" , '', $code);
    echo htmlentities($code);
?>
</pre>

<p>
    <a href="https://github.com/wlrs/hoist">Get the code on Github</a> and <a href="/guide">consult the guide</a>. You can have a site running with Hoist in minutes.
</p>

<p>
    Hoist is 
</p>