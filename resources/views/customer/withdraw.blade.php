@extends('customer.layouts.layout')
@section('title')
	Investo -withdraw
@endsection
@section('contents')
<link rel="stylesheet" href="{{asset('assets/css/withdraw.css')}}">
<div class="container">
    <header>
        <h1>Account Balance {{Auth::user()->current_balance}} PKR</h1>
    </header>
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
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class="withdraw-section" id="withdrawSection">
        <h2>Withdraw Information</h2>

        
        <p>Total Balance: {{Auth::user()->current_balance}}pkr</p>
        <p>Minimum Withdraw: {{$withdrawsinfos->minimum_withdraw}}pkr</p>
        <p>Commission Cut: <span id="commissionAmount"><?php echo $withdrawsinfos->commission?></span>%</p>

        <!-- <p>Withdraw After Commission Cut: <span id="withdrawalAmount">0.00</span>pkr</p> -->
        <button id="withdrawBtn" onclick="showWithdrawForm()">Withdraw Now</button>
        <button id="historyBtn" onclick="toggleSidebar1()">Withdraw History</button>

        <!-- Withdraw Form -->
        <form method="POST" action="{{route('withdraw.store')}}">
        @csrf
            <label for="real_name">Real Name:</label>
            <input type="text" id="real_name" name="real_name" required>

            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required placeholder="Enter amount" oninput="updateAmountAfter()" min="{{$withdrawsinfos->minimum_withdraw}}">
            <label for="amount">Amount After Withdraw:</label>
            <input type="text" id="amount_after" name="amount_after" required Value="">

            <label for="phoneNumber">Account Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" required>

            <label for="accountType">Account Type:</label>
            <select id="accountType" name="accountType" required>
                <option value="easypaisa">EasyPaisa</option>
                <option value="jazzcash">JazzCash</option>
                <option value="upaisa">Upaisa</option>
                <option value="nayapay">Nayapay</option>
                <option value="sadapay">Sadapay</option>
                <option value="bank">Bank Account</option>
            </select>

            <!-- Additional Fields for JazzCash -->
            <div id="jazzcashFields" style="">
                <label for="jazzcashUsername">If other Account</label>
                <input type="text" id="jazzcashUsername" name="other_account_number" placeholder="Enter other account number">
                <button type="submit">Confirm Withdraw</button>
            </div>

            <!-- Additional Fields for Upaisa -->
           <!--  <div id="upaisaFields" style="display: none;">
                <label for="upaisaAccountName">Upaisa Account Name:</label>
                <input type="text" id="upaisaAccountName" name="other_account_number" required>
                
            </div> -->
            <!-- Additional Fields for Nayapay -->
            <!-- <div id="nayapayFields" style="display: none;">
                <label for="nayapayDetails">Nayapay Details:</label>
                <input type="text" id="nayapayDetails" name="other_account_number">
            </div> -->

            <!-- Additional Fields for Sadapay -->
            <!-- <div id="sadapayFields" style="display: none;">
                <label for="sadapayAccountName">Sadapay Account Name:</label>
                <input type="text" id="sadapayAccountName" name="other_account_number" required> -->
              
                <!-- Add more fields as needed -->
            </div>

            <!-- Additional Fields for Bank Account -->
            <!-- <div id="bankFields" style="display: none;">
                <label for="bankName">Select Bank:</label>
                <select id="bankName" name="bankName" required>
                    <option value="hbl">HBL (Habib Bank Limited)</option>
                    <option value="ubl">UBL (United Bank Limited)</option>
                    <option value="nbp">NBP (National Bank of Pakistan)</option>
                    
                </select>
            </div> -->

            
        </form>
    </section>

    <div class="sidebar" id="sidebar-withdraw">
        <h3>withdraw history</h3>
        <button id="closeSidebarBtn" onclick="toggleSidebar1()">×</button>
        @foreach($user_withdraws as $user_withdraw)
        <a href="#">{{$user_withdraw->id}}<span class="status">{{$user_withdraw->status}}</span></a>
        <a class="amount">{{$user_withdraw->amount}} PKR</a>
        <a  class="date">{{$user_withdraw->created_at}}</a>
        @endforeach
    </div>
</div>
<script>
 
    function updateAmountAfter() {
        // Get the amount entered by the user
        var originalAmount = parseInt(document.getElementById("amount").value);

        // Define the percentage to be deducted (replace with your Blade variable)
        var percentageToDeduct = {{ intval($withdrawsinfos->commission) }};
        // var percentageToDeduct = parseInt("{{ $withdrawsinfos->commission }}");
        // alert(originalAmount+percentageToDeduct);
        // Calculate the amount after deducting the percentage
        var amountAfterWithdraw = originalAmount * (1 - percentageToDeduct / 100);
        // alert(percentageToDeduct/ 100);
        // Update the "Amount After Withdraw" field
        document.getElementById("amount_after").value = amountAfterWithdraw.toFixed(2);
    }
 
</script>


<script>
    function showWithdrawForm() {
        document.getElementById('withdrawBtn').style.display = 'none';
        document.getElementById('withdrawForm').style.display = 'block';
    }

    document.getElementById('withdrawForm').addEventListener('submit', function (event) {
        event.preventDefault();
        alert('Withdrawal submitted successfully!');
    });

    function toggleSidebar1() {
        const sidebar = document.getElementById('sidebar-withdraw');
        if (sidebar.style.left === '0px') {
            sidebar.style.left = '-250px';
            sidebar.style.display = 'none';
        } else {
            sidebar.style.left = '0';
            sidebar.style.display = 'block';
        }
    }

    document.getElementById('accountType').addEventListener('change', function () {
        var selectedAccountType = this.value;
        hideAllAdditionalFields();
        if (selectedAccountType === 'jazzcash') {
            document.getElementById('jazzcashFields').style.display = 'block';
        } else if (selectedAccountType === 'upaisa') {
            document.getElementById('upaisaFields').style.display = 'block';
        } else if (selectedAccountType === 'nayapay') {
            document.getElementById('nayapayFields').style.display = 'block';
        } else if (selectedAccountType === 'sadapay') {
            document.getElementById('sadapayFields').style.display = 'block';
        } else if (selectedAccountType === 'bank') {
            document.getElementById('bankFields').style.display = 'block';
        }
    });

    function hideAllAdditionalFields() {
        document.getElementById('jazzcashFields').style.display = 'none';
        document.getElementById('upaisaFields').style.display = 'none';
        document.getElementById('nayapayFields').style.display = 'none';
        document.getElementById('sadapayFields').style.display = 'none';
        document.getElementById('bankFields').style.display = 'none';
    }
</script>
@endsection