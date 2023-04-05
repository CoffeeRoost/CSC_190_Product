
function validatePassword(password_id, verify_id, submit_id)
{
    value        = document.getElementById(password_id).value;
    length       = ((value.length >= 8) && (value.length <= 64));
    uppercase    = value.match(/[A-Z]/);
    lowercase    = value.match(/[a-z]/);
    special      = value.match(/[^\w]/);
    invalid      = (!length || !uppercase || !lowercase || !special);

    document.getElementById(verify_id).hidden      = !invalid;
    document.getElementById(submit_id).disabled    = invalid;
}