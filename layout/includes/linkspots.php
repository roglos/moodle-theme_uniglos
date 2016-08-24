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
 * Theme uniglos linkspots layout includes file.
 *
 * @package    theme_uniglos
 * @copyright  2016 RM Oelmann, University of Gloucestershire (roelmann@glos.ac.uk)
 * @credits    Bas Brands - Bootstrap
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$numlinkspots = $PAGE->theme->settings->numberoflinkspots;
$colspan = "flexcontent";

?>

<div id="page-linkspots" class="flexcontainer">
        <?php
        for ($linkspot = 1; $linkspot <= $numlinkspots; $linkspot++) {
            $icon = theme_uniglos_get_setting('linkspots'.$linkspot.'icon');
            $title = theme_uniglos_get_setting('linkspots'.$linkspot.'title');
            $url = theme_uniglos_get_setting('linkspots'.$linkspot.'url');
            $class = 'linkspot'.$linkspot.' '.$colspan;
            $linkspotimage = $OUTPUT->pix_url('linkspots/default', 'theme');
            if (theme_uniglos_get_setting('linkspots' . $linkspot . 'image')) {
                $linkspotimage = $PAGE->theme->setting_file_url('linkspots' . $linkspot .
                        'image', 'linkspots' . $linkspot . 'image');
            }
        ?>
                <div class="linkspots-wrapper <?php echo $class;?>">
                    <a href="<?php echo $url;?>">

                    <div class="linkspots-block">
                        <img src="<?php echo $linkspotimage;?>">
                        <div class="linkspots-icon">
                            <i class="fa fa-3x fa-<?php echo $icon;?>"></i>
                        </div>
                        <h4 class="linkspot-title">
                            <?php echo $title;?>
                        </h4>
                    </div>

                    </a>
                </div>
        <?php
        }
        ?>
</div>
