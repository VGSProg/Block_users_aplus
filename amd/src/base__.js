import {call as fetchMany} from 'core/ajax';

export const ajax_block_users_aplus_user_info = (
    userid
) => fetchMany([{
    methodname: 'block_users_aplus_user_info',
    args: {
        userid
    },
}])[0];




window.block_users_aplus_user_info = function(userId){
    alert('user_info - '+userId);
    const response = await ajax_block_users_aplus_user_info(userId);
    window.console.log(response);
}