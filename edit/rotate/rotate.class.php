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

class edit_rotate extends edit_base {

    public function __construct($gallery, $cm, $image, $tab) {
        parent::__construct($gallery, $cm, $image, $tab, true);
    }

    public function output() {
        $result = get_string('selectrotation', 'lightboxgallery').'<br /><br />'.
                  '<label class="me-3"><input type="radio" class="form-check-input me-1" name="angle" value="-90" '.
                  '/>-90&#176;</label>'.
                  '<label class="me-3"><input type="radio" class="form-check-input me-1" name="angle" value="180" '.
                  '/>180&#176;</label>'.
                  '<label><input type="radio" class="form-check-input me-1" name="angle" value="90" />90&#176;</label>'.
                  '<br /><br /><input type="submit" class="btn btn-secondary" value="'.
                  get_string('edit_rotate', 'lightboxgallery').'" />';

        return $this->enclose_in_form($result);
    }

    public function process_form() {
        $angle = required_param('angle', PARAM_INT);
        $this->image = $this->lbgimage->rotate_image($angle);
    }

}
