<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>Craigslist OPML Exporter | benrasmusen.com</title>
		<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="main styles" charset="utf-8">
		<script type="text/javascript" src="javascript/mootools.js" charset="utf-8"></script>
		<script type="text/javascript" src="javascript/functions.js" charset="utf-8"></script>
	</head>
	<body id="main">
		<div id="wrapper">
			<h1>Craigslist OPML Exporter</h1>
			<p class="help_text">I wanted to grab an RSS feed from every city in the USA for the computer gigs postings.  Since most of these jobs were telecommute it didn't matter where the job actually was and this allowed me to peruse all of craigslist.org with ease.  You can use it to track any query you'd like.</p>
			<form action="process.php" method="post" accept-charset="utf-8" id="createOPML">
				<p><label for="url">Cities URL: </label><input type="text" name="url" value="<?php echo (!isset($_POST['url'])) ? 'http://geo.craigslist.org/iso/us' : $_POST['url'] ?>" size="30" id="url"></p>
				<div class="help_text">
					<p>This should be the url of all the cities you want to import (the default url is all USA cities).</p>
				</div>
				<hr/>
				<p><label for="search_string">Search String:</label> <input type="input" name="search_string" value="<?php echo (!isset($_POST['search_string'])) ? 'cpg/' : $_POST['search_string'] ?>" size="30" id="search"></p>
				<div class="help_text">
					<p>This should be the end of the url for the specific type of feed you're looking for (the default is all computer gigs listings).</p>
					<p><strong>Example:</strong></p>
					<ul>
						<li><strong>If the URL is:</strong> http://cosprings.craigslist.org/search/apa?query=&minAsk=min&maxAsk=1300&bedrooms=3</li>
						<li><strong>Enter this search string:</strong> search/apa?query=&minAsk=min&maxAsk=1300&bedrooms=3</li>
					</ul>
				</div>
				<hr/>
				<p id="ajax-loading"><input type="submit" value="Retrieve &rarr;"></p>
			</form>
			<div id="download_file"></div>
			
			<hr/>
			<p>I no longer do any ongoing development for this project, I have released it under the <a href="http://www.opensource.org/licenses/mit-license.php" title="Open Source Initiative OSI - The MIT License:Licensing | Open Source Initiative">MIT License</a> on <a href="http://code.google.com/p/craigslist-opml-exporter/" title="craigslist-opml-exporter - Google Code">Google Code</a>. If this project was of interest to you please check out the rest of <a href="http://benrasmusen.com" title="benrasmusen.com">benrasmusen.com</a>.</p>
		</div>
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		var pageTracker = _gat._getTracker("UA-273436-2");
		pageTracker._initData();
		pageTracker._trackPageview();
		</script>
	</body>
</html>