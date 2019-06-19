

$(document).ready(function(){

	$('#selectAll').click(function(event){

	if(this.checked) {

	$('.checkBoxes').each(function(){

	    this.checked = true;

	});

} else {


	$('.checkBoxes').each(function(){

	    this.checked = false;

	});


	}

	});



//var div_box="<div id='load-screen'><div id='loading'></div></div>";
//$("body").prepend(div_box);
//$('#load-screen').delay(700).fadeout(600 ,function(){
//	$(this).remove();

//});
    
    
        
    
    });






function loadUserOnline(){
        $.get("function.php?onlineusers=result",function(data){
            
            $(".onlineusers").text(data);
        });
        
        
    }
    setInterval(function(){
    	 loadUserOnline();
    	 },500); 

<<<<<<< HEAD

function hello(){
	$(".Content").addclass("asd");
}
=======
   
>>>>>>> 4390161d9d2d49dba254c865920cba6acbb0f88b


