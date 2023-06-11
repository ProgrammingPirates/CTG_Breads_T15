<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Setting;
use App\Models\User;
use App\Models\ZoomMetting;
use App\Traits\ZoomJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ZoomController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;


    public function setKey()
    {
        $data = ZoomMetting::first();
        return view('doctor.setting.setkey',compact('data'));
    }
    public function storeKey(Request $request)
    {
        $request->validate([
            'zoom_api_url' => 'bail|required',
            'zoom_api_secret' => 'bail|required',
            'zoom_api_key' => 'bail|required',
        ]);
        $data = $request->all();
        $meeting = ZoomMetting::first();
        $doctor_id = Doctor::where('user_id',auth()->user()->id)->first()->id;
        $data['doctor_id'] = $doctor_id;
        $meeting->update($data);
        return redirect('/list')->withStatus(__('Set Key Successfully..!!'));

    }


    public function list(Request $request)
    {
        try {
            $path = 'users/me/meetings';
            $response = $this->zoomGet($path);

            $data = json_decode($response->body(), true);
            $data['meetings'] = array_map(function ($m) {
                $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
                return $m;
            }, $data['meetings']);
            return view('doctor.setting.setting',compact('data'));
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            $data['meetings'] = [];
            return view('doctor.setting.setting',compact('data','error'));
        }
    }

    public function createZoomMetting($id)
    {
        $doctor_id = Doctor::where('user_id',auth()->user()->id)->first()->id;
        $data = ZoomMetting::where('doctor_id',$doctor_id)->first();
        if(isset($data))
        {
            return view('doctor.setting.create_zoom_meeting',compact('id'));
        }
        else
        {
            return view('doctor.setting.setkey',compact('data'));
        }

    }
    public function store(Request $request , $id) {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withStatus(__('Enter Valid Start Date..!!'));
            // return [
            //     'success' => false,
            //     'data' => $validator->errors(),
            // ];
        }
        $data = $validator->validated();

        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($data['start_time']),
            'duration' => 30,
            'agenda' => $data['agenda'],
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);
        $appointment = Appointment::find($id);
        $appointment->zoom_url = $response['join_url'];
        $appointment->save();
        $doctor_data = Doctor::where('id',$appointment->doctor_id)->first();
        $doctor = User::where('id',$doctor_data->user_id)->first();
        $patient = User::where('id',$appointment->user_id)->first();
        $notification_template = 'Connect via <b>{{join_url}}</b> for your appointment with the {{doctor_name}}.<br>Timeing : {{start_time}}
         <br><br> {{app_name}}';
        $detail1['join_url'] = $response['join_url'];
        $detail1['doctor_name'] = $doctor->name;
        $detail1['start_time'] = $response['start_time'];
        $detail1['app_name'] = Setting::first()->business_name;
        // $detail1['date'] = $appointment->date;
        $doctor_data = ["{{join_url}}","{{doctor_name}}","{{start_time}}","{{app_name}}"];
        $message = str_replace($doctor_data, $detail1, $notification_template);
        if(Setting::first()->patient_mail == 1){
            try {
                Mail::to($patient->email)->send(new SendMail($message,'Zoom Meeting Schedule'));
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return redirect('/list')->withStatus(__('Create Meeting Successfully..!!'));

    }

    public function editMeeting(string $id) {
        $path = 'meetings/' . $id;
            $response = $this->zoomGet($path);

            $data = json_decode($response->body(), true);
            if ($response->ok()) {
                $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
            }
            return view('doctor.setting.edit_zoom_meeting',compact('data'));
     }

    public function updateMeeting(Request $request, string $id) {

        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withStatus(__('Enter Valid Start Date..!!'));

            // return [
            //     'success' => false,
            //     'data' => $validator->errors(),
            // ];
        }
        $data = $validator->validated();

        $path = 'meetings/' . $id;
        $response = $this->zoomPatch($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => (new \DateTime($data['start_time']))->format('Y-m-d\TH:i:s'),
            'duration' => 30,
            'agenda' => $data['agenda'],
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);

        return redirect('/list')->withStatus(__('Update Meeting Successfully..!!'));
    }

    public function deleteMeeting(Request $request, string $id) {
        $path = 'meetings/' . $id;
        $response = $this->zoomDelete($path);

        return redirect('/list')->withStatus(__('Delete Meeting Successfully..!!'));
     }


}
