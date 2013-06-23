<?php
	$opml_file_name = "";
	if (!empty($_POST)) {
		
		$url = $_POST['url'];
		$search_string = htmlentities($_POST['search_string']);
		
		$ch = curl_init();
		$timeout = 5; // set to zero for no timeout
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file = curl_exec($ch);
		curl_close($ch);
		
		//retrieve all the cities the user wants to search in by extracting them from the screen scrape
		preg_match_all("/<a href\=\"http:\/\/(.*)\.craigslist.(.*)\/\">(.*)<\/a>/", $file, $matches);

		//see what kind of url they are passing for the search
		$position = 0;
		$position = strpos($search_string, '=');
		
		$suffix = ($position > 0) ? '&amp;format=rss' : 'index.rss';
		
		//setup the opml file
		$opml  = '<?xml version="1.0" encoding="UTF-8"?><opml version="1.0"><head><title>Craigslist.org Ads OPML Export</title></head><body>';
		$opml .= '<outline text="craigslist ads opml export">';
		foreach ($matches[1] as $key => $city) {
			$opml .= '<outline text="craigslist | in '.$city.'" ';
	        $opml .= 'title="craigslist | in '.$city.'" type="rss" ';
			$opml .= 'xmlUrl="http://'.$city.'.craigslist.'.$matches[2][$key].'/'.$search_string.$suffix.'" htmlUrl="http://'.$city.'.craigslist.org/'.$search_string.'"/>';
		}
		$opml .= '</outline></body></opml>';
		$opml_file_name = "craigslist_opml_".time().".xml";
		$opml_file = fopen('./opml/'.$opml_file_name, 'w');
		fwrite($opml_file, $opml);

		// clean up old files
		$files = glob('./opml/*.xml');
		foreach($files as $file) {
			if(is_file($file) && time() - filemtime($file) >= 24*60*60) { // 1 day
				unlink($file);
			}
		}

		echo '<div id="download_file">
			<p class="donwload_file"><a href="opml/'.$opml_file_name.'">Download OPML File (right click and save as)</a></p>
			<p class="validation_image"><a href="http://validator.opml.org/?url=http%3A%2F%2Fwww.benrasmusen.com%2Fclexporter%2Fopml%2F'.$opml_file_name.'"><img src="http://images.scripting.com/archiveScriptingCom/2005/10/31/valid3.gif" width="114" height="20" border="0" alt="OPML checked by validator.opml.org."></a></p>
		</div>';
	}
?>