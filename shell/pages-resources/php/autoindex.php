<?php
/*

	TTG Core Elements autoindex v1.6 - 2011-05-08
		1.1 - fixed XML <thumbnail> support
		1.2 - added additional debugging output
		1.3 - recoded OS<->URL translation
		1.4 - fixed no thumbnail condition
		1.5 - recoded realpath linkages
		1.6 - add support for random image from user specified folder
	
	developed by john bishop images (http://johnbishopimages.com)
	for Matthew Campagna of the Turning Gate (http://theturninggate.net)
	
	Use:
		require "{filepath}autoindex.php";	// include this file - specify {filepath} if needed
		$result = autoindex({folder});		// invoke main function passing OS folder to be scanned
											// {folder} is optional and will default to './'
	
	Operation:
		all directories under {folder} will be scanned looking for an autoindex.xml file
		found autoindex.xml files will be parsed into an array
		the XML tag name sets the array key and the XML tag value sets the array value
		all XML tags found will be parsed into the array
		
	Output:
		$result = array();					returns array developed from autoindex.xml files
											will be empty if no autoindex.xml files are found
		$result['thumbnail']				either specified jpg, random jpg or 'nothumb.jpg'
		$result['title']					text string (usually specified in Lightroom)
		$result['description']				text string (usually specified in Lightroom)
		$result['url']						either specified target directory or
											directory where autoindex.xml is found (typically the gallery)
		$result['usertag1']					optional value of XMl <usertag1>, typically text;
											multiple user tag are supported
		
	autoindex.xml format:					tags noted * are required; tags noted - are optional
		<album>
		   <thumbnail></thumbnail>			* defaults to random jpg from ./{directory}/thumbnail/ folder
		   <title></title>					* album title [from Lightroom]
		   <description></description>		* album description [from Lightroom]
		   <url></url>						* defaults to ./{directory}/
		   <usertag1></usertag1>			- multiple optional user defined tags can be specified	
		</album>
		
	Notes:
		- <thumbnail> can be a full filepath/filename, a filepath only or omitted/blank
		- if no valid jpg is specified or can be found 'resources/images/nothumb.jpg' will be returned
		- if a user tag is not defined no array key/value pair will be defined
		- users should use isset() to determine in the optional array key/value pair is defined
	
*/

/*
	os_to_url subfunction
		turn absolute OS filepath into absolute URL filepath
			-$fp is an absolute OS filepath
*/
function os_to_url($_fp)
{
	$_fp = str_ireplace('\\', '/', $_fp);
	$_root = @realpath($_SERVER['DOCUMENT_ROOT']);
	$_rootlen = strlen($_root);
	$_urlpath = substr($_fp, $_rootlen);

	if (AUTOINDEX_DEBUG)
		{
			echo "OS Path = '".$_fp."' URL Path = '".$_urlpath."'<br />";
		}

	return $_urlpath;
}

