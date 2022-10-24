<?php

namespace App\Repositories;

use App\Models\UserData;

class UserDataRepository
{
    protected $userData;

    public function __construct(UserData $userData)
    {
        $this->userData = $userData;
    }

    public function save($request, $user): UserData
    {
        $userData = new UserData();
        $userData->userid = $user['id'];
        $userData->birth_date = $request['birth_date'];
        $userData->ctzn = $request['ctzn'];
        $userData->per_adr = $request['per_adr'];
        $userData->pport_issue_place = $request['pport_issue_place'];
        $userData->sur_name = $request['sur_name'];
        $userData->gd = $request['gd'];
        $userData->natn = $request['natn'];
        $userData->pport_issue_date = $request['pport_issue_date'];
        $userData->pport_expr_date = $request['pport_expr_date'];
        $userData->pport_no = $request['pport_no'];
        $userData->pin = $request['pin'];
        $userData->mob_phone_no = $request['mob_phone_no'];
        $userData->user_id = $request['user_id'];
        $userData->email = $request['email'];
        $userData->birth_place = $request['birth_place'];
        $userData->mid_name = $request['mid_name'];
        $userData->valid = $request['valid'];
        $userData->user_type = $request['user_type'];
        $userData->ret_cd = $request['ret_cd'];
        $userData->first_name = $request['first_name'];
        $userData->full_name = $request['full_name'];
        $userData->save();

        return $userData;
    }
}
