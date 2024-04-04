<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SectionTitle;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class FrontendController extends Controller
{
    function index(): View{
        $sectionTitle = $this->getSectionTitles();

        $slider = Slider::where('status', 1)->get();
        $whyChooseUs= WhyChooseUs::where('status', 1)-> get();
        $categories= Category::where(['show_at_home' => 1, 'status'=>1])->get();

        return view('frontend.home.index',
            compact(
              'slider',
              'sectionTitle',
              'whyChooseUs',
              'categories'
            ));
    }

    function getSectionTitles(): Collection {
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title'
        ];
        return SectionTitle::whereIn('key', $keys)->pluck('value','key');
    }

    function showProduct(string $slug): View {
           return view('frontend.pages.product-view');
    }
}
