function rejectRegistration(id)
{
    result = confirm("Apakah anda yakin menolak pendaftaran ini?");
    if(result)
    {
        window.location = "function/reject_registration.php?registrationid="+ id;
    }

}

function acceptRegistration(id)
{
    result = confirm("Apakah anda yakin menerima pendaftaran ini?");
    if(result)
    {
        window.location = "function/accept_registration.php?registrationid="+ id;
    }

}

function deleteRegistration(id)
{
    result = confirm("Apakah anda yakin menghapus pendaftaran ini?");
    if(result)
    {
        window.location = "function/delete_registration.php?registrationid="+ id;
    }

}

function passRegistration(id)
{
    result = confirm("Apakah anda yakin meluluskan pendaftaran ini?");
    if(result)
    {
        window.location = "function/pass_registration.php?registrationid="+ id;
    }

}

function closeRegistration()
{
    result = confirm("Apakah anda yakin menutup pendaftaran?");
    if(result)
    {
        window.location = "index.php?page=close_registration";
    }

}

function openRegistration()
{
    result = confirm("Apakah anda yakin membuka pendaftaran?");
    if(result)
    {
        window.location = "index.php?page=open_registration";
    }

}


function deactiveLesson(id)
{
    result = confirm("Apakah anda yakin menonaktifkan mata pelajaran ini?");
    if(result)
    {
        window.location = "function/deactive_lesson.php?lessonid="+ id;
    }

}

function deactiveTeacher(id)
{
    result = confirm("Apakah anda yakin menonaktifkan guru ini?");
    if(result)
    {
        window.location = "function/deactive_teacher.php?teacherid="+ id;
    }

}

function deactiveUser(id)
{
    result = confirm("Apakah anda yakin menonaktifkan user ini?");
    if(result)
    {
        window.location = "function/deactive_user.php?userid="+ id;
    }
}

function activeUser(id)
{
    result = confirm("Apakah anda yakin mengaktifkan user ini?");
    if(result)
    {
        window.location = "function/active_user.php?userid="+ id;
    }
}