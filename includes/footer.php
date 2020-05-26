	<footer>
		<p>&copy; නේවාසිකයෝ | University of Colombo School of Computing | 2020</p>
		<p>All rights reserved by RV.</p>
	</footer><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js" integrity="sha256-9p9wUORIjnIRp9PAyZGxql6KgJRNiH04y+8V4JjUhn0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha256-rXnOfjTRp4iAm7hTAxEz3irkXzwZrElV2uRsdJAYjC4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js" integrity="sha256-iMTCex8BQ+iVxpZO83MoRkKBaoh9Dz9h3tEVrM5Rxqo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
        $('.topnav').sticky();
    })

    $(function(){
            $('img.memo').lazyload();
        });
    $(function(){
        $('img.fit').lazyload();
    });
    $(document).ready(function()
		{
			var $canvas=$('#canvas'),
			context=$canvas.get(0).getContext('2d')

			$('#photoName').on('change',function()
			{
				if(this.files && this.files[0])
				{
					if(this.files[0].type.match(/^image\//))
					{
						var reader = new FileReader();

						reader.onload = function(e)
						{
							var img = new Image();
							img.onload = function()
							{
								context.canvas.width=img.width;
								context.canvas.height=img.height;
								context.drawImage(img,0,0);

								//var cropper=$canvas.cropper({}); 
							};
							img.src=e.target.result;
						};
						/*$('#crop').click(function()
						{
							var croppedImage=$canvas.cropper('getCroppedcanvas').toDataURL('image/jpg');
							$('#canvas').append($('<img>').attr('src',croppedImage));
						});*/

						reader.readAsDataURL(this.files[0]);
					}
					else
					{
						alert('Invalid file type');
					}
				}
				else
				{
					alert('Please select a file');
				}
			});
		});
    document.getElementById("eye").addEventListener("mousedown", mouseDown);
    document.getElementById("eye").addEventListener("mouseup", mouseUp);

    function mouseDown()
    {
        document.getElementById("password").setAttribute("type","text");
        document.getElementById("eye").classList.add("fa-eye-slash");
        document.getElementById("eye").classList.remove("fa-eye");
    }
    function mouseUp()
    {   
        document.getElementById("password").setAttribute("type","password");
        document.getElementById("eye").classList.add("fa-eye");
        document.getElementById("eye").classList.remove("fa-eye-slash");
    }
    document.getElementById("eye1").addEventListener("mousedown", mouseDown1);
    document.getElementById("eye1").addEventListener("mouseup", mouseUp1);

    function mouseDown1()
    {
        document.getElementById("password1").setAttribute("type","text");
        document.getElementById("eye1").classList.add("fa-eye-slash");
        document.getElementById("eye1").classList.remove("fa-eye");
    }
    function mouseUp1()
    {   
        document.getElementById("password1").setAttribute("type","password");
        document.getElementById("eye1").classList.add("fa-eye");
        document.getElementById("eye1").classList.remove("fa-eye-slash");
    }
    document.getElementById("eye2").addEventListener("mousedown", mouseDown2);
    document.getElementById("eye2").addEventListener("mouseup", mouseUp2);

    function mouseDown2()
    {
        document.getElementById("password2").setAttribute("type","text");
        document.getElementById("eye2").classList.add("fa-eye-slash");
        document.getElementById("eye2").classList.remove("fa-eye");
    }
    function mouseUp2()
    {   
        document.getElementById("password2").setAttribute("type","password");
        document.getElementById("eye2").classList.add("fa-eye");
        document.getElementById("eye2").classList.remove("fa-eye-slash");
    }
    function check1()
    {
        if(document.getElementById('password').value!="")
        {
            document.getElementById('password').style.border="none";
            document.getElementById('alert2').style.display="none";
        }
        if(document.getElementById('stuNumber').value!="")
        {
            document.getElementById('stuNumber').style.border="none";
            document.getElementById('alert1').style.display="none";
        }
        if(document.getElementById('password').value=="" && document.getElementById('stuNumber').value=="")
        {
            document.getElementById('alert1').style.display="block";
            document.getElementById('alert1').innerHTML="All feilds must be filled.";
            document.getElementById('password').focus();
            document.getElementById('password').style.border="1.5px solid red";
            document.getElementById('stuNumber').focus();
            document.getElementById('stuNumber').style.border="1.5px solid red";
            return false;
        }
        if(document.getElementById('stuNumber').value=="")
        {
            document.getElementById('alert1').style.display="block";
            document.getElementById('alert1').innerHTML="Student number must be filled.";
            document.getElementById('stuNumber').focus();
            document.getElementById('stuNumber').style.border="1.5px solid red";
            return false;
        }
        if(document.getElementById('password').value=="")
        {
            document.getElementById('alert2').style.display="block";
            document.getElementById('alert2').innerHTML="Password must be filled.";
            document.getElementById('password').focus();
            document.getElementById('password').style.border="1.5px solid red";
            return false;
        }
    }
    function check2()
    {
        /*if(document.getElementById('stuNumber').value!="")
        {
            document.getElementById('stuNumber').style.border="none";
            document.getElementById('alert1').style.display="none";
        }
        if(document.getElementById('indNumber').value!="")
        {
            document.getElementById('indNumber').style.border="none";
            document.getElementById('alert2').style.display="none";
        }
        if(document.getElementById('firstName').value!="")
        {
            document.getElementById('firstName').style.border="none";
            document.getElementById('alert3').style.display="none";
        }
        if(document.getElementById('lastName').value!="")
        {
            document.getElementById('lastName').style.border="none";
            document.getElementById('alert4').style.display="none";
        }
        if(document.getElementById('genders').value!="")
        {
            document.getElementById('genders').style.border="none";
            document.getElementById('alert5').style.display="none";
        }
        if(document.getElementById('stuNumber').value=="")
        {
            document.getElementById('alert1').style.display="block";
            document.getElementById('alert1').innerHTML="Student number must be filled.";
            document.getElementById('stuNumber').focus();
            document.getElementById('stuNumber').style.border="1.5px solid red";
            return false;
        }
        if(document.getElementById('indNumber').value=="")
        {
            document.getElementById('alert2').style.display="block";
            document.getElementById('alert2').innerHTML="Index number must be filled.";
            document.getElementById('indNumber').focus();
            document.getElementById('indNumber').style.border="1.5px solid red";
            return false;
        }
        if(document.getElementById('firstName').value=="")
        {
            document.getElementById('alert3').style.display="block";
            document.getElementById('alert3').innerHTML="First name must be filled.";
            document.getElementById('firstName').focus();
            document.getElementById('firstName').style.border="1.5px solid red";
            return false;
        }
        if(document.getElementById('lastName').value=="")
        {
            document.getElementById('alert4').style.display="block";
            document.getElementById('alert4').innerHTML="Last name must be filled.";
            document.getElementById('lastName').focus();
            document.getElementById('lastName').style.border="1.5px solid red";
            return false;
        }
        if(document.getElementById('gender').value=="")
        {
            document.getElementById('alert5').style.display="block";
            document.getElementById('alert5').innerHTML="Student number must be filled.";
            document.getElementById('gender').focus();
            document.getElementById('gender').style.border="1.5px solid red";
            return false;
        }*/
        if(document.getElementById('password1').value != document.getElementById('password2').value)
        {
            document.getElementById('alert6').style.display="block";
            document.getElementById('alert6').innerHTML="Passwords don't match.";
            document.getElementById('password1').focus();
            document.getElementById('password1').style.border="1.5px solid red";
            document.getElementById('password2').focus();
            document.getElementById('password2').style.border="1.5px solid red";
            return false;
        }
    }
    </script>
</body>
</html>