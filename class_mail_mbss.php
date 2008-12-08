<?

if (! $CLASS_MAIL_MBSS)
	$CLASS_MAIL_MBSS = TRUE;
else
	return;

include_once ("class_phpmailer.php");

class mbssmail extends phpmailer {

	// Default params 
	var $From	=	"service@Miles4Sale.com";
	var $FromName	=	"Miles4Sale.com";
	var $WordWrap	=	70;
	var $Subject	=	"A Message From Miles4Sale.com";
	var $Sendmail	=	"/usr/sbin/sendmail";

	function mbssmail() {
		//$this->IsMail();

		// For testing purposes
		// $this->AddBCC("m4s@planetzerep.com");
		$this->AddAddress("webmaster@miles4sale.com");
	}

}

?>
