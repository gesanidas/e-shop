$(document).ready(function() {
    $("#submit_btn").click(function() { 
        var user_name = $('input[name=m_Name]').val(); 
        var user_email = $('input[name=m_Email]').val();
        var user_paint = $('select[name=m_Paint]').val();
        var user_message = $('textarea[name=m_Mess]').val();
        
        var proceed = true;
        if(user_name==""){ 
            $('input[name=m_Name]').css('border-color','red'); 
            proceed = false;
        }
        if(user_email==""){ 
            $('input[name=m_Email]').css('border-color','red'); 
            proceed = false;
        }
        if(user_message=="") {  
            $('textarea[name=m_Mess]').css('border-color','red'); 
            proceed = false;
        }

        if(proceed) 
        {
            post_data = {'userName':user_name, 'userEmail':user_email, 'userPaint':user_paint, 'userMessage':user_message};
            
              $.ajax({
                url:"includes/contact_me.php", 
                type: "POST",
                data: {'userName':user_name, 'userEmail':user_email, 'userPaint':user_paint, 'userMessage':user_message},
                success:function(result)
                {
                    output = result;
                    $("#result").hide().html(output).slideDown();
                }
         });
            
        }
     });
    
    $("#contact-form input, #contact-form textarea").keyup(function() { 
        $("#contact-form input, #contact-form textarea").css('border-color',''); 
        $("#result").slideUp();
    });
    
    });