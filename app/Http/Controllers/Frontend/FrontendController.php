<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\RequestFiles;
use App\Models\Backend\Requests;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;
use Milon\Barcode\Facades\Barcode;
use function Monolog\toArray;


class FrontendController extends Controller
{
    public function index()
    {


        return view('Frontend.index');

    }

    public function pay($code){

        return view('Frontend.pay',compact('code'));
    }

    public function payGo(Request $request)
    {

        $Pay = Requests::where('code', $request->code)->first();

        $Pay->status = 5;
        $Pay->save();
        return redirect()->route('sucssess',$Pay->code);

    }

    public function request(){


        return view('Frontend.request');
//        return view('Frontend.request');

    }
    public function request_edit($code)
    {
        $data = Requests::with('files')->where('code',$code)->first();

        if ($data->user_id == Auth::id())
        {
        return view('Frontend.request_edit',compact('data'));
        }else{
            abort(404);
        }

    }
    public function request_update(Request $request, $id)
    {
        $update = Requests::where('id',$id)->first();
        $update->name_ar = $request->name_ar;
        $update->name_en = $request->name_en;
        $update->birth_date = date('Y-m-d',strtotime($request->birth_date));
        $update->mobile = $request->mobile;
        $update->address = $request->address;
        $update->nationality = $request->nationality;
        $update->type = $request->type;
        $update->update_date = date('Y-m-d');
        $update->status = 4;
        $update->save();

        if ($request->file('personal_photo')) {
            $file = $request->file('personal_photo');
            $fileName = 'personal_photo' . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('requests/'.$update->code, $fileName, 'uploads');

            $update_file = RequestFiles::findOrFail($request->id_personal_photo);
            $update_file->file = $update->code.'/'. $fileName;
            $update_file->save();
        }
        if ($request->file('passport')) {
            $file = $request->file('passport');
            $fileName = 'passport' . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('requests/'.$update->code, $fileName, 'uploads');

            $update_file = RequestFiles::findOrFail($request->id_passport);
            $update_file->file = $update->code.'/'. $fileName;
            $update_file->save();
        }
        if ($request->file('stamp_paper')) {
            $file = $request->file('stamp_paper');
            $fileName = 'stamp_paper' . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('requests/'.$update->code, $fileName, 'uploads');

            $update_file = RequestFiles::findOrFail($request->id_stamp_paper);
            $update_file->file = $update->code.'/'. $fileName;
            $update_file->save();
        }

        return redirect()->route('sucssess',$update->code);

    }
    public function request_store(Request $request)
    {
        $store = new Requests();
        $store->user_id = Auth::id();
        $store->code = random_int(100000, 999999);
        $store->name_ar = $request->name_ar;
        $store->name_en = $request->name_en;
        $store->birth_date = date('Y-m-d',strtotime($request->birth_date));
        $store->mobile = $request->mobile;
        $store->address = $request->address;
        $store->nationality = $request->nationality;
        $store->type = $request->type;
        $store->submit_date = date('Y-m-d');
        $store->payed = 0;
        $store->status = 0;
        $store->save();

        if ($request->file('personal_photo')) {
            $file = $request->file('personal_photo');
            $fileName = 'personal_photo' . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('requests/'.$store->code, $fileName, 'uploads');
            $req_file = new RequestFiles();
            $req_file->request_id =$store->id ;
            $req_file->name = 'personal_photo' ;
            $req_file->file = $store->code.'/'. $fileName;
            $req_file->save();
        }
        if ($request->file('passport')) {
            $file = $request->file('passport');
            $fileName = 'passport' . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('requests/'.$store->code, $fileName, 'uploads');
            $req_file = new RequestFiles();
            $req_file->request_id =$store->id ;
            $req_file->name = 'passport' ;
            $req_file->file = $store->code.'/'. $fileName;
            $req_file->save();
        }
        if ($request->file('stamp_paper')) {
            $file = $request->file('stamp_paper');
            $fileName = 'stamp_paper' . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('requests/'.$store->code, $fileName, 'uploads');
            $req_file = new RequestFiles();
            $req_file->request_id =$store->id ;
            $req_file->name = 'stamp_paper' ;
            $req_file->file = $store->code.'/'. $fileName;
            $req_file->save();
        }

        $message =
'*تم تسجيل طلبكم بنجاح*

كود الطلب هوه : *'.$store->code.'*
يرجى متابعة الطلب خلال 4 ايام عمل
من خلال الرابط التالي

' .route('sucssess',$store->code);
        ;
        $mobile = '01033087172';
        whatsapp($mobile, $message);
        return redirect()->route('sucssess',$store->code);

    }
    public function sucssess($code)
    {
        $user = Requests::where('code',$code)->first();

        $data['name'] = $user->name_ar;
        $data['code'] = $user->code;
        $data['status'] = $user->status;
        $data['date'] = $user->submit_date;
        $data['update_date'] = $user->update_date;
        $data['appointment_date'] = $user->appointment_date;
        if ($user->user_id == Auth::id())
        {
            return view('Frontend.success_request',compact('data'));
        }else{
            abort(404);
        }


    }


