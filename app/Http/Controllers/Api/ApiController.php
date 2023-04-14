<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artical;
use App\Models\Client;
use App\Models\CompanySetting;
use App\Models\Portfolio;
use App\Models\Price;
use App\Models\slider;
use App\Models\Team;
use Illuminate\Http\Request;
use function Symfony\Component\Console\Style\success;

class ApiController extends Controller
{
    public function slider()
    {
        $slider = slider::get();
        return response()->json($slider);
    }

    public function Portfolio()
    {
        $Portfolio = Portfolio::get();
        return response()->json($Portfolio);
    }

    public function Price()
    {
        $Price = Price::get();
        return response()->json($Price);
    }

    public function client()
    {
        $client = Client::get();
        return response()->json($client);
    }

    public function team()
    {
        $team = Team::get();
        return response()->json($team);
    }

    public function artical()
    {
        $artical = Artical::get();
        return response()->json($artical);
    }

    public function setting()
    {
        $setting = CompanySetting::get();
        return response()->json($setting);
    }
}
