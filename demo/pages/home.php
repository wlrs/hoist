<h2>Build simple websites fast.</h2>

<p>Hoist is a ridiculously simple system for building websites with PHP. How simple? Look at the code that powers this site:</p>

<pre class="prettyprint">
<? 
    $code = file_get_contents('index.php');
    $code = preg_replace("/^<\?\s+/" , '', $code);
    echo htmlentities($code); 

?>
</pre>