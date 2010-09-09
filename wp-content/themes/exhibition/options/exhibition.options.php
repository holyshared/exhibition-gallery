<?php 

$thumbnailWidth		= get_option(EXHIBITION_THUMBNAIL_WIDTH);
$thumbnailQuality	= get_option(EXHIBITION_THUMBNAIL_QUALITY);
$previwerWidth		= get_option(EXHIBITION_PREVIEWER_WIDTH);
$previwerHeight		= get_option(EXHIBITION_PREVIEWER_HEIGHT);

$thumbnailWidth = (!empty($thumbnailWidth)) ? $thumbnailWidth : 128;
$thumbnailQuality = (!empty($thumbnailQuality)) ? $thumbnailQuality : 90;
$previwerWidth = (!empty($previwerWidth)) ? $previwerWidth : 500;
$previwerHeight = (!empty($previwerHeight)) ? $previwerHeight : 480;

if ($_POST["onSubmit"] == 1) {
	$thumbnailWidth		= $_POST[EXHIBITION_THUMBNAIL_WIDTH];
	$thumbnailQuality	= $_POST[EXHIBITION_THUMBNAIL_QUALITY];
	$previwerWidth		= $_POST[EXHIBITION_PREVIEWER_WIDTH];
	$previwerHeight		= $_POST[EXHIBITION_PREVIEWER_HEIGHT];

	$thumbnailWidth = (!empty($thumbnailWidth)) ? $thumbnailWidth : 128;
	$thumbnailQuality = (!empty($thumbnailQuality)) ? $thumbnailQuality : 90;
	$previwerWidth = (!empty($previwerWidth)) ? $previwerWidth : 500;
	$previwerHeight = (!empty($previwerHeight)) ? $previwerHeight : 480;

	if (is_int($thumbnailWidth))	update_option(EXHIBITION_THUMBNAIL_WIDTH, $thumbnailWidth);
	if (is_int($thumbnailQuality))	update_option(EXHIBITION_THUMBNAIL_QUALITY, $thumbnailQuality);
	if (is_int($previwerWidth))		update_option(EXHIBITION_PREVIEWER_WIDTH, $previwerWidth);
	if (is_int($previwerHeight))	update_option(EXHIBITION_PREVIEWER_HEIGHT, $previwerHeight);
}
?>
<div class="wrap">

<div id="icon-options-general" class="icon32"><br /></div>
<h2><?php echo __("Exhibition Options", "exhibition"); ?></h2>
<p><?php echo __("The setting of the Exhibition theme can be changed.", "exhibition"); ?></p>

<form method="post" action="">
<input type="hidden" name="onSubmit" value="1" />

<h3><?php echo __("General setting", "exhibition"); ?></h3>
<p><?php echo __("The image size of the photograph can be set.", "exhibition"); ?></p>
<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php echo __("Thumbnail setting", "exhibition"); ?></th>
		<td>
<label><?php echo __("Width", "exhibition"); ?>&nbsp;<input type="text" name="<?php echo EXHIBITION_THUMBNAIL_WIDTH; ?>" value="<?php echo $thumbnailWidth ?>" size="10" /></label>&nbsp;
<label><?php echo __("Quality", "exhibition"); ?>&nbsp;<input type="text" name="<?php echo EXHIBITION_THUMBNAIL_QUALITY; ?>" value="<?php echo $thumbnailQuality ?>" size="10" /></label>
		</td>
	</tr>

	<tr valign="top">
		<th scope="row"><?php echo __("Previwer setting", "exhibition"); ?></th>
		<td>
<label><?php echo __("Width", "exhibition"); ?>&nbsp;<input type="text" name="<?php echo EXHIBITION_PREVIEWER_WIDTH; ?>" value="<?php echo $previwerWidth ?>" size="10" /></label>&nbsp;
<label><?php echo __("Height", "exhibition"); ?>&nbsp;<input type="text" name="<?php echo EXHIBITION_PREVIEWER_HEIGHT; ?>" value="<?php echo $previwerHeight ?>" size="10" /></label>
		</td>
	</tr>
</table>
<p class="submit"><input type="submit" name="save" value="<?php echo __("Save", "exhibition"); ?>" /></p>
</form>

</div>