   public function tracking(){


        return view('Frontend.tracking');

   }
    public function trackingGo(Request $request){

        $validate = Requests::where('code',$request->code)->first();

        if ($validate == null){
            return redirect()->back()->withErrors('عفوا هذا الكود غير صحيح تاكد من صحة الكود')->withInput();
        }
        if ($validate->user_id != Auth::id()){
            return redirect()->back()->withErrors('عفوا هذه البيانات مسجلة برقم موبايل اخر يرجي تسجيل الدخول برقم الموبايل المسجل بة الطلب')->withInput();
        }

        return redirect()->route('sucssess',$request->code);


    }


    public function login(){

        return view('Frontend.login');

    }
    public function otp(Request $request){

        $validator = Validator::make($request->all(), [
            'mobile' => ['required', 'min:11','max:11']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }

        $otp = random_int(100000, 999999);

        $cutomer_validation = User::where('mobile', $request->mobile)->first();
        if (!empty($cutomer_validation)) {
            $user = User::findOrFail($cutomer_validation->id);
            $user->otp = $otp;
            $user->save();
            //            $data['otp_value'] = $otp
        } else {
           $newUser = new User();
           $newUser->mobile = $request->mobile;
           $newUser->email = $request->mobile.'@gmail.com';
           $newUser->name = $request->mobile;
            $newUser->otp = $otp;
            $newUser->save();
        }


        $message = $otp . ' ' . 'هوه كود التحقق الخاص بكم لا تشاركة مع احد';
        $mobile = $request->mobile;
        whatsapp($mobile, $message);

        return view('Frontend.validate',compact('mobile'));



    }
    public function otp_validate(Request  $request)
    {

            $cutomer_validation = User::where('mobile', $request->mobile)->first();

            if ($cutomer_validation->otp != $request->otp) {
                return redirect()->back()->withErrors([
                    'status' => 'error',
                    'errors' => 'OTP Number is invalid', 'عفوا رقم التحقق غير صحيح'
                ])->withInput();


            }

            $remove_otp = User::findOrFail($cutomer_validation->id);
            $remove_otp->otp = null;
            $remove_otp->save();
//            $user->tokens()->delete();

        Auth::login($cutomer_validation);


        return to_route('frontend.index');


    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



    public function dashboard()
    {
        $datas = Requests::query()
            ->when(\request()->type != null, function ($query) {
                $query->where('status',\request()->type);
            })
        ->get();
        return view('Frontend.dashboard',compact('datas'));

    }
    public function review($id)
    {
        $data = Requests::with('files')->first();
        return view('Frontend.review',compact('data'));

    }
    public function review_update(Request  $request)
    {
        $update = Requests::with('files')->where('id',$request->id)->first();

        $update->name_ar = $request->name_ar;
        $update->name_en = $request->name_en;
        $update->birth_date = date('Y-m-d',strtotime($request->birth_date));
        $update->mobile = $request->mobile;
        $update->address = $request->address;
        $update->nationality = $request->nationality;
        $update->type = $request->type;
        $update->update_date = date('Y-m-d');
        $update->updated_by = Auth::id();

        if ($request->id_personal_photo) {

            $update_file = RequestFiles::findOrFail($request->id_personal_photo);
            $update_file->comment = $request->comment_personal_photo;
            $update_file->status = $request->status_personal_photo;
            $update_file->save();
        }
        if ($request->id_passport) {
            $update_file = RequestFiles::findOrFail($request->id_passport);
            $update_file->comment = $request->comment_passport;
            $update_file->status = $request->status_passport;
            $update_file->save();
        }
        if ($request->id_stamp_paper) {

            $update_file = RequestFiles::findOrFail($request->id_stamp_paper);
            $update_file->comment = $request->comment_stamp_paper;
            $update_file->status = $request->status_stamp_paper;
            $update_file->save();
        }

        if ($request->paid){
            $update->payed = 1;
            $update->appointment_date = date('Y-m-d',strtotime(Carbon::now()->addDay(5)));
            $update->status = 3;
            $update->save();

            $message =
                '*تم الموافقة على طلبكم*

يرجى التوجة الى الادارة العامه للجوازات والهجرة والجنسية
فى تاريخ :*'.$update->appointment_date.'*
مع احضار جميع اصول الاوراق المقدمة فى الطلب'
            ;
            $mobile = '01033087172';
            whatsapp($mobile, $message);


        }else{
            $array = $update->files->pluck('status')->toArray();
            $check = count(array_unique($array)) === 1;
            if ($check)
            {
                $update->status = 1;
                $update->save();

            }else
            {
                $update->status = 2;
                $update->save();

            }
        }


        return redirect()->route('dashboard');
    }

}
