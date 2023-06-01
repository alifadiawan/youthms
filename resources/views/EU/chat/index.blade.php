@extends('EU.chat.chat-layout')
@section('judul', 'Chat')
@section('content')

    <div class="container">
        <div class="row my-3">
            <div class="col">
                <a href="/" class="btn btn-outline-secondary btn-sm">
                    Back
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="chat-area">
                    <!-- chatlist -->
                    <div class="chatlist">
                        <div class="modal-dialog-scrollable modal-dialog-centered">
                            <div class="modal-content">
                                <div class="chat-header">
                                    <div class="msg-search">
                                        <input type="text" class="form-control" id="inlineFormInputGroup"
                                            placeholder="Search" aria-label="search">
                                        <a class="add" data-bs-toggle="modal" data-bs-target="#addGroupModal" href="#"><img class="img-fluid"
                                                src="https://mehedihtml.com/chatbox/assets/img/add.svg" alt="add"></a>
                                    </div>
                                </div>

                                <div class="modal-body">
                                    <!-- chat-list -->
                                    <div class="chat-lists">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Open" role="tabpanel"
                                                aria-labelledby="Open-tab">
                                                <!-- chat-list -->
                                                <div class="chat-list">
                                                    <!-- <a href="#" type="button" id="showMessage"
                                                        class="d-flex align-items-center" onclick="showMessage()">
                                                        <div class="flex-shrink-0">
                                                            <img class="img-fluid"
                                                                src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                alt="user img">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 group" data-id="1">
                                                            <h3>Programmer</h3>
                                                        </div>
                                                    </a> -->
                                                    <hr>
                                                    @if ($group->isEmpty())
                                                        
                                                        <h3 class="text-center my-5">Belum Ada Chat </h3>
                                                        
                                                    @else
                                                        @foreach ($group as $gc)
                                                            <a href="#" 
                                                                onclick="show({{ $gc->id }})"
                                                                class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="img-fluid"
                                                                        src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                                        alt="user img">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3 group"
                                                                    data-id="{{ $gc->id }}">
                                                                    <h3>{{ $gc->group }}</h3>
                                                                </div>
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <!-- chat-list -->
                                            </div>
                                            <!-- <div class="tab-pane fade" id="Closed" role="tabpanel"
                                                    aria-labelledby="Closed-tab"> -->

                                            <!-- chat-list -->
                                            <!-- <div class="chat-list">
                                                        <a href="#" class="d-flex align-items-center">
                                                            <div class="flex-grow-1 ms-3">
                                                                <h3>Mehedi Hasan</h3>
                                                                <p>front end developer</p>
                                                                <span class="active"></span>
                                                            </div>
                                                        </a>

                                                    </div> -->
                                            <!-- chat-list -->
                                            <!-- </div> -->
                                        </div>

                                    </div>
                                    <!-- chat-list -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chatlist -->

                    <!-- chatbox -->
                    <div class="chatbox" id="group">
                        <div class="modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <div class="d-flex flex-row justify-content-center align-items-center" style="margin-top:40vh">
                                        Silahkan Pilih Pesan Untuk Memulai
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- chatbox -->




            </div>
        </div>
    </div>
    </div>


    
@endsection
