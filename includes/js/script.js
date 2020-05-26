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