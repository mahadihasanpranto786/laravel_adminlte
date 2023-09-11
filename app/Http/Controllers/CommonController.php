<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function checkEmailAddress(Request $request)
    {
        $email = $request->email;
        $emailCheck = User::where('email', 'LIKE', "%$email%")->first();
        if (!$emailCheck) {
            echo 1;
        } else {
            echo 2;
        }
    }
    public function checkPhoneNumber(Request $request)
    {
        $phone = $request->phone;
        $phoneCheck = User::where('phone', 'LIKE', "%$phone%")->first();
        if (!$phoneCheck) {
            echo 1;
        } else {
            echo 2;
        }
    }

    public function editProfile(Request $request)
    {
        $data['user'] = $request->user();
        return view('backend.profile.edit', $data);
    }
    //CKEDITOR image uploaded mod
    public function ckImageUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('uploads/backend/ckimages/'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/uploads/backend/ckimages/' . $fileName);
            $response = "<script>
                window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')
            </script>";
            echo $response;
        }
    }
}
