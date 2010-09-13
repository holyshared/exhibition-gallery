<?php

$options = array(
	"thumbnailWidth"	=> EX_THUMBNAIL_WIDTH,
	"thumbnailHeight"	=> EX_THUMBNAIL_HEIGHT,
	"thumbnailQuality"	=> EX_THUMBNAIL_QUALITY,
	"previwerWidth"		=> EX_PREVIEWER_WIDTH,
	"previwerHeight"	=> EX_PREVIEWER_HEIGHT,
	"previwerQuality"	=> EX_PREVIEWER_QUALITY
);

$values = array();
foreach ($options as $key => $value) {
	$values[$key] =  get_option($value);
}
extract($values);

if ($_POST["onSubmit"] == 1) {
	$thumbnailWidth		= $_POST[EX_THUMBNAIL_WIDTH];
	$thumbnailHeight	= $_POST[EX_THUMBNAIL_HEIGHT];
	$thumbnailQuality	= $_POST[EX_THUMBNAIL_QUALITY];

	$previwerWidth		= $_POST[EX_PREVIEWER_WIDTH];
	$previwerHeight		= $_POST[EX_PREVIEWER_HEIGHT];
	$previwerQuality	= $_POST[EX_PREVIEWER_QUALITY];

	$errors = array();
	$thumbnailWidth = intval($thumbnailWidth);
	if ($thumbnailWidth <= 0) {
		$errors[EX_THUMBNAIL_WIDTH] = __("Please specify 0 or more for a width.");
	}

	$thumbnailHeight = intval($thumbnailHeight);
	if ($thumbnailHeight <= 0) {
		$errors[EX_THUMBNAIL_HEIGHT] = __("Please specify 0 or more for a height.");
	}

	$thumbnailQuality = intval($thumbnailQuality);
	if ($thumbnailQuality <= 0 || $thumbnailQuality >= 100) {
		$errors[EX_THUMBNAIL_QUALITY] = __("Please specify Quality for 100 from 0.");
	}

	$previwerWidth = intval($previwerWidth);
	if ($previwerWidth <= 0) {
		$errors[EX_PREVIEWER_WIDTH] = __("Please specify 0 or more for a width.");
	}
	
	$previwerHeight = intval($previwerHeight);
	if ($previwerHeight <= 0) {
		$errors[EX_PREVIEWER_HEIGHT] = __("Please specify 0 or more for a height.");
	}

	$previwerQuality = intval($previwerQuality);
	if ($previwerQuality <= 0 || $previwerQuality >= 100) {
		$errors[EX_PREVIEWER_QUALITY] = __("Please specify Quality for 100 from 0.");
	}
	
	if (count($errors) <= 0) {
		update_option(EX_THUMBNAIL_WIDTH, $thumbnailWidth);
		update_option(EX_THUMBNAIL_HEIGHT, $thumbnailHeight);
		update_option(EX_THUMBNAIL_QUALITY, $thumbnailQuality);
		update_option(EX_PREVIEWER_WIDTH, $previwerWidth);
		update_option(EX_PREVIEWER_HEIGHT, $previwerHeight);
		update_option(EX_PREVIEWER_QUALITY, $previwerQuality);
	}

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
<dd>
<?php if (!empty($errors[EX_THUMBNAIL_WIDTH])) : ?><strong class="error"><?php echo $errors[EX_THUMBNAIL_WIDTH] ?></strong><br /><?php endif; ?>
<input type="text" name="<?php echo EX_THUMBNAIL_WIDTH; ?>" value="<?php echo $thumbnailWidth ?>" size="10" /></dd>

<dt><label><?php echo __("Height", "exhibition"); ?>:&nbsp;</label></dt>
<dd>
<?php if (!empty($errors[EX_THUMBNAIL_HEIGHT])) : ?><strong class="error"><?php echo $errors[EX_THUMBNAIL_HEIGHT] ?></strong><br /><?php endif; ?>
<input type="text" name="<?php echo EX_THUMBNAIL_HEIGHT; ?>" value="<?php echo $thumbnailHeight ?>" size="10" /></dd>

<dt><label><?php echo __("Quality", "exhibition"); ?>:&nbsp;</label></dt>
<dd>
<?php if (!empty($errors[EX_THUMBNAIL_QUALITY])) : ?><strong class="error"><?php echo $errors[EX_THUMBNAIL_QUALITY] ?></strong><br /><?php endif; ?>
<input type="text" name="<?php echo EX_THUMBNAIL_QUALITY; ?>" value="<?php echo $thumbnailQuality ?>" size="10" /></dd>

</dl>

</div>


<h4><?php echo __("Previwer setting", "exhibition"); ?></h4>

<div class="setting">
<p class="photo"><img src="<?php bloginfo('template_directory'); ?>/images/img_previwer.jpg" /></p>
<dl class="properties">

<dt><label><?php echo __("Width", "exhibition"); ?>:&nbsp;</label></dt>
<dd>
<?php if (!empty($errors[EX_PREVIEWER_WIDTH])) : ?><strong class="error"><?php echo $errors[EX_PREVIEWER_WIDTH] ?></strong><br /><?php endif; ?>
<input type="text" name="<?php echo EX_PREVIEWER_WIDTH; ?>" value="<?php echo $previwerWidth ?>" size="10" /></dd>

<dt><label><?php echo __("Height", "exhibition"); ?>:&nbsp;</label></dt>
<dd>
<?php if (!empty($errors[EX_PREVIEWER_HEIGHT])) : ?><strong class="error"><?php echo $errors[EX_PREVIEWER_HEIGHT] ?></strong></stong><br /><?php endif; ?>
<input type="text" name="<?php echo EX_PREVIEWER_HEIGHT; ?>" value="<?php echo $previwerHeight ?>" size="10" /></dd>

<dt><label><?php echo __("Quality", "exhibition"); ?>:&nbsp;</label></dt>
<dd>
<?php if (!empty($errors[EX_PREVIEWER_QUALITY])) : ?><strong class="error"><?php echo $errors[EX_PREVIEWER_QUALITY] ?></strong><br /><?php endif; ?>
<input type="text" name="<?php echo EX_PREVIEWER_QUALITY; ?>" value="<?php echo $thumbnailQuality ?>" size="10" /></dd>

</dl>
</div>

<p class="submit"><input type="submit" name="save" value="<?php echo __("Save", "exhibition"); ?>" /></p>
</form>

</div>