<p>
    Hoist is just a simple PHP class that automates the most tedious parts of putting together a simple site. A site built with Hoist is made up of these elements:
        <ul>
            <li>A header and footer template</li>
            <li>A PHP or HTML file for each page</li>
            <li>An array of arrays describing each page</li>
            <li>An index.php script that receives requests</li>

        </ul>
</p>



<h3>Header and footer</h3>

<p>
    Your header and footer are the bread in your HTML sandwich. They should contain everything that goes above and below the content.    
</p>

<p>
    You can use the $page array to get the title and other information about the current page, and the $hoist object to get other info about your site.
</p>

<p>
    By default Hoist will use header.php and footer.php, but you can set it to something else:
</p>

<pre class="prettyprint">
$hoist = new hoist($pages);
$hoist->header = 'my_weird_header.php';
$hoist->footer = 'footers/footer2.php';
$hoist->display();
</pre>

<p>
    Examples from this site: <a href="https://github.com/wlrs/hoist/blob/master/demo/header.php">header.php</a>, <a href="https://github.com/wlrs/hoist/blob/master/demo/footer.php">footer.php</a>
</p>


<h3>Content pages</h3>

<p>
    Each page should have a corresponding PHP or HTML file that contains (or generates) your content. You can use the $page and $hoist objects here too.
</p>

<p>
    Example from this site: <a href="https://github.com/wlrs/hoist/blob/master/demo/pages/home.php">home.php</a>
</p>


<h3>Page array</h3>

<p>
    This is an array of arrays that tells Hoist about every page on your site. It will look something like this:
</p>

<pre class="prettyprint">
<?
    $code = file_get_contents('index.php');
    if(preg_match("/pages =([^;]+)/m", $code, $matches)){
        echo "\$pages = ";
        echo htmlentities($matches[1]);
        echo ";";
    }
?>
</pre>

<p>
    Let's look at the fields that make up each page array.
</p>

<h4>'url' <span class="required_field">required</span></h4>

<p>
    The url where this page will live. This should include everything after 'http://mysite.com', so your home page should be '/'.
</p>

<h4>'content' <span class="required_field">required</span></h4>

<p>
    The PHP or HTML content file for this page. Path is relative to your index.php.
</p>


<h4>'title'</h4>

<p>
    The title of this page, generally used in the header's &lt;title&gt; tag. If this doesn't exist Hoist will generate a title based on the url.
</p>


<h4>'headline'</h4>

<p>
    Another title for this page. This is generally used as an &lt;h2&gt; tag in the header. If this doesn't exist Hoist will use the 'title' field.
</p>


<h4>'groups'</h4>

<p>
    A string (if this page is only in 1 group) or array of strings indicating groups this page belongs to. This is useful for creating menus or displaying lists of links.
</p>

<p>
    For instance, on this site the three main pages belong to the 'nav' group. This pages are stored in the $hoist object in an array at $hoist->groups['nav'].The header contains this code which generates the main header navigation:
</p>

<pre class="prettyprint">
&lt;ul id=&quot;nav&quot;&gt;
    &lt;? foreach($hoist-&gt;groups[&#x27;nav&#x27;] as $link){ ?&gt;
        &lt;li&lt;? if ($link[&#x27;active&#x27;]) echo &#x27; class=&quot;active&quot;&#x27;; ?&gt;&gt;&lt;a href=&quot;&lt;?= $link[&#x27;url&#x27;] ?&gt;&quot;&gt;&lt;?= $link[&#x27;title&#x27;] ?&gt;&lt;/a&gt;&lt;/li&gt;
    &lt;? } ?&gt;
&lt;/ul&gt;
</pre>

<p>
    Each page can also have a title for each specific group. To set the page's title for the 'nav' group, just use the field 'nav_title'. This will be used as the 'title' field for the page stored in $hoist->groups['nav'].
</p>


<h4>'override'</h4>

<p>
    If true, the header and footer will not be displayed for this page. Useful for content that is loaded via AJAX or for pages that depart completely from the standard layout.
</p>


<h3>index.php</h3>

<p>
    Your index.php receives all the requests for pages, sets up the Hoist object and then displays the appropriate page. Once you've defined your page array, it's as simple as this:
</p>

<pre class="prettyprint">
$hoist = new hoist($pages);
$hoist->display();
</pre>

<p>
    In order for your index.php to receive requests for all the fancy URLs you're setting up, we need your web server to route requests for missing files to it. Here's an Apache .htaccess file that should get the job done:
</p>

<pre class="prettyprint">
<?
    $code = file_get_contents('.htaccess');
    echo htmlentities($code);
?>
</pre>

<p>
    And if you're using nginx it's even easier:
</p>

<pre class="prettyprint">
if (!-e $request_filename) {
    rewrite . /index.php last;
}
</pre>              