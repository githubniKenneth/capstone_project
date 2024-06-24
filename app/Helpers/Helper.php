<?php
use App\Models\Group;
use App\Models\Module;


// function menus() {
//     return Group::orderBy('created_at', 'asc')
//     ->where('status', '1')
//     ->get();
    
// }

// $userId = 4;
// function menus($userId) {
//     return Group::select('groups.*', 'modules.*')
//         ->join('user_access_groups', 'groups.id', '=', 'user_access_groups.group_id')
//         ->where('user_access_groups.user_id', $userId)
//         ->where('user_access_groups.permissions', 'LIKE', '%read%')
//         ->where('groups.status', '1')
//         ->orderBy('groups.created_at', 'asc')
//         // for module
//         ->join('modules', 'groups.id', '=', 'modules.group_id')
//         ->join('user_access_modules', 'modules.id', '=', 'user_access_modules.module_id')
//         ->where('user_access_modules.user_id', $userId)
//         ->where('user_access_modules.permissions', 'LIKE', '%read%')
//         ->where('modules.status', '1')
//         ->get();
// }

function menus($userId) {
    // Fetch groups with read permissions
    $groups = Group::select('groups.*')
        ->join('user_access_groups', 'groups.id', '=', 'user_access_groups.group_id')
        ->where('user_access_groups.user_id', $userId)
        ->where('user_access_groups.permissions', 'LIKE', '%read%')
        ->where('groups.status', '1')
        ->orderBy('groups.created_at', 'asc')
        ->distinct()
        ->get();

    // Fetch modules with read permissions
    $modules = Module::select('modules.*')
        ->join('user_access_modules', 'modules.id', '=', 'user_access_modules.module_id')
        ->where('user_access_modules.user_id', $userId)
        ->where('user_access_modules.permissions', 'LIKE', '%read%')
        ->where('modules.status', '1')
        ->get();

    // Associate modules with their respective groups
    $groups->each(function ($group) use ($modules) {
        $group->modules = $modules->where('group_id', $group->id);
    });

    return $groups;
}

function textShortener($texts, $id, $column, $maxText)
{   
    
    $lengthCounter = strlen($texts);

    if($lengthCounter > $maxText)
    {
        $see_less = substr($texts, 0, $maxText);
        $see_more = $texts;
        
                ?> 
                    <span id="see_more_<?php echo $id.$column ?>">
                        <?php echo $see_less."..." ?> <a onclick="myFunction(<?php echo $id ?>, '<?php echo $column ?>')" id="seeText" style="color: blue; cursor:pointer">See More</a> <?php ;?>
                    </span>
                    <span id="see_less_<?php echo $id.$column ?>" style="display: none">
                        <?php echo $see_more ?> <a onclick="myFunction(<?php echo $id ?>, '<?php echo $column ?>')" id="seeText" style="color: blue; cursor:pointer">See Less</a> <?php ;?>
                    </span>
                <?php
        
    }
    else
    {
        echo $texts;
    }

    ?>
        <script>
            function myFunction($id, $column){
                
                var btnText = document.getElementById("seeText");
                var moreText = document.getElementById("see_more_" + $id + $column);
                var lessText = document.getElementById("see_less_" + $id + $column);
                console.log(lessText);
                if (lessText.style.display === "none")
                {
                    lessText.style.display = "inline";
                    moreText.style.display = "none";
                }
                else
                {
                    lessText.style.display = "none";
                    moreText.style.display = "inline";
                }
            }
        </script>
    <?php
}

?>