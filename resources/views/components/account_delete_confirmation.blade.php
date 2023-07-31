@auth
    <div id="confirmation_box" class="hidden">
        <div class="backdrop" onclick="document.getElementById('confirmation_box').className = 'hidden'">
        </div>
        <div class="popup_center">
            <div class="popup max-w-sm" data-aos="zoom-in" data-aos-duration="300">
                <p class="text-gray-700 text-lg">Delete Account</p>
                <p class="text-gray-500 text-sm text-justify">This action is permanent and can't be undone. Your
                    account will no longer be available, and all personal data will be removed.</p>
                <div class="mt-5 flex space-x-5">
                    <button type="button" class="cancel_button w-full"
                        onclick="document.getElementById('confirmation_box').className = 'hidden'">
                        Cancel
                    </button>
                    <button type="button" class="danger_button w-full"
                        onclick="document.getElementById('delete_account').submit()">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endauth
