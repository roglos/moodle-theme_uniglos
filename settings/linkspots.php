<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme uniglos link spots file.
 *
 * @package    theme_uniglos
 * @copyright  2016 RM Oelmann, University of Gloucestershire (roelmann@glos.ac.uk)
 * @credits    Bas Brands - Bootstrap
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/* linkspots Spot Settings */
$temp = new admin_settingpage('theme_uniglos_linkspots', get_string('linkspotsheading', 'theme_uniglos'));
$temp->add(new admin_setting_heading('theme_uniglos_linkspots', get_string('linkspotsheadingsub', 'theme_uniglos'),
            format_text(get_string('linkspotsdesc' , 'theme_uniglos'), FORMAT_MARKDOWN)));

    // Toggle linkspots Spots.
    $name = 'theme_uniglos/togglelinkspots';
    $title = get_string('togglelinkspots' , 'theme_uniglos');
    $description = get_string('togglelinkspotsdesc', 'theme_uniglos');
    $alwaysdisplay = get_string('alwaysdisplay', 'theme_uniglos');
    $displaybeforelogin = get_string('displaybeforelogin', 'theme_uniglos');
    $displayafterlogin = get_string('displayafterlogin', 'theme_uniglos');
    $dontdisplay = get_string('dontdisplay', 'theme_uniglos');
    $default = '1';
    $choices = array(
        '1' => $alwaysdisplay,
        '2' => $displaybeforelogin,
        '3' => $displayafterlogin,
        '0' => $dontdisplay
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Number of slides.
    $name = 'theme_uniglos/numberoflinkspots';
    $title = get_string('numberoflinkspots', 'theme_uniglos');
    $description = get_string('numberoflinkspots_desc', 'theme_uniglos');
    $default = 3;
    $choices = array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
    );
    $temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    $numberoflinkspots = get_config('theme_uniglos', 'numberoflinkspots');
    for ($i = 1; $i <= $numberoflinkspots; $i++) {

        // This is the descriptor for Link Spots.
        $name = 'theme_uniglos/linkspots'.$i.'info';
        $heading = get_string('linkspot', 'theme_uniglos').$i;
        $information = get_string('linkspotsinfodesc', 'theme_uniglos');
        $setting = new admin_setting_heading($name, $heading, $information);
        $temp->add($setting);

        // Link Spot Title.
        $name = 'theme_uniglos/linkspots'.$i.'title';
        $title = get_string('linkspotstitle', 'theme_uniglos');
        $description = get_string('linkspotstitledesc', 'theme_uniglos');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Link Spot LinkURL.
        $name = 'theme_uniglos/linkspots'.$i.'url';
        $title = get_string('linkspotsurl', 'theme_uniglos');
        $description = get_string('linkspotsurldesc', 'theme_uniglos');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Link Spot colour setting.
        $name = 'theme_uniglos/linkspots'.$i.'colour';
        $title = get_string('captiontextcolour', 'theme_uniglos');
        $description = get_string('captiontextcolourdesc', 'theme_uniglos');
        $default = '#000';
        $previewconfig = null;
        $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Icon.
        $name = 'theme_uniglos/linkspots'.$i.'icon';
        $title = get_string('linkspotsicon', 'theme_uniglos');
        $description = get_string('linkspotsicondesc', 'theme_uniglos');
        $default = 'star';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Image.
        $name = 'theme_uniglos/linkspots'.$i.'image';
        $title = get_string('linkspotsimage', 'theme_uniglos');
        $description = get_string('linkspotsimagedesc', 'theme_uniglos');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'linkspots'.$i.'image');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

    }
    $ADMIN->add('theme_uniglos', $temp);
