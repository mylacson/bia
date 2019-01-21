<?php

namespace App\Http\Controllers;

use App\Device;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['devices'] = Device::getList();
        return view('home', $data);
    }

    public function startDevice(Request $request, $id)
    {
        $device = Device::getByPk($id);
        if (empty($id) || empty($device)) {
            abort('404');
        }
        $type = false;
        try {
            \DB::transaction(function () use ($device, &$type) {
                $device->status = Device::DANGCHOI;
                if ($device->save()) {
                    $post = new Post();
                    $post->device_id = $device->id;
                    $post->time_start = date('Y-m-d H:i:s');
                    $post->status = Post::DANGCHOI;
                    $post->created_by = Auth::user()->id;
                    $post->updated_by = Auth::user()->id;
                    $post->save();
                    $type = true;
                }

            });
        } catch (Exception $e) {
            $type = false;
        }
        if ($type) {
            $request->session()->flash('success', __('Cập nhật thành công.'));
        } else {
            $request->session()->flash('error', __('Cập nhật thất bại! hãy thử lại sau vài phút!!!'));
        }
        return redirect()->route('home');
    }
}
