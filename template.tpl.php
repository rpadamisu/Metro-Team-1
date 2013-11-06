<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Site OnCall Version <?= VERSION; ?> -->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta http-equiv="content-language" content="en"/>
<link rel="icon" href="/images/favicon.png" type="image/png"/>
<link rel="shortcut icon" href="/images/favicon.png" type="image/png"/>
<title><?= htmlentities($html_title); ?> - Metro Arts Alliance</title>
<link rel="stylesheet" type="text/css" href="/css/global.css"/>

<?php 
	if (isset($css)) {
		foreach ($css as $css_file) { ?>
<link rel="stylesheet" type="text/css" href="<?= $css_file; ?>" />
<?		}
	} ?>

<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/js/standard.js"></script>

<?php
 	if (isset($js)) {
		foreach ($js as $js_file) { ?>
<script language="javascript" type="text/javascript" src="<?= $js_file; ?>"></script>
<?		}
	} ?>
<?= $ga_tracking; ?>
</head>

<body>
<div class="page">

<div class="head">
	<a class="logo" href="/" title="Metro Arts Alliance"></a>
	<div class="sm">
		<a class="twitter" href="https://twitter.com/MetroArts" title="Metro Arts Alliance Twitter" target="_blank">Twitter</a>
		<a class="facebook" href="https://www.facebook.com/metroartsalliance?ref=ts&fref=ts" title="Metro Arts Alliance Facebook" target="_blank">Facebook</a>
		<a class="pinterest" href="http://pinterest.com/metroarts/" title="Metro Arts Alliance Pinterest" target="_blank">Pinterest</a>
		<div class="bar"></div>
	</div>
 	<?= $top_menu; ?>
 </div>

<div class="body">
		<div class="full">
			<?= $content; ?>
		</div>
</div>

<div class="foot">
 <?= $bot_menu; ?>
 
 	 <div class="legal">www.MetroArts.org &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6" />&nbsp; Metro Arts Alliance of Greater Des Moines &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6" />&nbsp; info@MetroArts.org &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6" />&nbsp; 305 East Court Avenue, Des Moines, IA 50309 &nbsp;<img src="/images/foot/dot-sep.png" width="6" height="6" />&nbsp; 515.280.3222 <br/> Copyright &copy; <?= date("Y"); ?> Metro Arts Alliance. All Rights Reserved.</div>
</div>
<div class="sponsor">
	<div class="vsi"><a href="http://www.visionary.com/solutions/website-design.html" target="_blank" title="Des Moines Custom Website Design by Visionary Services">Iowa Web design &amp; development by <strong>Visionary Services</strong></a></div>
	<div class="sponsor1"><a href="http://www.iowaartscouncil.org/" target="_blank" title="Iowa Arts Council"></a></div>
	<div class="sponsor2"><a href="http://www.bravogreaterdesmoines.org/" target="_blank" title="Bravo Greater Des Moines"></a></div>
	<div class="sponsor3"><a href="/" target="_blank" title=""></a></div>
	<div class="sponsor4"><a href="/" target="_blank" title=""></a></div>
	<div class="sponsor5"><a href="/" target="_blank" title=""></a></div>
</div>


</div>
</body>
</html>