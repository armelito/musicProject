/*  minuteur */


setInterval(function()  
{
    let currentTime = new Date()
    let hour = currentTime.getHours()
    let minute = currentTime.getMinutes()
    let seconde = currentTime.getSeconds()

    minute = ( minute < 10 ? "0" : "" ) + minute   
    seconde = ( seconde < 10 ? "0" : "" ) + seconde

    let timeOfDay = ( hour < 12 ) ? "AM" : "PM"    
  
    hour = ( hour == 0 ) ? 12 : hour    
    let currentTimeString = hour + " " + ":" + " " + minute + " " + ":" + " " + seconde
    document.querySelector(".timer").innerHTML = currentTimeString;
}, 1000)