@auth
    <div>
        {{-- success --}}
        @if ($message = Session::get('success'))
            <div id="toast" class="notification_box" role="alert" style="visibility: visible">
                <div class="notification_content">
                    <div class="icon text-purple bg-purple/10">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3 text-sm text-gray-900">{{ $message }}</div>
                    <button type="button" class="cross" onclick="getElementById('toast').className = 'hidden'">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="progress_bar bg-gray-200">
                    <div id="progress" class="progress_bar bg-purple" style="width: 0%"></div>
                </div>
            </div>
            <script>
                const totalDuration = 3000;
                const progressBar = document.getElementById('progress');
                // hide notification_box
                function hideNotificationBox() {
                    document.getElementById('toast').style.visibility = "hidden";
                }
                // update progress bar
                function updateProgressBar() {
                    const currentTime = new Date().getTime();
                    const elapsedTime = currentTime - startTime;
                    const progressWidth = (elapsedTime / totalDuration) * 100;
                    progressBar.style.width = progressWidth + '%';
                    if (progressWidth >= 100) {
                        clearTimeout(progressTimeout);
                    } else {
                        progressTimeout = setTimeout(updateProgressBar, 1); // Update every 100 milliseconds
                    }
                }
                let startTime = new Date().getTime();
                let progressTimeout = setTimeout(updateProgressBar, 1);
                setTimeout(hideNotificationBox, totalDuration);
            </script>
        @endif

        {{-- danger --}}
        @if ($message = Session::get('danger'))
            <div id="toast" class="notification_box" role="alert" style="visibility: visible">
                <div class="notification_content">
                    <div class="icon text-red-500 bg-red-100">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3 text-sm text-gray-900">{{ $message }}</div>
                    <button type="button" class="cross" onclick="getElementById('toast').className = 'hidden'">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="progress_bar bg-gray-200">
                    <div id="progress" class="progress_bar bg-purple" style="width: 0%"></div>
                </div>
            </div>
            <script>
                const totalDuration = 3000;
                const progressBar = document.getElementById('progress');
                // hide notification_box
                function hideNotificationBox() {
                    document.getElementById('toast').style.visibility = "hidden";
                }
                // update progress bar
                function updateProgressBar() {
                    const currentTime = new Date().getTime();
                    const elapsedTime = currentTime - startTime;
                    const progressWidth = (elapsedTime / totalDuration) * 100;
                    progressBar.style.width = progressWidth + '%';
                    if (progressWidth >= 100) {
                        clearTimeout(progressTimeout);
                    } else {
                        progressTimeout = setTimeout(updateProgressBar, 1); // Update every 100 milliseconds
                    }
                }
                let startTime = new Date().getTime();
                let progressTimeout = setTimeout(updateProgressBar, 1);
                setTimeout(hideNotificationBox, totalDuration);
            </script>
        @endif
    </div>
@endauth
