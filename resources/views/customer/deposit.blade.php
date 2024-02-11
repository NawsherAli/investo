@extends('customer.layouts.layout')
@section('title')
	Deposit
@endsection
@section('contents')
<link rel="stylesheet" href="{{asset('assets/css/withdraw.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/deposit.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
 <div class="container">
    <header>
        <h1>Account Balance {{Auth::user()->current_balance}}PKR</h1>
    </header>
    @if(session('error'))
        <div class="message-container bg-red-200 border-red-500 border-t-4 p-4 mb-4 rounded-lg">
            <p class="text-red-700">{{ session('error') }}</p>
        </div>
    @endif
    @if(session('success'))
        <div id="successMessage" class="alert alert-success">
            
            <p style="background-color: lightgreen; padding: 10px; border-radius: 7px; color: green">{{ session('success') }}</p>
        </div>
    @endif
    <section class="withdraw-section" id="withdrawSection">
        <h2>Deposit Information</h2>
        <button id="withdrawBtn" onclick="showWithdrawForm()">Deposit Now</button>
        <button id="historyBtn" onclick="toggleSidebar1()">Deposit History</button>

        <!-- Withdraw Options -->
        <div class="withdraw-options" id="withdrawOptions">
            <label for="withdrawMethod" class="withdraw_label">Select Deposit Method:</label>
            <select id="withdrawMethod" onchange="showAccountInfo()">
                <option value="easypaisa">Easypaisa</option>
                <option value="ubl">United Bank Limited</option>
                <option value="mcb">Muslim Commercial Bank</option>
            </select>
        </div>

        <!-- Account Information -->
        <div id="accountInfo">
            <h3 id="accountInfoHeading"></h3>
            <p id="account_name">syeda ubair javed</p>
            
            
            <p id="accountNumber"></p>
            <button id="copyButton" onclick="copyAccountNumber()">Copy</button>
        </div>

        <!-- Image Container -->

            <div id="imageContainer" style="display: none;">
                <label>Amount</label>
                <input type="number" name="amount" form="deposit-form">
                <label>Transaction Id</label>
                <input type="text" name="transaction_no" form="deposit-form">
               
                <div id="imageTemplate" style="width: 300px; height: 250px; border: 1px solid #ccc; margin-top: 20px;"></div>
            </div>

            <!-- Buttons for Image -->
            <div id="imageButtons" style="display: none; margin-top: 10px;">
                <button id="addImageButton" onclick="triggerFileInput()">Add Image</button>
                
         <form method="POST" action="{{route('deposit.store')}}"  enctype="multipart/form-data" id="deposit-form">
        @csrf
                <input type="file" id="fileInput" style="display: none;" accept="image/*" onchange="handleImageSelection()" form="deposit-form" name="image">
                <button type="submit" id="uploadImageButton"  style="margin-top: 20px">Save</button>
                 <!-- <button type="submit" id="uploadImageButton" disabled>Save</button> -->
            </div>
        </form>
    </section>

    <div class="sidebar" id="sidebar1">
        <h3>Deposit history</h3>
        <button id="closeSidebarBtn" onclick="toggleSidebar1()">×</button>
        @foreach($deposits as $deposit)
        <a href="#">{{$deposit->id}}<span class="status">{{$deposit->status}}</span></a>
        <a class="amount">{{$deposit->amount}} PKR</a>
        <a  class="date">{{$deposit->created_at}}</a>
        @endforeach
        
    </div>
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
                <li>
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
                <li class="active">
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

        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            imageTemplate.innerHTML = '<img src="' + e.target.result + '" style="max-width: 100%; max-height: 100%;">';
            uploadButton.disabled = false;
        };

        reader.readAsDataURL(file);
    }

    function uploadImage() {

        alert('Image uploaded successfully!');
    }
    function showAccountInfo() {
        var withdrawMethod = document.getElementById('withdrawMethod').value;
        var accountInfoHeading = document.getElementById('accountInfoHeading');
        var accountNumber = document.getElementById('accountNumber');
        var accountName=document.getElementById('account_name')

        switch (withdrawMethod) {
            case 'easypaisa':
                accountInfoHeading.innerText = 'Easypaisa Number:';
                accountNumber.innerText = '03245702078'; 
                accountName.innerText="SYEDA UBAIR JAVEED"
                break;
            case 'ubl':
                accountInfoHeading.innerText = 'UBL Account Number:';
                accountNumber.innerText = 'Pk69UNIL0109000303148991'; 
                accountName.innerText="SYEDA ABEER JAVED"
                break;
            case 'mcb':
                accountInfoHeading.innerText = 'MCB Account Number';
                accountNumber.innerText = 'PK68MUCB0864348931006975'; 
                accountName.innerText="SYED JAVED ALI "
                break;
            default:
                break;
        }

        document.getElementById('accountInfo').style.display = 'block';
    }

    function copyAccountNumber() {
        var accountNumber = document.getElementById('accountNumber').innerText;

      
        var textarea = document.createElement('textarea');
        textarea.value = accountNumber;

        
        document.body.appendChild(textarea);

       
        textarea.select();
        textarea.setSelectionRange(0, 99999); 

      
        document.execCommand('copy');

        
        document.body.removeChild(textarea);

        
        alert('Account number copied to clipboard: ' + accountNumber);
    }

    function toggleSidebar1() {
        const sidebar = document.getElementById('sidebar1');
        if (sidebar.style.left === '0px') {
            sidebar.style.left = '-250px';
            sidebar.style.display = 'none';
        } else {
            sidebar.style.left = '0';
            sidebar.style.display = 'block';
        }
    }
  
</script>
@endsection