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
                    <div class="modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="chat-header">
                                <div class="msg-search">
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Search" aria-label="search">
                                    <a class="add" href="#"><img class="img-fluid"
                                            src="https://mehedihtml.com/chatbox/assets/img/add.svg"
                                            alt="add"></a>
                                </div>

                                <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="Open-tab" data-bs-toggle="tab"
                                            data-bs-target="#Open" type="button" role="tab"
                                            aria-controls="Open" aria-selected="true">Open</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="Closed-tab" data-bs-toggle="tab"
                                            data-bs-target="#Closed" type="button" role="tab"
                                            aria-controls="Closed" aria-selected="false">Closed</button>
                                    </li>
                                </ul> -->
                            </div>

                            <div class="modal-body">
                                <!-- chat-list -->
                                <div class="chat-lists">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="Open" role="tabpanel"
                                            aria-labelledby="Open-tab">
                                            <!-- chat-list -->
                                            <div class="chat-list">
                                                @if($group->isEmpty())
                                                <hr>
                                                <h3 class="text-center">Belum Ada Chat :(</h3>
                                                <hr>
                                                @else
                                                @foreach($group as $gc)
                                                <a href="#" onclick="loadGroupMessages({{$gc->id}})" class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img class="img-fluid"
                                                            src="https://mehedihtml.com/chatbox/assets/img/user.png"
                                                            alt="user img">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3 group" data-id="{{$gc->id}}">
                                                        <h3>{{$gc->group}}</h3>
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
                <div class="chatbox">
                    <div class="modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="msg-head">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="d-flex align-items-center">
                                            <span class="chat-icon"><img class="img-fluid"
                                                    src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg"
                                                    alt="image title"></span>
                                            <div class="flex-grow-1 ms-3">
                                                <h3>Steven Alden</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <ul class="moreoption">
                                            <li class="navbar nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#"
                                                    role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false"><i class="fa fa-ellipsis-v"
                                                        aria-hidden="true"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Action</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Another
                                                            action</a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Something else
                                                            here</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-body">
                                <div class="msg-body">
                                    <ul>
                                        <li class="sender">
                                            <p> Hey, Are you there? </p>
                                            <span class="time">10:06 am</span>
                                        </li>
                                        <li class="sender">
                                            <p> Hey, Are you there? </p>
                                            <span class="time">10:16 am</span>
                                        </li>
                                        <li class="repaly">
                                            <p>yes!</p>
                                            <span class="time">10:20 am</span>
                                        </li>
                                        <li class="sender">
                                            <p> Hey, Are you there? </p>
                                            <span class="time">10:26 am</span>
                                        </li>
                                        <li class="sender">
                                            <p> Hey, Are you there? </p>
                                            <span class="time">10:32 am</span>
                                        </li>
                                        <li class="repaly">
                                            <p>How are you?</p>
                                            <span class="time">10:35 am</span>
                                        </li>
                                        <li>
                                            <div class="divider">
                                                <h6>Today</h6>
                                            </div>
                                        </li>

                                        <li class="repaly">
                                            <p> yes, tell me</p>
                                            <span class="time">10:36 am</span>
                                        </li>
                                        <li class="repaly">
                                            <p>yes... on it</p>
                                            <span class="time">junt now</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>


                            <div class="send-box">
                                <form action="">
                                    <input type="text" class="form-control" aria-label="message…"
                                        placeholder="Write message…">

                                    <button type="button"><i class="fa fa-paper-plane"
                                            aria-hidden="true"></i>
                                        Send</button>
                                </form>

                                <div class="send-btns">
                                    <div class="attach">
                                        <div class="button-wrapper">
                                            <span class="label">
                                                <img class="img-fluid"
                                                    src="https://mehedihtml.com/chatbox/assets/img/upload.svg"
                                                    alt="image title"> attached file
                                            </span><input type="file" name="upload" id="upload"
                                                class="upload-box" placeholder="Upload File"
                                                aria-label="Upload File">
                                        </div>

                                    </div>
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