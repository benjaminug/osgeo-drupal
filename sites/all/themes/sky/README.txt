// $Id$

-- SUMMARY --

Sky is a minimal, re-colorable, multi-column theme which uses the 960 Grid
System and HTML5. Supported browsers include IE6+, FF3+, Safari 3+, Chrome and Opera 10+. Please note that Sky is not an administrative theme.

-- REQUIREMENTS --

In order to view the live preview on the color settings page
(admin/appearance/settings/sky), you must install the Color Theme module. It is
a very small module that sets the current theme to theme that's being
configured. This allows for live previews of the color schemes and
customization. It is not technically required, but highly recommended:

http://drupal.org/project/colortheme

-- INSTALLATION --

Install as usual, see http://drupal.org/node/70151 for further information.


-- CONFIGURATION --

* Color options: Enable the theme at admin/appearance, and visit
  admin/appearance/settings/sky to modify the color scheme if desired.
* Menus: The Sky theme does not support the hard coded menu defaults. To setup
  your main navigation menu, place the block containing the menu you want in the
  "Navigation" region.


-- CREATING A SUBTHEME --

1. Create a new theme directory and .info file with the following inside it:

    name = Name of your theme.
    description = Description of your theme.
    core = 7.x

    base theme = sky

    stylesheets[all][] = colors.css
    stylesheets[all][] = custom.css

    regions[page_top] = Page Top
    regions[header] = Header
    regions[navigation] = Navigation
    regions[highlighted] = Highlighted
    regions[help] = Help
    regions[content] = Content
    regions[sidebar_first] = Sidebar First
    regions[sidebar_second] = Sidebar Second
    regions[footer] = Footer
    regions[copyright] = Copyright
    regions[collapsible] = Collapsible
    regions[page_bottom] = Page Bottom

    features[] = logo
    features[] = favicon
    features[] = name
    features[] = slogan
    features[] = node_user_picture
    features[] = comment_user_picture
    features[] = comment_user_verification

2. Create a custom.css file which will contain any styles you want to change or
   add.

3. Copy the colors.css file into the root of your theme. It can go wherever you
   want, just make sure you match the path to the .info entry.

4. Copy the entire color directory from Sky into your subtheme.

5. Open color/color.inc change the occurences of 'sky' (lines 18-19) to the name
   of your subtheme:

    $css = ($theme == 'sky') ? 'color/preview.css' : array();
    $js = ($theme == 'sky') ? 'color/preview.js' : array();


-- FAQ --

* Skinr Integration: When the Skinr module is available many more block styles,
including drop down menus will be added.

-- CONTACT --

Current maintainer:
* Jacine Luisi (Jacine) - http://drupal.org/user/88931
