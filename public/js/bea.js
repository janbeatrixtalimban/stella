function checkForm(i){

    function next(i){
      switch(i){
          case 1 :   
                 var element = document.getElementById("profile-tab");
                 element.classList.add("disabled");  
                 var element2 = document.getElementById("home-tab");
                 element2.classList.remove("disabled");    
                 $('#myTab li:nth-child(' + i +') a').tab('show')
            
          break;
          case 2 :    
          var element = document.getElementById("profile-tab");
                    element.classList.remove("disabled");  
                    var element2 = document.getElementById("home-tab");
                    element2.classList.add("disabled");    
                    var element3 = document.getElementById("contact-tab");
                    element3.classList.add("disabled");    
                    $('#myTab li:nth-child(' + i +') a').tab('show')
          break;
          case 3 :    
                    var element = document.getElementById("contact-tab");
                    element.classList.remove("disabled");  
                    var element2 = document.getElementById("profile-tab");
                    element2.classList.add("disabled");    
                    var element3 = document.getElementById("measurement-tab");
                    element3.classList.add("disabled"); 
                    $('#myTab li:nth-child(' + i +') a').tab('show')    
                
            break;
            case 4 :
            var element = document.getElementById("measurement-tab");
            element.classList.remove("disabled");  
            var element2 = document.getElementById("contact-tab");
            element2.classList.add("disabled");    
            $('#myTab li:nth-child(' + i +') a').tab('show')    
        
    break;
          default:   ; 
      }
    }

    return next(i);
   
}