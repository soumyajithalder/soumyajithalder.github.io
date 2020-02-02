function btn1(){
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
