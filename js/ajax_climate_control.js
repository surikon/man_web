var b = false;

function update()
{
    $.post("http://mysite.zz/chat/get_all_messages", {}, function(data)
    {
        var div = document.getElementById('screen');
        div.innerHTML = data;

        if(b == false) {
            div.scrollTop = 99999999;
            b = true;
        }
    });

    setTimeout('update()', 700);
}

$(document).ready(

    function()
    {
        update();
    });