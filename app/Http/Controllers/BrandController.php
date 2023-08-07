<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function logo(Request $request)
    {
        $validated = $request->validate([
            'logo' => 'required|image|max:5000',
        ]);
        $event = Event::find($request->event_id);
        $brand = Brand::where('event_id', $event->id)->first();
        if ($brand == NULL) {
            $brand = new Brand;
            $brand->event_id = $request->event_id;
            $brand->logo = $request->file('logo')->store('eventLogo');
            $brand->save();
        } else {
            if ($brand->logo) {
                Storage::delete($brand->logo);
            }
            $brand->logo = $request->file('logo')->store('eventLogo');
            $brand->update();
        }
        $event->updated_at = Carbon::now();
        if ($event->percent_complete < 60) {
            $event->percent_complete = 60;
        }
        $event->update();
        return redirect()->back()->with('info', 'Logo has been added.');
    }

    public function banner(Request $request)
    {
        $validated = $request->validate([
            'banner' => 'required|image|max:5000',
        ]);
        $event = Event::find($request->event_id);
        $brand = Brand::where('event_id', $event->id)->first();
        if ($brand == NULL) {
            $brand = new Brand;
            $brand->event_id = $request->event_id;
            $brand->banner = $request->file('banner')->store('eventBanner');
            $brand->save();
        } else {
            if ($brand->banner) {
                Storage::delete($brand->banner);
            }
            $brand->banner = $request->file('banner')->store('eventBanner');
            $brand->update();
        }
        $event->updated_at = Carbon::now();
        if ($event->percent_complete < 70) {
            $event->percent_complete = 70;
        }
        $event->update();
        return redirect()->back()->with('info', 'Banner has been added.');
    }
}
