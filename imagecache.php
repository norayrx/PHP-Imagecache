<?php
	$rurl = $_SERVER["REQUEST_URI"];
	$matches = array();
	$match = preg_match('/\/images\/cached\/(\d+)x(\d+)\/(\w+.+)/', $rurl, $matches);
	if(!$match)
	{
		echo 'Fail Whale';
	}
	else
	{
		$rurl = $matches[0];
		$w = $matches[1];
		$h = $matches[2];
		$image = $matches[3];
		if(file_exists('images/gallery/'.$image))
		{
			if(!is_dir('images/cached/'.$w.'x'.$h.'/'))
			{
    				mkdir('images/cached/'.$w.'x'.$h.'/',0755);
    			}
    			exec('convert images/gallery/'.$image.' -resize '.$w.'x'.$h.' images/cached/'.$w.'x'.$h.'/'.$image);
    			header('Location: /images/cached/'.$w.'x'.$h.'/'.$image);
		}
		else
		{
    			echo 'Fail Whale';
		}
	}