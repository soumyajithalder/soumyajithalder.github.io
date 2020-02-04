/*function btn1(){
document.querySelector(".section1 .height")
        .style.height = '300px';
}

function btn2(){
    var pos=0;
    var id= setInterval(frame,0);
    function frame(){
    if(pos==300){
        clearInterval(id);
    }
    else {
        pos++;
  document.querySelector(".section2 .height")
    .style.marginLeft = pos + 'px';
    }
    }
}

function btn3(){
    org_html="<div>"+document.getElementById("para2").innerHTML+"</div>";
    
}
    
function btn4(){
    document.getElementById("test3").value=" ";
    document.getElementById("btn").disabled=true;
}


function btn5(){
    document.querySelectorAll(".section6 > p")
            .forEach(function (e) {
                if (e.classList.value === "") {
                    e.style.background='rgba(255, 255, 255, 0)';
                }
            })
}


function btn6(){
    var x = document.querySelectorAll(".section7 > div > ul > li");
    var i;
    for (i = 0; i < x.length; i++) {
        if(i==3||i==4||i==5){
            x[i].style.background = "red";
        }
    }
}


function btn7(){
    var x = document.querySelectorAll(".section8 > div > ul > li");
    var i;
    for (i = 1; i < x.length; i++) {
    x[i].style.border = "2px solid red";
    }
}

function btn8(){
    if ( document.querySelector(".content").classList.contains("active") ){
        
        document.querySelector(".content").classList.remove("active");
    }
    else{
        document.querySelector(".content").classList.add("active");
    }
}

function btn9(){
    if ( document.querySelector(".content").classList.contains("active") ){
        
        document.querySelector(".content").classList.remove("active");
    }
    else{
        document.querySelector(".content").classList.add("active");
    }  
}


function btn10(){
    document.querySelector(".section1").scrollIntoView({ behavior: "smooth" })
}
*/




$( document ).ready(function() {
    $("#btn1").click(function()
    {
        $(".section1 .height").height(300);
});
    
    $("#btn2").click(function(){
        var pos=0;
        var id= setInterval(frame,0);
        function frame(){
        if(pos==300){
            clearInterval(id);
        }
        else{
            pos++;
        $(".section2 .height").css({marginLeft:pos+"px"});
        }
        }
});
    
    
        var stickyNavTop = $('.full').offset().top;
		var stickyNav = function(){
		var scrollTop = $(window).scrollTop();
		   if (scrollTop > stickyNavTop && scrollTop < 1080) { 
		       $('.full').addClass('sticky');
		   } else {
		       $('.full').removeClass('sticky'); 
		   }
		};
        stickyNav();
        $(window).scroll(function() {
		    stickyNav();
});
    
    
    $("#btn3").click(function()
    {
        $(".section5>p").eq(1).wrap("<div></div>");
        $("#btn3").attr("disabled",true);
});
    
    
    $("#btn").click(function()
    {
        $(".section9 #test3").val("");
        $("#btn").attr("disabled",true);
});
    
    $("#btn5").click(function()
    {
        $(".section6 > p").not(".intro").css({background:"rgba(255, 255, 255, 0)"});
});
    
    
   $("#btn6").click(function()
    {
        $(".section7 > div > ul > li").slice(3,6).css({background:"red"});
}); 
    
    
  $("#btn7").click(function()
    {
        $(".section8 > div > ul > li").not(":first").css({border:"2px solid red"});
});   
    
    
    $(".section4 .tabcontent > button").click(function()
    {
        $(".section4 .tabcontent .content" ).toggleClass( "active" );
}); 
    
    
    $("#btn10").click(function()
    {
         $("html, body").animate({scrollTop: 0}, 1000);
}); 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
});