<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Gender;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Validators\UserValidator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userRepository;
    protected $userValidator;

    public function __construct(UserRepositoryInterface $userRepository, UserValidator $userValidator)
    {
        $this->userRepository = $userRepository;
        $this->userValidator = $userValidator;
    }

    public function showProfileUser()
    {
        $user = $this->userRepository->getProfileUser();
        $pageTitle = trans('models/user.page_title');
        $boxTitle = trans('models/user.box_title.profile');
        $genders = Gender::toSelectArray();

        return view('admin.user.profile', compact('pageTitle', 'boxTitle', 'user', 'genders'));
    }

    public function updateProfileUser(Request $request)
    {
        $inputs = $this->userValidator->validate('updateProfileUser', $request);

        $updated = $this->userRepository->updateProfileUser($inputs);

        if ($updated) {
            return redirect(route('users.profile'))->with('message', trans('common.messages.update'));
        }

        return back()->with('error', trans('common.errors.update'));
    }

    public function formChangePassword()
    {
        $pageTitle = trans('models/user.page_title');
        $boxTitle = trans('models/user.box_title.password');

        return view('admin.user.change_password', compact('pageTitle', 'boxTitle'));
    }

    public function changePassword(Request $request)
    {
        $inputs = $this->userValidator->validate('changePassword', $request);

        $updated = $this->userRepository->changePassword($inputs);

        if ($updated) {
            return redirect(route('users.profile'))->with('message', trans('common.messages.update'));
        }

        return back()->with('error', trans('common.errors.update'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
