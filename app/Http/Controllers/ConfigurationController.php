<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Configuration;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class ConfigurationController extends Controller
{
    public function update_page(){

        $configurations = Configuration::all();

        $categories = Category::all();

        $colors = array(
            'primary' => 'Blue', 
            'secondary' => 'Grey',
            'info' => 'Light Blue',
            'success' => 'Green',
            'danger' => 'Red',
            'indigo' => 'Indigo',
            'purple' => 'Purple',
            'pink' => 'Pink',
            'navy' => 'Navy',
            'teal' => 'Teal',
            'cyan' => 'Cyan',
            'dark' => 'Black',
            'gray-dark' => 'Dark Gray',
            'light' => 'White',
            'warning' => 'Yellow',
            'orange' => 'Orange'
        );

        return view('configuration.display', compact('configurations', 'colors', 'categories'));
    }

    public function update(Request $request){

        $configurations = Configuration::all();

        foreach($configurations as $configuration){
            $configuration->value = $request->input($configuration->key) ?? $configuration->value;
            $configuration->save();
        }

        if ($request->has('logo')){

            $configuration = Configuration::where('key','logo')->first();

            $img = Image::make($request->file('logo'));

            $img->resize(128,128);

            $path = 'storage/' . Str::random(40) . '.' . $request->file('logo')->getClientOriginalExtension();

            if ($configuration->value != 'storage/configuration/logo.png'){

                unlink($configuration->value);

            }

            $img->save($path);

            $configuration->value = $path;

            $configuration->save();
        }

        if ($request->has('carousel_1_image')){

            $configuration = Configuration::where('key','carousel_1_image')->first();

            $img = Image::make($request->file('carousel_1_image'));

            $img->resize(1919,725);

            $path = 'storage/' . Str::random(40) . '.' . $request->file('carousel_1_image')->getClientOriginalExtension();

            $img->save($path);

            $configuration->value = $path;

            $configuration->save();
        }

        if ($request->has('carousel_2_image')){

            $configuration = Configuration::where('key','carousel_2_image')->first();

            $img = Image::make($request->file('carousel_2_image'));

            $img->resize(1919,725);

            $path = 'storage/' . Str::random(40) . '.' . $request->file('carousel_2_image')->getClientOriginalExtension();

            $img->save($path);

            $configuration->value = $path;

            $configuration->save();
        }

        if ($request->has('carousel_3_image')){

            $configuration = Configuration::where('key','carousel_3_image')->first();

            $img = Image::make($request->file('carousel_3_image'));

            $img->resize(1919,725);

            $path = 'storage/' . Str::random(40) . '.' . $request->file('carousel_3_image')->getClientOriginalExtension();

            $img->save($path);

            $configuration->value = $path;

            $configuration->save();
        }

        return redirect('/config')->with('success',['Your configurations has been successfully updated']);
    }
}
