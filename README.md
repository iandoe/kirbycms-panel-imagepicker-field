Image Picker Field - Kirby CMS Panel
===========================

Simple kirbyCMS Panel field for picking a single image in your page's content. Can be useful to use as a "Featured Image" implementation.

![Screenshot](https://github.com/iandoe/kirbycms-panel-imagepicker-field/raw/master/screenshot.png)

This uses [rvera's imagepicker jQuery Plugin](https://github.com/rvera/image-picker) and jQuery already present in your KirbyCMS Panel.

This field requires the [Thumb Plugin](https://github.com/bastianallgeier/kirbycms-extensions/blob/master/plugins/thumb/thumb.php) installed in your kirby install, read about it [here](https://github.com/bastianallgeier/kirbycms-extensions/blob/master/plugins/thumb/readme.mdown).


## Install

After installing the [kirbycms panel](https://github.com/bastianallgeier/kirbycms-panel/), create a directory `site/panel/fields` at the root of your kirby install (if not present already), cd into this directory and clone this repository in the `imagepicker` directory.

You should end up with the new directory:
`site/panel/fields/imagepicker`

## Usage

Once installed, when creating a panel blueprint, you can add the field using `type: imagepicker`, to set the placeholder that will appear when there is no images found in the content folder, you can use the `placeholder: yourtext` property and if your website is in multiple languages, you can use the Kirby Syntax for multi-lingual websites.

The `width` options defaults to 100 and represents the width in pixels at which image thumbs should be displayed / resized this should be set unitless if needed.

eg:

```
# default blueprint

title: Page
pages: true
files: true
fields:
  title:
    label: Title
    type:  text
  feature_img:
    label: Featured Image
    type:  imagepicker
    width: 100
    placeholder:
    	en: No uploaded images yet
    	fr: Pas encore d'images téléchargées
```

## Behaviour

This field is simply an augmented `<select>` field using javascript, which means this works even without javascript. The chosen image's filename will be saved to your page's metadata like this

```
Title: Page Title
----
Featured_img: image.png
----
```

You can then use it in your templates like this

```
$featured_img = $page->images()->find((string)$page->featured_img());

<img src="<?php echo $featured_img->url() ?>"
```


## License

This is released under the MIT License

Guillaume 'Wilhearts' PICARD, 2014