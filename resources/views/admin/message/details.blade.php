<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Messages</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('messages')}}" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25" fill="none" stroke="currentColor"><path  d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z" data-name="Left"/></svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <div class="details mb-4">
                                <div class="title  d-flex gap-3 mb-3">
                                    <h5>Name:</h5>
                                    <h5>{{ $message->name }}</h5>
                                </div>
                                <div class="title d-flex gap-3 mb-3">
                                    <h5>Email:</h5>
                                    <a href="mailto:{{$message->email}}">{{ $message->email }}</a>
                                </div>
        
                                <div class="title d-flex gap-3 mb-3">
                                    <h5>Subject:</h5>
                                    <h5>{{ $message->subject }}</h5>
                                </div>
                                <div class="title d-flex gap-3 mb-3">
                                    <h5>Message:</h5>
                                    <h5>{{ $message->message }}</h5>
                                </div>
                                <div class="title d-flex gap-3 mb-3">
                                    <h5>From:</h5>
                                    <a href="{{$message->url ?? ''}}" target="_blank">{{ $message->url ?? '' }}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>