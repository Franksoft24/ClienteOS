// JavaScript Document
function publicaciones()
{
	var posts ="";
	for (var i in post){
		posts += "<div class='post'><h1>"+post[i].Title+"</h1><hr><div class='img'><img alt='"+post[i].IMG+"' width='100%' src='Image/post/"+post[i].IMG+"' height='100%'></div><div class='content'>"+post[i].Content+"</div></div>";
	}
	document.getElementById('post_area').innerHTML=posts;
}

