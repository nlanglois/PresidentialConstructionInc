/* Add theme related links to theme customizer */

(function($) {
	if ('undefined' !== typeof maisha_links) {

		// Add Upgrade Notice
		upgrade = $('<a class="maisha-upgrade-link"></a>')
			.attr('href', maisha_links.upgradeURL)
			.attr('target', '_blank')
			.text(maisha_links.upgradeLabel);

		$('.preview-notice').append(upgrade);

		// Theme Links
		box = $('<div class="maisha-theme-links-wrap"></div>');

		title = $('<h3 class="maisha-theme-links-title"></h3>')
			.text(maisha_links.title);

		themePage = $('<a class="maisha-theme-link maisha-theme-link-info"></a>')
			.attr('href', maisha_links.themeURL)
			.attr('target', '_blank')
			.text(maisha_links.themeLabel);

		themeDocu = $('<a class="maisha-theme-link maisha-theme-link-docs"></a>')
			.attr('href', maisha_links.docsURL)
			.attr('target', '_blank')
			.text(maisha_links.docsLabel);

		themeSupport = $('<a class="maisha-theme-link maisha-theme-link-support"></a>')
			.attr('href', maisha_links.supportURL)
			.attr('target', '_blank')
			.text(maisha_lite_links.supportLabel);

		themeRate = $('<a class="maisha-theme-link maisha-theme-link-rate"></a>')
			.attr('href', maisha_links.rateURL)
			.attr('target', '_blank')
			.text(maisha_links.rateLabel);

		// Add Theme Links
		links = box.append(title).append(themePage).append(themeDocu).append(themeSupport).append(themeRate);

		setTimeout(function() {
			$('#accordion-panel-maisha_theme_options .control-panel-content').append(links);
		}, 2000);

		// Remove accordion click event
		$('.maisha-upgrade-link, .maisha-theme-link').on('click', function(e) {
			e.stopPropagation();
		});

	}
})(jQuery);