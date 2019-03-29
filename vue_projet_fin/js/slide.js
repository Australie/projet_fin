let images=["img/31.jpg","img/32.jpg","img/33.jpg"];

let i=0 ;
    setInterval(function(){
        document.getElementById('slider').src=images[i];
        i++;
        if(i==3) i=0;
        
    },10000) 
 