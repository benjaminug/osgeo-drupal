// $Id$
(function ($) {
  Drupal.color = {
    callback: function(context, settings, form, farb, height, width) {

      // Apply grid classes to the farbtastic container.
      $('#placeholder').addClass('grid-4').addClass('push-6').addClass('alpha').addClass('omega');

      var wrapper = $('#container');

      $('#edit-scheme').change(function() {
        var current = $(this).val();
        var scheme = settings.color.schemes[current];
        for (var i in scheme) {
          $('#palette input[name="palette['+ i + ']"]', form).val(scheme[i]).css('background-color', scheme[i]);
        };
        Drupal.color.callback(context, settings, form, farb, height, width);
      });

      // Make variables for the selectors so the processing is more readable.
      var page = 'html, body';
      var tabs = '#skip-link a, .tabs a';
      var tabs_active = '.tabs a.active';
      var site_name = 'h1.site-name a';
      var site_slogan = 'h2.site-slogan';
      var navigation = '.region-navigation .content ul a, .region-navigation .content ul a:visited';
      var title_page = 'h1.title';
      var title_block = 'h2.block-title';
      var title_linked = 'h2.title a';
      var links = 'a, .a:visited';
      var node_links = 'article .links a, article .links a:visited';
      var header = '.region-header, .region-navigation, .region-header h2.block-title, .region-navigation h2.block-title';
      var header_links = '.region-header a, .region-header a:visited';
      var footer = '.breadcrumb, footer.section, footer.section .block-title';
      var footer_links = '.breadcrumb a, footer.section a, footer.section a:visited';

      // Page
      $(page, context)
        .css('background-color', $('#palette input[name="palette[page_background]"]', form).val())
        .css('color', $('#palette input[name="palette[page_foreground]"]', form).val());

      // Links
      $(links, wrapper).css('color', $('#palette input[name="palette[links]"]', form).val());
      $(links, wrapper).hover(function() {
        $(this).css('color', $('#palette input[name="palette[links_hover]"]', form).val());
      }, function() {
        $(this).css('color', $('#palette input[name="palette[links]"]', form).val());
      });

      // Identity
      $(site_name, context).css('color', $('#palette input[name="palette[site_name]"]', form).val());
      $(site_slogan, context).css('color', $('#palette input[name="palette[site_slogan]"]', form).val());

      // Navigation
      $(navigation, context).css('background-color', $('#palette input[name="palette[navigation_background]"]', form).val())
        .css('color', $('#palette input[name="palette[navigation_foreground]"]', form).val());
      $(navigation, context).hover(function() {
        $(this).css({
          backgroundColor: '#fff',
          color: $('#palette input[name="palette[page_foreground]"]', form).val(),
        })
      }, function() {
        $(this).css('background-color', $('#palette input[name="palette[navigation_background]"]', form).val())
          .css('color', $('#palette input[name="palette[navigation_foreground]"]', form).val());
      });

      // Tabs
      $(tabs, context).css({
         backgroundColor: $('#palette input[name="palette[tab_background]"]', form).val(),
         color: $('#palette input[name="palette[tab_foreground]"]', form).val()
      });
      $(tabs, context).not(tabs_active).hover(function() {
        $(this).css({
          backgroundColor: $('#palette input[name="palette[tab_background_active]"]', form).val(),
          color: $('#palette input[name="palette[tab_foreground_active]"]', form).val(),
        })
      }, function() {
        $(this).css({
          backgroundColor: $('#palette input[name="palette[tab_background]"]', form).val(),
          color: $('#palette input[name="palette[tab_foreground]"]', form).val()
        })
      });
      $(tabs_active, context).css({
        backgroundColor: $('#palette input[name="palette[tab_background_active]"]', form).val(),
        color: $('#palette input[name="palette[tab_foreground_active]"]', form).val(),
      });
      $(tabs_active, context).hover(function() {
        $(this).css({
          backgroundColor: $('#palette input[name="palette[tab_background_active]"]', form).val(),
          color: $('#palette input[name="palette[tab_foreground_active]"]', form).val(),
        })
      }, function() {
        $(this).css({
          backgroundColor: $('#palette input[name="palette[tab_background_active]"]', form).val(),
          color: $('#palette input[name="palette[tab_foreground_active]"]', form).val(),
        })
      });

      // Titles
      $(title_page, context).css('color', $('#palette input[name="palette[title_page]"]', form).val());
      $(title_block, context).css('color', $('#palette input[name="palette[title_block]"]', form).val());
      $(title_linked, context).css('color', $('#palette input[name="palette[title_linked]"]', form).val());

      // Node links
      $(node_links, context).css('background-color', $('#palette input[name="palette[node_links_background]"]', form).val())
        .css('color', $('#palette input[name="palette[node_links_foreground]"]', form).val());
      $(node_links, context).hover(function() {
        $(this).css('background-color', $('#palette input[name="palette[node_links_background_hover]"]', form).val())
          .css('color', $('#palette input[name="palette[node_links_foreground_hover]"]', form).val());
      }, function() {
        $(this).css('background-color', $('#palette input[name="palette[node_links_background]"]', form).val())
        .css('color', $('#palette input[name="palette[node_links_foreground]"]', form).val());
      });

      // Header
      $(header, context).css('color', $('#palette input[name="palette[header_foreground]"]', form).val())
      $(header_links, context).css('color', $('#palette input[name="palette[header_links]"]', form).val());
      $(header_links, context).hover(function() {
        $(this).css('color', $('#palette input[name="palette[header_links_hover]"]', form).val());
      }, function() {
        $(this).css('color', $('#palette input[name="palette[header_links]"]', form).val());
      });

      // Footer
      $(footer, context).css('background-color', $('#palette input[name="palette[footer_background]"]', form).val())
        .css('color', $('#palette input[name="palette[footer_foreground]"]', form).val());
      $(footer_links, context).css('color', $('#palette input[name="palette[footer_links]"]', form).val());
      $(footer_links, context).hover(function() {
        $(this).css('color', $('#palette input[name="palette[footer_links_hover]"]', form).val());
      }, function() {
        $(this).css('color', $('#palette input[name="palette[footer_links]"]', form).val());
      });

    }
  };
})(jQuery);
