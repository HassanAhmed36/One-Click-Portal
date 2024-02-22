<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">Users <span class="font-weight-normal text-muted ms-2">Performances</span></h4>
    </div>
</div>
<div class="card">
    <div class="tab-menu-heading hremp-tabs p-0 ">
        <div class="tabs-menu1">
            <ul class="nav panel-tabs">
                <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab">Writers</a></li>
                <li><a href="#tab6" data-bs-toggle="tab">Coordinators</a></li>
                <li><a href="#tab7" data-bs-toggle="tab">Managers</a></li>
                <li><a href="#tab8" data-bs-toggle="tab">Content Writers</a></li>
                <li><a href="#tab9" data-bs-toggle="tab">Human Resources</a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
        <div class="tab-content">
            <div class="tab-pane active" id="tab5">
                <div class="card-body">
                    <div class="py-5 mb-5">
                        <form action="{{ route('Research.Users.Performance') }}" method="GET">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <label for="" class="form-label">start date</label>
                                    <input type="date" class="form-control" name="start_date">
                                </div>
                                <div class="col-4">
                                    <label for="" class="form-label">end date</label>
                                    <input type="date" class="form-control" name="end_date">
                                </div>
                                <div class="col-4 mt-5">
                                    <button class="btn btn-primary w-100" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap table-bordered border-bottom"
                            id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center">No</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Target word</th>
                                    <th class="border-bottom-0">Achieve Word</th>
                                    <th class="border-bottom-0">Cancel word</th>
                                    <th class="border-bottom-0">Cancel Percentage</th>
                                    <th class="border-bottom-0">Total Achieved Word</th>
                                    <th class="border-bottom-0">Performance Percentage</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($User_Performance as $performance)
                                    <tr>
                                        <td class="border-bottom-0 text-center">{{ $loop->iteration }}</td>
                                        <td class="border-bottom-0">
                                            <a href="#" data-id="{{ $performance->id }}" class="getEmployeeID"
                                                data-start-date="{{ request('start_date') ? request('start_date') : null }}"
                                                data-end-date="{{ request('end_date') ? request('end_date') : null }}">
                                                {{ $performance->basic_info->getFullNameAttribute() }}
                                            </a>
                                        </td>
                                        <td class="border-bottom-0">
                                            {{ $performance->bench_mark->first()['Bench_Mark'] ?? 0 }}
                                        </td>
                                        @php
                                            $achievedWordSum = $performance->performance->sum('achieved_word');
                                            $cancelWordSum = $performance->performance->sum('cancel_word');
                                        @endphp
                                        <td class="border-bottom-0">{{ $achievedWordSum ?? 0 }}</td>
                                        <td class="border-bottom-0">{{ $cancelWordSum ?? 0 }}</td>
                                        @php
                                            $cancelPercentage = $achievedWordSum != 0 ? ($cancelWordSum / $achievedWordSum) * 100 : 0;
                                        @endphp
                                        <td class="border-bottom-0">{{ $cancelPercentage }}%</td>
                                        @php
                                            $benchMark = $performance->bench_mark->first()['Bench_Mark'] ?? 0;
                                            $totalArchivedWord = $achievedWordSum - $cancelWordSum;
                                            $performancePercentage = $benchMark != 0 ? ($totalArchivedWord / $benchMark) * 100 : 0;
                                        @endphp
                                        <td class="border-bottom-0">{{ $totalArchivedWord }}</td>
                                        <td class="border-bottom-0">{{ number_format($performancePercentage, 2) }}%
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>



                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab6">
                {{-- <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap table-bordered border-bottom"
                            id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center">No</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Target Word</th>
                                    <th class="border-bottom-0">Achieve Word</th>
                                    <th class="border-bottom-0">Percentage</th>
                                    <th class="border-bottom-0">Cancel Word</th>
                                    <th class="border-bottom-0">Cancel Percentage</th>
                                    <th class="border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Coordinator_Performance as $Info)
                                    <tr>
                                        <td class="text-center">{{ $Info['EMP_ID'] }}</td>
                                        <td>
                                            {{ $Info['Name'] }}
                                        </td>
                                        <td>
                                            {{ number_format($Info['Assign_Words']) }}
                                        </td>
                                        <td>
                                            {{ number_format($Info['Achieve_Words']) }}
                                        </td>
                                        <td>
                                            {{ PortalHelpers::getPercentage($Info['Achieve_Words'], $Info['Assign_Words']) }}
                                        </td>
                                        <td>
                                            {{ number_format($Info['Cancel_Words']) }}
                                        </td>
                                        <td>
                                            {{ PortalHelpers::getPercentage($Info['Cancel_Words'], $Info['Achieve_Words']) }}
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="action-btns1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="View"><i
                                                        class="feather feather-eye  text-primary"></i></a>
                                                <a href="#" class="action-btns1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i
                                                        class="feather feather-edit-2  text-success"></i></a>
                                                <a href="#" class="action-btns1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"><i
                                                        class="feather feather-trash-2 text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
            <div class="tab-pane" id="tab7">
                {{-- <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap table-bordered border-bottom"
                            id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center">No</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Target Word</th>
                                    <th class="border-bottom-0">Achieve Word</th>
                                    <th class="border-bottom-0">Percentage</th>
                                    <th class="border-bottom-0">Cancel Word</th>
                                    <th class="border-bottom-0">Cancel Percentage</th>
                                    <th class="border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Manager_Performance as $Info)
                                    <tr>
                                        <td class="text-center">{{ $Info['EMP_ID'] }}</td>
                                        <td>
                                            {{ $Info['Name'] }}
                                        </td>
                                        <td>
                                            {{ number_format($Info['Assign_Words']) }}
                                        </td>
                                        <td>
                                            {{ number_format($Info['Achieve_Words']) }}
                                        </td>
                                        <td>
                                            {{ PortalHelpers::getPercentage($Info['Achieve_Words'], $Info['Assign_Words']) }}
                                        </td>
                                        <td>
                                            {{ number_format($Info['Cancel_Words']) }}
                                        </td>
                                        <td>
                                            {{ PortalHelpers::getPercentage($Info['Cancel_Words'], $Info['Achieve_Words']) }}
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="action-btns1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="View"><i
                                                        class="feather feather-eye  text-primary"></i></a>
                                                <a href="#" class="action-btns1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit"><i
                                                        class="feather feather-edit-2  text-success"></i></a>
                                                <a href="#" class="action-btns1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Delete"><i
                                                        class="feather feather-trash-2 text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
            </div>
            <div class="tab-pane" id="tab8">
                {{-- <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap table-bordered border-bottom"
                            id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center">No</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Target Word</th>
                                    <th class="border-bottom-0">Achieve Word</th>
                                    <th class="border-bottom-0">Percentage</th>
                                    <th class="border-bottom-0">Cancel Word</th>
                                    <th class="border-bottom-0">Cancel Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Content_Writer_Performance as $month => $performances)
                           
                                    @foreach ($performances as $Info)
                                        @if (empty($Info->bench_mark))
                                            @continue
                                        @endif
                                        <tr>
                                            <td class="text-center">{{ $Info->EMP_ID }}</td>
                                            <td>{{ $Info->basic_info->full_name }}</td>
                                            <td>{{ number_format($Info['bench_mark'][0]['Bench_Mark']) }}</td>
                                            <td>{{ PortalHelpers::getPercentage($Info['stats_sum_completed'], $Info['bench_mark'][0]['Bench_Mark']) }}
                                            </td>
                                            <td>{{ PortalHelpers::getPercentage($Info['stats_sum_canceled'], $Info['stats_sum_completed']) }}
                                            </td>

                                            <td>{{ number_format($Info->stats_sum_canceled) }}</td>
                                            <td>{{ PortalHelpers::getPercentage($Info->stats_sum_canceled, $Info->stats_sum_completed) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
                <div class="tab-pane" id="tab9">
                    {{-- <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap table-bordered border-bottom"
                            id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0 text-center">No</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Target Hiring</th>
                                    <th class="border-bottom-0">Achieve Hiring</th>
                                    <th class="border-bottom-0">Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Hr_Performance as $Info)
                                    @if ($Info->bench_mark->isEmpty())
                                        @continue
                                    @endif
                                    <tr>
                                        <td class="text-center">{{ $Info->EMP_ID }}</td>
                                        <td>{{ $Info->basic_info->full_name }}</td>
                                        <td>{{ number_format($Info->bench_mark[0]['Bench_Mark']) }}</td>
                                        <td>{{ number_format($Info->users_count) }}</td>
                                        <td>{{ PortalHelpers::getPercentage($Info->users_count, $Info->bench_mark[0]['Bench_Mark']) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.getEmployeeID').click(function(e) {
                e.preventDefault();
                var employee_id = $(this).data('id');
                var start_date = $(this).data('data-start-date');
                var end_date = $(this).data('end-start-date');
                var url = "{{ route('get.user.performance.details') }}";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        id: employee_id,
                        start_date: start_date,
                        end_date: end_date
                    },
                    success: function(response) {
                        console.log(response);
                        $('#User-Data').html(response);
                        $('#PerfomaceDetail').modal('show');
                    }
                });
            });
        });
    </script>
    <div class="modal fade" id="PerfomaceDetail">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Performance Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @include('partials.performance.modal')
            </div>
        </div>
    </div>
