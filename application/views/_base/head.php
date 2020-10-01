<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $page_title;?></title>
    <meta name="theme-color" content="#203750" />

<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicons -->
<link rel="shortcut icon" href="../assets/dist/images/logo.ico"/>
<link rel="apple-touch-icon" href="../assets/dist/images/logo.ico"/>
<base href="<?php echo $base_url; ?>" />
<?php
	foreach ($meta_data as $name => $content)if (!empty($content))echo "<meta name='$name' content='$content'>".PHP_EOL;
	foreach ($stylesheets as $media => $files){
		foreach ($files as $file){
			$url = starts_with($file, 'http') ? $file : base_url($file);
			echo "<link href='$url' rel='stylesheet' media='$media'>".PHP_EOL;	
		}
	}		
	foreach ($scripts['head'] as $file)
	{
		$url = starts_with($file, 'http') ? $file : base_url($file);
		echo "<script src='$url'></script>".PHP_EOL;
	}
?>
</head>
<body class="<?php echo $body_class; ?>">
