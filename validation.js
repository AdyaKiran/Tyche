function form_validation()
{
	var fname=document.forms["form1"]["t1"].value;
	if(fname==""){
		alert("First Name should not be empty");
		return false;
	}
	var lname=document.forms["form1"]["t2"].value;
	if(lname==""){
		alert("Last Name should not be empty");
		return false;
	}
	var day=document.forms["form1"]["s1"].value;
	if(day=="dd"){
		alert("Day of birth should not be empty");
		return false;
	}
	var month=document.forms["form1"]["s2"].value;
	if(month=="mm"){
		alert("Month of birth should not be empty");
		return false;
	}
	var year=document.forms["form1"]["s3"].value;
	if(year=="yyyy"){
		alert("Year of birth should not be empty");
		return false;
	}
	var room=document.forms["form1"]["t3"].value;
	if(room==""){
		alert("Room Number should not be empty");
		return false;
	}
	//if(!alphanumeric(room))
	//{	alert("Room number not valid");
	//	return false;
	//}
	var block=document.forms["form1"]["t4"].value;
	if(block==""){
		alert("Block Name should not be empty");
		return false;
	}
	
	var city=document.forms["form1"]["t5"].value;
	if(city==""){
		alert("city Name should not be empty");
		return false;
	}	
	
	var code, i, len;

  		for (i = 0, len = city.length; i < len; i++) {
    		code = city.charCodeAt(i);
    		if (!(code > 47 && code < 58) && // numeric (0-9)
        		!(code > 64 && code < 91) && // upper alpha (A-Z)
        		!(code > 96 && code < 123)) { // lower alpha (a-z)
					alert("PLEASE ENTER VALID CITY NAME!!");
      				return false;
    			}
  			}
	
	var state=document.forms["form1"]["t6"].value;
	if(state==""){
		alert("State Name should not be empty");
		return false;
	}

	var code, i, len;

  		for (i = 0, len = state.length; i < len; i++) {
    		code = state.charCodeAt(i);
    		if (!(code > 64 && code < 91) && // upper alpha (A-Z)
        		!(code > 96 && code < 123)) { // lower alpha (a-z)
					alert("PLEASE ENTER VALID STATE NAME!!");
      				return false;
    			}
  			}

	var pin=document.forms["form1"]["t7"].value;
	if(pin==""){
		alert("Pin number should not be empty");
		return false;
	}

	var course=document.forms["form1"]["t8"].value;
	if(course==""){
		alert("Course Name should not be empty");
		return false;
	}
	var code, i, len;

  		for (i = 0, len = course.length; i < len; i++) {
    		code = course.charCodeAt(i);
    		if (
        		!(code > 64 && code < 91) && // upper alpha (A-Z)
        		!(code > 96 && code < 123)) { // lower alpha (a-z)
					alert("PLEASE ENTER VALID COURSE NAME!!");
      				return false;
    			}
  			}
			
			
	var branch=document.forms["form1"]["t9"].value;
	if(branch==""){
		alert("Branch Name should not be empty");
		return false;
	}
	var code, i, len;

  		for (i = 0, len = branch.length; i < len; i++) {
    		code = branch.charCodeAt(i);
    		if (
        		!(code > 64 && code < 91) && // upper alpha (A-Z)
        		!(code > 96 && code < 123)) { // lower alpha (a-z)
					alert("PLEASE ENTER VALID BRANCH NAME!!");
      				return false;
    			}
  			}
	var sem=document.forms["form1"]["s4"].value;
	if(sem=="sem"){
		alert("Semester number should not be empty");
		return false;
	}
	
	
	var email=document.forms["form1"]["t10"].value;
	if(email==""){
		alert("Please Enter Valid Email Address");
		return false;
	}
	
	
}