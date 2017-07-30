=== Canard ===

Contributors: automattic
Tags: red, white, light, two-columns, right-sidebar, responsive-layout, custom-header, custom-menu, featured-images, flexible-header, post-formats, rtl-language-support, sticky-post, theme-options, translation-ready, featured-content-with-pages

Requires at least: 4.0
Tested up to: 4.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A flexible and versatile magazine theme.

== Description ==

Canard is a flexible and versatile theme perfect for magazines, news sites, and blogs. It lets you highlight specific articles on the homepage and balances readability with a powerful use of photography — all in a layout that works on any device.

* Responsive layout.
* Social menu.
* Jetpack.me compatibility for Infinite Scroll, Featured Content, Responsive Videos, Site Logo.
* The GPL v2.0 or later license. :) Use it to make something cool.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= I don't see the Featured Content menu in my customizer, where can I find it? =

To make the Featured Content menu appear in your customizer, you need to install the [Jetpack plugin](http://jetpack.me) because it has the required code needed to make [featured content](http://jetpack.me/support/featured-content/) work for the Canard theme.

Once Jetpack is active, the Featured Content menu will appear in your customizer. No special Jetpack module is needed and a WordPress.com connection is not required for the Featured Content feature to function. Featured Content will work on a localhost installation of WordPress if you add this line to `wp-config.php`:

`define( 'JETPACK_DEV_DEBUG', TRUE );`

= Where can I add widgets? =

Canard offers two widget areas, which can be configured in Appearance → Widgets:

* An optional sidebar widget area, which appears on the right.
* An optional footer widget area.

= How do I add the Social Links to the header? =

Canard allows you display links to your social media profiles, like Twitter and Facebook, with icons.

1. Create a new Custom Menu, and assign it to the Social Links Menu location.
2. Add links to each of your social services using the Links panel.
3. Icons for your social links will automatically appear if it's available.

Available icons: (Linking to any of the following sites will automatically display its icon in your social menu).

* CodePen
* Digg
* Dribbble
* Dropbox
* Email (mailto: links)
* Facebook
* Flickr
* Foursquare
* GitHub
* Google+
* Instagram
* LinkedIn
* Path
* Pinterest
* Polldaddy
* Reddit
* RSS Feed (urls with /feed/)
* Spotify
* StumbleUpon
* Tumblr
* Twitch
* Twitter
* Vimeo
* Vine
* WordPress
* YouTube

Social networks that aren't currently supported will be indicated by a generic share icon.

== Quick Specs (all measurements in pixels) ==

1. The main column width for posts is 540.
2. The main column width for pages is 870.
3. A widget is 270 wide.
4. Featured Images are 1920 wide by 768 high.

== Changelog ==

= 24 May 2016 =
* Ensure relative position on sticky posts with featured images so the icon doesn't display offscreen.

= 12 May 2016 =
* Add new classic-menu tag.

= 22 April 2016 =
* Add featured-content-with-pages tag to style.css and readme.txt.

= 8 April 2016 =
* Display a featured image regardless of post format in the Featured Content area if one is assigned.

= 25 February 2016 =
* Add blog-excerpts tag.

= 4 February 2016 =
* Adding author-bio tag, to keep things in sync with Theme Showcase.

= 20 January 2016 =
* Remove custom PollDaddy styles

= 11 December 2015 =
* Tweaking Featured Content so when pages are included, their featured image will appear.

= 1 October 2015 =
* Don't force width to 100% for site logo; let it pick the width naturally based on the height, while still respecting max-width of 100% to avoid overflow.

= 29 September 2015 =
* Update screenshot

= 25 September 2015 =
* Ensure site logo always fits within available space, even on smaller screens.

= 24 September 2015 =
* Fix various bugs in RTL implementation;

= 22 September 2015 =
* Add page support to Featured Content slider;

= 8 September 2015 =
* Remove all sort of margin in the header when there is no site-branding.
* Remove commented JS
* Remove min-height on site-branding when screen >= 960px.

= 13 August 2015 =
* Make sure images aren't being displayed in .entry-summary

= 12 August 2015 =
* Fix typo in html comment

= 11 August 2015 =
* Improve "Continue reading" link and make sure it's being displayed even when user uses a manual excerpt.

= 3 August 2015 =
* On Single/Page display Featured Image only when page 100% loaded.
* Make sure .more-link is nowrap
* Add missing "Continue reading" link.

= 31 July 2015 =
* Remove `.screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 15 July 2015 =
* Update licensing
* Always use https when loading Google Fonts. See #3221;

= 6 July 2015 =
* Use echo instead of printf to display external link in Link Post Format

= 1 July 2015 =
* Fix z-index/position issue with the menu dropdown and the featured image

= 28 May 2015 =
* Fix sticky post archive/blog/search forward slash entry meta
* More back-comp regarding css transforms
* add back-compatibilty for css transform
* Fix slideshow z-index
* Increase contrast of outline on :focus
* Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.

= 27 May 2015 =
* Update readme
* Update description

= 26 May 2015 =
* properly format `printf`s to prevent 'too few arguments' warnings.
* Remove webkit appearance on input/textarea

= 25 May 2015 =
* Reduce IS container original width
* Overwritte IS container width
* Make sure featured-content posts don't have a border-top
* Gallery/Image post format: Be more specific with the body class to make sure on single you don't have an horrendous black div showing up
* Update screenshot
* Increase excerpt lenght a little bit more
* Increase excerpt lenght
* Fix Link Post format entry-meta width
* Move .sticky-post 1px below
* Add author avatar back on archive/blog/search view
* Add more details regarding the classes to make sure it's not overwritten by custom colors
* Update tags, version and reset description
* Clean and simplify stylesheet

= 23 May 2015 =
* Remove :hover and :active states on screen-reader-text
* New infinite-footer style: Dark!
* Fix some line-height issues
* Change related post title font family to PT Serif to match list widgets style
* Complete right to left stylesheet
* Reduce search-submit width/height
* Revert search form width
* Reduce search form width
* Add border-radius back to some elements
* Canard: Multiple crazy changes
* Multiple changes

= 22 May 2015 =
* Multiple changes:
* Clean the mess of the font settings :)

= 21 May 2015 =
* Update screenshot
* Add missing wpcom styles
* Tweak Polldaddy styles to match theme
* Minor missed properties in the comment list/form
* Tweak comment list and comment form
* Update wpcom colors and simplify google fonts enqueueing
* Link Post Format - use canard_get_link_url() instead of get_permalink() to make sure it's the external link
* Tweak gallery and related posts style
* Fix related posts margin and font-family
* Fix .entry-meta colors on single when post-has-thumbnail
* Make sure featured-content hentry isn't affected by the negative margin
* Fix padding/margin top of first hentry on archive/blog/search view
* Fix search-toggle z-index and search-field on webkit
* Fix sidebar-toggle margin-bottom

= 20 May 2015 =
* Fix tag cloud widget padding
* Add Lato back to the sharedaddy titles
* Fix sidebar-toggle
* Remove extra classes that aren't being used
* Fix focus state when background is #222 and remove default input webkit appearance
* Fix .post-navigation font-size
* Add some missing Playfair Display
* Change some font-families from Lato to Playfair Display that has been forgotten :)
* Fix page entry-footer margin-bottom depending on screen size
* Add margin-top to entry-footer on pages only when screen >= 600px
* Add extra padding to gallery/image post format only when it's not a single view
* Add box-shadow to author avatar when it's a gallery or image post format
* Cleanup stylesheet
* Add text-shadow to entry-summary when it's a gallery or image post format
* Fix uneeded forward slash from entry-meta when blog isn't a group-blog
* Fix alignment of search-toggle
* Reduce size of elements in header on small devices
* Add better support for flexbox due to the ridiculous amount of rubbish browser that don't support a simple display: flex;
* Fix featured image resize on featured content

= 19 May 2015 =
* Fix .sep vertical align
* Make sure it displays .site-top only when needed
* Initial import of the .org version of the Canard theme

== Credits ==

* Genericons: font by Automattic (http://automattic.com/), licensed under [GPL2](https://www.gnu.org/licenses/gpl-2.0.html)
* Images: images by Unsplash (https://unsplash.com/), licensed under [CC0](http://creativecommons.org/choose/zero/)
	* New York City: https://images.unsplash.com/photo-1424296308064-1eead03d1ad9?q=80&fm=jpg&s=18d0720024658dad1b966daa83a5218c
	* DJ Tools: https://images.unsplash.com/32/6Icr9fARMmTjTHqTzK8z_DSC_0123.jpg?q=80&fm=jpg&s=0ae9061e93c8706bf9d23a185e7bc113
	* Homemade Muffins: https://images.unsplash.com/photo-1426869884541-df7117556757?q=80&fm=jpg&s=a96e2a65771dd939883420703a0bb928
	* Phone Test: https://images.unsplash.com/photo-1425315283416-2acc50323ee6?q=80&fm=jpg&s=94c3e17a79354c33dbd59ced862b1460
	* Retro cars are back!: https://images.unsplash.com/photo-1421473634087-a7e9e8e6c5bb?q=80&fm=jpg&s=57edcac521df9231b1be9410b0bff8fb