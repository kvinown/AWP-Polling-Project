<section>
    <div class="container d-flex my-auto align-middle">
        <div class="col-md-8 fs-1">
            Polling Detail
        </div>
        <div class="col-md" id="current-time">{{ date('Y-m-d H:i:s') }}</div>
        <script>
            setInterval(function() {
                var currentTime = new Date();
                document.getElementById('current-time').innerHTML = currentTime.getFullYear() + '-' + ('0' + (currentTime.getMonth() + 1)).slice(-2) + '-' + ('0' + currentTime.getDate()).slice(-2) + ' ' + ('0' + currentTime.getHours()).slice(-2) + ':' + ('0' + currentTime.getMinutes()).slice(-2) + ':' + ('0' + currentTime.getSeconds()).slice(-2);
            }, 1000);
        </script>
    </div>
</section>
