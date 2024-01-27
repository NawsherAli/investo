<!DOCTYPE html>
<html>
<head>
    <title>Withdrawal Processed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    	*{
    		margin: 0px;
    		padding: 0px;
    		box-sizing: border-box;
    	}
    	.container{
    		width: 100%;
    		height: 100vh;
    		display:flex;

    		justify-content: center;
    		align-items: center;
    	}
    	.card{
    		 width: 40%;
    		 height: 40vh;
    		 box-shadow: 0px 0px 5px black;
    		 display: flex-column;
    		 align-items-:center;
    		 justify-content: center;
    		 border-radius: 10px; 
    	}
    	h1,p{
    		text-align: center;
    		margin: 10px;
    	}
    	h1{
    		font-size: 45px;
    	}
    	@media only screen and (max-width: 600px) {
		    .card {
		        width: 80%; /* Adjust width for smaller screens */
		        height: 30vh; /* Adjust height for smaller screens */
		    }
		}
    </style>
</head>
<body>
	<div class="">
		<div class=" ">
			<div class="">
				<h1>Investo</h1>
			</div>
			<p>Hello <b>{{ $mailData['user_name']}}</b>,</p>
    		<p>Your withdrawal request has been processed and you will get your withdraw in {{$mailData['days']}} days.</p>
		</div>
		
	</div>
    
    <!-- Add more content as needed... -->
</body>
</html>