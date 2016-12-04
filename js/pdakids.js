$("#contactForm").submit(function(e) {

  	 var arrayLength = document.getElementsByClassName("formField").length;
    var error = 0;
    
    for (i=0; i < arrayLength; i++) { 
		var inputArray = document.getElementsByClassName("formField")[i].classList;
		var errorArray = document.getElementsByClassName("errorField")[i];     
      var inputText = document.getElementsByClassName("formField")[i].value;

		inputArray.remove("errorInput");
		inputArray.add("normalInput");
      errorArray.innerHTML = "";

    	if (inputText == null || inputText == "" || inputText.trim().length == 0) {
        error++;
        var customMessage = ["Patient name", "Your name", "Relationship to patient", "Patient insurance", "Day phone", "Evening phone", "Email", "How you heard about us", "A description"];
        errorArray.innerHTML = "*&nbsp;" + customMessage[i] + " is required.";
		  inputArray.remove("normalInput");
		  inputArray.add("errorInput");
		  }
    }

    if (error !== 0) {
        return false;
    }
 
    $.ajax({
		   url: "submit.php",
           type: "POST",
           data: $("#contactForm").serialize(),     // serialize your form's elements.
           success: function(data)
           {
          		$("#contactForm").html("<div class='well well-sm'><h4 class='text-primary'>Your information has successfully been received. Thank you.</h4></div>");
           }
         });

   document.getElementById("formButton").disabled = true;
   return false;    // avoids default form submission

});
