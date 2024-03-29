<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <h4 class="page-title">{{ $auth_user->designation->Designation_Name }}<span
                class="font-weight-normal text-muted ms-2">Dashboard</span></h4>
    </div>
    <div class="page-rightheader ms-md-auto">
        <div class="d-flex align-items-end flex-wrap my-auto end-content breadcrumb-end">
            <div class="btn-list d-flex">
                @if (empty($lastAttendanceID->check_in))
                    <form id="checkInForm" method="POST" action="{{ route('Mark.Check.In') }}">
                        @csrf
                        <input type="hidden" value="{{ $auth_user->id }}" name="user_id" />
                        <button id="checkInButton" type="submit" class="btn btn-primary me-3">Time In</button>
                    </form>
                @endif

                <script>
                    document.getElementById('checkInForm').addEventListener('submit', function() {
                        document.getElementById('checkInButton').setAttribute('disabled', 'disabled');
                    });
                </script>
                @if (!empty($lastAttendanceID->check_in) && empty($lastAttendanceID->check_out))
                    <form method="POST" action="{{ route('Mark.Check.Out') }}">
                        @csrf
                        <input type="hidden" value="{{ $auth_user->id }}" name="user_id" />
                        <input type="hidden" value="{{ $lastAttendanceID->id }}" name="lastAttendanceID" />
                        <button type="submit" class="btn btn-primary me-3"> Time Out</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    @if ((int) $auth_user->Role_ID === 1 || (int) $auth_user->Role_ID === 2)
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Total Employees</span>
                                <h3 class="mb-0 mt-1 text-success mb-2">{{ number_format($empCount) }}</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon1 bg-success my-auto  float-end"><i class="las la-user-alt"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Present Employees</span>
                                <h3 class="mb-0 mt-1 text-warning mb-2">6,578</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon1 bg-warning my-auto  float-end"><i class="las la-user-plus"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Absent Employees</span>
                                <h3 class="mb-0 mt-1 text-info mb-2">6,578</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon1 bg-info my-auto  float-end"><i class="las la-user-minus"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">In Leave Employees</span>
                                <h3 class="mb-0 mt-1 text-secondary mb-2">420</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon1 bg-secondary my-auto  float-end"><i class="las la-users-cog"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ((int) $auth_user->Role_ID === 1 || (int) $auth_user->Role_ID === 9 || (int) $auth_user->Role_ID === 10)
        {{-- =================== Order Statistics =========================  --}}
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Total Orders</span>
                                <h3 class="mb-0 mt-1 text-primary mb-2">
                                    {{ $statusCountsFlat['Working_Count'] + $statusCountsFlat['Canceled_Count'] + $statusCountsFlat['Completed_Count'] + $statusCountsFlat['Revision_Count'] }}
                                </h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon1 bg-primary my-auto  float-end"><i class="la la-cubes"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Completed Orders</span>
                                <h3 class="mb-0 mt-1 text-secondary mb-2">{{ $statusCountsFlat['Completed_Count'] }}
                                </h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon1 bg-secondary my-auto  float-end"><i class="la la-check-circle-o"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Working & Revisions</span>
                                <h3 class="mb-0 mt-1 text-success mb-2">
                                    {{ $statusCountsFlat['Working_Count'] + $statusCountsFlat['Revision_Count'] }}</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon1 bg-success my-auto  float-end"><i class="la la-edit"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Cancelled Orders</span>
                                <h3 class="mb-0 mt-1 text-danger mb-2">{{ $statusCountsFlat['Canceled_Count'] }}</h3>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icon1 bg-danger my-auto float-end"><i class="la la-circle-notch"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="col-sm-6 col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-1 font-weight-bold">
                    {{ $auth_user->leaves->Annual_Leaves - $Leave_Quota->Annual_Leaves . '/' . $auth_user->leaves->Annual_Leaves }}
                </h2>
                <div class="fs-6">Annual leave</div>
                <!--<div class="">Remaining Auunal leave are {{ $Leave_Quota->Annual_Leaves }}</div>-->
                <!--<div class="progress progress-sm mt-2">-->
                <!--    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary "-->
                <!--        style="width: {{ PortalHelpers::getLeaveQuotaPercentage($auth_user->leaves->Annual_Leaves, $Leave_Quota->Annual_Leaves) }}%">-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-1 font-weight-bold">
                    {{ $auth_user->leaves->Casual_Leaves - $Leave_Quota->Casual_Leaves . '/' . $auth_user->leaves->Casual_Leaves }}
                </h2>
                <div class="fs-6">Casual leave</div>
                <!--<div class="">Remaining Casual leave are {{ $Leave_Quota->Casual_Leaves }}</div>-->
                <!--<div class="progress progress-sm mt-2">-->
                <!--    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning "-->
                <!--        style="width: {{ PortalHelpers::getLeaveQuotaPercentage($auth_user->leaves->Casual_Leaves, $Leave_Quota->Casual_Leaves) }}%">-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">

                <h2 class="mb-2 font-weight-bold">
                    {{ $auth_user->leaves->Sick_Leaves - $Leave_Quota->Sick_Leaves . '/' . $auth_user->leaves->Sick_Leaves }}
                </h2>
                <div class="fs-6">Sick leave</div>
                <!--<div class="progress progress-sm mt-2">-->
                <!--    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger "-->
                <!--        style="width: {{ PortalHelpers::getLeaveQuotaPercentage($auth_user->leaves->Sick_Leaves, $Leave_Quota->Sick_Leaves) }}%">-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-1 font-weight-bold">{{ $Leave_Quota->Un_Paid }}</h2>
                <div class="fs-6">Unpaid leave</div>
                <!--<div class="">Leave Without Pay</div>-->
                <!--<div class="progress progress-sm mt-2">-->
                <!--    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success "-->
                <!--        style="width: 0%"></div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
    <!-- End Row-->
    @if (in_array((int) $auth_user->Role_ID, [1, 9, 10, 11, 4, 17]))
        <div class="card overflow-hidden">
            <div class="card-header border-0">
                <h4 class="card-title">Deadline Orders</h4>
            </div>
            <div class="tab-menu-heading jobtable-tabs pt-3 p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li><a href="#tab5" data-bs-toggle="tab">Previous Orders</a></li>
                        <li><a href="#tab6" class="active" data-bs-toggle="tab">Today Orders</a></li>
                        <li><a href="#tab7" data-bs-toggle="tab">Tomorrow Orders</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body table_tabs1 pt-5 p-3 border-0">
                <div class="tab-content">
                    <div class="tab-pane p-3 active" id="tab6">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-4">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    @if (
                                        (int) $auth_user->Role_ID === 1 ||
                                            (int) $auth_user->Role_ID === 9 ||
                                            (int) $auth_user->Role_ID === 10 ||
                                            (int) $auth_user->Role_ID === 11)
                                        <th class="wd-10p border-bottom-0">Client</th>
                                    @endif
                                    @if ((int) $auth_user->Role_ID === 4)
                                        <th class="wd-10p border-bottom-0">Order Type</th>
                                    @endif
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($OrdersToday as $Order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        @php
                                                            $route = '';
                                                        @endphp
                                                        @if ($Order['Order_Type'] == 2)
                                                            @php $route = route('Content.Order.Details', ['Order_ID' => $Order['Order_ID']]) @endphp
                                                        @elseif ($Order['Order_Type'] == 3)
                                                            @php $route = route('Design.Order.View', ['Order_ID' => $Order['Order_ID']]) @endphp
                                                        @elseif ($Order['Order_Type'] == 4)
                                                            @php $route = route('Development.Order.View', ['Order_ID' => $Order['Order_ID']]) @endphp
                                                        @elseif ($Order['Order_Type'] == 1)
                                                            @php $route = route('Order.Details', ['Order_ID' => $Order['Order_ID']]) @endphp
                                                        @endif
                                                        <a href="{{ $route }}">
                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        @if (
                                            (int) $auth_user->Role_ID === 1 ||
                                                (int) $auth_user->Role_ID === 9 ||
                                                (int) $auth_user->Role_ID === 10 ||
                                                (int) $auth_user->Role_ID === 11)
                                            <td>{{ $Order['Client_Name'] }}</td>
                                        @endif
                                        @if ((int) $auth_user->Role_ID === 4)
                                            <td>{{ $Order['Order_Type'] == 2 ? 'Content Writing Order' : 'Reseacrh Writing Order' }}
                                            </td>
                                        @endif
                                        <td>{{ $Order['Word_Count'] ?? 'No word count' }}</td>
                                        <td>
                                            @if (isset($Order['DeadLine']))
                                                {{ $Order['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            @elseif(isset($Order['F_DeadLine']))
                                                {{ $Order['F_DeadLine'] }} <span class="text-danger">(First
                                                    Draft)</span>
                                            @elseif(isset($Order['S_DeadLine']))
                                                {{ $Order['S_DeadLine'] }} <span class="text-danger">(Second
                                                    Draft)</span>
                                            @elseif(isset($Order['T_DeadLine']))
                                                {{ $Order['T_DeadLine'] }} <span class="text-danger">(Third
                                                    Draft)</span>
                                            @elseif(isset($Order['Four_DeadLine']))
                                                {{ $Order['Four_DeadLine'] }} <span class="text-danger">(Fourth
                                                    Draft)</span>
                                            @elseif(isset($Order['Fifth_DeadLine']))
                                                {{ $Order['Fifth_DeadLine'] }} <span class="text-danger">(Fifth
                                                    Draft)</span>
                                            @elseif(isset($Order['Sixth_DeadLine']))
                                                {{ $Order['Sixth_DeadLine'] }} <span class="text-danger">(Sixth
                                                    Draft)</span>
                                            @elseif(isset($Order['Seven_DeadLine']))
                                                {{ $Order['Seven_DeadLine'] }} <span class="text-danger">(Seventh
                                                    Draft)</span>
                                            @elseif(isset($Order['Eight_DeadLine']))
                                                {{ $Order['Eight_DeadLine'] }} <span class="text-danger">(Eighth
                                                    Draft)</span>
                                            @elseif(isset($Order['nine_DeadLine']))
                                                {{ $Order['nine_DeadLine'] }} <span class="text-danger">(Ninth
                                                    Draft)</span>
                                            @elseif(isset($Order['ten_DeadLine']))
                                                {{ $Order['ten_DeadLine'] }} <span class="text-danger">(Tenth
                                                    Draft)</span>
                                            @elseif(isset($Order['eleven_DeadLine']))
                                                {{ $Order['eleven_DeadLine'] }} <span class="text-danger">(Eleventh
                                                    Draft)</span>
                                            @elseif(isset($Order['twelve_DeadLine']))
                                                {{ $Order['twelve_DeadLine'] }} <span class="text-danger">(Twelfth
                                                    Draft)</span>
                                            @elseif(isset($Order['thirteen_DeadLine']))
                                                {{ $Order['thirteen_DeadLine'] }} <span
                                                    class="text-danger">(Thirteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fourteen_DeadLine']))
                                                {{ $Order['fourteen_DeadLine'] }} <span
                                                    class="text-danger">(Fourteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fifteen_DeadLine']))
                                                {{ $Order['fifteen_DeadLine'] }} <span class="text-danger">(Fifteenth
                                                    Draft)</span>
                                            @else
                                                No Deadline
                                            @endif
                                        </td>
                                        @if ($Order['Order_Status'] == 0)
                                            <td>Working</td>
                                        @elseif($Order['Order_Status'] == 1)
                                            <td>Canceled</td>
                                        @elseif($Order['Order_Status'] == 2)
                                            <td>Completed</td>
                                        @elseif($Order['Order_Status'] == 3)
                                            <td>Revision</td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-3" id="tab7">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-7">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    @if (
                                        (int) $auth_user->Role_ID === 1 ||
                                            (int) $auth_user->Role_ID === 9 ||
                                            (int) $auth_user->Role_ID === 10 ||
                                            (int) $auth_user->Role_ID === 11)
                                        <th class="wd-10p border-bottom-0">Client</th>
                                    @endif
                                    @if ((int) $auth_user->Role_ID === 4)
                                        <th class="wd-10p border-bottom-0">Order Type</th>
                                    @endif
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($OrdersTomorrow as $Order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        @php
                                                            $route = '';
                                                        @endphp
                                                        @if ($Order['Order_Type'] == 2)
                                                            @php $route = route('Content.Order.Details', ['Order_ID' => $Order['Order_ID']]) @endphp
                                                        @elseif ($Order['Order_Type'] == 3)
                                                            @php $route = route('Design.Order.View', ['Order_ID' => $Order['Order_ID']]) @endphp
                                                        @elseif ($Order['Order_Type'] == 4)
                                                            @php $route = route('Development.Order.View', ['Order_ID' => $Order['Order_ID']]) @endphp
                                                        @elseif ($Order['Order_Type'] == 1)
                                                            @php $route = route('Order.Details', ['Order_ID' => $Order['Order_ID']]) @endphp
                                                        @endif
                                                        <a href="{{ $route }}">
                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        @if (
                                            (int) $auth_user->Role_ID === 1 ||
                                                (int) $auth_user->Role_ID === 9 ||
                                                (int) $auth_user->Role_ID === 10 ||
                                                (int) $auth_user->Role_ID === 11)
                                            <td>{{ $Order['Client_Name'] }}</td>
                                        @endif
                                        <td>{{ $Order['Order_Type'] == 2 ? 'Content Writing Order' : 'Reseacrh Writing Order' }}
                                        </td>
                                        <td>{{ $Order['Word_Count'] ?? 'No word Count' }}
                                        </td>
                                        <td>
                                            @if (isset($Order['DeadLine']))
                                                {{ $Order['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            @elseif(isset($Order['F_DeadLine']))
                                                {{ $Order['F_DeadLine'] }} <span class="text-danger">(First
                                                    Draft)</span>
                                            @elseif(isset($Order['S_DeadLine']))
                                                {{ $Order['S_DeadLine'] }} <span class="text-danger">(Second
                                                    Draft)</span>
                                            @elseif(isset($Order['T_DeadLine']))
                                                {{ $Order['T_DeadLine'] }} <span class="text-danger">(Third
                                                    Draft)</span>
                                            @elseif(isset($Order['Four_DeadLine']))
                                                {{ $Order['Four_DeadLine'] }} <span class="text-danger">(Fourth
                                                    Draft)</span>
                                            @elseif(isset($Order['Fifth_DeadLine']))
                                                {{ $Order['Fifth_DeadLine'] }} <span class="text-danger">(Fifth
                                                    Draft)</span>
                                            @elseif(isset($Order['Sixth_DeadLine']))
                                                {{ $Order['Sixth_DeadLine'] }} <span class="text-danger">(Sixth
                                                    Draft)</span>
                                            @elseif(isset($Order['Seven_DeadLine']))
                                                {{ $Order['Seven_DeadLine'] }} <span class="text-danger">(Seventh
                                                    Draft)</span>
                                            @elseif(isset($Order['Eight_DeadLine']))
                                                {{ $Order['Eight_DeadLine'] }} <span class="text-danger">(Eighth
                                                    Draft)</span>
                                            @elseif(isset($Order['nine_DeadLine']))
                                                {{ $Order['nine_DeadLine'] }} <span class="text-danger">(Ninth
                                                    Draft)</span>
                                            @elseif(isset($Order['ten_DeadLine']))
                                                {{ $Order['ten_DeadLine'] }} <span class="text-danger">(Tenth
                                                    Draft)</span>
                                            @elseif(isset($Order['eleven_DeadLine']))
                                                {{ $Order['eleven_DeadLine'] }} <span class="text-danger">(Eleventh
                                                    Draft)</span>
                                            @elseif(isset($Order['twelve_DeadLine']))
                                                {{ $Order['twelve_DeadLine'] }} <span class="text-danger">(Twelfth
                                                    Draft)</span>
                                            @elseif(isset($Order['thirteen_DeadLine']))
                                                {{ $Order['thirteen_DeadLine'] }} <span
                                                    class="text-danger">(Thirteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fourteen_DeadLine']))
                                                {{ $Order['fourteen_DeadLine'] }} <span
                                                    class="text-danger">(Fourteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fifteen_DeadLine']))
                                                {{ $Order['fifteen_DeadLine'] }} <span class="text-danger">(Fifteenth
                                                    Draft)</span>
                                            @else
                                                No Deadline
                                            @endif
                                        </td>
                                        @if ($Order['Order_Status'] == 0)
                                            <td>Working</td>
                                        @elseif($Order['Order_Status'] == 1)
                                            <td>Canceled</td>
                                        @elseif($Order['Order_Status'] == 2)
                                            <td>Completed</td>
                                        @elseif($Order['Order_Status'] == 3)
                                            <td>Revision</td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-3" id="tab5">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-2">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    @if (
                                        (int) $auth_user->Role_ID === 1 ||
                                            (int) $auth_user->Role_ID === 9 ||
                                            (int) $auth_user->Role_ID === 10 ||
                                            (int) $auth_user->Role_ID === 11)
                                        <th class="wd-10p border-bottom-0">Client</th>
                                    @endif
                                    @if ((int) $auth_user->Role_ID === 4)
                                        <th class="wd-10p border-bottom-0">Order Type</th>
                                    @endif
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($OrdersPast as $Order)
                                    @php
                                        $orderData = PortalHelpers::getSomeData($Order['order_id'], $Order['client_id']);
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route($orderData['Order_Type'] == 2 ? 'Content.Order.Details' : 'Order.Details', ['Order_ID' => $orderData['Order_Number']]) }}">
                                                            {{ $orderData['Order_Number'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        @if (
                                            (int) $auth_user->Role_ID === 1 ||
                                                (int) $auth_user->Role_ID === 9 ||
                                                (int) $auth_user->Role_ID === 10 ||
                                                (int) $auth_user->Role_ID === 11)
                                            <td>{{ $orderData['client_Name'] }}</td>
                                        @endif
                                        @if ((int) $auth_user->Role_ID === 4)
                                            <td>{{ $orderData['Order_Type'] == 2 ? 'Content Writing Order' : 'Reseacrh Writing Order' }}
                                            </td>
                                        @endif
                                        <td>{{ $orderData['Order_Word_Count'] }}</td>
                                        <td>
                                            @if (isset($Order['T_DeadLine']))
                                                {{ $Order['T_DeadLine'] }} <span class="text-danger">(Third
                                                    Draft)</span>
                                            @elseif(isset($Order['F_DeadLine']))
                                                {{ $Order['F_DeadLine'] }} <span class="text-danger">(First
                                                    Draft)</span>
                                            @elseif(isset($Order['S_DeadLine']))
                                                {{ $Order['S_DeadLine'] }} <span class="text-danger">(Second
                                                    Draft)</span>
                                            @elseif(isset($Order['DeadLine']))
                                                {{ $Order['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            @endif
                                        </td>

                                        <td>{{ $orderData['Order_Status'] }}</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>


                        </table>
                    </div>

                </div>
            </div>
        </div>
    @endif
    @if ((int) $auth_user->Role_ID === 5 || (int) $auth_user->Role_ID === 7)
        <div class="row">

        </div>
        <div class="card overflow-hidden">
            <div class="card-header border-0">
                <h4 class="card-title">Deadline Orders</h4>
            </div>
            <div class="tab-menu-heading jobtable-tabs pt-3 p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li><a href="#tab5" data-bs-toggle="tab">Previous Orders</a></li>
                        <li><a href="#tab6" class="active" data-bs-toggle="tab">Today Orders</a></li>
                        <li><a href="#tab7" data-bs-toggle="tab">Tomorrow Orders</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body table_tabs1 pt-5 p-3 border-0">
                <div class="tab-content">
                    <div class="tab-pane p-3 " id="tab5">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-3">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    //dd($CordinatorTodayAll);
                                @endphp
                                @forelse($CordinatorPreviousAll as $Order)
                                    @php
                                        //dd($Order);
                                        $C_orderData = PortalHelpers::getCordinatorData($Order['id'], $Order['Order_Type']);
                                    @endphp


                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route($Order['Order_Type'] == 2 ? 'Content.Order.Details' : 'Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">

                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>{{ $C_orderData['word_Count'] }}</td>
                                        <td>
                                            @if (isset($Order['submission_info']['DeadLine']))
                                                {{ $Order['submission_info']['DeadLine'] }} <span
                                                    class="text-danger">(Deadline)</span>
                                            @elseif(isset($Order['submission_info']['F_DeadLine']))
                                                {{ $Order['submission_info']['F_DeadLine'] }} <span
                                                    class="text-danger">(First Draft)</span>
                                            @elseif(isset($Order['submission_info']['S_DeadLine']))
                                                {{ $Order['submission_info']['S_DeadLine'] }} <span
                                                    class="text-danger">(Second Draft)</span>
                                            @elseif(isset($Order['submission_info']['T_DeadLine']))
                                                {{ $Order['submission_info']['T_DeadLine'] }} <span
                                                    class="text-danger">(Third Draft)</span>
                                            @endif
                                        </td>

                                        <td>{{ $C_orderData['Order_Status'] }}</td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-3 active" id="tab6">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-3">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    //dd($CordinatorTodayAll);
                                @endphp
                                @forelse($CordinatorTodayAll as $Order)
                                    @php

                                        // dd($Order);
                                        // $C_orderData = PortalHelpers::getCordinatorData($Order['id'] , $Order['Order_Type']);
                                    @endphp


                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route($Order['Order_Type'] == 2 ? 'Content.Order.Details' : 'Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">

                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $Order['Word_Count'] }}</td>
                                        <td>
                                            @if (isset($Order['DeadLine']))
                                                {{ $Order['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            @elseif(isset($Order['F_DeadLine']))
                                                {{ $Order['F_DeadLine'] }} <span class="text-danger">(First
                                                    Draft)</span>
                                            @elseif(isset($Order['S_DeadLine']))
                                                {{ $Order['S_DeadLine'] }} <span class="text-danger">(Second
                                                    Draft)</span>
                                            @elseif(isset($Order['T_DeadLine']))
                                                {{ $Order['T_DeadLine'] }} <span class="text-danger">(Third
                                                    Draft)</span>
                                            @endif
                                        </td>
                                        @if ($Order['Order_Status'] == 0)
                                            <td>Working</td>
                                        @elseif($Order['Order_Status'] == 1)
                                            <td>Canceled</td>
                                        @elseif($Order['Order_Status'] == 2)
                                            <td>Completed</td>
                                        @elseif($Order['Order_Status'] == 3)
                                            <td>Revision</td>
                                        @endif



                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-3" id="tab7">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-3">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    //dd($CordinatorTodayAll);
                                @endphp
                                @forelse($CordinatorTomorrowAll as $Order)
                                    @php

                                        //dd($Order);
                                        // $C_orderData = PortalHelpers::getCordinatorData($Order['id'] , $Order['Order_Type']);
                                    @endphp


                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route($Order['Order_Type'] == 2 ? 'Content.Order.Details' : 'Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">

                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $Order['Word_Count'] }}</td>

                                        <td>
                                            @if (isset($Order['T_DeadLine']))
                                                {{ $Order['T_DeadLine'] }} <span class="text-danger">(Third
                                                    Draft)</span>
                                            @elseif(isset($Order['F_DeadLine']))
                                                {{ $Order['F_DeadLine'] }} <span class="text-danger">(First
                                                    Draft)</span>
                                            @elseif(isset($Order['S_DeadLine']))
                                                {{ $Order['S_DeadLine'] }} <span class="text-danger">(Second
                                                    Draft)</span>
                                            @elseif(isset($Order['DeadLine']))
                                                {{ $Order['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            @endif
                                        </td>
                                        @if ($Order['Order_Status'] == 0)
                                            <td>Working</td>
                                        @elseif($Order['Order_Status'] == 1)
                                            <td>Canceled</td>
                                        @elseif($Order['Order_Status'] == 2)
                                            <td>Completed</td>
                                        @elseif($Order['Order_Status'] == 3)
                                            <td>Revision</td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    @endif
    @if ((int) $auth_user->Role_ID === 6)
        <div class="card overflow-hidden">
            <div class="card-header border-0">
                <h4 class="card-title">Deadline Orders</h4>
            </div>
            <div class="tab-menu-heading jobtable-tabs pt-3 p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li><a href="#tab5" data-bs-toggle="tab">Previous Orders</a></li>
                        <li><a href="#tab6" class="active" data-bs-toggle="tab">Today Orders</a></li>
                        <li><a href="#tab7" data-bs-toggle="tab">Tomorrow Orders</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body table_tabs1 pt-5 p-3 border-0">
                <div class="tab-content">
                    <div class="tab-pane p-3" id="tab5">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-3">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    //dd($WriterPreviousOrder->toArray());
                                @endphp
                                @forelse($WriterPreviousOrder as $Order)
                                    @foreach ($Order['tasks'] as $task)
                                        <tr>
                                            <td>{{ $loop->parent->iteration }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="me-3 mt-0 mt-sm-2 d-block">
                                                        <h6 class="mb-1 fs-16">
                                                            <a
                                                                href="{{ route('Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">
                                                                {{ $Order['Order_ID'] }}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $task['Assign_Words'] }}</td>
                                            <td>
                                                {{ $task['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            </td>
                                            <td>


                                                {{ $task['Task_Status'] }}
                                                <!-- Display the actual value for debugging -->

                                            </td>

                                        </tr>
                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-3 active" id="tab6">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-2">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    //dd($WriterTodayOrder->toArray());
                                @endphp
                                @forelse($WriterTodayOrder as $Order)
                                    @foreach ($Order['tasks'] as $task)
                                        <tr>
                                            <td>{{ $loop->parent->iteration }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="me-3 mt-0 mt-sm-2 d-block">
                                                        <h6 class="mb-1 fs-16">
                                                            <a
                                                                href="{{ route('Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">
                                                                {{ $Order['Order_ID'] }}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $task['Assign_Words'] }}</td>
                                            <td>
                                                {{ $task['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            </td>
                                            <td>
                                                {{ $task['Task_Status'] }}

                                            </td>
                                        </tr>
                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-3" id="tab7">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-1">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    //dd($WriterTodayOrder->toArray());
                                @endphp
                                @forelse($WriterTomorrowOrder as $Order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route('Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">
                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $task['Assign_Words'] }}</td>
                                        <td>
                                            {{ $task['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                        </td>
                                        <td>
                                            {{ $task['Task_Status'] }}
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    @endif

    @if ((int) $auth_user->Role_ID === 7)
        @if (!empty($WriterTomorrowOrder) || !empty($WriterTodayOrder))
            <div class="card overflow-hidden">
                <div class="card-header border-0">
                    <h4 class="card-title">Deadline Orders</h4>
                </div>
                <div class="tab-menu-heading jobtable-tabs pt-3 p-0 ">
                    <div class="tabs-menu1">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li><a href="#tab5" data-bs-toggle="tab">Previous Orders</a></li>
                            <li><a href="#tab6" class="active" data-bs-toggle="tab">Today Orders</a></li>
                            <li><a href="#tab7" data-bs-toggle="tab">Tomorrow Orders</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body table_tabs1 pt-5 p-3 border-0">
                    <div class="tab-content">
                        <div class="tab-pane p-3" id="tab5">
                            <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                                id="DataTable-3">
                                <thead>
                                    <tr>
                                        <th class="wd-10p border-bottom-0">S.No</th>
                                        <th class="wd-10p border-bottom-0">Order Code</th>
                                        <th class="w-15p border-bottom-0">Words Count</th>
                                        <th class="wd-20p border-bottom-0">Deadline</th>
                                        <th class="wd-25p border-bottom-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        //dd($WriterPreviousOrder->toArray());
                                    @endphp
                                    @forelse($WriterPreviousOrder as $Order)
                                        @foreach ($Order['tasks'] as $task)
                                            <tr>
                                                <td>{{ $loop->parent->iteration }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="me-3 mt-0 mt-sm-2 d-block">
                                                            <h6 class="mb-1 fs-16">
                                                                <a
                                                                    href="{{ route('Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">
                                                                    {{ $Order['Order_ID'] }}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $task['Assign_Words'] }}</td>
                                                <td>
                                                    {{ $task['DeadLine'] }} <span
                                                        class="text-danger">(Deadline)</span>
                                                </td>
                                                <td>


                                                    {{ $task['Task_Status'] }}
                                                    <!-- Display the actual value for debugging -->

                                                </td>

                                            </tr>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="d-flex justify-content-center">
                                                    <div class="me-3 mt-0 mt-sm-2 d-block">
                                                        <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane p-3 active" id="tab6">
                            <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                                id="DataTable-2">
                                <thead>
                                    <tr>
                                        <th class="wd-10p border-bottom-0">S.No</th>
                                        <th class="wd-10p border-bottom-0">Order Code</th>
                                        <th class="w-15p border-bottom-0">Words Count</th>
                                        <th class="wd-20p border-bottom-0">Deadline</th>
                                        <th class="wd-25p border-bottom-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        //dd($WriterTodayOrder->toArray());
                                    @endphp
                                    @forelse($WriterTodayOrder as $Order)
                                        @foreach ($Order['tasks'] as $task)
                                            <tr>
                                                <td>{{ $loop->parent->iteration }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="me-3 mt-0 mt-sm-2 d-block">
                                                            <h6 class="mb-1 fs-16">
                                                                <a
                                                                    href="{{ route('Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">
                                                                    {{ $Order['Order_ID'] }}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $task['Assign_Words'] }}</td>
                                                <td>
                                                    {{ $task['DeadLine'] }} <span
                                                        class="text-danger">(Deadline)</span>
                                                </td>
                                                <td>
                                                    {{ $task['Task_Status'] }}

                                                </td>
                                            </tr>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="d-flex justify-content-center">
                                                    <div class="me-3 mt-0 mt-sm-2 d-block">
                                                        <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane p-3" id="tab7">
                            <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                                id="DataTable-1">
                                <thead>
                                    <tr>
                                        <th class="wd-10p border-bottom-0">S.No</th>
                                        <th class="wd-10p border-bottom-0">Order Code</th>
                                        <th class="w-15p border-bottom-0">Words Count</th>
                                        <th class="wd-20p border-bottom-0">Deadline</th>
                                        <th class="wd-25p border-bottom-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        //dd($WriterTodayOrder->toArray());
                                    @endphp
                                    @forelse($WriterTomorrowOrder as $Order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="me-3 mt-0 mt-sm-2 d-block">
                                                        <h6 class="mb-1 fs-16">
                                                            <a
                                                                href="{{ route('Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">
                                                                {{ $Order['Order_ID'] }}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $task['Assign_Words'] }}</td>
                                            <td>
                                                {{ $task['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            </td>
                                            <td>
                                                {{ $task['Task_Status'] }}
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="d-flex justify-content-center">
                                                    <div class="me-3 mt-0 mt-sm-2 d-block">
                                                        <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endif


    @if ((int) $auth_user->Role_ID === 8 || (int) $auth_user->Role_ID === 12)
        <div class="row">
            <div class="col-xl-3 col-md-12 col-lg-12">
                <div class="card" style="height: auto !important;">
                    <div class="card-header border-0">
                        <h4 class="card-title">Final DeadLines</h4>
                    </div>
                    <div class="list-group" id="Deadlines"
                        style="overflow-y: scroll !important; max-height: 500px !important; ">

                    </div>
                </div>
            </div>
        </div>

        <div class="card overflow-hidden">
            <div class="card-header border-0">
                <h4 class="card-title">Deadline Orders</h4>
            </div>
            <div class="tab-menu-heading jobtable-tabs pt-3 p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li><a href="#tab5" data-bs-toggle="tab">Previous Orders</a></li>
                        <li><a href="#tab6" class="active" data-bs-toggle="tab">Today Orders</a></li>
                        <li><a href="#tab7" data-bs-toggle="tab">Tomorrow Orders</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body table_tabs1 pt-5 p-3 border-0">
                <div class="tab-content">
                    <div class="tab-pane p-3" id="tab5">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-3">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($ContentAllPrevious as $Order)
                                    @php
                                        $ContentWriterData = PortalHelpers::getContentWriterData($Order['id']);
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route('Content.Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">
                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $ContentWriterData['Word_Count'] }}</td>
                                        <td>
                                            @if (isset($Order['DeadLine']))
                                                {{ $Order['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            @elseif(isset($Order['F_DeadLine']))
                                                {{ $Order['F_DeadLine'] }} <span class="text-danger">(First
                                                    Draft)</span>
                                            @elseif(isset($Order['S_DeadLine']))
                                                {{ $Order['S_DeadLine'] }} <span class="text-danger">(Second
                                                    Draft)</span>
                                            @elseif(isset($Order['T_DeadLine']))
                                                {{ $Order['T_DeadLine'] }} <span class="text-danger">(Third
                                                    Draft)</span>
                                            @elseif(isset($Order['Four_DeadLine']))
                                                {{ $Order['Four_DeadLine'] }} <span class="text-danger">(Fourth
                                                    Draft)</span>
                                            @elseif(isset($Order['Fifth_DeadLine']))
                                                {{ $Order['Fifth_DeadLine'] }} <span class="text-danger">(Fifth
                                                    Draft)</span>
                                            @elseif(isset($Order['Sixth_DeadLine']))
                                                {{ $Order['Sixth_DeadLine'] }} <span class="text-danger">(Sixth
                                                    Draft)</span>
                                            @elseif(isset($Order['Seven_DeadLine']))
                                                {{ $Order['Seven_DeadLine'] }} <span class="text-danger">(Seventh
                                                    Draft)</span>
                                            @elseif(isset($Order['Eight_DeadLine']))
                                                {{ $Order['Eight_DeadLine'] }} <span class="text-danger">(Eighth
                                                    Draft)</span>
                                            @elseif(isset($Order['nine_DeadLine']))
                                                {{ $Order['nine_DeadLine'] }} <span class="text-danger">(Ninth
                                                    Draft)</span>
                                            @elseif(isset($Order['ten_DeadLine']))
                                                {{ $Order['ten_DeadLine'] }} <span class="text-danger">(Tenth
                                                    Draft)</span>
                                            @elseif(isset($Order['eleven_DeadLine']))
                                                {{ $Order['eleven_DeadLine'] }} <span class="text-danger">(Eleventh
                                                    Draft)</span>
                                            @elseif(isset($Order['twelve_DeadLine']))
                                                {{ $Order['twelve_DeadLine'] }} <span class="text-danger">(Twelfth
                                                    Draft)</span>
                                            @elseif(isset($Order['thirteen_DeadLine']))
                                                {{ $Order['thirteen_DeadLine'] }} <span
                                                    class="text-danger">(Thirteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fourteen_DeadLine']))
                                                {{ $Order['fourteen_DeadLine'] }} <span
                                                    class="text-danger">(Fourteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fifteen_DeadLine']))
                                                {{ $Order['fifteen_DeadLine'] }} <span class="text-danger">(Fifteenth
                                                    Draft)</span>
                                            @else
                                                No Deadline
                                            @endif


                                        </td>
                                        <td>
                                            {{ $ContentWriterData['Order_Status'] }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-3 active" id="tab6">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-2">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($ContentTodayAll as $Order)
                                    @php
                                        // $ContentWriterData = PortalHelpers::getContentWriterData($Order['id'])
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route('Content.Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">
                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $Order['Word_Count'] }}</td>

                                        <td>
                                            @if (isset($Order['DeadLine']))
                                                {{ $Order['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            @elseif(isset($Order['F_DeadLine']))
                                                {{ $Order['F_DeadLine'] }} <span class="text-danger">(First
                                                    Draft)</span>
                                            @elseif(isset($Order['S_DeadLine']))
                                                {{ $Order['S_DeadLine'] }} <span class="text-danger">(Second
                                                    Draft)</span>
                                            @elseif(isset($Order['T_DeadLine']))
                                                {{ $Order['T_DeadLine'] }} <span class="text-danger">(Third
                                                    Draft)</span>
                                            @elseif(isset($Order['Four_DeadLine']))
                                                {{ $Order['Four_DeadLine'] }} <span class="text-danger">(Fourth
                                                    Draft)</span>
                                            @elseif(isset($Order['Fifth_DeadLine']))
                                                {{ $Order['Fifth_DeadLine'] }} <span class="text-danger">(Fifth
                                                    Draft)</span>
                                            @elseif(isset($Order['Sixth_DeadLine']))
                                                {{ $Order['Sixth_DeadLine'] }} <span class="text-danger">(Sixth
                                                    Draft)</span>
                                            @elseif(isset($Order['Seven_DeadLine']))
                                                {{ $Order['Seven_DeadLine'] }} <span class="text-danger">(Seventh
                                                    Draft)</span>
                                            @elseif(isset($Order['Eight_DeadLine']))
                                                {{ $Order['Eight_DeadLine'] }} <span class="text-danger">(Eighth
                                                    Draft)</span>
                                            @elseif(isset($Order['nine_DeadLine']))
                                                {{ $Order['nine_DeadLine'] }} <span class="text-danger">(Ninth
                                                    Draft)</span>
                                            @elseif(isset($Order['ten_DeadLine']))
                                                {{ $Order['ten_DeadLine'] }} <span class="text-danger">(Tenth
                                                    Draft)</span>
                                            @elseif(isset($Order['eleven_DeadLine']))
                                                {{ $Order['eleven_DeadLine'] }} <span class="text-danger">(Eleventh
                                                    Draft)</span>
                                            @elseif(isset($Order['twelve_DeadLine']))
                                                {{ $Order['twelve_DeadLine'] }} <span class="text-danger">(Twelfth
                                                    Draft)</span>
                                            @elseif(isset($Order['thirteen_DeadLine']))
                                                {{ $Order['thirteen_DeadLine'] }} <span
                                                    class="text-danger">(Thirteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fourteen_DeadLine']))
                                                {{ $Order['fourteen_DeadLine'] }} <span
                                                    class="text-danger">(Fourteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fifteen_DeadLine']))
                                                {{ $Order['fifteen_DeadLine'] }} <span class="text-danger">(Fifteenth
                                                    Draft)</span>
                                            @else
                                                No Deadline
                                            @endif

                                        </td>

                                        @if ($Order['Order_Status'] == 0)
                                            <td>Working</td>
                                        @elseif($Order['Order_Status'] == 1)
                                            <td>Canceled</td>
                                        @elseif($Order['Order_Status'] == 2)
                                            <td>Completed</td>
                                        @elseif($Order['Order_Status'] == 3)
                                            <td>Revision</td>
                                        @endif


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-3" id="tab7">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-2">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="w-15p border-bottom-0">Words Count</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($ContentAllTowmorrow as $Order)
                                    @php

                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route('Content.Order.Details', ['Order_ID' => $Order['Order_ID']]) }}">
                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $Order['Word_Count'] }}</td>
                                        <td>
                                            @if (isset($Order['DeadLine']))
                                                {{ $Order['DeadLine'] }} <span class="text-danger">(Deadline)</span>
                                            @elseif(isset($Order['F_DeadLine']))
                                                {{ $Order['F_DeadLine'] }} <span class="text-danger">(First
                                                    Draft)</span>
                                            @elseif(isset($Order['S_DeadLine']))
                                                {{ $Order['S_DeadLine'] }} <span class="text-danger">(Second
                                                    Draft)</span>
                                            @elseif(isset($Order['T_DeadLine']))
                                                {{ $Order['T_DeadLine'] }} <span class="text-danger">(Third
                                                    Draft)</span>
                                            @elseif(isset($Order['Four_DeadLine']))
                                                {{ $Order['Four_DeadLine'] }} <span class="text-danger">(Fourth
                                                    Draft)</span>
                                            @elseif(isset($Order['Fifth_DeadLine']))
                                                {{ $Order['Fifth_DeadLine'] }} <span class="text-danger">(Fifth
                                                    Draft)</span>
                                            @elseif(isset($Order['Sixth_DeadLine']))
                                                {{ $Order['Sixth_DeadLine'] }} <span class="text-danger">(Sixth
                                                    Draft)</span>
                                            @elseif(isset($Order['Seven_DeadLine']))
                                                {{ $Order['Seven_DeadLine'] }} <span class="text-danger">(Seventh
                                                    Draft)</span>
                                            @elseif(isset($Order['Eight_DeadLine']))
                                                {{ $Order['Eight_DeadLine'] }} <span class="text-danger">(Eighth
                                                    Draft)</span>
                                            @elseif(isset($Order['nine_DeadLine']))
                                                {{ $Order['nine_DeadLine'] }} <span class="text-danger">(Ninth
                                                    Draft)</span>
                                            @elseif(isset($Order['ten_DeadLine']))
                                                {{ $Order['ten_DeadLine'] }} <span class="text-danger">(Tenth
                                                    Draft)</span>
                                            @elseif(isset($Order['eleven_DeadLine']))
                                                {{ $Order['eleven_DeadLine'] }} <span class="text-danger">(Eleventh
                                                    Draft)</span>
                                            @elseif(isset($Order['twelve_DeadLine']))
                                                {{ $Order['twelve_DeadLine'] }} <span class="text-danger">(Twelfth
                                                    Draft)</span>
                                            @elseif(isset($Order['thirteen_DeadLine']))
                                                {{ $Order['thirteen_DeadLine'] }} <span
                                                    class="text-danger">(Thirteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fourteen_DeadLine']))
                                                {{ $Order['fourteen_DeadLine'] }} <span
                                                    class="text-danger">(Fourteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fifteen_DeadLine']))
                                                {{ $Order['fifteen_DeadLine'] }} <span class="text-danger">(Fifteenth
                                                    Draft)</span>
                                            @else
                                                No Deadline
                                            @endif

                                        </td>

                                        @if ($Order['Order_Status'] == 0)
                                            <td>Working</td>
                                        @elseif($Order['Order_Status'] == 1)
                                            <td>Canceled</td>
                                        @elseif($Order['Order_Status'] == 2)
                                            <td>Completed</td>
                                        @elseif($Order['Order_Status'] == 3)
                                            <td>Revision</td>
                                        @endif


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endif





    <!-- =================== HR Dashboard ======================== -->
     @if ((int) $auth_user->Role_ID === 16 || (int) $auth_user->Role_ID === 3)
        <div class="row">
            <div class="col-xl-3 col-md-12 col-lg-12">
                <div class="card" style="height: auto !important;">
                    <div class="card-header border-0">
                        <h4 class="card-title">Final DeadLines</h4>
                    </div>
                    <div class="list-group" id="Deadlines"
                        style="overflow-y: scroll !important; max-height: 500px !important; ">

                    </div>
                </div>
            </div>
        </div>

        <div class="card overflow-hidden">
            <div class="card-header border-0">
                <h4 class="card-title">Deadline Orders</h4>
            </div>
            <div class="tab-menu-heading jobtable-tabs pt-3 p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li><a href="#tab5" data-bs-toggle="tab">Previous Orders</a></li>
                        <li><a href="#tab6" class="active" data-bs-toggle="tab">Today Orders</a></li>
                        <li><a href="#tab7" data-bs-toggle="tab">Tomorrow Orders</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body table_tabs1 pt-5 p-3 border-0">
                <div class="tab-content">
                    <div class="tab-pane p-3" id="tab5">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-3">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>

                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($graphic_past as $Order)
                                    @dd($Order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route('Design.Order.View', ['Order_ID' => $Order['Order_ID']]) }}">
                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            @if (isset($Order['assign_dead_lines']['deadline_date']))
                                                {{ $Order['submission_info']['DeadLine'] }} <span
                                                    class="text-danger">(Deadline)</span>
                                            @elseif(isset($Order['assign_dead_lines']['first_draft']))
                                                {{ $Order['assign_dead_lines']['first_draft'] }} <span
                                                    class="text-danger">(First Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['second_draft']))
                                                {{ $Order['assign_dead_lines']['second_draft'] }} <span
                                                    class="text-danger">(Second Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['third_draft']))
                                                {{ $Order['assign_dead_lines']['third_draft'] }} <span
                                                    class="text-danger">(Third Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['forth_draft']))
                                                {{ $Order['assign_dead_lines']['forth_draft'] }} <span
                                                    class="text-danger">(Fourth Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['fifth_draft']))
                                                {{ $Order['assign_dead_lines']['fifth_draft'] }} <span
                                                    class="text-danger">(Fifth Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['sixth_draft']))
                                                {{ $Order['assign_dead_lines']['sixth_draft'] }} <span
                                                    class="text-danger">(Sixth Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['seventh_draft']))
                                                {{ $Order['assign_dead_lines']['seventh_draft'] }} <span
                                                    class="text-danger">(Seventh Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['eighth_draft']))
                                                {{ $Order['assign_dead_lines']['eighth_draft'] }} <span
                                                    class="text-danger">(Eighth Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['nineth_draft']))
                                                {{ $Order['assign_dead_lines']['nineth_draft'] }} <span
                                                    class="text-danger">(Ninth Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['tenth_draft']))
                                                {{ $Order['assign_dead_lines']['tenth_draft'] }} <span
                                                    class="text-danger">(Tenth Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['eleventh_draft']))
                                                {{ $Order['assign_dead_lines']['eleventh_draft'] }} <span
                                                    class="text-danger">(Eleventh Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['twelveth_draft']))
                                                {{ $Order['assign_dead_lines']['twelveth_draft'] }} <span
                                                    class="text-danger">(Twelfth Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['thirteen_draft']))
                                                {{ $Order['assign_dead_lines']['thirteen_draft'] }} <span
                                                    class="text-danger">(Thirteenth Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['fourteen_draft']))
                                                {{ $Order['assign_dead_lines']['fourteen_draft'] }} <span
                                                    class="text-danger">(Fourteenth Draft)</span>
                                            @elseif(isset($Order['assign_dead_lines']['fifteen_draft']))
                                                {{ $Order['assign_dead_lines']['fifteen_draft'] }} <span
                                                    class="text-danger">(Fifteenth Draft)</span>
                                            @else
                                                No Deadline
                                            @endif
                                        </td>


                                        @if ($Order['Order_Status'] == 0)
                                            <td>Working</td>
                                        @elseif($Order['Order_Status'] == 1)
                                            <td>Canceled</td>
                                        @elseif($Order['Order_Status'] == 2)
                                            <td>Completed</td>
                                        @elseif($Order['Order_Status'] == 3)
                                            <td>Revision</td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-3 active" id="tab6">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-2">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($graphic_today as $Order)
                                    @php
                                        // $ContentWriterData = PortalHelpers::getContentWriterData($Order['id'])
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route('Design.Order.View', ['Order_ID' => $Order['Order_ID']]) }}">
                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if (isset($Order['deadline_date']))
                                                {{ $Order['deadline_date'] }} <span
                                                    class="text-danger">(Deadline)</span>
                                            @elseif(isset($Order['first_draft']))
                                                {{ $Order['first_draft'] }} <span class="text-danger">(First
                                                    Draft)</span>
                                            @elseif(isset($Order['second_draft']))
                                                {{ $Order['second_draft'] }} <span class="text-danger">(Second
                                                    Draft)</span>
                                            @elseif(isset($Order['third_draft']))
                                                {{ $Order['third_draft'] }} <span class="text-danger">(Third
                                                    Draft)</span>
                                            @elseif(isset($Order['forth_draft']))
                                                {{ $Order['forth_draft'] }} <span class="text-danger">(Fourth
                                                    Draft)</span>
                                            @elseif(isset($Order['fifth_draft']))
                                                {{ $Order['fifth_draft'] }} <span class="text-danger">(Fifth
                                                    Draft)</span>
                                            @elseif(isset($Order['sixth_draft']))
                                                {{ $Order['assign_dead_lines']['sixth_draft'] }} <span
                                                    class="text-danger">(Sixth Draft)</span>
                                            @elseif(isset($Order['seventh_draft']))
                                                {{ $Order['assign_dead_lines']['seventh_draft'] }} <span
                                                    class="text-danger">(Seventh Draft)</span>
                                            @elseif(isset($Order['eighth_draft']))
                                                {{ $Order['eighth_draft'] }} <span class="text-danger">(Eighth
                                                    Draft)</span>
                                            @elseif(isset($Order['nineth_draft']))
                                                {{ $Order['nineth_draft'] }} <span class="text-danger">(Ninth
                                                    Draft)</span>
                                            @elseif(isset($Order['tenth_draft']))
                                                {{ $Order['tenth_draft'] }} <span class="text-danger">(Tenth
                                                    Draft)</span>
                                            @elseif(isset($Order['eleventh_draft']))
                                                {{ $Order['eleventh_draft'] }} <span class="text-danger">(Eleventh
                                                    Draft)</span>
                                            @elseif(isset($Order['twelveth_draft']))
                                                {{ $Order['twelveth_draft'] }} <span class="text-danger">(Twelfth
                                                    Draft)</span>
                                            @elseif(isset($Order['thirteen_draft']))
                                                {{ $Order['thirteen_draft'] }} <span class="text-danger">(Thirteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fourteen_draft']))
                                                {{ $Order['fourteen_draft'] }} <span class="text-danger">(Fourteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fifteen_draft']))
                                                {{ $Order['fifteen_draft'] }} <span class="text-danger">(Fifteenth
                                                    Draft)</span>
                                            @else
                                                No Deadline
                                            @endif
                                        </td>

                                        @if ($Order['Order_Status'] == 0)
                                            <td>Working</td>
                                        @elseif($Order['Order_Status'] == 1)
                                            <td>Canceled</td>
                                        @elseif($Order['Order_Status'] == 2)
                                            <td>Completed</td>
                                        @elseif($Order['Order_Status'] == 3)
                                            <td>Revision</td>
                                        @endif


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-3" id="tab7">
                        <table class="table table-vcenter text-nowrap border-top dead-line-orders mb-0"
                            id="DataTable-2">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">S.No</th>
                                    <th class="wd-10p border-bottom-0">Order Code</th>
                                    <th class="wd-20p border-bottom-0">Deadline</th>
                                    <th class="wd-25p border-bottom-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($graphic_tomorrow as $Order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">
                                                        <a
                                                            href="{{ route('Design.Order.View', ['Order_ID' => $Order['Order_ID']]) }}">
                                                            {{ $Order['Order_ID'] }}
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            @if (isset($Order['deadline_date']))
                                                {{ $Order['deadline_date'] }} <span
                                                    class="text-danger">(Deadline)</span>
                                            @elseif(isset($Order['first_draft']))
                                                {{ $Order['first_draft'] }} <span class="text-danger">(First
                                                    Draft)</span>
                                            @elseif(isset($Order['second_draft']))
                                                {{ $Order['second_draft'] }} <span class="text-danger">(Second
                                                    Draft)</span>
                                            @elseif(isset($Order['third_draft']))
                                                {{ $Order['third_draft'] }} <span class="text-danger">(Third
                                                    Draft)</span>
                                            @elseif(isset($Order['forth_draft']))
                                                {{ $Order['forth_draft'] }} <span class="text-danger">(Fourth
                                                    Draft)</span>
                                            @elseif(isset($Order['fifth_draft']))
                                                {{ $Order['fifth_draft'] }} <span class="text-danger">(Fifth
                                                    Draft)</span>
                                            @elseif(isset($Order['sixth_draft']))
                                                {{ $Order['assign_dead_lines']['sixth_draft'] }} <span
                                                    class="text-danger">(Sixth Draft)</span>
                                            @elseif(isset($Order['seventh_draft']))
                                                {{ $Order['assign_dead_lines']['seventh_draft'] }} <span
                                                    class="text-danger">(Seventh Draft)</span>
                                            @elseif(isset($Order['eighth_draft']))
                                                {{ $Order['eighth_draft'] }} <span class="text-danger">(Eighth
                                                    Draft)</span>
                                            @elseif(isset($Order['nineth_draft']))
                                                {{ $Order['nineth_draft'] }} <span class="text-danger">(Ninth
                                                    Draft)</span>
                                            @elseif(isset($Order['tenth_draft']))
                                                {{ $Order['tenth_draft'] }} <span class="text-danger">(Tenth
                                                    Draft)</span>
                                            @elseif(isset($Order['eleventh_draft']))
                                                {{ $Order['eleventh_draft'] }} <span class="text-danger">(Eleventh
                                                    Draft)</span>
                                            @elseif(isset($Order['twelveth_draft']))
                                                {{ $Order['twelveth_draft'] }} <span class="text-danger">(Twelfth
                                                    Draft)</span>
                                            @elseif(isset($Order['thirteen_draft']))
                                                {{ $Order['thirteen_draft'] }} <span class="text-danger">(Thirteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fourteen_draft']))
                                                {{ $Order['fourteen_draft'] }} <span class="text-danger">(Fourteenth
                                                    Draft)</span>
                                            @elseif(isset($Order['fifteen_draft']))
                                                {{ $Order['fifteen_draft'] }} <span class="text-danger">(Fifteenth
                                                    Draft)</span>
                                            @else
                                                No Deadline
                                            @endif
                                        </td>

                                        @if ($Order['Order_Status'] == 0)
                                            <td>Working</td>
                                        @elseif($Order['Order_Status'] == 1)
                                            <td>Canceled</td>
                                        @elseif($Order['Order_Status'] == 2)
                                            <td>Completed</td>
                                        @elseif($Order['Order_Status'] == 3)
                                            <td>Revision</td>
                                        @endif


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="d-flex justify-content-center">
                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                    <h6 class="mb-1 fs-16">Orders are Not Found!</h6>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!--@if (session('Alert!'))
-->
    <!--<div class="modal fade" id="modaldemo8">-->
    <!--    <div class="modal-dialog  modal-dialog-centered text-center py-5" role="document">-->
    <!--        <div class="modal-content modal-content-demo " style="background-color: #2B3963;border: 1px solid #2B3963; border-radius:18px;">-->
    <!--            <div class="modal-header">-->
    <!--                <h6 class="modal-title text-center fs-4 text-white">Mark Attendance</h6>-->
    <!--                <button aria-label="Close" class="btn-close text-white" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>-->
    <!--            </div>-->
    <!--            <div class="modal-body text-center">-->
    <!--                <h2 class="my-3 text-white fs-3" id="Current-Time">-->
    <!--                </h2>-->
    <!--                <p class="my-3 text-white"></p>-->

    <!--                <div class="btn-list d-flex justify-content-center text-center mt-2 mb-1">-->

    <!--                    @if (empty($lastAttendanceID->check_in))
-->
    <!--                    <form method="POST" action="{{ route('Mark.Check.In') }}" class="w-100">-->
    <!--                        @csrf-->
    <!--                        <input type="hidden" value="{{ $auth_user->id }}" name="user_id" />-->
    <!--                        <button type="submit" class="btn btn-primary btn-lg  px-4 w-100 fs-5 "> Time In</button>-->

    <!--                    </form>-->
    <!--
@endif-->

    <!--                    @if (!empty($lastAttendanceID->check_in) && empty($lastAttendanceID->check_out))
-->
    <!--                    <form method="POST" action="{{ route('Mark.Check.Out') }}">-->
    <!--                        @csrf-->
    <!--                        <input type="hidden" value="{{ $auth_user->id }}" name="user_id" />-->
    <!--                        <input type="hidden" value="{{ $lastAttendanceID->id }}" name="lastAttendanceID" />-->
    <!--                        <button type="submit" class="btn btn-primary btn-lg  px-4 w-100 fs-5 "> Time Out-->
    <!--                        </button>-->
    <!--                    </form>-->
    <!--
@endif-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--
@endif-->

    <script>
        $(document).ready(function() {

            $('#DataTable-2').DataTable();
            $('#DataTable-3').DataTable();
            $('#DataTable-4').DataTable();
            $('.dead-line-orders').DataTable();

            function updateClock() {
                // Create a new Date object with the current date and time
                const currentTime = new Date();
                // Extract the individual components of the time
                const hours = currentTime.getHours();
                const minutes = currentTime.getMinutes();
                const seconds = currentTime.getSeconds();
                document.getElementById("Current-Time").innerText =
                    `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            }

            updateClock();
            setInterval(updateClock, 1000);

            @if (session('Alert!'))
                $('#modaldemo8').modal('show');
            @endif
            $('#modaldemo8').modal('show');

        });
    </script>



    @if (!empty($Previous_Order) && !empty($Today_Order) && !empty($Tomorrow_Order))
        <script>
            const count_id = {
                {
                    Js::from($deadline_times)
                }
            };
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            // Create a container for all countdown timers
            const container = document.createElement('div');

            // Function to update countdown timers
            function updateCountdownTimers() {
                const activeContainer = document.createElement('div'); // Container for active countdown timers
                const passedContainer = document.createElement('div'); // Container for passed deadlines
                activeContainer.innerHTML = ''; // Clear previous content
                passedContainer.innerHTML = ''; // Clear previous content
                for (let i = 0; i < count_id.length; i++) {
                    const countDownDate = new Date(count_id[i][1]).getTime();
                    const Order_ID = count_id[i][0];
                    const month = months[new Date(count_id[i][1]).getMonth()];
                    const day = new Date(count_id[i][1]).getDate();

                    var now = new Date().getTime();
                    var distance = countDownDate - now;

                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Check if the deadline has already passed
                    if (distance < 0) {
                        // Deadline has passed, display a message or any other representation
                        const html =
                            '<div class="list-group-item d-flex align-items-center border-0"><div class=""><div class="calendar-icon icons"><div class="date_time bg-pink-transparent"><span class="date">' +
                            day + '</span><span class="month">' + month +
                            '</span></div></div></div><div class="ms-1"><div class="countdowntimer"><span class="h5 fs-14">' +
                            Order_ID +
                            '</span><span class="clearfix"></span><h2 class="p-3 text-danger">Deadline Passed</h2></div></div></div>';
                        passedContainer.innerHTML += html;
                    } else {
                        // The deadline is still valid, display the countdown timer
                        const html =
                            '<div class="list-group-item d-flex align-items-center border-0"><div class=""><div class="calendar-icon icons"><div class="date_time bg-pink-transparent"><span class="date">' +
                            day + '</span><span class="month">' + month +
                            '</span></div></div></div><div class="ms-1"><div class="countdowntimer"><span class="h5 fs-14">' +
                            Order_ID +
                            '</span><span class="clearfix"></span><h2 class="p-3"><span class="border-0 countdown-timer">' +
                            hours + ":" + minutes + ":" + seconds + '</span></h2></div></div></div>';
                        activeContainer.innerHTML += html;
                    }
                    // Append the active countdown timers on top of the element with id "Deadlines"
                    document.getElementById("Deadlines").innerHTML = '';
                    document.getElementById("Deadlines").appendChild(activeContainer);

                    document.getElementById("Deadlines").appendChild(passedContainer);
                }
            }
            updateCountdownTimers();
            const countdownInterval = setInterval(updateCountdownTimers, 1000);
            window.addEventListener('beforeunload', function() {
                clearInterval(countdownInterval);
            });
            document.getElementById("Deadlines").appendChild(container);
        </script>
    @endif
