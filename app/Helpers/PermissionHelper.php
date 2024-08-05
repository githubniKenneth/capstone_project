<?php 

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserAccessModule;

class PermissionHelper
{
    public static function getButtonStates($module_code)
    {
        $user_id = Auth::user()->id;
        $buttons = [
            'Create' => '',
            'Read' => '',
            'Delete' => '',
            'Update' => '',
            'Remove' => '',
            'Approve' => '',
            'Disapprove' => '',
            'Email' => '',
        ];

        $crud_access = UserAccessModule::join('modules', 'modules.id', '=', 'user_access_modules.module_id')
                                        ->join('users', 'users.id', '=', 'user_access_modules.user_id')
                                        ->where('user_access_modules.user_id', $user_id)
                                        ->where('modules.module_code', $module_code)
                                        ->select('user_access_modules.permissions')
                                        ->first();

        $accessArray = explode(',', $crud_access->permissions);
        foreach ($buttons as $key => &$value) {
            if (!in_array($key, $accessArray)) {
                $value = 'disabled';
            }
        }

        return $buttons;
    }

    public static function checkAuthorization($module_code, $permission)
    {
        $user_id = Auth::user()->id;

        $function_access = UserAccessModule::join('modules', 'modules.id', '=', 'user_access_modules.module_id')
                                            ->join('users', 'users.id', '=', 'user_access_modules.user_id')
                                            ->where('user_access_modules.user_id', $user_id)
                                            ->where('modules.module_code', $module_code)
                                            ->whereRaw('FIND_IN_SET(?, user_access_modules.permissions)', [$permission])
                                            ->select('user_access_modules.permissions')
                                            ->first();
        $function_access == false ? abort(403, 'Unauthorized action.') : '';
    }
}