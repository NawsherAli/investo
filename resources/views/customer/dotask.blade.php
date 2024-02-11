@extends('customer.layouts.layout')
@section('title')
	Do Task
@endsection
@section('contents')
<link rel="stylesheet" href="{{asset('assets/css/task_style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
<div class="task_section">
        <div class="message">
            <p style="color: white">{{$task->description}}</p>
        </div>
        <div class="buttons">
            <div class="button1" id="openAppButton">
                <button>Open App</button>
            </div>
            <div class="button2" id="copyLinkButton">
                <button>Copy Link</button>
            </div>
        </div>
        @if(session('error'))
        <div class="message-container bg-red-200 border-red-500 border-t-4 p-4 mb-4 rounded-lg">
            <p style="background-color: rgba(255,0,0,0.3); padding: 10px; border-radius: 7px; color: red">{{ session('error') }}</p>
        </div>
        @endif
        @if(session('success'))
            <div id="successMessage" class="alert alert-success">
                <p style="background-color: lightgreen; padding: 10px; border-radius: 7px; color: green">{{ session('success') }}</p>
            </div>
        @endif

  
          <div id="imageContainer">
            <div id="imageTemplate" style="width: 300px; height: 250px; border: 1px solid #ccc; margin-top: 20px;"></div>
            <div id="placeholderText" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #777;">Image Here</div>
        </div>

        <!-- Buttons for Image -->
        <div id="imageButtons" style="margin-top: 10px; display: flex">
            <button id="addImageButton" onclick="triggerFileInput()">Add Image</button>
        <form method="POST" action="{{route('dotask.store')}}"  enctype="multipart/form-data"  >
        @csrf
            <input type="file" placeholder="add image here" id="fileInput" style="display: none;" accept="image/*" onchange="handleImageSelection() " name="image">
            <input type="text" name="task_id" value="{{$task->id}}" hidden style="color: black">
            <button type="submit"  >Upload</button>
        </div>
         </form>
    </div>
    <div class="footer1" style="z-index: 10">
        <div class="items1">
            <ul>
                <li class="task_icon">
                    <a href="{{route('user.plan.index')}}">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Plans</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{route('user.tasks.index')}}">
                        <i class="fas fa-tasks"></i>
                        <span>Tasks</span>
                    </a>
                </li>
                <li >
                    <a href="{{route('investors.dashboard')}}">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.create.deposit')}}">
                        <i class="fas fa-hand-holding-usd deposit-icon"></i>
                        <span>Deposit</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.luckydraw.create')}}">
                        <i class="fas fa-gift"></i>
                        <span>Lucky <span>Draw</span></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.withdraw.create')}}">
                        <i class="fas fa-money-bill-wave withdraw-icon"></i>
                        <span>withdraw</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        document.getElementById('copyLinkButton').addEventListener('click', function () {
        //   link here 
            var linkToCopy = "{{$task->link}}";

         
            var textarea = document.createElement('textarea');
            textarea.value = linkToCopy;

           
            document.body.appendChild(textarea);

           
            textarea.select();
            textarea.setSelectionRange(0, 99999); 

            
            document.execCommand('copy');

         
            document.body.removeChild(textarea);

            
            alert('Link copied to clipboard: ' + linkToCopy);
        });

        document.getElementById('openAppButton').addEventListener('click', function () {
        //    video link 
            var appLink = "{{$task->link}}";

            window.location.href = appLink;
        });

        document.getElementById('imageUpload').addEventListener('change', function (event) {
          
            var selectedFile = event.target.files[0];

            
            displaySelectedImage(selectedFile);
        });

        function displaySelectedImage(file) {
            
            if (file) {
               
                var reader = new FileReader();

                
                reader.onload = function (e) {
                   
                    var imageElement = document.createElement('img');
                    imageElement.src = e.target.result;
                    imageElement.alt = 'Uploaded Image';

                    
                    var imagePlace = document.getElementById('imagePlace');

                
                    imagePlace.innerHTML = '';

                
                    imagePlace.appendChild(imageElement);
                };

               
                reader.readAsDataURL(file);
            }
        }




        function showWithdrawForm() {
        document.getElementById('withdrawOptions').style.display = 'block';
        document.getElementById('imageContainer').style.display = 'block';
        document.getElementById('imageButtons').style.display = 'block';
    }

    function triggerFileInput() {
        document.getElementById('fileInput').click();
    }

    function handleImageSelection() {
    var fileInput = document.getElementById('fileInput');
    var imageTemplate = document.getElementById('imageTemplate');
    var uploadButton = document.getElementById('uploadImageButton');
    var placeholderText = document.getElementById('placeholderText');

    var file = fileInput.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        imageTemplate.innerHTML = '<img src="' + e.target.result + '" style="max-width: 100%; max-height: 100%;">';
        placeholderText.style.display = 'none'; 
        uploadButton.disabled = false;
    };

    reader.readAsDataURL(file);
}


    function uploadImage() {
       
        alert('Image uploaded successfully!');
    }
    </script>
@endsection('contents')