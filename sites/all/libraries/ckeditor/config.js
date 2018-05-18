/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	 config.extraPlugins = 'widget';
  config.extraPlugins = 'oembed,widget';
  config.extraPlugins = 'lightbox';
  config.oembed_WrapperClass = 'embededContent';
  config.removeButtons = 'BrowseServer';
  config.autoEmbed_widget = 'embedSemantic';
  config.oembed_maxWidth = '560';
  config.oembed_maxHeight = '315';
  config.oembed_WrapperClass = 'embededContent';
  config.allowedContent = true;
};
