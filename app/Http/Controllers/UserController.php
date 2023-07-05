<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{

    public function loadImage(User $user)
    {
        if ($user->avatar && Storage::disk('public')->exists($user->avatar))
        {
            $user->avatar = Storage::url($user->avatar);
        } else {
            $user->avatar = '/assets/images/no_avatar.png';
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //Lấy tài khoản đang đăng nhập
        $currentUser = Auth::user();
        //Lấy tất cả các tài khoản trong danh sách
        // $lst=User::all();
        // // Loại bỏ tài khoản đang đăng nhập khỏi danh sách
        // $lst = $lst->reject(function ($user) use ($currentUser) {
        //     return $user->id === $currentUser->id;
        // });
        $lst = User::where('id', '!=', $currentUser->id)->paginate(3);
        foreach($lst as $user)
        {
            $this->loadImage($user);
        }
        return view('users.user-index',['lst'=>$lst]);
    }
//     public function index()
// {
//     $currentUser = Auth::user();
//     $users = User::where('id', '!=', $currentUser->id)->paginate(10);
    
//     foreach ($users as $user) {
//         $this->loadImage($user);
//     }
    
//     return view('users.user-index', compact('users'));
// }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.user-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $lst=User::all();
        $user = User::create([
            
            'first_name'=>$request->first_name,
            'name'=>$request->name,
            'avatar'=>'',
            'email' => $request->email,
            'password' => $request->password,
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'role' => $request->role,
        ]);
        $path = $request->avatar->store('upload/avatar/'.$user->id, 'public');
        $user->avatar=$path;
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->loadImage($user);
        $lst=User::all();
        return view('users.user-edit',['u'=>$user, 'lst'=>$lst]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //kiểm tra ảnh có được cập nhật không
        $path=$user->avatar;
        if ($request->hasFile('avatar') && $request->avatar->isValid()) {
            // Xử lý tệp tin ảnh đã tải lên ở đây
            $path=$request->avatar->store('upload/avatar/'.$user->id, 'public');
        }
        $user->fill([
            'first_name'=>$request->first_name,
            'name'=>$request->name,
            'avatar'=>$path,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'role'=>$request->role,
            'status'=>$request->status,
        ]);
        $user->save();
        // return redirect()->route('tours.show', ['tour'=>$tour]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


    //Filter cho danh sách người dùng
    public function filter(Request $request)
    {
        $role = $request->input('role');
        $active = $request->input('active');
        $inactive = $request->input('inactive');
        
        // Lấy danh sách tài khoản dựa trên các tham số lọc
        $lst = User::query();
        
        if ($role) {
            $lst->where('role', $role);
        }
        
        if ($active && $inactive) {
            // Không áp dụng bộ lọc theo trạng thái nếu cả hai checkbox đều được chọn
        } elseif ($active) {
            $lst->where('status', 1);
        } elseif ($inactive) {
            $lst->where('status', 0);
        }
        
        $lst = $lst->get();
        
        // Trả về view chứa danh sách tài khoản đã lọc
        if ($request->ajax()) {
            return View::make('users.filtered', compact('lst'))->render();
        }
        
        // Trả về view ban đầu khi không sử dụng AJAX
        return view('users.index', compact('lst'));
    }

}
