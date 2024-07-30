<?php

/**
 * Plugin Name: TNL Switcher
 * Description: Shortode with swithcer to page
 * Author: TheNewLook
 * Text Domain: tnl-switcher
 */

namespace TNL_Switcher;

defined('ABSPATH') || exit;

require_once 'Switcher.php';

new Switcher();
