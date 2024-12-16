<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Open Graph</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('graphs')}}"
                                    class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 25 25"
                                            fill="none" stroke="currentColor">
                                            <path
                                                d="M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z"
                                                data-name="Left" />
                                        </svg>
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2">
                            <form method="POST" action="{{ route('graph.update',$graph->slug) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-outline mb-4">
                                    <div class="row">
                                        <div class="col-12 col-lg-9 col-xl-9 mb-4 mb-md-0 mb-lg-0 mb-xl-0">
                                            <label class="form-label" for="type">Select page</label>
                                            <select
                                                class="form-select @error('page_id') is-invalid @enderror {{ $errors->has('page_id') ? 'error' : '' }}"
                                                name="page_id" id="page_id">
                                                <option value="{{ $graph->page_id }}">{{ $graph->page->name }}
                                                </option>
                                                @forelse ($pages as $page)
                                                <option value="{{ $page->id }}" class="text-capitalize">{{ $page->name
                                                    }}</option>
                                                @empty
                                                <option value="#" class="text-capitalize">No page found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        
                                        <div class="col-12 col-lg-3 col-xl-3">
                                            <label class="form-label" for="title">Search Page</label>
                                            <input type="text" class="form-control" id="page_search"
                                                placeholder="Search for a page">
                                        </div>
                                        @error('page_id')
                                        <p class="d-flex justify-content-start text-danger mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="tag_name">Tag Name</label>
                                    <input type="text" name="tag_name" id="tag_name"
                                        class="form-control @error('tag_name') is-invalid @enderror {{ $errors->has('tag_name') ? 'error' : '' }}"
                                        value="{{ $graph->tag_name }}" />
                                        @error('tag_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror {{ $errors->has('title') ? 'error' : '' }}"
                                        value="{{ $graph->title }}" />
                                        @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="image">Image</label>
                                    <input type="text" name="image" id="image"
                                        class="form-control @error('image') is-invalid @enderror {{ $errors->has('image') ? 'error' : '' }}"
                                        value="{{ $graph->image }}" />
                                        @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="url">Page Url</label>
                                    <input type="text" name="url" id="url"
                                        class="form-control @error('url') is-invalid @enderror {{ $errors->has('url') ? 'error' : '' }}"
                                        value="{{ $graph->url }}" />
                                        @error('url')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="site_name">Site Name</label>
                                    <input type="text" name="site_name" id="site_name"
                                        class="form-control @error('site_name') is-invalid @enderror {{ $errors->has('site_name') ? 'error' : '' }}"
                                        value="{{ $graph->site_name }}" />
                                        @error('site_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="type">Type</label>
                                    <input type="text" name="type" id="type"
                                        class="form-control @error('type') is-invalid @enderror {{ $errors->has('type') ? 'error' : '' }}"
                                        value="{{ $graph->type }}" />
                                        @error('type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                                <div class="form-outline my-4">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="descriptions" name="description"
                                        rows="2">{{ $graph->description }}</textarea>
                                    @error('description')
                                    <p class="d-flex justify-content-start text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="btn btn-primary btn-block rounded-pill mb-4">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script src="{{ asset('assets/js/dropdownSearch.js') }}"></script>
        @endpush
</x-app-layout>