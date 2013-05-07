# SCAPEGOAT

* Author: [Peter Amende](http://peteramende.de/)
* License: GNU General Public License v2 or later

## ABOUT SCAPEGOAT

* the theme is made for the [Piratenpartei Berlin](http://berlin.piratenpartei.de/)
* the default slider images and the 404 image are taken by [Ben de Biel](http://www.bendebiel.com/)
* the font "PoliticsHeadBold" is made by [Fred Bordfeld](http://kaklotter.de/)

## HOW TO

* first of all, you have to insert some informations about yourself in your profile-section
* use custom menues and insert the start-page to the main-menu, if you want to display the home icon in your header menu
* use widgets for the sidebar and footer. The footer looks best with 4 Widgets with approximately equal heights. Don't use menu widgets in the footer, there is a separate footer-menu
* take a look at the theme-options and improve your front-page with it
* give your categories a description! You can use html-tags there as well and also images with caption. Insert your this at the Top of the Description. It will be cut by jQuery and append to the right place automatically:
```<img src=" + image url + " /> <span class="meta-thumbnail-caption"> + caption + </span>```
* Firefox on Windows don't load the fonts of the theme. To fix that, you have to insert this on top of your **.htaccess**:
```<FilesMatch "\.(ttf|otf|eot|woff|svg)$">Header set Access-Control-Allow-Origin "*"</FilesMatch>```

## ISSUES

* rtl support
* optimize font-sizes in relation to the responsive behaviour
* custom frontpage-layout

## LOG

* 01.10.12 - Release
* 22.10.12 - Slider redesign, CSS fixes, new font for titles
* 03.11.12 - New colours, some new icons, scroll fix on mobile, slight navigation changes, font updates, Slider update
* 29.11.12 - Retina icons, new unorderd list stlye, main menu update, mobile detection queries for slider and bredcrumb, optimizing widgets, dynamic navigation fontsize
* 10.12.12 - More retina icons, new menu and slider style, many bug fixes
* 22.12.12 - Html Tags in Category Description, featured images on pages, smaller meta icons, better css structure, new background style, fix of a hard font embedding fail
* 24.12.12 - second size for featured images above posts, postnavigation position changed, useless media-query removed
* 24.12.12 - fixed font bug on Windows webkit and gecko browsers
* 05.01.13 - change navigation size and bar style, fixed footer navigation bug, new lightweight comments, deactivated auto image catch, better archive logic
* 14.03.13 - implement flexslider.js, including scripts and fonts the right way, new modernizer version, ordered files
* 17.03.13 - new screenshot.png, some styles fixed, changes readme to .md
* 24.04.13 - Finally integrate our own font "PoliticsHeadBold" \o/ – thanks to fRED, font style adjustment, image alignment adjustments. Fix jquery implementation. Added Shortcode Function for coloums, checkout plugin style in extra css