<?php

namespace Webkul\Shop\Http\Controllers;

use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Core\Repositories\SliderRepository;
use Webkul\Product\Repositories\SearchRepository;

use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Slider repository instance.
     *
     * @var \Webkul\Core\Repositories\SliderRepository
     */
    protected $sliderRepository;

    /**
     * Search repository instance.
     *
     * @var \Webkul\Core\Repositories\SearchRepository
     */
    protected $searchRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\SliderRepository  $sliderRepository
     * @param  \Webkul\Product\Repositories\SearchRepository  $searchRepository
     * @return void
     */
    public function __construct(
        SliderRepository $sliderRepository,
        SearchRepository $searchRepository
    ) {
        $this->sliderRepository = $sliderRepository;

        $this->searchRepository = $searchRepository;

        parent::__construct();
    }

    /**
     * Loads the home page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sliderData = $this->sliderRepository->getActiveSliders();

        return view($this->_config['view'], compact('sliderData'));
    }

    public function ReferAfriend(Request $request)
    {
        if(isset($request->first_name))
        {
            //dd($request);
            $_token = $request->input('_token');

            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $friend_email = $request->input('friend_email');

            $to_mail = $friend_email;
            $mail_subject = "Refer a frient ";
            $mail_content = "
Dear Sir,

You are refered for ". $first_name .' '. $last_name ." for 
".url('home')."

Thanks you.
            ";

            Mail::raw($mail_content, function ($message) use($to_mail,$mail_subject) {
                $message->to($to_mail)
                        ->from('mail@link3.net', 'Brac University')
                        ->subject($mail_subject);
              });
        }
        

        $data = '';
        return view($this->_config['view'], compact('data'));
    }
    public function mysterybox()
    {
        $mystery = '';
        return view($this->_config['view'], compact('mystery'));
    }
    public function giftcards()
    {
        $gift = '';
        return view($this->_config['view'], compact('gift'));
    }
    public function loyaltyProgram()
    {
        $loyaltyprogram = '';
        return view($this->_config['view'], compact('loyaltyprogram'));
    }
    public function subscribtionAnd()
    {
        $subscribtion = '';
        return view($this->_config['view'], compact('subscribtion'));
    }
    public function subscriptionCardform()
    {
        $subscriptioncart = '';
        return view($this->_config['view'], compact('subscriptioncart'));
    }
    /**
     * Loads the home page for the storefront if something wrong.
     *
     * @return \Exception
     */
    public function notFound()
    {
        abort(404);
    }

    /**
     * Upload image for product search with machine learning.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return $this->searchRepository->uploadSearchImage(request()->all());
    }
}
