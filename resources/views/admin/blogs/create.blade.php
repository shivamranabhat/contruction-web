<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Blogs</h4>
                            </div>
                            <div class="back">
                                <a href="{{route('blogs')}}"
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
                            <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror {{ $errors->has('title') ? 'error' : '' }}"
                                        value="{{ old('title') }}" />
                                    @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="subtitle">Subtitle</label>
                                    <input type="text" name="subtitle" id="subtitle"
                                        class="form-control @error('subtitle') is-invalid @enderror {{ $errors->has('subtitle') ? 'error' : '' }}"
                                        value="{{ old('subtitle') }}" />
                                    @error('subtitle')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row align-items-end">
                                    <div class="image-area"><img id="mainImage" src="" width="150"></div>
                                    <div class="col-6 form-outline mb-3">
                                        <label class="form-label" for="main_image">Main Image</label>
                                        <input class="form-control" type="file" id="main_image" name="main_image" />
                                    </div>
                                    <div class="col-6 form-outline mb-3">
                                        <label class="form-label" for="main_img_alt">Image Alt</label>
                                        <input type="text" name="main_img_alt" id="main_img_alt"
                                            class="form-control @error('main_img_alt') is-invalid @enderror {{ $errors->has('main_img_alt') ? 'error' : '' }}"
                                            value="{{ old('main_img_alt') }}" />
                                        @error('main_img_alt')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="author">Author</label>
                                    <input type="text" name="author" id="author"
                                        class="form-control @error('author') is-invalid @enderror {{ $errors->has('author') ? 'error' : '' }}"
                                        value="{{ old('author') }}" />
                                    @error('author')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror {{ $errors->has('description') ? 'error' : '' }}">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="btn btn-primary btn-block rounded-pill mb-3">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script>
           
            CKEDITOR.ClassicEditor.create(document.getElementById("description"), {
                ckfinder:{
                        uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
                    },
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'uploadImage', 'blockQuote','htmlEmbed', 'insertTable', '|', 'horizontalLine'
                    ],
                    shouldNotGroupWhenFull: true
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2'},
                        { model: 'heading3', view: 'h3', title: 'Heading 3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6' }
                    ]
                },
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                htmlEmbed: {
                    showPreviews: true
                },
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                removePlugins: [
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    'MultiLevelList',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    'MathType',
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            });
        </script>
        <script src="{{ asset('assets/js/imagePreview.js?v=').time() }}"></script>
        @endpush
</x-app-layout>