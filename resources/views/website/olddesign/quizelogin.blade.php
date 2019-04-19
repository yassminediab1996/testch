<html !DOCTYPE>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <style>
        body {
    background-color: #e9ebee;
}
	body{
	    
	    font-family : Tajawal !important;
	    
	}
.card {
    margin-top: 1em;
}

/* IMG displaying */
.person-card {
    margin-top: 5em;
    padding-top: 5em;
}
.person-card .card-title{
    text-align: center;
}
.person-card .person-img{
    width: 10em;
    position: absolute;
    top: -5em;
    left: 50%;
    margin-left: -5em;
    border-radius: 100%;
    overflow: hidden;
    background-color: white;
}
    </style>
    <body style="    background-color: white;">
      <div class="container" style="margin-top: 1em;">
    <!-- Sign up form -->
    <form action="{{url('userquize')}}" method="post">
        {{csrf_field()}}
        <div style="    margin: 0 45%;" >
                <h1 >welcome  </h1>
                <h1 style="    margin: 0 50px;">in</h1>
                <img  class="person-img" style="background-color:unset !important;"
                    src="{{asset('images/final site logo.png')}}">
        </div>
          
            <div class="row">
                <div class="col-md-12" style="padding=0.5em;">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Register To Play :</h2>
                            
                               <div class="form-group">
                                <label for="name" class="col-form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Type your Name" required>
                                <div class="name-feedback">
                                
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
                                <div class="email-feedback">
                                
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tel" class="col-form-label">Phone number</label>
                                <input type="text" class="form-control" id="tel" name="phone" placeholder="+33 6 99 99 99 99" required>
                                <div class="phone-feedback">
                                
                                </div>
                            </div>
                         
                           
                        </div>
                    </div>
                </div>
                    
            </div>
            <div style="margin-top: 1em;">
                <button type="submit" class="btn btn-success btn-lg btn-block">Sign up !</button>
            </div>
        </form>
</div>
    </body>
    <script>
        // URLs images
        var female_img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo8PcCxh7tT6MDFhJi2UaAT9SeciHqvZuaWtGg0y0-yyP8rMDz";
        var male_img = "https://visualpharm.com/assets/217/Life%20Cycle-595b40b75ba036ed117d9ef0.svg";
        
        // On page loaded
        $( document ).ready(function() {
            // Set the sex image
            set_sex_img();
            
            // Set the "who" message
            set_who_message();
        
            // On change sex input
            $("#input_sex").change(function() {
                // Set the sex image
                set_sex_img();
                set_who_message();
            });
        
            // On change fist name input
            $("#first_name").keyup(function() {
                // Set the "who" message
                set_who_message();
                
                if(validation_name($("#first_name").val()).code == 0) {
                    $("#first_name").attr("class", "form-control is-invalid");
                    $("#first_name_feedback").html(validation_name($("#first_name").val()).message);
                } else {
                    $("#first_name").attr("class", "form-control");
                }
            });
        
            // On change last name input
            $("#last_name").keyup(function() {
                // Set the "who" message
                set_who_message();
                
                if(validation_name($("#last_name").val()).code == 0) {
                    $("#last_name").attr("class", "form-control is-invalid");
                    $("#last_name_feedback").html(validation_name($("#last_name").val()).message);
                } else {
                    $("#last_name").attr("class", "form-control");
                }
            });
        });
        
        /**
        *   Set image path (Mr. or Ms.)
        */
        function set_sex_img() {
            var sex = $("#input_sex").val();
            if (sex == "Mr.") {
                // male
                $("#img_sex").attr("src", male_img);
            } else {
                // female
                $("#img_sex").attr("src", female_img);
            }
        }
        
        /**
        *   Set "who" message
        */
        function set_who_message() {
            var sex = $("#input_sex").val();
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            
            if (validation_name(first_name).code == 0 || 
                validation_name(last_name).code == 0) {
                // Informations not completed
                $("#who_message").html("Who are you ?");
            } else {
                // Informations completed
                $("#who_message").html(sex+" "+first_name+" "+last_name);
            }
        }
        
        /**
        *   Validation function for last name and first name
        */
        function validation_name (val) {
            if (val.length < 2) {
                // is not valid : name length
                return {"code":0, "message":"The name is too short."};
            }
            if (!val.match("^[a-zA-Z\- ]+$")) {
                // is not valid : bad character
                return {"code":0, "message":"The name use non-alphabetics chars."};
            }
            
            // is valid
            return {"code": 1};
        }
    </script>
</html>


