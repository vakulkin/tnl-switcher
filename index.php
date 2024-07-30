<?php

/**
 * Plugin Name: TNL Switcher
 * Description: Shortode with swithcer to page
 * Author: TheNewLook
 * Text Domain: tnl-switcher
 */

// example [tnl_switcher title="Klient:" left_url="/" left_name="Indywidualny" right_url="http://your-site.url/b2b/" right_name="Biznesowy"]

namespace TNL_Switcher;

defined('ABSPATH') || exit;

require_once 'Switcher.php';

new Switcher();
