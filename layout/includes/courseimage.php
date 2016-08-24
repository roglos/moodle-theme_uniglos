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
 * Theme uniglos course images logic layout includes file.
 *
 * @package    theme_uniglos
 * @copyright  2016 RM Oelmann, University of Gloucestershire (roelmann@glos.ac.uk)
 * @credits    Bas Brands - Bootstrap
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
global $CFG, $COURSE;

if (empty($CFG->courseoverviewfileslimit)) {
    return array();
}
require_once($CFG->libdir. '/filestorage/file_storage.php');
require_once($CFG->dirroot. '/course/lib.php');
$fs = get_file_storage();
$context = context_course::instance($COURSE->id);
$files = $fs->get_area_files($context->id, 'course', 'overviewfiles', false, 'filename', false);
if (count($files)) {
    $overviewfilesoptions = course_overviewfiles_options($COURSE->id);
    $acceptedtypes = $overviewfilesoptions['accepted_types'];
    if ($acceptedtypes !== '*') {
        // Filter only files with allowed extensions.
        require_once($CFG->libdir. '/filelib.php');
        foreach ($files as $key => $file) {
            if (!file_extension_in_typegroup($file->get_filename(), $acceptedtypes)) {
                unset($files[$key]);
            }
        }
    }
    if (count($files) > $CFG->courseoverviewfileslimit) {
        // Return no more than $CFG->courseoverviewfileslimit files.
        $files = array_slice($files, 0, $CFG->courseoverviewfileslimit, true);
    }
}

// Display course overview files.
$courseimage = ''; // Default is no image.
$courseheaderclass = '';
foreach ($files as $file) {
    $isimage = $file->is_valid_image();
    if ($isimage) {
        $courseimage = file_encode_url("$CFG->wwwroot/pluginfile.php",
            '/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
            $file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
    }
}
