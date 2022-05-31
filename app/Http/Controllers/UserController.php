<?php

namespace App\Http\Controllers;

use App\User;
// use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB, Image, File, Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FormatImportUser;
use App\Imports\UserImport;

class UserController extends Controller
{
    function __construct(User $data)
    {
        // $this->middleware('permission:feedback-list');
        // $this->middleware('permission:feedback-create',['only' => ['create','store']]);
        // $this->middleware('permission:feedback-edit',['only' => ['edit','update']]);
        // $this->middleware('permission:feedback-delete',['only' => ['delete']]);

        $this->data = $data;
    }
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required',

        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);


        $user = User::create($input);



        return redirect()->route('user.index')

            ->with('success', 'User created successfully');
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email,' . $id,

            'password' => 'required',


        ]);


        $input = $request->all();

        if (!empty($input['password'])) {

            $input['password'] = Hash::make($input['password']);

        }
        else {

            $input = array_except($input, array('password'));

        }


        $user = User::find($id);

        #upload logic
        if ($request->hasFile('foto')) {
            dd($user->foto);
            #hapus foto lama
            if ($user->foto) {
                try {
                    File::delete(public_path() . $user->foto);
                }
                catch (FileNotFoundException $e) {
                #file not found
                }
            }


            $file = $request->file('foto');
            $filename = str_slug($request->name) . '.' . $file->getClientOriginalExtension();
            $path = $request->file('foto')->storeAs('public/user/', $filename, 'local');
            $input['foto'] = '/storage' . substr($path, strpos($path, '/'));



            $thumbnailpath = public_path() . $input['foto'];
            $img = Image::make($thumbnailpath)->resize(300, 300, function ($constrait) {
                $constrait->aspectRatio();
            });
            $img->save($thumbnailpath);
        }



        $user->update($input);



        return redirect()->route('user.index')

            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }

    public function rolePermission(Request $request)
    {
        $role = $request->get('role');

        //Default, set dua buah variable dengan nilai null
        $permissions = null;
        $hasPermission = null;

        //Mengambil data role
        $roles = Role::all()->pluck('name');

        //apabila parameter role terpenuhi
        if (!empty($role)) {
            //select role berdasarkan namenya, ini sejenis dengan method find()
            $getRole = Role::findByName($role);

            //Query untuk mengambil permission yang telah dimiliki oleh role terkait
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $getRole->id)->get()->pluck('name')->all();

            //Mengambil data permission
            $permissions = Permission::all()->pluck('name');
        }
        return view('users.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function pageImport()
    {

        return view('users.import');
    }
    public function generateExcelTemplate()
    {
        return Excel::download(new FormatImportUser(), 'FormatDataUser.xlsx');
    }

    public function importExcel(Request $request)
    {
        // validasi untuk memastikan file yang diupload adalah excel
        $this->validate($request, ['excel' => 'required|mimes:xls,xlsx']);
        // ambil file yang baru diupload
        $excel = $request->file('excel');
        // baca sheet pertama

        $excels = Excel::import(new UserImport, $excel);
        // rule untuk validasi setiap row pada file excel
        $rowRules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
            'id_pkm' => 'required'
        ];

        // looping setiap baris, mulai dari baris ke 2 (karena baris ke 1 adalah nama kolom)
        foreach ($excel as $row) {
            // Membuat validasi untuk row di excel
            // Disini kita ubah baris yang sedang di proses menjadi array
            $validator = Validator::make($row->toArray(), $rowRules);
            // Skip baris ini jika tidak valid, langsung ke baris selanjutnya
            if ($validator->fails()) {
                continue;
            }

            // Syntax dibawah dieksekusi jika baris excel ini valid

            $data = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
                'role' => $row['role'],
                'id_pkm' => $row['id_pkm'],

            ]);
            $data->assignRole($row('role'));
            // catat id dari buku yang baru dibuat
            array_push($data_id, $data->id);
        }

        // Tampilkan index buku
        return redirect()->route('user.index')->with('success', 'Berhasil mengimport Data Puskesmas');
    }
}
