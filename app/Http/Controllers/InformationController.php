<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\File;


class InformationController extends Controller
{
    public function index()
    {
        $information = Information::first();

        return view('information.index', compact('information'));
    }

    public function edit(Information $information)
    {
        return view('information.update', compact('information'));
    }

    public function update(Request $request, Information $information)
    {
        try {
            $rules = [
                'name' => 'required',
                'slogan' => 'required',
                'description' => 'required',
                'address' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'google_map' => 'required',
                'order_wa' => 'required',
                'website_link' => 'required',
                'instagram' => 'url|nullable',
                'twitter' => 'url|nullable',
                'facebook' => 'url|nullable',
            ];

            if (!$request->hasFile('logo_header') && !$information->logo_header) {
                $rules['logo_header'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
            } elseif ($request->hasFile('logo_header')) {
                $rules['logo_header'] = 'image|mimes:jpeg,jpg,png|max:2048';
            }

            if (!$request->hasFile('logo_favicon') && !$information->logo_favicon) {
                $rules['logo_favicon'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
            } elseif ($request->hasFile('logo_favicon')) {
                $rules['logo_favicon'] = 'image|mimes:jpeg,jpg,png|max:2048';
            }

            if (!$request->hasFile('logo_company') && !$information->logo_company) {
                $rules['logo_company'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
            } elseif ($request->hasFile('logo_company')) {
                $rules['logo_company'] = 'image|mimes:jpeg,jpg,png|max:2048';
            }

            if (!$request->hasFile('image') && !$information->image) {
                $rules['image'] = 'required|image|mimes:jpeg,jpg,png';
            } elseif ($request->hasFile('image')) {
                $rules['image'] = 'image|mimes:jpeg,jpg,png';
            }

            $request->validate($rules);

            $input = $request->except(['_token', '_method']);

            $input['phone'] = (strpos($request->phone, '0') === 0) ? '62' . substr($request->phone, 1) : $request->phone;

            $input['order_wa'] = (strpos($request->order_wa, '0') === 0) ? '62' . substr($request->order_wa, 1) : $request->order_wa;

            if ($input['phone'] !== $information->phone || $input['order_wa'] !== $information->order_wa) {
                $whatsappLink = 'https://wa.me/' . urlencode($input['phone']) . '?text=' . urlencode($input['order_wa']);
                $input['link_wa'] = $whatsappLink;
            }

            if (!empty($information->logo_header) && $request->hasFile('logo_header')) {
                $imagePath = $information->logo_header;

                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            if (!empty($information->logo_favicon) && $request->hasFile('logo_favicon')) {
                $imagePath2 = $information->logo_favicon;

                if (File::exists($imagePath2)) {
                    File::delete($imagePath2);
                }
            }

            if (!empty($information->logo_company) && $request->hasFile('logo_company')) {
                $imagePath3 = $information->logo_company;

                if (File::exists($imagePath3)) {
                    File::delete($imagePath3);
                }
            }

            if (!empty($information->image) && $request->hasFile('image')) {
                $imagePath4 = $information->image;

                if (File::exists($imagePath4)) {
                    File::delete($imagePath4);
                }
            }

            if ($logo_header = $request->file('logo_header')) {
                $destinationPath = 'images/information/logo_header/';
                $profileImage = "information" . "-" . "logo_header" . date('YmdHis') . "." . $logo_header->getClientOriginalExtension();
                $logo_header->move($destinationPath, $profileImage);
                $input['logo_header'] = $destinationPath . $profileImage;
            } elseif (!$request->hasFile('logo_header') && !$information->logo_header) {
                unset($input['logo_header']);
            }

            if ($logo_favicon = $request->file('logo_favicon')) {
                $destinationPath2 = 'images/information/logo_favicon/';
                $profileImage2 = "information" . "-" . "logo_favicon" . date('YmdHis') . "." . $logo_favicon->getClientOriginalExtension();
                $logo_favicon->move($destinationPath2, $profileImage2);
                $input['logo_favicon'] = $destinationPath2 . $profileImage2;
            } elseif (!$request->hasFile('logo_favicon') && !$information->logo_favicon) {
                unset($input['logo_favicon']);
            }

            if ($logo_company = $request->file('logo_company')) {
                $destinationPath3 = 'images/information/logo_company/';
                $profileImage3 = "information" . "-" . "logo_company" . date('YmdHis') . "." . $logo_company->getClientOriginalExtension();
                $logo_company->move($destinationPath3, $profileImage3);
                $input['logo_company'] = $destinationPath3 . $profileImage3;
            } elseif (!$request->hasFile('logo_company') && !$information->logo_company) {
                unset($input['logo_company']);
            }

            if ($image = $request->file('image')) {
                $destinationPath4 = 'images/information/image/';
                $profileImage4 = "information" . "-" . "image" . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath4, $profileImage4);
                $input['image'] = $destinationPath4 . $profileImage4;
            } elseif (!$request->hasFile('image') && !$information->image) {
                unset($input['image']);
            }

            $information->update($input);

            return redirect()->route('information.index')
                ->with('success', 'Information updated successfully');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update information. Please try again.');
        }
    }
}
