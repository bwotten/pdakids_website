var default_content="";

$(document).ready(function(){
	
	checkURL();
	$('ul li a').click(function (e){

			checkURL(this.hash);

	});
	
	//filling in the default content
	default_content = $('#pageContent').html();
	
	
	setInterval("checkURL()",250);
	
});

var lasturl="";

function checkURL(hash)
{
	if(!hash) hash=window.location.hash;
	
	if(hash != lasturl)
	{
		lasturl=hash;
		
		// FIX - if we've used the history buttons to return to the homepage,
		// fill the pageContent with the default_content
		
		if(hash=="")
		$('#pageContent').html(default_content);
		
		else
		loadPage(hash);
	}
}


function loadPage(url)
{
	url=url.replace('#page','');
	
	$('#loading').css('visibility','visible');

	$.ajax({ url: 'please.php',
 			data: 'I should be able to put a dummy string here',
 			dataType: 'text',
 			type: 'post',
 			success: function(output) {
              alert(output);
              $('#loading').css('visibility','hidden');
          }
 	});
	//$.ajax({
	//	type: "POST",
	//	url: "load_page.php",
	//	data: 'page='+url,
	//	dataType: "html",
	//	success: function(msg){
	//		alert('the server returned ' + msg);
	//		if(parseInt(msg)!=0)
	//		{
	//			$('#pageContent').html(msg);
	//			$('#loading').css('visibility','hidden');
	//		}
	//	}
	//	
	//});

}