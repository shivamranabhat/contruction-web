<x-app-layout>
    <div class="container-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Message</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                <div class="row align-items-center">
                                    <x-search />
                                </div>
                                <div class="table-responsive my-3">
                                    <table class="table dataTable" aria-describedby="datatable_info">
                                        <thead>
                                            <tr class="ligth">
                                                <th>S.N.</th>
                                                <th>Email</th>
                                                <th>Published at</th>
                                                <th style="min-width: 100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($messages as $message)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $message->email }}</td>
                                                <td>{{ $message->created_at }}</td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <a class="btn btn-sm btn-icon btn-warning"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-original-title="show" href="{{route('message.show',$message->slug)}}" aria-label="show"
                                                            data-bs-original-title="show">
                                                            <span class="btn-inner">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-20" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M2.0355 12.3224C1.96642 12.1151 1.96635 11.8907 2.03531 11.6834C3.42368 7.50972 7.36074 4.5 12.0008 4.5C16.6386 4.5 20.5742 7.50692 21.9643 11.6776C22.0334 11.8849 22.0334 12.1093 21.9645 12.3166C20.5761 16.4903 16.639 19.5 11.999 19.5C7.36115 19.5 3.42559 16.4931 2.0355 12.3224Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M15 12C15 13.6569 13.6568 15 12 15C10.3431 15 8.99995 13.6569 8.99995 12C8.99995 10.3431 10.3431 9 12 9C13.6568 9 15 10.3431 15 12Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  </svg>
                                                            </span>
                                                        </a>
                                                        <a class="btn btn-sm btn-icon btn-danger" type="button" data-toggle="modal" data-target="#delete_{{ $message->slug }}" data-bs-original-title="Delete">
                                                            <span class="btn-inner">
                                                                <svg class="icon-20" width="20" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                    stroke="currentColor">
                                                                    <path
                                                                        d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                    <path d="M20.708 6.23975H3.75" stroke="currentColor"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path
                                                                        d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="delete_{{ $message->slug }}" tabindex="-1" role="dialog"
                                                            aria-labelledby="deleteTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body text-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="45" height="45" fill="#D21312"
                                                                            class="bi bi-exclamation-triangle"
                                                                            viewBox="0 0 16 16">
                                                                            <path
                                                                                d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                                                            <path
                                                                                d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                                                                        </svg>
                                                                        <h2 class="mt-3 mb-1"> Are you sure?</h2>
                                                                        <h5>Do you really want to delete this record?
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-center">
                                                                        <button type="button"
                                                                            class="btn btn-secondary rounded-pill"
                                                                            data-dismiss="modal">Close</button>
                                                                        <form
                                                                            action="{{ route('message.destroy', $message->slug) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger rounded-pill">Yes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-5">
                                                    No data found
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                {{ $messages->links('vendor.pagination.simple-tailwind') }}
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>