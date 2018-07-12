<?php

class BaseController extends Controller {

    public $siteLanguage;
    public $languageLabels;
    public $currentLanguage;

    public function __construct() {
        $currentLang = \LanguageLabel::chooser();
        $this->currentLanguage = $currentLang == 'en' ? '' : $currentLang;
        $this->siteLanguage = SiteLanguage::lists('slug', 'name');
        $this->languageLabels = \Config::get('languages');
    }

    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

}
