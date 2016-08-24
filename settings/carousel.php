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
 * Theme uniglos carousel settings file.
 *
 * @package    theme_uniglos
 * @copyright  2016 RM Oelmann, University of Gloucestershire (roelmann@glos.ac.uk)
 * @credits    Bas Brands - Bootstrap
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$temp = new admin_settingpage('theme_uniglos_carousel', get_string('carouselheading', 'theme_uniglos'));
$temp->add(new admin_setting_heading('theme_uniglos_carousel', get_string('carouselheadingsub', 'theme_uniglos'),
    format_text(get_string('carouseldesc', 'theme_uniglos'), FORMAT_MARKDOWN)));

// Toggle Slideshow.
$name = 'theme_uniglos/toggleslideshow';
$title = get_string('toggleslideshow', 'theme_uniglos');
$description = get_string('toggleslideshowdesc', 'theme_uniglos');
$alwaysdisplay = get_string('alwaysdisplay', 'theme_uniglos');
$displaybeforelogin = get_string('displaybeforelogin', 'theme_uniglos');
$displayafterlogin = get_string('displayafterlogin', 'theme_uniglos');
$dontdisplay = get_string('dontdisplay', 'theme_uniglos');
$default = 1;
$choices = array(
    1 => $alwaysdisplay,
    2 => $displaybeforelogin,
    3 => $displayafterlogin,
    0 => $dontdisplay);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Number of slides.
$name = 'theme_uniglos/numberofslides';
$title = get_string('numberofslides', 'theme_uniglos');
$description = get_string('numberofslides_desc', 'theme_uniglos');
$default = 3;
$choices = array(
    1 => '1',
    2 => '2',
    3 => '3',
    4 => '4',
    5 => '5',
    6 => '6',
    7 => '7',
    8 => '8',
);
$temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

// Hide slideshow on phones.
$name = 'theme_uniglos/hideontablet';
$title = get_string('hideontablet', 'theme_uniglos');
$description = get_string('hideontabletdesc', 'theme_uniglos');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Hide slideshow on tablet.
$name = 'theme_uniglos/hideonphone';
$title = get_string('hideonphone', 'theme_uniglos');
$description = get_string('hideonphonedesc', 'theme_uniglos');
$default = true;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$numberofslides = get_config('theme_uniglos', 'numberofslides');
for ($i = 1; $i <= $numberofslides; $i++) {
    // This is the descriptor for Slide $i.
    $name = 'theme_uniglos/slide' . $i . 'info';
    $heading = get_string('slideno', 'theme_uniglos', array('slide' => $i));
    $information = get_string('slidenodesc', 'theme_uniglos', array('slide' => $i));
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Title.
    $name = 'theme_uniglos/slide' . $i . 'title';
    $title = get_string('slidetitle', 'theme_uniglos');
    $description = get_string('slidetitledesc', 'theme_uniglos');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = 'theme_uniglos/slide'.$i.'image';
    $title = get_string('slideimage', 'theme_uniglos');
    $description = get_string('slideimagedesc', 'theme_uniglos');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide'.$i.'image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption text.
    $name = 'theme_uniglos/slide' . $i . 'caption';
    $title = get_string('slidecaption', 'theme_uniglos');
    $description = get_string('slidecaptiondesc', 'theme_uniglos');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = 'theme_uniglos/slide' . $i . 'url';
    $title = get_string('slideurl', 'theme_uniglos');
    $description = get_string('slideurldesc', 'theme_uniglos');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Button text.
    $name = 'theme_uniglos/slide' . $i . 'button';
    $title = get_string('slidebutton', 'theme_uniglos');
    $description = get_string('slidebuttondesc', 'theme_uniglos');
    $default = 'Read More...';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

}

$ADMIN->add('theme_uniglos', $temp);
