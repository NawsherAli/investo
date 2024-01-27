@extends('customer.layouts.layout')
@section('title')
	Investo - Lucky Draw
@endsection
@section('contents')
<link rel="stylesheet" href="{{asset('assets/css/lucky_draw.css')}}">
 
        <h1 style="color:white; text-align: center">Lucky Draw</h1>
     

    <div class="lucky_draw_section">
        

        <div class="heading"><p onclick="showHelpNote()">Help Needy People</p></div>
        <div class="help_needy_people" id="helpNote" style="display: none;">
            <p>نوٹ: آپ کی دی گئی باقی رقم سے غریبوں کی مدد کی جائے گی جو کہ ہمارے میمبرز کریں گے اور انکا بل کمپنی دے گی</p>
            <a href="{{route('user.create.Helpdeposit')}}"><button onclick="helpNow()">Help Now</button></a>
        </div>
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
        <div class="lucky_draw_for_everyone" >
            <h1  >lucky draw for everyone</h1>
            <h2  >Invest 100 Rupees and get wonderful rewards</h2>
            
            <li>1st reward 1000</li>
            <li>2nd reward 500</li>
            <li>3rd reward 400</li>
            <li>4th reward 300</li>
            <li>5th reward 200</li>
            <li>6th reward 100</li>
            <p class="badge" style="background-color: lightgreen; border-radius: 10px;margin: 5px; color: green">The announsment will be in Whatsapp group <br>Join Now <i class="fab fa-whatsapp whatsapp-telegram-icon" onclick="openWhatsApp()"></i></p>

            <div class="participation-details" id="participationDetails" style="display: none;">
                <h3>Participant Details</h3>
                <form method="post" action="{{route('luckydraw.store')}}">
                    @csrf
                    <label for="realName">Real Name:</label>
                    <input type="text" id="realName" name="name" required>

                    <label for="easypaisaNumber">EasyPaisa Number:</label>
                    <input type="tel" id="easypaisaNumber" name="easypisa_number" required>

                    <label for="whatsappNumber">WhatsApp Number:</label>
                    <input type="tel" id="whatsappNumber" name="whatsapp_number" required>

                    <label for="investmentAmount">Amount to Invest:</label>
                    <input type="number" id="investmentAmount" name="amount_invest" required>

                    <button type="submit" class="check-luck-button-submit" >click Here To Participate for lucky draw</button>
                </form>
            </div>
            <button class="check-luck-button" onclick="showParticipationForm()">Let's Check Luck</button>
            <div id="participantDetailsSection" style="display: none;">
                <h3>Participants</h3>
                <div id="participantDetails"></div>
            </div>
        </div>
    </div>
<script>
        var participated = false;

        function copyPhoneNumber() {
            var phoneNumberElement = document.getElementById('phoneNumber');
            var textarea = document.createElement('textarea');
            textarea.value = phoneNumberElement.innerText;
            document.body.appendChild(textarea);
            textarea.select();
            textarea.setSelectionRange(0, 99999);
            document.execCommand('copy');
            document.body.removeChild(textarea);
            alert('Number copied to clipboard: ' + phoneNumberElement.innerText);
        }

        function showParticipationForm() {
            if (!participated) {
                document.getElementById('participationDetails').style.display = 'block';
                document.querySelector('.check-luck-button').innerText = 'click above to participate';
                participated = true;
            }
        }

        function participateNow() {
            var realName = document.getElementById('realName').value;
            var easypaisaNumber = document.getElementById('easypaisaNumber').value;
            var whatsappNumber = document.getElementById('whatsappNumber').value;
            var investmentAmount = document.getElementById('investmentAmount').value;

         
            var participantDetails = document.getElementById('participantDetails');
var participantDetailsHtml = `<p><strong>Name:</strong> <span style="color: blue;font-size: 1rem;">${realName}</span></p>
                              <p><strong>EasyPaisa Number:</strong> <span style="color: blue;">${easypaisaNumber}</span></p>
                              <p><strong>WhatsApp Number:</strong> <span style="color: blue;">${whatsappNumber}</span></p>
                              <p><strong>Investment Amount:</strong> <span style="color: blue;">${investmentAmount}</span></p>`;
participantDetails.innerHTML += participantDetailsHtml;


           

            document.getElementById('participantDetailsSection').style.display = 'block';

            
            document.getElementById('participationDetails').style.display = 'none';

            document.querySelector('.check-luck-button').innerText = 'u have successfully participated';
            participated = true;
        }

        function showHelpNote() {
            var helpNote = document.getElementById('helpNote');
            helpNote.style.display = (helpNote.style.display === 'none' || helpNote.style.display === '') ? 'block' : 'none';
        }

        // function helpNow() {
           
        //     alert('Help Now button clicked!');
        // }
    </script>
@endsection