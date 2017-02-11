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