<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function setLocale(Request $request, $locale)
    {

        if (in_array($locale, ['en', 'lv', 'de'])) {
            $request->session()->put('locale', $locale);
            App::setLocale($locale);
        }
        return redirect()->back();
    }
}
