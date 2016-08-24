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
 * Theme uniglos alerts settings file.
 *
 * @package    theme_uniglos
 * @copyright  2016 RM Oelmann, University of Gloucestershire (roelmann@glos.ac.uk)
 * @credits    Bas Brands - Bootstrap
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/* User Alerts */
$temp = new admin_settingpage('theme_uniglos_alerts', get_string('alertsheading', 'theme_uniglos'));
$temp->add(new admin_setting_heading('theme_uniglos_alerts', get_string('alertsheadingsub', 'theme_uniglos'),
    format_text(get_string('alertsdesc', 'theme_uniglos'), FORMAT_MARKDOWN)));

$information = get_string('alertinfodesc', 'theme_uniglos'); // Standard for each of the descriptors.

// This is the descriptor for Alert One.
$name = 'theme_uniglos/alert1info';
$heading = get_string('alert1', 'theme_uniglos');
$setting = new admin_setting_heading($name, $heading, $information);
$temp->add($setting);

// Enable Alert.
$name = 'theme_uniglos/enable1alert';
$title = get_string('enablealert', 'theme_uniglos');
$description = get_string('enablealertdesc', 'theme_uniglos');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Alert Type.
$name = 'theme_uniglos/alert1type';
$title = get_string('alerttype', 'theme_uniglos');
$description = get_string('alerttypedesc', 'theme_uniglos');
$alertinfo = get_string('alert_info', 'theme_uniglos');
$alertwarning = get_string('alert_warning', 'theme_uniglos');
$alertgeneral = get_string('alert_general', 'theme_uniglos');
$default = 'info';
$choices = array('info' => $alertinfo, 'warning' => $alertwarning, 'success' => $alertgeneral);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Alert Title.
$name = 'theme_uniglos/alert1title';
$title = get_string('alerttitle', 'theme_uniglos');
$description = get_string('alerttitledesc', 'theme_uniglos');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Alert Text.
$name = 'theme_uniglos/alert1text';
$title = get_string('alerttext', 'theme_uniglos');
$description = get_string('alerttextdesc', 'theme_uniglos');
$default = '';
$setting = new admin_setting_configtextarea($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// This is the descriptor for Alert Two.
$name = 'theme_uniglos/alert2info';
$heading = get_string('alert2', 'theme_uniglos');
$setting = new admin_setting_heading($name, $heading, $information);
$temp->add($setting);

// Enable Alert.
$name = 'theme_uniglos/enable2alert';
$title = get_string('enablealert', 'theme_uniglos');
$description = get_string('enablealertdesc', 'theme_uniglos');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Alert Type.
$name = 'theme_uniglos/alert2type';
$title = get_string('alerttype', 'theme_uniglos');
$description = get_string('alerttypedesc', 'theme_uniglos');
$alertinfo = get_string('alert_info', 'theme_uniglos');
$alertwarning = get_string('alert_warning', 'theme_uniglos');
$alertgeneral = get_string('alert_general', 'theme_uniglos');
$default = 'info';
$choices = array('info' => $alertinfo, 'warning' => $alertwarning, 'success' => $alertgeneral);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Alert Title.
$name = 'theme_uniglos/alert2title';
$title = get_string('alerttitle', 'theme_uniglos');
$description = get_string('alerttitledesc', 'theme_uniglos');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Alert Text.
$name = 'theme_uniglos/alert2text';
$title = get_string('alerttext', 'theme_uniglos');
$description = get_string('alerttextdesc', 'theme_uniglos');
$default = '';
$setting = new admin_setting_configtextarea($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// This is the descriptor for Alert Three.
$name = 'theme_uniglos/alert3info';
$heading = get_string('alert3', 'theme_uniglos');
$setting = new admin_setting_heading($name, $heading, $information);
$temp->add($setting);

// Enable Alert.
$name = 'theme_uniglos/enable3alert';
$title = get_string('enablealert', 'theme_uniglos');
$description = get_string('enablealertdesc', 'theme_uniglos');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Alert Type.
$name = 'theme_uniglos/alert3type';
$title = get_string('alerttype', 'theme_uniglos');
$description = get_string('alerttypedesc', 'theme_uniglos');
$alertinfo = get_string('alert_info', 'theme_uniglos');
$alertwarning = get_string('alert_warning', 'theme_uniglos');
$alertgeneral = get_string('alert_general', 'theme_uniglos');
$default = 'info';
$choices = array('info' => $alertinfo, 'warning' => $alertwarning, 'success' => $alertgeneral);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Alert Title.
$name = 'theme_uniglos/alert3title';
$title = get_string('alerttitle', 'theme_uniglos');
$description = get_string('alerttitledesc', 'theme_uniglos');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Alert Text.
$name = 'theme_uniglos/alert3text';
$title = get_string('alerttext', 'theme_uniglos');
$description = get_string('alerttextdesc', 'theme_uniglos');
$default = '';
$setting = new admin_setting_configtextarea($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$ADMIN->add('theme_uniglos', $temp);
