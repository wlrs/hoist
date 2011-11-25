<p>
    Hoist is just a simple PHP class that automates the most tedious parts of putting together a simple site. A site built with Hoist is made up of these elements:
        <ul>
            <li>A header and footer template</li>
            <li>A PHP or HTML file for each page</li>
            <li>An array of page arrays describing each page</li>
            <li>An index.php script that receives requests</li>

        </ul>
</p>



<h3>Header and footer</h3>

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