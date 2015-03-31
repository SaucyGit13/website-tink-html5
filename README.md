# Tink 2014

 > WordPress theme for [http://tink.uk](http://tink.uk)


## Site configuration

### Plugins

#### [Subscribe to comments reloaded](https://wordpress.org/plugins/subscribe-to-comments-reloaded/)

This plugin allows you to use custom inline styles (which should be blank) and custom html for the subscribe to comment form item in the plugin settings:

```html
<div class='row row--checkbox'><label for='subscribe-reloaded'>[checkbox_field] [checkbox_label]</label></div>
```


## Site usage

### Video player

The video player uses the [PayPal accessible HTML5 video player]() and can be inserted into a page using the following WordPress shortcode:

```
[video-player captions="link-to-captions.vtt" download="fallback-link-to-download.mp4" poster="link-to-image.jpg" mp4="link-to-source.mp4" webm="link-to-source.webm"]
```

At present the shortcode assumes you are going to provide the following:

 - Captions file in VTT format with captions in English
 - Download source to act as a fallback, this should normally match the MP4 source
 - Poster that is used as the static image when video is not playing
 - MP4 source of the video content
 - WEBM source of the same video content just in another format


### Registered menus

There are four registered menus in the theme, these are:

 - `aside_links` : This appears in the aside area and is used for "page" links
 - `other_blogs_links` : This appears in the aside and is intended for external URLs linking to post written on other websites
 - `conferences_links` : This appears in the aside and is intended for external URLs linking to conferences attended
 - `footer_links` : This is an optional menu that will add links to the footer;


## Development/Testing

You can run tests on the CSS and JS using [Node.js](http://nodejs.org/) (~0.10.31). Once Node.js has been installed, install the project packages:

```bash
$ npm install
# => once done you can check by running `npm list` to see all project packages
```

Then simply run the following command to test the CSS and JS for coding errors:

```bash
$ npm run test
# => ...
# => No code style errors found.
```