/*
	autoindex_dir subfunction
		develops the XML defined array for one directory
			- $_dir is an absolute OS filepath
*/
function autoindex_dir($_dir)
{
	
	if (AUTOINDEX_DEBUG)
		{
			echo "Scanning '".$_dir."'<br />";
		}

	if (!file_exists($_dir.'/autoindex.xml')) return false;
	
	$data = @file_get_contents($_dir.'/autoindex.xml');
	if ($data === false) return false;
	
	// parse xml into usable structure
	$parser = xml_parser_create();
	xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
	xml_parse_into_struct($parser, $data, $vals);
	xml_parser_free($parser);
	
	$_xml = array();
	$i = 0;
	
	// restructure into simple record-type array
	for ($i=0; $i < count($vals); $i++)
		if ($vals[$i]['type'] == 'complete')
			$_xml[strtolower($vals[$i]['tag'])] = $vals[$i]['value'];

	// if no url is specified, link to the dir
	$_xml['url'] = ((!isset($_xml['url'])) or ($_xml['url'] == '')) ? os_to_url($_dir).'/' : $_xml['url'];
	
	// set default thumbnail filepath/filename
	$chosenimg = $_dir.'/'.$_xml['thumbnail'];
	if (AUTOINDEX_DEBUG)
	{
		echo "Thumbnail &lt;XML&gt; '".$_xml['thumbnail']."'<br />";
	}

	// if thumbnail filepath specified only, supply random image from this filepath
	if (substr(str_ireplace('\\', '/', $_xml['thumbnail']), -1, 1) == '/')
	{
		$_thumbdir = @realpath($_xml['thumbnail']);
		$_thumbdir = str_ireplace('\\', '/', $_thumbdir);
		
		if (AUTOINDEX_DEBUG)
		{
			echo "Scanning '".$_thumbdir."/*.jpg'<br />";
		}

		$chosenimg = "";
		$images = glob($_thumbdir.'/*.jpg');
		if (is_array($images) & (count($images) > 0)) 
		do
		{
			$chosenimg = $images[array_rand($images)];
		} 
			while (!getimagesize($chosenimg));
	}
		
	// if no thumbnail specified or not found, supply random image from thumbnails dir
	if (($_xml['thumbnail'] == '') or (!file_exists($chosenimg)))
	{
		if (AUTOINDEX_DEBUG)
		{
			echo "Scanning '".$_dir."/thumbnails/*.jpg'<br />";
		}

		$chosenimg = "";
		$images = glob($_dir.'/thumbnails/*.jpg');
		if (is_array($images) & (count($images) > 0)) 
		do
		{
			$chosenimg = $images[array_rand($images)];
		} 
			while (!getimagesize($chosenimg));
	}

	// return chosen thumbnail image (specified or random)
	if (strlen($chosenimg) != 0)
	{
		$_xml['thumbnail'] = os_to_url($chosenimg);
	}
	// or default 'nothumb.jpg'
	else 
	{
		$_xml['thumbnail'] = './resources/images/nothumb.jpg';
	}
	
	if (AUTOINDEX_DEBUG)
	{
		echo "Thumbnail set to '".$_xml['thumbnail']."'<br />";
	}

	if ((!isset($_xml['title'])) or ($_xml['title'] == '')) $_xml['title'] = '';
	if ((!isset($_xml['description'])) or ($_xml['description'] == '')) $_xml['description'] = '';

return $_xml;

}

/*
	autoindex - primary function
		interates over specified directory (default = "./')
		building complete gallery index from subdirectories autoindex.xml specifications
			- $_fp will be forced absolute through PHP realpath())
*/
function autoindex($_fp = '') 
{
	// turn off file system errors for now
	$err_level = error_reporting();
	error_reporting($err_level & (~E_NOTICE)); 

	define ('AUTOINDEX_DEBUG', false);			// may be overridden by caller defining
	
	// if no filespec passed use the directory that the calling script is in - './'
	$_fpath = (isset($_fp) & ($_fp <> '')) ? $_fp : './';
	
	$_rpath = @realpath($_fpath) ? @realpath($_fpath).DIRECTORY_SEPARATOR.'*' : "!REALPATH-FAILURE!";
	$_rpath = str_ireplace('\\', '/', $_rpath);
	
	// resolve DOCUMENT_ROOT to same realpath root as input filepath
	$_rroot = @realpath($_SERVER['DOCUMENT_ROOT']);
	$_rroot = str_ireplace('\\', '/', $_rroot);
	
	$_docroot = $_SERVER['DOCUMENT_ROOT'];
	$_phproot = @realpath($_docroot);
	if (AUTOINDEX_DEBUG)
	{
		echo "<hr />TTG Autoindex-CE PHP function v1.6 (2011.05.08)<br />";
		echo "DOCUMENT ROOT '".$_docroot."'<br />";
		echo "REALPATH(ROOT)&nbsp;&nbsp;'".$_phproot."'<br />";
		echo "Filepath&nbsp;&nbsp;&nbsp;= '".$_fpath."'<br /> Realpath = '".$_rpath."'<br />URL Root = '".$_rroot."'<br />";
		echo "<hr />";
	}

	// populate array of galleries
	$_ai = array();

	foreach (glob($_rpath, GLOB_ONLYDIR) as $_fn)
		{
		   if (is_dir($_fn)) $this_dir = autoindex_dir($_fn);
		   if (is_array($this_dir)) $_ai[] = $this_dir;
		}

	// restore error reporting level
	error_reporting($err_level);
	
	//  and return with array
	return $_ai;

}

?>