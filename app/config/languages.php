<?php

return LanguageLabel::lists('value' . \Session::get('current_lang', 'it'), 'label');
