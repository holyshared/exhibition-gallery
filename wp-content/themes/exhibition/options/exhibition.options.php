<?php

$options = array(
	"thumbnailWidth"	=> EXHIBITION_THUMBNAIL_WIDTH,
	"thumbnailHeight"	=> EXHIBITION_THUMBNAIL_HEIGHT,
	"thumbnailQuality"	=> EXHIBITION_THUMBNAIL_QUALITY,
	"previwerWidth"		=> EXHIBITION_PREVIEWER_WIDTH,
	"previwerHeight"	=> EXHIBITION_PREVIEWER_HEIGHT,
	"previwerQuality"	=> EXHIBITION_PREVIEWER_QUALITY
);

$values = array();
foreach ($options as $key => $value) {
	$values[$key] =  get_option($value);
}
extract($values);

if ($_POST["onSubmit"] == 1) {
	$thumbnailWidth		= $_POST[EXHIBITION_THUMBNAIL_WIDTH];
	$thumbnailHeight	= $_POST[EXHIBITION_THUMBNAIL_HEIGHT];
	$thumbnailQuality	= $_POST[EXHIBITION_THUMBNAIL_QUALITY];

	$previwerWidth		= $_POST[EXHIBITION_PREVIEWER_WIDTH];
	$previwerHeight		= $_POST[EXHIBITION_PREVIEWER_HEIGHT];
	$previwerQuality	= $_POST[EXHIBITION_PREVIEWER_QUALITY];

	$thumbnailWidth		= (!empty($thumbnailWidth)) ? $thumbnailWidth : EX_DEFAULT_THUMBNAIL_WIDTH;
	$thumbnailHeight	= (!empty($thumbnailHeight)) ? $thumbnailHeight : EX_DEFAULT_THUMBNAIL_HEIGHT;
	$thumbnailQuality	= (!empty($thumbnailQuality)) ? $thumbnailQuality : EX_DEFAULT_THUMBNAIL_QUALITY;

	$previwerWidth		= (!empty($previwerWidth)) ? $previwerWidth : EX_DEFAULT_PREVIEWER_WIDTH;
	$previwerHeight		= (!empty($previwerHeight)) ? $previwerHeight : EX_DEFAULT_PREVIEWER_HEIGHT;
	$previwerQuality	= (!empty($previwerQuality)) ? $previwerQuality : EX_DEFAULT_PREVIEWER_QUALITY;
	
	if (is_int($thumbnailWidth))	update_option(EXHIBITION_THUMBNAIL_WIDTH, $thumbnailWidth);
	if (is_int($thumbnailHeight))	update_option(EXHIBITION_THUMBNAIL_HEIGHT, $thumbnailHeight);
	if (is_int($thumbnailQuality))	update_option(EXHIBITION_THUMBNAIL_QUALITY, $thumbnailQuality);

	if (is_int($previwerWidth))		update_option(EXHIBITION_PREVIEWER_WIDTH, $previwerWidth);
	if (is_int($previwerHeight))	update_option(EXHIBITION_PREVIEWER_HEIGHT, $previwerHeight);
	if (is_int($previwerQuality))	update_option(EXHIBITION_PREVIEWER_QUALITY, $previwerQuality);
} else {

	$thumbnailWidth		= (!empty($thumbnailWidth)) ? $thumbnailWidth : EX_DEFAULT_THUMBNAIL_WIDTH;
	$thumbnailHeight	= (!empty($thumbnailHeight)) ? $thumbnailHeight : EX_DEFAULT_THUMBNAIL_HEIGHT;
	$thumbnailQuality	= (!empty($thumbnailQuality)) ? $thumbnailQuality : EX_DEFAULT_THUMBNAIL_QUALITY;
	
	$previwerWidth		= (!empty($previwerWidth)) ? $previwerWidth : EX_DEFAULT_PREVIEWER_WIDTH;
	$previwerHeight		= (!empty($previwerHeight)) ? $previwerHeight : EX_DEFAULT_PREVIEWER_HEIGHT;
	$previwerQuality	= (!empty($previwerQuality)) ? $previwerQuality : EX_DEFAULT_PREVIEWER_QUALITY;

}
?>

<style type="text/css">
.setting {
	overflow: hidden;
}

.setting .photo {
	float: left;
	width: 189px;
	padding: 0px;
	margin: 0px;
}

.setting .properties {
	margin-left: 15px;
	float: left;
	width: 400px;
	overflow: hidden;
}

.setting .properties dt {
	margin-bottom: 5px;
	float: left;
	width: 50px;
}

</style>

<div class="wrap">

<div id="icon-options-general" class="icon32"><br /></div>
<h2><?php echo __("Exhibition Options", "exhibition"); ?></h2>
<p><?php echo __("The setting of the Exhibition theme can be changed.", "exhibition"); ?></p>

<form method="post" action="">
<input type="hidden" name="onSubmit" value="1" />

<h3><?php echo __("General setting", "exhibition"); ?></h3>
<p><?php echo __("The image size of the photograph can be set.", "exhibition"); ?></p>

<h4><?php echo __("Thumbnail setting", "exhibition"); ?></h4>


<div class="setting">

<p class="photo"><img src="<?php bloginfo('template_directory'); ?>/images/img_thumbnail.jpg" /></p>
<dl class="properties">

<dt><label><?php echo __("Width", "exhibition"); ?>:&nbsp;</label></dt>
<dd><input type="text" name="<?php echo EXHIBITION_THUMBNAIL_WIDTH; ?>" value="<?php echo $thumbnailWidth ?>" size="10" /></dd>

<dt><label><?php echo __("Height", "exhibition"); ?>:&nbsp;</label></dt>
<dd><input type="text" name="<?php echo EXHIBITION_THUMBNAIL_HEIGHT; ?>" value="<?php echo $thumbnailHeight ?>" size="10" /></dd>

<dt><label><?php echo __("Quality", "exhibition"); ?>:&nbsp;</label></dt>
<dd><input type="text" name="<?php echo EXHIBITION_THUMBNAIL_QUALITY; ?>" value="<?php echo $thumbnailQuality ?>" size="10" /></dd>

</dl>

</div>


<h4><?php echo __("Previwer setting", "exhibition"); ?></h4>

<div class="setting">
<p class="photo"><img src="<?php bloginfo('template_directory'); ?>/images/img_previwer.jpg" /></p>
<dl class="properties">

<dt><label><?php echo __("Width", "exhibition"); ?>:&nbsp;</label></dt>
<dd><input type="text" name="<?php echo EXHIBITION_PREVIEWER_WIDTH; ?>" value="<?php echo $previwerWidth ?>" size="10" /></dd>

<dt><label><?php echo __("Height", "exhibition"); ?>:&nbsp;</label></dt>
<dd><input type="text" name="<?php echo EXHIBITION_PREVIEWER_HEIGHT; ?>" value="<?php echo $previwerHeight ?>" size="10" /></dd>

<dt><label><?php echo __("Quality", "exhibition"); ?>:&nbsp;</label></dt>
<dd><input type="text" name="<?php echo EXHIBITION_PREVIEWER_QUALITY; ?>" value="<?php echo $thumbnailQuality ?>" size="10" /></dd>

</dl>
</div>

<p class="submit"><input type="submit" name="save" value="<?php echo __("Save", "exhibition"); ?>" /></p>
</form>

</div>