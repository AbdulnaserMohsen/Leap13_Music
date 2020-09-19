$(document).ready(function() 
{
	
	function ajax(type,url,processData,contentType,form,callback)
	{
		var result;
		$.ajax
		({
			type: type, //THIS NEEDS TO BE GET
			url: url,
			dataType: 'json',
			data: form,
			async: false, // to make js wait unitl ajax finish
			processData: processData,
			contentType: contentType,

			success: function (data) 
			{
				result = data;
			},
			error:function(data)
			{ 
				result = data;
			}
		});
		return result;

	}
	
	var type = "GET";
	var url = "https://api.jsonbin.io/b/5eafd4ca47a2266b1472794c";
	var processData = true;
	var contentType = false;
	var formData = {};
	response = ajax(type,url,processData,contentType,formData);
	if(response.hasOwnProperty("tracks"))
	{
		tracks = response.tracks;
		$.each( tracks, function( key, track ) 
		{
		  $(".list-unstyled").append('<li class="playlist-number"><div class="song-info"><h4>'+ track.name +'</h4><p><strong>Length</strong>: '+ track.length +' &nbsp;|&nbsp; <strong>Artist</strong>:'+ track.artist +'&nbsp;</p></div><!-- music icon --><div class="music-icon"><a href="download.php?file='+ track.url +'"><i class="fa fa-download"></i></a></div><div class="clearfix"></div></li>');
			
		});
	
	
	}
	else
	{
		alert("Error",response);
	}
	
	
	$(document).on( "click",".music-icon a", function(event)
	{
		if($("#log").length)
		{
			event.preventDefault();
			$('#modalLoginForm').modal('show');
			$('#login_form').attr('data-file',$(this).attr("href"));
		}
		
	});
	
	$(document).on( "submit",".login", function(event)
	{
		event.preventDefault();
		var type = "POST";
		var url = "authenticate.php";
		var processData = false;
		var contentType = false;
		var form = '#'+$(this).attr('id');
		var formData = new FormData($(form)[0]);
		response = ajax(type,url,processData,contentType,formData);
		console.log(response);
		if(response.message == "Loggedin")
		{
			$("#header").load("index.php #all_nav");
			$(".banner").load("index.php .carousel slide");
			$('.close').trigger('click');
			window.location.href = $(this).attr("data-file");
		}
		else
		{
			$('[name="username"]').parent().parent().removeClass("has-valid true-validate");
			$('[name="username"]').parent().parent().attr("data-validate",response.message);
			$('[name="username"]').parent().parent().addClass("has-invalid alert-validate");
		}
	});
	
	
});