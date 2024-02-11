    
    <!-- <div class="footer" style="z-index: 10">
        <div class="items">
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
                <li class="home_icon">
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
                        <span>Lucky Draw</span>
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
    </div> -->
  
</body>
<script>
    function openSidebar() {
            document.getElementById('sidebar').style.left = '0';
            document.getElementById('sidebar').style.display = 'block';
        }

        function closeSidebar() {
            document.getElementById('sidebar').style.left = '-250px';
            document.getElementById('sidebar').style.display = 'none';
        }
      function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        if (sidebar.style.left === '0px') {
            sidebar.style.left = '-250px';
            sidebar.style.display = 'none';
        } else {
            sidebar.style.left = '0';
            sidebar.style.display = 'block';
        }
    }
    function copyLink() {
       
        const linkText = document.querySelector('.link a').innerText;

       
        const textarea = document.createElement('textarea');
        textarea.value = linkText;

        document.body.appendChild(textarea);

        
        textarea.select();
        textarea.setSelectionRange(0, 99999); 

       
        document.execCommand('copy');

        
        document.body.removeChild(textarea);
        alert('Link copied to clipboard: ' + linkText);
    }
    function openWhatsApp() {
            window.open('https://wa.me/message/PTSHCGVG76OSL1', '_blank');
        }
       

        function openTelegram() {
           
            window.open('https://t.me/Cashflix78', '_blank');
        }
</script>
</html>