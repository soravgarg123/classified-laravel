<?php

namespace Company;

use Illuminate\Routing\Controllers\Controller;
use View,
    Input,
    Redirect,
    Session,
    Validator,
    Response,
    DB,
    Mail;
use Book as BookModel;
use Company as CompanyModel;
use Website as WebsiteModel;
use Cart as CartModel;
use SiteLanguage;

class BookController extends \BaseController {

    public function __construct()
    {
        $website = DB::table('website')->get();
        $type = $website[0]->value;
        if($type == "offline"){
           header('Location: '.MY_BASE_URL.'/maintenance'); 
        }
        parent::__construct();
    }

    public function index() {
        $param['books'] = BookModel::where('company_id', Session::get('company_id'))->orderBy('created_at', 'DESC')->paginate(PAGINATION_SIZE);
        $param['pageNo'] = 3;
        if ($alert = Session::get('alert')) {
            $param['alert'] = $alert;
        }
        return View::make('company.book.index')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function delete($id) {
        try {
            BookModel::find($id)->delete();

            $book->status = Input::get('status');
            $book->save();
            $books = BookModel::find($id);
            $param = [
                'book_date' => $books->book_date,
                'duration' => $books->duration,
                'store_name' => $books->store->name,
                'user_name' => $books->user->name,
                'status' => 'deleted',
            ];
            $info = [
                'reply_name' => REPLY_NAME,
                'reply_email' => REPLY_EMAIL,
                'email' => $books->user->email,
                'name' => $books->user->name,
                'subject' => SITE_NAME,
            ];

            $currentLang = $_COOKIE['current_lang'];
            if ($currentLang == 'es') {
                Mail::send('email.bookStatus_' . $currentLang, $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            } elseif ($currentLang == 'it') {
                Mail::send('email.bookStatus_' . $currentLang, $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            } else {
                Mail::send('email.bookStatus', $param, function($message) use ($info) {
                            $message->from($info['reply_email'], $info['reply_name']);
                            $message->to($info['email'], $info['name'])
                                    ->subject($info['subject']);
                        });
            }
            $alert['msg'] = $this->languageLabels['Book has been deleted successfully'];
            $alert['type'] = 'success';
        } catch (\Exception $ex) {
            $alert['msg'] = $this->languageLabels['This book has been already used'];
            $alert['type'] = 'danger';
        }

        return Redirect::route('company.book')->with('alert', $alert);
    }

    public function view($id) {
        $param['company'] = CompanyModel::find(Session::get('company_id'));
        $param['cart'] = CartModel::find($id);
        return View::make('company.book.view')->with($param)->with('siteLanguage', $this->siteLanguage)->with('langLbl', $this->languageLabels)
                        ->with('currentLanguage', $this->currentLanguage);
    }

    public function update() {

        $id = Input::get('bookId');

        $books = BookModel::find($id);
        $books->status = Input::get('status');
        $books->save();

        $param = [
            'book_date' => $books->book_date,
            'duration' => $books->duration,
            'store_name' => $books->store->name,
            'user_name' => $books->user->name,
            'status' => 'cancelled',
        ];
        $info = [
            'reply_name' => REPLY_NAME,
            'reply_email' => REPLY_EMAIL,
            'email' => $books->user->email,
            'name' => $books->user->name,
            'subject' => SITE_NAME,
        ];

        $currentLang = $_COOKIE['current_lang'];
        if ($currentLang == 'es') {
            Mail::send('email.bookStatus_' . $currentLang, $param, function($message) use ($info) {
                        $message->from($info['reply_email'], $info['reply_name']);
                        $message->to($info['email'], $info['name'])
                                ->subject($info['subject']);
                    });
        } elseif ($currentLang == 'it') {
            Mail::send('email.bookStatus_' . $currentLang, $param, function($message) use ($info) {
                        $message->from($info['reply_email'], $info['reply_name']);
                        $message->to($info['email'], $info['name'])
                                ->subject($info['subject']);
                    });
        } else {
            Mail::send('email.bookStatus', $param, function($message) use ($info) {
                        $message->from($info['reply_email'], $info['reply_name']);
                        $message->to($info['email'], $info['name'])
                                ->subject($info['subject']);
                    });
        }
        return Response::json(['result' => 'success', 'msg' => 'Status updated successfully!']);
    }

}
