<?php 

require_once('PHPVideoDownloader/PHPVideoDownloader.php');

	//This array represents video types
	//These codes originallyare used by Youtube in order to define different video qualities
	
	
	$qualities=array(
	'0'=>'Low Quality flv',
	'5' =>'Low Quality flv',
	'6'=>'High Quality	flv',
	'13'=>	'Low Quality H.263	3gpp',
	'15'=>	'Original Upload Format',
	'17'=>	'Low Quality MPEG-4	3gpp',
	'18'=>	'240p mp4',
	'22'=>	'High Definition, 720p	mp4',
	'34'=>	'360p flv',
	'35'=>	'480p flv',
	'36'=>	'High Quality MPEG-4	3gpp',
	'37'=>	'Full High Definition mp4',
	'38'=>	'Original Definition	mp4',
	'43'=>	'Low Definition, 360p webm',
	'45'=>	'High Definition, 720p webm');


?>
Get Video URL: <form action="<?php echo $_SERVER['PHP_SELF']?>"><input type="text" name="url" /> <input type="submit" value="Get Video URL's" /></form>
<?php 
if($_GET['url']) {
	$stealer=new PHPVideoDownloader($_GET['url']);
	$obj=$stealer->get();
	if($obj)
		foreach($obj->urls() as $quality => $url) {
			echo $qualities[$quality].' &raquo; <a href="'.$url.'">Download</a><br />';
		}
		else 
		echo '<br />Download URL\'s cannot be found!';
}

?>