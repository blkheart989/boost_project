<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function home(){
     $testimonials = DB::table('testimonials')->get();
     $video=DB::table('videos_tables')->get();
     $plans=DB::table('plans')->where('status',1)->get();
     return view('front.index', compact('testimonials','video','plans'));

    }

    public function header(){



    return view('front.layouts.header');

}

public function footer(){



    return view('front.layouts.footer');
}

public function blog(){




    return view('front.blog');
    }
    public function faq(){




    return view('front.faq');
    }
    public function how_it_works(){




    return view('front.how_it_works');
    }
   public function term(){




    return view('front.terms');
    }public function testimonial(){




    return view('front.testimonial');
    }
public function dashboard(){



return view('front.dashboard');
}

public function testimonial_ajax(){
$testimonials=DB::table('testimonials')->get();
return response()->json($testimonials);

}

public function privacy_policy_page(){



return view('front.privacy-policy');
}

public function refund_policy_page(){




return view('front.refund-policy');
}
public function terms_of_service(){



return view('front.terms-of-service');
}
public function disclaimer_page(){


return view('front.disclaimer');

}



}
