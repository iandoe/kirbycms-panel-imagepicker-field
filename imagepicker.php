<?php

global $page;

// Get panel config color
$color = c::get('panel.color');

// is width set ? default value is 100px
$width = isset($width) ? $width : 100;

// Placeholder when there is no images, defaults to panel i18n when empty
$ph = isset($placeholder) ? form::multilangtext($placeholder) : l::get('files.empty');

?>

<style>
	ul.thumbnails.image_picker_selector li .thumbnail.selected {
	  background: <?php echo $color ?>;
	}
</style>

<?php if ($page->hasImages()): ?>

<select name="<?php echo $name ?>" id="imagePicker-field">

	<?php foreach ($page->images() as $img): ?>
	<?php $val = $img->filename(); ?>

	<option
	value="<?php echo $val ?>"
	data-img-src="<?php echo thumb($img, array('width' => $width), false) ?>"
	<?php ecco($val == $value ,' selected="selected"') ?>
	>
	<?php echo $img->name() ?>
	</option>

	<?php endforeach ?>

</select>

<?php else: ?>

<span><?php echo $ph ?></span>

<?php endif ?>
