<?php
/**
 * Routes
 *
 * example_routes.php will be loaded in main app/config/routes.php file.
 */
Croogo::hookRoutes('Example');

/**
 * Helper
 *
 * This plugin's Example helper will be loaded via NodesController.
 */
Croogo::hookHelper('*', 'AttachmentBrowser.Browser');
