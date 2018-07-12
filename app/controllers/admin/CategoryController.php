<?php

namespace Admin;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator;
use Category as CategoryModel;
use SiteLanguage;

class CategoryController extends \BaseController {

    public function __construct() {
        parent::__construct();
        $this->beforeFilter(function() {
                    if (!Session::has('admin_id')) {
                        return Redirect::route('admin.auth.login');
                    }
                });
    }

    public function index() {
        $param['categories'] = CategoryModel::paginate(PAGINATION_SIZE);
        $param['pageNo'] = 5;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }

        return View::make('admin.category.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function create() {
        $param['pageNo'] = 5;

        $param['icons'] = ['fa-automobile', 'fa fa-bank', 'fa fa-behance', 'fa fa-behance-square', 'fa fa-bomb', 'fa fa-building',
            'fa fa-cab', 'fa fa-car', 'fa fa-child', 'fa fa-circle-o-notch', 'fa fa-circle-thin', 'fa fa-codepen',
            'fa fa-cube', 'fa fa-cubes', 'fa fa-database', 'fa fa-delicious', 'fa fa-deviantart', 'fa fa-digg',
            'fa fa-drupal', 'fa fa-empire', 'fa fa-envelope-square', 'fa fa-fax', 'fa fa-file-archive-o', 'fa fa-file-audio-o',
            'fa fa-file-code-o', 'fa fa-file-excel-o', 'fa fa-file-image-o', 'fa fa-file-movie-o', 'fa fa-file-pdf-o',
            'fa fa-file-photo-o', 'fa fa-file-picture-o', 'fa fa-file-powerpoint-o', 'fa fa-file-sound-o', 'fa fa-file-video-o',
            'fa fa-file-word-o', 'fa fa-file-zip-o', 'fa fa-ge', 'fa fa-git', 'fa fa-git-square', 'fa fa-google',
            'fa fa-graduation-cap', 'fa fa-hacker-news', 'fa fa-header', 'fa fa-history', 'fa fa-institution', 'fa fa-joomla',
            'fa fa-jsfiddle', 'fa fa-language', 'fa fa-life-bouy', 'fa fa-life-ring', 'fa fa-life-saver', 'fa fa-mortar-board',
            'fa fa-openid', 'fa fa-paper-plane', 'fa fa-paper-plane-o', 'fa fa-paragraph', 'fa fa-paw', 'fa fa-pied-piper',
            'fa fa-pied-piper-alt', 'fa fa-pied-piper-square', 'fa fa-qq', 'fa fa-ra', 'fa fa-rebel', 'fa fa-recycle', 'fa fa-reddit',
            'fa fa-reddit-square', 'fa fa-send', 'fa fa-send-o', 'fa fa-share-alt', 'fa fa-share-alt-square', 'fa fa-slack',
            'fa fa-sliders', 'fa fa-soundcloud', 'fa fa-space-shuttle', 'fa fa-spoon', 'fa fa-spotify', 'fa fa-steam',
            'fa fa-steam-square', 'fa fa-stumbleupon', 'fa fa-stumbleupon-circle', 'fa fa-support', 'fa fa-taxi', 'fa fa-tencent-weibo',
            'fa fa-tree', 'fa fa-university', 'fa fa-vine', 'fa fa-wechat', 'fa fa-weixin', 'fa fa-wordpress', 'fa fa-yahoo',
            'fa fa-adjust', 'fa fa-anchor', 'fa fa-archive', 'fa fa-arrows', 'fa fa-arrows-h', 'fa fa-arrows-v', 'fa fa-asterisk',
            'fa fa-automobile', 'fa fa-ban', 'fa fa-bank', 'fa fa-bar-chart-o', 'fa fa-barcode', 'fa fa-bars', 'fa fa-beer',
            'fa fa-bell', 'fa fa-bell-o', 'fa fa-bolt', 'fa fa-bomb', 'fa fa-book', 'fa fa-bookmark', 'fa fa-bookmark-o',
            'fa fa-briefcase', 'fa fa-bug', 'fa fa-building', 'fa fa-building-o', 'fa fa-bullhorn', 'fa fa-bullseye', 'fa fa-cab',
            'fa fa-calendar', 'fa fa-calendar-o', 'fa fa-camera', 'fa fa-camera-retro', 'fa fa-car', 'fa fa-caret-square-o-down',
            'fa fa-caret-square-o-left', 'fa fa-caret-square-o-right', 'fa fa-caret-square-o-up', 'fa fa-certificate', 'fa fa-check',
            'fa fa-check-circle', 'fa fa-check-circle-o', 'fa fa-check-square', 'fa fa-check-square-o', 'fa fa-child', 'fa fa-circle',
            'fa fa-circle-o', 'fa fa-circle-o-notch', 'fa fa-circle-thin', 'fa fa-clock-o', 'fa fa-cloud', 'fa fa-cloud-download',
            'fa fa-cloud-upload', 'fa fa-code', 'fa fa-code-fork', 'fa fa-coffee', 'fa fa-cog', 'fa fa-cogs', 'fa fa-comment',
            'fa fa-comment-o', 'fa fa-comments', 'fa fa-comments-o', 'fa fa-compass', 'fa fa-credit-card', 'fa fa-crop',
            'fa fa-crosshairs', 'fa fa-cube', 'fa fa-cubes', 'fa fa-cutlery', 'fa fa-dashboard', 'fa fa-database', 'fa fa-desktop',
            'fa fa-dot-circle-o', 'fa fa-download', 'fa fa-edit', 'fa fa-ellipsis-h', 'fa fa-ellipsis-v', 'fa fa-envelope',
            'fa fa-envelope-o', 'fa fa-envelope-square', 'fa fa-eraser', 'fa fa-exchange', 'fa fa-exclamation',
            'fa fa-exclamation-circle', 'fa fa-exclamation-triangle', 'fa fa-external-link', 'fa fa-external-link-square',
            'fa fa-eye', 'fa fa-eye-slash', 'fa fa-fax', 'fa fa-female', 'fa fa-fighter-jet', 'fa fa-file-archive-o',
            'fa fa-file-audio-o', 'fa fa-file-code-o', 'fa fa-file-excel-o', 'fa fa-file-image-o', 'fa fa-file-movie-o',
            'fa fa-file-pdf-o', 'fa fa-file-photo-o', 'fa fa-file-picture-o', 'fa fa-file-powerpoint-o', 'fa fa-file-sound-o',
            'fa fa-file-video-o', 'fa fa-file-word-o', 'fa fa-file-zip-o', 'fa fa-film', 'fa fa-filter', 'fa fa-fire',
            'fa fa-fire-extinguisher', 'fa fa-flag', 'fa fa-flag-checkered', 'fa fa-flag-o', 'fa fa-flash', 'fa fa-flask',
            'fa fa-folder', 'fa fa-folder-o', 'fa fa-folder-open', 'fa fa-folder-open-o', 'fa fa-frown-o', 'fa fa-gamepad',
            'fa fa-gavel', 'fa fa-gear', 'fa fa-gears', 'fa fa-gift', 'fa fa-glass', 'fa fa-globe', 'fa fa-graduation-cap',
            'fa fa-group', 'fa fa-hdd-o', 'fa fa-headphones', 'fa fa-heart', 'fa fa-heart-o', 'fa fa-history', 'fa fa-home',
            'fa fa-image', 'fa fa-inbox', 'fa fa-info', 'fa fa-info-circle', 'fa fa-institution', 'fa fa-key', 'fa fa-keyboard-o',
            'fa fa-language', 'fa fa-laptop', 'fa fa-leaf', 'fa fa-legal', 'fa fa-lemon-o', 'fa fa-level-down', 'fa fa-level-up',
            'fa fa-life-bouy', 'fa fa-life-ring', 'fa fa-life-saver', 'fa fa-lightbulb-o', 'fa fa-location-arrow', 'fa fa-lock',
            'fa fa-magic', 'fa fa-magnet', 'fa fa-mail-forward', 'fa fa-mail-reply', 'fa fa-mail-reply-all', 'fa fa-male',
            'fa fa-map-marker', 'fa fa-meh-o', 'fa fa-microphone', 'fa fa-microphone-slash', 'fa fa-minus', 'fa fa-minus-circle',
            'fa fa-minus-square', 'fa fa-minus-square-o', 'fa fa-mobile', 'fa fa-mobile-phone', 'fa fa-money', 'fa fa-moon-o',
            'fa fa-mortar-board', 'fa fa-music', 'fa fa-navicon', 'fa fa-paper-plane', 'fa fa-paper-plane-o', 'fa fa-paw',
            'fa fa-pencil', 'fa fa-pencil-square', 'fa fa-pencil-square-o', 'fa fa-phone', 'fa fa-phone-square', 'fa fa-photo',
            'fa fa-picture-o', 'fa fa-plane', 'fa fa-plus', 'fa fa-plus-circle', 'fa fa-plus-square', 'fa fa-plus-square-o',
            'fa fa-power-off', 'fa fa-print', 'fa fa-puzzle-piece', 'fa fa-qrcode', 'fa fa-question', 'fa fa-question-circle',
            'fa fa-quote-left', 'fa fa-quote-right', 'fa fa-random', 'fa fa-recycle', 'fa fa-refresh', 'fa fa-reorder', 'fa fa-reply',
            'fa fa-reply-all', 'fa fa-retweet', 'fa fa-road', 'fa fa-rocket', 'fa fa-rss', 'fa fa-rss-square', 'fa fa-search',
            'fa fa-search-minus', 'fa fa-search-plus', 'fa fa-send', 'fa fa-send-o', 'fa fa-share', 'fa fa-share-alt',
            'fa fa-share-alt-square', 'fa fa-share-square', 'fa fa-share-square-o', 'fa fa-shield', 'fa fa-shopping-cart',
            'fa fa-sign-in', 'fa fa-sign-out', 'fa fa-signal', 'fa fa-sitemap', 'fa fa-sliders', 'fa fa-smile-o', 'fa fa-sort',
            'fa fa-sort-alpha-asc', 'fa fa-sort-alpha-desc', 'fa fa-sort-amount-asc', 'fa fa-sort-amount-desc', 'fa fa-sort-asc',
            'fa fa-sort-desc', 'fa fa-sort-down', 'fa fa-sort-numeric-asc', 'fa fa-sort-numeric-desc', 'fa fa-sort-up',
            'fa fa-space-shuttle', 'fa fa-spinner', 'fa fa-spoon', 'fa fa-square', 'fa fa-square-o', 'fa fa-star', 'fa fa-star-half',
            'fa fa-star-half-empty', 'fa fa-star-half-full', 'fa fa-star-half-o', 'fa fa-star-o', 'fa fa-suitcase', 'fa fa-sun-o',
            'fa fa-support', 'fa fa-tablet', 'fa fa-tachometer', 'fa fa-tag', 'fa fa-tags', 'fa fa-tasks', 'fa fa-taxi',
            'fa fa-terminal', 'fa fa-thumb-tack', 'fa fa-thumbs-down', 'fa fa-thumbs-o-down', 'fa fa-thumbs-o-up', 'fa fa-thumbs-up',
            'fa fa-ticket', 'fa fa-times', 'fa fa-times-circle', 'fa fa-times-circle-o', 'fa fa-tint', 'fa fa-toggle-down',
            'fa fa-toggle-left', 'fa fa-toggle-right', 'fa fa-toggle-up', 'fa fa-trash-o', 'fa fa-tree', 'fa fa-trophy',
            'fa fa-truck', 'fa fa-umbrella', 'fa fa-university', 'fa fa-unlock', 'fa fa-unlock-alt', 'fa fa-unsorted', 'fa fa-upload',
            'fa fa-user', 'fa fa-users', 'fa fa-video-camera', 'fa fa-volume-down', 'fa fa-volume-off', 'fa fa-volume-up',
            'fa fa-warning', 'fa fa-wheelchair', 'fa fa-wrench'];
        return View::make('admin.category.create')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function edit($id) {
        $param['pageNo'] = 5;
        $param['category'] = CategoryModel::find($id);

        $param['icons'] = ['fa-automobile', 'fa fa-bank', 'fa fa-behance', 'fa fa-behance-square', 'fa fa-bomb', 'fa fa-building',
            'fa fa-cab', 'fa fa-car', 'fa fa-child', 'fa fa-circle-o-notch', 'fa fa-circle-thin', 'fa fa-codepen',
            'fa fa-cube', 'fa fa-cubes', 'fa fa-database', 'fa fa-delicious', 'fa fa-deviantart', 'fa fa-digg',
            'fa fa-drupal', 'fa fa-empire', 'fa fa-envelope-square', 'fa fa-fax', 'fa fa-file-archive-o', 'fa fa-file-audio-o',
            'fa fa-file-code-o', 'fa fa-file-excel-o', 'fa fa-file-image-o', 'fa fa-file-movie-o', 'fa fa-file-pdf-o',
            'fa fa-file-photo-o', 'fa fa-file-picture-o', 'fa fa-file-powerpoint-o', 'fa fa-file-sound-o', 'fa fa-file-video-o',
            'fa fa-file-word-o', 'fa fa-file-zip-o', 'fa fa-ge', 'fa fa-git', 'fa fa-git-square', 'fa fa-google',
            'fa fa-graduation-cap', 'fa fa-hacker-news', 'fa fa-header', 'fa fa-history', 'fa fa-institution', 'fa fa-joomla',
            'fa fa-jsfiddle', 'fa fa-language', 'fa fa-life-bouy', 'fa fa-life-ring', 'fa fa-life-saver', 'fa fa-mortar-board',
            'fa fa-openid', 'fa fa-paper-plane', 'fa fa-paper-plane-o', 'fa fa-paragraph', 'fa fa-paw', 'fa fa-pied-piper',
            'fa fa-pied-piper-alt', 'fa fa-pied-piper-square', 'fa fa-qq', 'fa fa-ra', 'fa fa-rebel', 'fa fa-recycle', 'fa fa-reddit',
            'fa fa-reddit-square', 'fa fa-send', 'fa fa-send-o', 'fa fa-share-alt', 'fa fa-share-alt-square', 'fa fa-slack',
            'fa fa-sliders', 'fa fa-soundcloud', 'fa fa-space-shuttle', 'fa fa-spoon', 'fa fa-spotify', 'fa fa-steam',
            'fa fa-steam-square', 'fa fa-stumbleupon', 'fa fa-stumbleupon-circle', 'fa fa-support', 'fa fa-taxi', 'fa fa-tencent-weibo',
            'fa fa-tree', 'fa fa-university', 'fa fa-vine', 'fa fa-wechat', 'fa fa-weixin', 'fa fa-wordpress', 'fa fa-yahoo',
            'fa fa-adjust', 'fa fa-anchor', 'fa fa-archive', 'fa fa-arrows', 'fa fa-arrows-h', 'fa fa-arrows-v', 'fa fa-asterisk',
            'fa fa-automobile', 'fa fa-ban', 'fa fa-bank', 'fa fa-bar-chart-o', 'fa fa-barcode', 'fa fa-bars', 'fa fa-beer',
            'fa fa-bell', 'fa fa-bell-o', 'fa fa-bolt', 'fa fa-bomb', 'fa fa-book', 'fa fa-bookmark', 'fa fa-bookmark-o',
            'fa fa-briefcase', 'fa fa-bug', 'fa fa-building', 'fa fa-building-o', 'fa fa-bullhorn', 'fa fa-bullseye', 'fa fa-cab',
            'fa fa-calendar', 'fa fa-calendar-o', 'fa fa-camera', 'fa fa-camera-retro', 'fa fa-car', 'fa fa-caret-square-o-down',
            'fa fa-caret-square-o-left', 'fa fa-caret-square-o-right', 'fa fa-caret-square-o-up', 'fa fa-certificate', 'fa fa-check',
            'fa fa-check-circle', 'fa fa-check-circle-o', 'fa fa-check-square', 'fa fa-check-square-o', 'fa fa-child', 'fa fa-circle',
            'fa fa-circle-o', 'fa fa-circle-o-notch', 'fa fa-circle-thin', 'fa fa-clock-o', 'fa fa-cloud', 'fa fa-cloud-download',
            'fa fa-cloud-upload', 'fa fa-code', 'fa fa-code-fork', 'fa fa-coffee', 'fa fa-cog', 'fa fa-cogs', 'fa fa-comment',
            'fa fa-comment-o', 'fa fa-comments', 'fa fa-comments-o', 'fa fa-compass', 'fa fa-credit-card', 'fa fa-crop',
            'fa fa-crosshairs', 'fa fa-cube', 'fa fa-cubes', 'fa fa-cutlery', 'fa fa-dashboard', 'fa fa-database', 'fa fa-desktop',
            'fa fa-dot-circle-o', 'fa fa-download', 'fa fa-edit', 'fa fa-ellipsis-h', 'fa fa-ellipsis-v', 'fa fa-envelope',
            'fa fa-envelope-o', 'fa fa-envelope-square', 'fa fa-eraser', 'fa fa-exchange', 'fa fa-exclamation',
            'fa fa-exclamation-circle', 'fa fa-exclamation-triangle', 'fa fa-external-link', 'fa fa-external-link-square',
            'fa fa-eye', 'fa fa-eye-slash', 'fa fa-fax', 'fa fa-female', 'fa fa-fighter-jet', 'fa fa-file-archive-o',
            'fa fa-file-audio-o', 'fa fa-file-code-o', 'fa fa-file-excel-o', 'fa fa-file-image-o', 'fa fa-file-movie-o',
            'fa fa-file-pdf-o', 'fa fa-file-photo-o', 'fa fa-file-picture-o', 'fa fa-file-powerpoint-o', 'fa fa-file-sound-o',
            'fa fa-file-video-o', 'fa fa-file-word-o', 'fa fa-file-zip-o', 'fa fa-film', 'fa fa-filter', 'fa fa-fire',
            'fa fa-fire-extinguisher', 'fa fa-flag', 'fa fa-flag-checkered', 'fa fa-flag-o', 'fa fa-flash', 'fa fa-flask',
            'fa fa-folder', 'fa fa-folder-o', 'fa fa-folder-open', 'fa fa-folder-open-o', 'fa fa-frown-o', 'fa fa-gamepad',
            'fa fa-gavel', 'fa fa-gear', 'fa fa-gears', 'fa fa-gift', 'fa fa-glass', 'fa fa-globe', 'fa fa-graduation-cap',
            'fa fa-group', 'fa fa-hdd-o', 'fa fa-headphones', 'fa fa-heart', 'fa fa-heart-o', 'fa fa-history', 'fa fa-home',
            'fa fa-image', 'fa fa-inbox', 'fa fa-info', 'fa fa-info-circle', 'fa fa-institution', 'fa fa-key', 'fa fa-keyboard-o',
            'fa fa-language', 'fa fa-laptop', 'fa fa-leaf', 'fa fa-legal', 'fa fa-lemon-o', 'fa fa-level-down', 'fa fa-level-up',
            'fa fa-life-bouy', 'fa fa-life-ring', 'fa fa-life-saver', 'fa fa-lightbulb-o', 'fa fa-location-arrow', 'fa fa-lock',
            'fa fa-magic', 'fa fa-magnet', 'fa fa-mail-forward', 'fa fa-mail-reply', 'fa fa-mail-reply-all', 'fa fa-male',
            'fa fa-map-marker', 'fa fa-meh-o', 'fa fa-microphone', 'fa fa-microphone-slash', 'fa fa-minus', 'fa fa-minus-circle',
            'fa fa-minus-square', 'fa fa-minus-square-o', 'fa fa-mobile', 'fa fa-mobile-phone', 'fa fa-money', 'fa fa-moon-o',
            'fa fa-mortar-board', 'fa fa-music', 'fa fa-navicon', 'fa fa-paper-plane', 'fa fa-paper-plane-o', 'fa fa-paw',
            'fa fa-pencil', 'fa fa-pencil-square', 'fa fa-pencil-square-o', 'fa fa-phone', 'fa fa-phone-square', 'fa fa-photo',
            'fa fa-picture-o', 'fa fa-plane', 'fa fa-plus', 'fa fa-plus-circle', 'fa fa-plus-square', 'fa fa-plus-square-o',
            'fa fa-power-off', 'fa fa-print', 'fa fa-puzzle-piece', 'fa fa-qrcode', 'fa fa-question', 'fa fa-question-circle',
            'fa fa-quote-left', 'fa fa-quote-right', 'fa fa-random', 'fa fa-recycle', 'fa fa-refresh', 'fa fa-reorder', 'fa fa-reply',
            'fa fa-reply-all', 'fa fa-retweet', 'fa fa-road', 'fa fa-rocket', 'fa fa-rss', 'fa fa-rss-square', 'fa fa-search',
            'fa fa-search-minus', 'fa fa-search-plus', 'fa fa-send', 'fa fa-send-o', 'fa fa-share', 'fa fa-share-alt',
            'fa fa-share-alt-square', 'fa fa-share-square', 'fa fa-share-square-o', 'fa fa-shield', 'fa fa-shopping-cart',
            'fa fa-sign-in', 'fa fa-sign-out', 'fa fa-signal', 'fa fa-sitemap', 'fa fa-sliders', 'fa fa-smile-o', 'fa fa-sort',
            'fa fa-sort-alpha-asc', 'fa fa-sort-alpha-desc', 'fa fa-sort-amount-asc', 'fa fa-sort-amount-desc', 'fa fa-sort-asc',
            'fa fa-sort-desc', 'fa fa-sort-down', 'fa fa-sort-numeric-asc', 'fa fa-sort-numeric-desc', 'fa fa-sort-up',
            'fa fa-space-shuttle', 'fa fa-spinner', 'fa fa-spoon', 'fa fa-square', 'fa fa-square-o', 'fa fa-star', 'fa fa-star-half',
            'fa fa-star-half-empty', 'fa fa-star-half-full', 'fa fa-star-half-o', 'fa fa-star-o', 'fa fa-suitcase', 'fa fa-sun-o',
            'fa fa-support', 'fa fa-tablet', 'fa fa-tachometer', 'fa fa-tag', 'fa fa-tags', 'fa fa-tasks', 'fa fa-taxi',
            'fa fa-terminal', 'fa fa-thumb-tack', 'fa fa-thumbs-down', 'fa fa-thumbs-o-down', 'fa fa-thumbs-o-up', 'fa fa-thumbs-up',
            'fa fa-ticket', 'fa fa-times', 'fa fa-times-circle', 'fa fa-times-circle-o', 'fa fa-tint', 'fa fa-toggle-down',
            'fa fa-toggle-left', 'fa fa-toggle-right', 'fa fa-toggle-up', 'fa fa-trash-o', 'fa fa-tree', 'fa fa-trophy',
            'fa fa-truck', 'fa fa-umbrella', 'fa fa-university', 'fa fa-unlock', 'fa fa-unlock-alt', 'fa fa-unsorted', 'fa fa-upload',
            'fa fa-user', 'fa fa-users', 'fa fa-video-camera', 'fa fa-volume-down', 'fa fa-volume-off', 'fa fa-volume-up',
            'fa fa-warning', 'fa fa-wheelchair', 'fa fa-wrench'];

        return View::make('admin.category.edit')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function store() {

        $rules = ['name' => 'required'];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            if (Input::has('category_id')) {
                $id = Input::get('category_id');
                $category = CategoryModel::find($id);
            } else {
                $category = new CategoryModel;
            }
            foreach ($this->siteLanguage as $value) {
                $nameCtrl = 'name' . $value;
                $descCtrl = 'description' . $value;
                $category->$nameCtrl = Input::get($nameCtrl);
                $category->$descCtrl = Input::get($descCtrl);
            }
            $category->icon = Input::get('icon');
            $category->save();

            $alert['msg'] = $this->languageLabels['Category has been saved successfully'];
            $alert['type'] = 'success';

            return Redirect::route('admin.category')->with('alert', $alert);
        }
    }

    public function delete($id) {
        try {
            CategoryModel::find($id)->delete();

            $alert['msg'] = $this->languageLabels['Category has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This category has been already used'];
            $alert['type'] = 'danger';
        }

        return Redirect::route('admin.category')->with('alert', $alert);
    }

}
