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
        $isNewLogo = true;
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
                $isNewLogo = false;
            }
            $brand->logo = $request->file('logo')->store('eventLogo');
            $brand->update();
        }
        if ($isNewLogo == true) {
            $event->percent_complete = $event->percent_complete + 10;
        }
        $event->updated_at = Carbon::now();
        $event->update();
        return redirect()->back()->with('success', 'Logo has been uploaded.');
    }

    public function banner(Request $request)
    {
        $isNewBanner = true;
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
                $isNewBanner = false;
            }
            $brand->banner = $request->file('banner')->store('eventBanner');
            $brand->update();
        }
        if ($isNewBanner == true) {
            $event->percent_complete = $event->percent_complete + 10;
        }
        $event->updated_at = Carbon::now();
        $event->update();
        return redirect()->back()->with('success', 'Banner has been uploaded.');
    }
}
