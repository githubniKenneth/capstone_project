





$(document).ready(function () {
    $('.form-check-input.group').change(function () {
        var groupId = $(this).attr('id').split('_').pop();
        $('.form-check-input.group_id_' + groupId).prop('checked', $(this).prop('checked'));
    });


    $('.form-check-input.module').change(function () {
        var moduleId = $(this).attr('id').split('_').pop();
        // var groupId = $(this).attr('class').split('_').pop();
        // console.log(groupId);
        // check permissions of module
        $('.form-check-input.module_id_' + moduleId).prop('checked', $(this).prop('checked'));
        // check permissions of group parent
        // $('.form-check-input#parent_group_' + groupId).prop('checked', $(this).prop('checked'));
        // $('.form-check-input.group_permission_' + groupId).prop('checked', $(this).prop('checked'));
    });



});