function checkform(form)
{
	
	if (form.nume.value == "Numele tau" ) {
        alert( "Va rugam introduceti un nume.\n" );
        form.nume.focus();
        return false ;
    }
    if (form.email.value == "Adresa ta de e-mail" ) {
        alert( "Va rugam introduceti o adesa de e-mail.\n" );
        form.email.focus();
        return false ;
    }
    if (form.mesaj.value =="") {
        alert( "Va rugam introduceti un mesaj.\n" );
        form.mesaj.focus();
        return false ;
    }
	return true ;
}



function validare_newsletter()

	{

		if (document.newsletter_form.newsletter_mail.value.length < 1) 

		{

			alert('Trebuie sa introduceti o adresa de e-mail!');

			return false;

		}

		var myString = document.newsletter_form.newsletter_mail.value;

		if ((myString.indexOf(".") < 2) || (myString.indexOf("@") < 0) || (myString.lastIndexOf(".") < myString.indexOf("@"))) 

		{

			alert('Va rugam introduceti o adresa de e-mail valida!');

			return false;

		}	

		
		
		alert('V-ati inscris la newletter!');
		return true;

	}	