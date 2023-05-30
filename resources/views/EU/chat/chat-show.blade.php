<div class="modal-dialog-scrollable">
    <div class="modal-content">
        @include('EU.chat.topbar')


        <div class="modal-body">
            <div class="msg-body" id="messsageArea">
                @include('EU.chat.messageArea')
            </div>
        </div>


        <!-- sendbox -->
        @include('EU.chat.sendbox')
        
    </div>
</div>