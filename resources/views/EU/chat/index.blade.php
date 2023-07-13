@extends('EU.chat.chat-layout')
@section('judul', 'Chat')
@section('content')

    <div class="container">
        <div class="row my-3">
            <div class="col">
                <a href="/" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i
                        class="fa-solid fa-bars"></i> Group Lists</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">


                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
                    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Group Lists</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="chat-lists">
                            <div class="msg-search">
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search"
                                    aria-label="search">

                            </div>
                            <div class="d-flex flex-row justify-content-between mt-2 gap-2">
                                @if (auth()->user()->role->role == 'admin')
                                    <a class="add btn btn-outline-secondary w-100" data-bs-toggle="modal"
                                        data-bs-target="#addGroupModal" href="#"><i class="fa-solid fa-plus"></i>
                                        Add Group</a>
                                @endif
                                <a class="add btn btn-outline-secondary w-100" data-bs-toggle="modal"
                                    data-bs-target="#joinGroupModal" href="#"><i class="fa-solid fa-users"></i>
                                    Join Group</a>
                            </div>

                            <!-- chat-list -->
                            <div class="chat-list my-3">
                                @if ($group->isEmpty())
                                    <h3 class="text-center my-5">Belum Ada Group </h3>
                                @else
                                    @foreach ($group as $gc)
                                        <a href="#" onclick="show({{ $gc->id }})"
                                            class="d-flex align-items-center ripple">
                                            <div class="flex-shrink-0">
                                                <img class="img-fluid"
                                                    src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                            </div>
                                            <div class="flex-grow-1 ms-3 group" data-id="{{ $gc->id }}">
                                                <h3>{{ $gc->group }}</h3>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                            <!-- chat-list -->
                        </div>
                    </div>

                </div>
                {{-- <div class="chatlist" id="chatbox">
                            <div class="modal-dialog-scrollable modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="chat-header">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="msg-search">
                                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                                        placeholder="Search" aria-label="search">
                                                    @if (auth()->user()->role->role == 'admin')
                                                    @else
                                                        <a class="add" data-bs-toggle="modal"
                                                            data-bs-target="#joinGroupModal" href="#"><img
                                                                class="img-fluid"
                                                                src="https://mehedihtml.com/chatbox/assets/img/add.svg"
                                                                alt="add"></a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col">
                                                <a class="add btn" data-bs-toggle="modal" data-bs-target="#addGroupModal"
                                                    href="#"><i class="fa-solid fa-plus"></i> TAMBAH</a>
                                                <a class="add btn" data-bs-toggle="modal" data-bs-target="#joinGroupModal"
                                                    href="#"><i class="fa-solid fa-users"></i> JOIN</a>
                                            </div>
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
                                                                <a href="#" onclick="show({{ $gc->id }})"
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
                        </div> --}}
            </div>
        </div>


        <!-- chatbox -->
        <div class="chat-area">
            <div class="chatbox" id="group">
                <div class="modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            @if (session('error'))
                                <div class="alert alert-warning text-dark">
                                    {{ session('error') }}
                                </div>
                            @endif
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
 


    <script>
        function myFunction() {
            var x = document.getElementById("chatbox");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

@endsection
