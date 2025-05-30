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

defined('MOODLE_INTERNAL') || die();

class edit_caption extends edit_base {

    public function __construct($gallery, $cm, $image, $tab) {
        parent::__construct($gallery, $cm, $image, $tab, true);
    }

    public function output($captiontext = '') {
        $result = '<textarea name="caption" class="form-control" cols="24" rows="4">'.$captiontext.'</textarea><br /><br />'.
                  '<input type="submit" class="btn btn-secondary"  value="'.get_string('update').'" />';
        return $this->enclose_in_form($result);
    }

    public function process_form() {
        $caption = required_param('caption', PARAM_NOTAGS);
        $this->lbgimage->set_caption($caption);
    }

}
