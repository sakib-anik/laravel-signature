<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignatureController extends Controller
{
    public function sendSignature(Request $request){
        $request->validate([
            'name' => ['required','string'],
            'signature' => ['required']
        ]);

        $base64Image = preg_replace('/^data:image\/\w+;base64,/','',$request->signature);
        $imageData = base64_decode($base64Image);

        $filename = 'image_' . time() . '.png';
        $fileWithPath = 'public/images/'. $filename;

        Storage::put($fileWithPath, $imageData);

        $tempFilePath = asset('storage/images/'.$filename);

        session()->flash('alert-success','Signature Created Successfully.');

        return redirect('/');
    }
}