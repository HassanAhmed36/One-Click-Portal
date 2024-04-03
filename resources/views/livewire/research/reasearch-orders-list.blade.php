@if((int) $auth_user->Role_ID === 1)
    {{-- Admin View --}}
   
    <div class="card mt-4">
      <div class="card-header border-bottom-0 d-flex justify-content-between align-items-center">
            <div class="card-title">Research Orders List</div>
            <div class="w-50 ">
            <div class="btn-group mt-2 mb-2 me-4">
                <form action="" method="GET" class="d-flex gap-2">
                <select name="draft_name" id="" class="form-select">
                    @php
                    $array = [
                        'F_DeadLine' => 'First DeadLine', 
                        'S_DeadLine' => 'Second DeadLine', 
                        'T_DeadLine' => 'Third DeadLine', 
                        'Four_DeadLine' => 'Fourth DeadLine', 
                        'Fifth_DeadLine' => 'Fifth DeadLine', 
                        'Sixth_DeadLine' => 'Sixth DeadLine', 
                        'Seven_DeadLine' => 'Seventh DeadLine', 
                        'Eight_DeadLine' => 'Eighth DeadLine', 
                        'nine_DeadLine' => 'Ninth DeadLine', 
                        'ten_DeadLine' => 'Tenth DeadLine', 
                        'eleven_DeadLine' => 'Eleventh DeadLine', 
                        'twelve_DeadLine' => 'Twelfth DeadLine', 
                        'thirteen_DeadLine' => 'Thirteenth DeadLine', 
                        'fourteen_DeadLine' => 'Fourteenth DeadLine', 
                        'fifteen_DeadLine' => 'Fifteenth DeadLine'
                    ];
                    @endphp
                    @foreach ($array as $key => $value)
                        <option value="{{ $key }}" @selected($key == request('draft_name'))>{{ $value }}</option>
                    @endforeach
                </select>
                 <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                 <button class="btn btn-primary" type="submit">Submit</button>
                 </form>
             </div>
            <div class="btn-group mt-2 mb-2">

                <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Filters <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ route('Research.Orders') }}">All</a></li>
                    <li><a href="{{ route('Research.Orders', ['filter' => 'Not-Assign']) }}">Not Assign Order</a></li>
                </ul>
            </div>
         
             </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (request()->has('filter'))
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">S.No</th>
                                <th class="wd-15p border-bottom-0">Order ID</th>
                                <th class="wd-15p border-bottom-0">Status</th>
                                <th class="wd-15p border-bottom-0">Client Name</th>
                                <th class="wd-20p border-bottom-0">Created & Assign</th>
                                <th class="wd-10p border-bottom-0">Order From</th>
                                <th class="wd-25p border-bottom-0">Order Info</th>
                                <th class="wd-25p border-bottom-0">Order Price</th>
                                <th class="wd-25p border-bottom-0">Deadline</th>
                                <th class="wd-25p border-bottom-0">Draft Deadline</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($unAssignedOrder as $Order)
                                <tr>
                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                    <td>
                                        <h6 class="mb-1 fs-16"><a
                                                href="{{ route('Order.Details', ['Order_ID' => $Order->Order_ID]) }}">{{ $Order->Order_ID }}</a>
                                        </h6>
                                    </td>
                                    <td>
                                     @if (isset($Order->basic_info->order_status))
                                        {{ $Order->basic_info->order_status }}<br>
                                     @endif
                                        
                                    </td>
                                    <td>{{ $Order->client_info->Client_Name }}</td>
                                  <td>
                                        <strong>Created By:</strong>
                                        {{ isset($Order->authorized_user) && $Order->authorized_user->basic_info ? $Order->authorized_user->basic_info->full_name : '' }}
                                        <br>
                                        @forelse($Order->assign as $User)
                                            <strong class="text-success">{{ $User->basic_info->full_name }}</strong>
                                            <br>
                                        @empty
                                            <strong class="text-danger"> Not Assign</strong> <br>
                                        @endforelse
                                        <strong>Created At:</strong> {{ $Order->created_at }}
                                    </td>
                                    <td>
                                        @if (isset($Order->basic_info->Order_Website))
                                            <strong>Website</strong> {{ $Order->basic_info->Order_Website }}<br>
                                        @endif
                                        @if (isset($Order->basic_info->Order_Services))
                                            <strong>Service</strong> {{ $Order->basic_info->Order_Services }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($Order->basic_info->Word_Count))
                                            <strong>Word Count:</strong> {{ $Order->basic_info->Word_Count }}<br>
                                        @endif
                                        @if (isset($Order->basic_info->Pages_Count))
                                            <strong>Page Count:</strong> {{ $Order->basic_info->Pages_Count }}
                                        @endif
                                    </td>
                                    <td>
                                        <strong>Amount:</strong> {{ $Order->payment_info->Order_Price }}<br>
                                        <strong>Status:</strong> {!! PortalHelpers::visualizeRecordStatus($Order->payment_info->Payment_Status) !!}
                                    </td>
                                    <td>
                                        <strong>Deadline: </strong>{{ $Order->submission_info->DeadLine }} <br>
                                        <strong>Time: </strong>{{ $Order->submission_info->DeadLine_Time }}
                                    </td>
                                    <td>
                                        @if (isset($Order->submission_info->F_DeadLine))
                                            <strong>1st Draft: </strong>{{ $Order->submission_info->F_DeadLine }} <br>
                                        @endif
                                        @if (isset($Order->submission_info->S_DeadLine))
                                            <strong>2nd Draft: </strong>{{ $Order->submission_info->S_DeadLine }} <br>
                                        @endif
                                        @if (isset($Order->submission_info->T_DeadLine))
                                            <strong>3rd Draft: </strong>{{ $Order->submission_info->T_DeadLine }}
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                @else
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">S.No</th>
                                <th class="wd-15p border-bottom-0">Order ID</th>
                                <th class="wd-15p border-bottom-0">Status</th>
                                <th class="wd-15p border-bottom-0">Client Name</th>
                                <th class="wd-20p border-bottom-0">Created & Assign</th>
                                <th class="wd-10p border-bottom-0">Order From</th>
                                <th class="wd-25p border-bottom-0">Order Info</th>
                                <th class="wd-25p border-bottom-0">Order Price</th>
                                <th class="wd-25p border-bottom-0">Deadline</th>
                                <th class="wd-25p border-bottom-0">Draft Deadline</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($Research_Orders as $Order)
                                <tr>
                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                    <td>
                                        <h6 class="mb-1 fs-16"><a
                                                href="{{ route('Order.Details', ['Order_ID' => $Order->Order_ID]) }}">{{ $Order->Order_ID }}</a>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 class="mb-1 fs-16">{{ $Order->basic_info->order_status }}</h6>
                                    </td>
                                    <td>{{ $Order->client_info->Client_Name }}</td>
                                    <td>
                                        <strong>Created By:</strong>
                                        {{ isset($Order->authorized_user) && $Order->authorized_user->basic_info ? $Order->authorized_user->basic_info->full_name : '' }}
                                        <br>
                                        @forelse($Order->assign as $User)
                                            <strong class="text-success">{{ $User->basic_info->full_name }}</strong>
                                            <br>
                                        @empty
                                            <strong class="text-danger"> Not Assign</strong> <br>
                                        @endforelse
                                        <strong>Created At:</strong> {{ $Order->created_at }}
                                    </td>
                                    <td>
                                        <strong>Website</strong> {{ $Order->basic_info->Order_Website }}<br>
                                        <strong>Service</strong> {{ $Order->basic_info->Order_Services }}
                                    </td>
                                    <td>
                                        <strong>Word Count:</strong> {{ $Order->basic_info->Word_Count }}<br>
                                        <strong>Page Count:</strong> {{ $Order->basic_info->Pages_Count }}
                                    </td>
                                    <td>
                                        <strong>Amount:</strong> {{ $Order->payment_info->Order_Price }}<br>
                                        <strong>Status:</strong> {!! PortalHelpers::visualizeRecordStatus($Order->payment_info->Payment_Status) !!}
                                    </td>
                                    <td>
                                        <strong>Deadline: </strong>{{ $Order->submission_info->DeadLine }} <br>
                                        <strong>Time: </strong>{{ $Order->submission_info->DeadLine_Time }}
                                    </td>
                                    <td>
                                        @if (isset($Order->submission_info->F_DeadLine))
                                            <strong>1st Draft: </strong>{{ $Order->submission_info->F_DeadLine }} <br>
                                        @endif
                                        @if (isset($Order->submission_info->S_DeadLine))
                                            <strong>2nd Draft: </strong>{{ $Order->submission_info->S_DeadLine }} <br>
                                        @endif
                                        @if (isset($Order->submission_info->T_DeadLine))
                                            <strong>3rd Draft: </strong>{{ $Order->submission_info->T_DeadLine }}
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    {{-- Admin End View --}}
@elseif((int) $auth_user->Role_ID === 9 || (int) $auth_user->Role_ID === 10 || (int) $auth_user->Role_ID === 11)
    {{-- Sales View --}}
    <div class="card mt-4">
        <div class="card-header border-bottom-0">
            <div class="card-title">Research Orders List</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                    <thead>
                    <tr>
                        <th class="wd-15p border-bottom-0">S.No</th>
                        <th class="wd-15p border-bottom-0">Order ID</th>
                        <th class="wd-15p border-bottom-0">Order Status</th>
                        <th class="wd-15p border-bottom-0">Client Name</th>
                        <th class="wd-20p border-bottom-0">Created & Assign</th>
                        <th class="wd-10p border-bottom-0">Order From</th>
                        <th class="wd-25p border-bottom-0">Order Info</th>
                        <th class="wd-25p border-bottom-0">Order Price</th>
                        <th class="wd-25p border-bottom-0">Deadline</th>
                        <th class="wd-25p border-bottom-0"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($Research_Orders as $Order)
                        <tr>
                            <td><strong>{{ $loop->iteration }}</strong></td>
                            <td>
                                <h6 class="mb-1 fs-16"><a
                                        href="{{ route('Order.Details', ['Order_ID' => $Order->Order_ID]) }}">{{ $Order->Order_ID }}</a>
                                </h6>
                            </td>
                            <td>
                                <h6 class="mb-1 fs-16">{!! PortalHelpers::visualizeRecordStatus($Order->basic_info->order_status) !!}</h6>
                            </td>
                            <td>{{ $Order->client_info->Client_Name }}</td>
                            <td>
                                <strong>Created By:</strong>
{{ isset($Order->authorized_user) && $Order->authorized_user->basic_info ? $Order->authorized_user->basic_info->full_name : '' }}
<br>
                                <strong>Created At:</strong> {{ $Order->created_at }}
                            </td>
                            <td>
                                <strong>Website</strong> {{ $Order->basic_info->Order_Website }}<br>
                                <strong>Service</strong> {{ $Order->basic_info->Order_Services }}
                            </td>
                            <td>
                                <strong>Word Count:</strong> {{ $Order->basic_info->Word_Count }}<br>
                                <strong>Page Count:</strong> {{ $Order->basic_info->Pages_Count }}
                            </td>
                            <td>
                                <strong>Amount:</strong> {{ $Order->payment_info->Order_Price }}<br>
                                <strong>Status:</strong> {!! PortalHelpers::visualizeRecordStatus($Order->payment_info->Payment_Status) !!}
                            </td>
                            <td>
                                <strong>Deadline: </strong>{{ $Order->submission_info->DeadLine }} <br>
                                <strong>Time: </strong>{{ $Order->submission_info->DeadLine_Time }}
                            </td>
                            <td>
                                @if(isset($Order->submission_info->F_DeadLine))
                                    <strong>1st Draft: </strong>{{ $Order->submission_info->F_DeadLine }} <br>
                                @endif
                                @if(isset($Order->submission_info->S_DeadLine))
                                    <strong>2nd Draft: </strong>{{ $Order->submission_info->S_DeadLine }} <br>
                                @endif
                                @if(isset($Order->submission_info->T_DeadLine))
                                    <strong>3rd Draft: </strong>{{ $Order->submission_info->T_DeadLine }}
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@elseif((int) $auth_user->Role_ID === 4)
     <div class="card mt-4">
       <div class="card-header border-bottom-0 d-flex justify-content-between align-items-center">
            <div class="card-title">Research Orders List</div>
            <div class="w-50 ">
            <div class="btn-group mt-2 mb-2 me-4">
                <form action="" method="GET" class="d-flex gap-2">
                <select name="draft_name" id="" class="form-select">
                    @php
                    $array = [
                        'F_DeadLine' => 'First DeadLine', 
                        'S_DeadLine' => 'Second DeadLine', 
                        'T_DeadLine' => 'Third DeadLine', 
                        'Four_DeadLine' => 'Fourth DeadLine', 
                        'Fifth_DeadLine' => 'Fifth DeadLine', 
                        'Sixth_DeadLine' => 'Sixth DeadLine', 
                        'Seven_DeadLine' => 'Seventh DeadLine', 
                        'Eight_DeadLine' => 'Eighth DeadLine', 
                        'nine_DeadLine' => 'Ninth DeadLine', 
                        'ten_DeadLine' => 'Tenth DeadLine', 
                        'eleven_DeadLine' => 'Eleventh DeadLine', 
                        'twelve_DeadLine' => 'Twelfth DeadLine', 
                        'thirteen_DeadLine' => 'Thirteenth DeadLine', 
                        'fourteen_DeadLine' => 'Fourteenth DeadLine', 
                        'fifteen_DeadLine' => 'Fifteenth DeadLine'
                    ];
                    @endphp
                    @foreach ($array as $key => $value)
                        <option value="{{ $key }}" @selected($key == request('draft_name'))>{{ $value }}</option>
                    @endforeach
                </select>
                 <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                 <button class="btn btn-primary" type="submit">Submit</button>
                 </form>
             </div>
            <div class="btn-group mt-2 mb-2">

                <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Filters <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ route('Research.Orders') }}">All</a></li>
                    <li><a href="{{ route('Research.Orders', ['filter' => 'Not-Assign']) }}">Not Assign Order</a></li>
                </ul>
            </div>
         
             </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (request()->has('filter'))
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">S.No</th>
                                <th class="wd-15p border-bottom-0">Order ID</th>
                                <th class="wd-15p border-bottom-0">Order Status</th>
                                <th class="wd-20p border-bottom-0">Order Assign</th>
                                <th class="wd-25p border-bottom-0">Services</th>
                                <th class="wd-25p border-bottom-0">Word Count</th>
                                <th class="wd-25p border-bottom-0">Page Count</th>
                                <th class="wd-25p border-bottom-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($unAssignedOrder as $Order)
                                <tr>
                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                    <td>
                                        <h6 class="mb-1 fs-16"><a
                                                href="{{ route('Order.Details', ['Order_ID' => $Order->Order_ID]) }}">{{ $Order->Order_ID }}</a>
                                        </h6>
                                    </td>
                                    <td>
                                      @if (isset($Order->basic_info->order_status))
                                        {{ $Order->basic_info->order_status }}
                                     @endif
                                    </td>
                                    <td>
                                        @forelse($Order->assign as $User)
                                            <strong class="text-success">{{ $User->basic_info->full_name }}</strong>
                                            <br>
                                        @empty
                                            @php
                                                $assignment = PortalHelpers::checkIsTaskAssign($Order->id);
                                            @endphp
                                            <p>{!! $assignment !!}</p><br>
                                        @endforelse
                                    </td>
                                    <td>
                                         @if (isset($Order->basic_info->Order_Services))
                                        {{ $Order->basic_info->Order_Services }}
                                        @endif
                                        
                                    </td>
                                    <td>
                                         @if (isset($Order->basic_info->Word_Count))
                                        {{ $Order->basic_info->Word_Count }}
                                        @endif
                                    </td>
                                    <td>
                                         @if (isset($Order->basic_info->Pages_Count))
                                        {{ $Order->basic_info->Pages_Count }}
                                        @endif
                                    </td>
                                    <td>
                                        <strong>Deadline: </strong>{{ $Order->submission_info->DeadLine }} <br>
                                        <strong>Time: </strong>{{ $Order->submission_info->DeadLine_Time }}
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                @else
                    <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">S.No</th>
                                <th class="wd-15p border-bottom-0">Order ID</th>
                                <th class="wd-15p border-bottom-0">Order Status</th>
                                <th class="wd-20p border-bottom-0">Order Assign</th>
                                <th class="wd-25p border-bottom-0">Services</th>
                                <th class="wd-25p border-bottom-0">Word Count</th>
                                <th class="wd-25p border-bottom-0">Page Count</th>
                                <th class="wd-25p border-bottom-0">DeadLine Date</th>
                                <th class="wd-25p border-bottom-0">DeadLine Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($Research_Orders as $Order)
                                <tr>
                                    <td><strong>{{ $loop->iteration }}</strong></td>
                                    <td>
                                        <h6 class="mb-1 fs-16"><a
                                                href="{{ route('Order.Details', ['Order_ID' => $Order->Order_ID]) }}">{{ $Order->Order_ID }}</a>
                                        </h6>
                                    </td>
                                    <td>
                                        <h6 class="mb-1 fs-16">{{ $Order->basic_info->order_status }}</h6>
                                    </td>
                                    <td>
                                        @forelse($Order->assign as $User)
                                            <strong class="text-success">{{ $User->basic_info->full_name }}</strong>
                                            <br>
                                        @empty
                                            @php
                                                $assignment = PortalHelpers::checkIsTaskAssign($Order->id);

                                            @endphp
                                            <p>{!! $assignment !!}</p><br>
                                        @endforelse
                                    </td>
                                    <td>
                                        {{ $Order->basic_info->Order_Services }}
                                    </td>
                                    <td>
                                        {{ $Order->basic_info->Word_Count }}
                                    </td>
                                    <td>
                                        {{ $Order->basic_info->Pages_Count }}
                                    </td>
                                    <td>
                                       {{ $Order->submission_info->DeadLine ?? '' }} <br>
                                    </td>
                                    <td>
                                       {{ $Order->submission_info->DeadLine_Time }}
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
    {{-- Manager End View --}}
@elseif((int) $auth_user->Role_ID === 5)
    {{-- Coordinator View --}}
    <div class="card mt-4">
        <div class="card-header border-bottom-0">
            <div class="card-title">Research Orders List</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                    <thead>
                    <tr>
                        <th class="wd-15p border-bottom-0">S.No</th>
                        <th class="wd-15p border-bottom-0">Order ID</th>
                        <th class="wd-15p border-bottom-0">Order Status</th>
                        <th class="wd-25p border-bottom-0">Services</th>
                        <th class="wd-25p border-bottom-0">Word Count</th>
                        <th class="wd-25p border-bottom-0">Page Count</th>
                        <th class="wd-25p border-bottom-0">Deadline</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($Research_Orders as $Order)
                        <tr>
                            <td><strong>{{ $loop->iteration }}</strong></td>
                            <td>
                                <h6 class="mb-1 fs-16"><a
                                        href="{{ route('Order.Details', ['Order_ID' => $Order->Order_ID]) }}">{{ $Order->Order_ID }}</a>
                                </h6>
                            </td>
                            <td>
                                <h6 class="mb-1 fs-16">{!! PortalHelpers::visualizeRecordStatus($Order->basic_info->order_status) !!}</h6>
                            </td>
                            <td>
                                {{ $Order->basic_info->Order_Services }}
                            </td>
                            <td>
                                {{ $Order->basic_info->Word_Count }}
                            </td>
                            <td>
                                {{ $Order->basic_info->Pages_Count }}
                            </td>
                            <td>
                                <strong>Deadline: </strong>{{ $Order->submission_info->DeadLine }} <br>
                                <strong>Time: </strong>{{ $Order->submission_info->DeadLine_Time }}
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Coordinator End View --}}
@elseif((int) $auth_user->Role_ID === 6)
    {{-- Research Writer View --}}
    <div class="card mt-4">
        <div class="card-header border-bottom-0">
            <div class="card-title">Research Orders List</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                    <thead>
                    <tr>
                        <th class="wd-15p border-bottom-0">S.No</th>
                        <th class="wd-15p border-bottom-0">Order ID</th>
                        <th class="wd-15p border-bottom-0">Task Status</th>
                        <th class="wd-25p border-bottom-0">Task Service</th>
                        <th class="wd-25p border-bottom-0">Word Count</th>
                        <th class="wd-25p border-bottom-0">Deadline</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($Research_Orders as $Order)
                        <tr>
                            <td><strong>{{ $loop->iteration }}</strong></td>
                            <td>
                                <h6 class="mb-1 fs-16"><a
                                        href="{{ route('Order.Details', ['Order_ID' => $Order->order_info->Order_ID]) }}">{{ $Order->order_info->Order_ID }}</a>
                                </h6>
                            </td>
                            <td>
                                <h6 class="mb-1 fs-16">{!! PortalHelpers::visualizeRecordStatus($Order->Task_Status) !!}</h6>
                            </td>
                            <td>
                                {{ $Order->order_info->basic_info->Order_Services }}
                            </td>
                            <td>
                                {{ $Order->Assign_Words }}
                            </td>
                            <td>
                                <strong>Deadline: </strong>{{ $Order->DeadLine }} <br>
                                <strong>Time: </strong>{{ $Order->DeadLine_Time }}
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Research Writer End View --}}
@elseif((int) $auth_user->Role_ID === 7)
    {{-- Research Indepenent Writer View --}}
    <div class="card mt-4">
        <div class="card-header border-bottom-0">
            <div class="card-title">Research Orders List</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                    <thead>
                    <tr>
                        <th class="wd-15p border-bottom-0">S.No</th>
                        <th class="wd-15p border-bottom-0">Order ID</th>
                        <th class="wd-15p border-bottom-0">Order Status</th>
                        <th class="wd-25p border-bottom-0">Task Info</th>
                        <th class="wd-25p border-bottom-0">Deadline</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($IndependentWriterOrder as $Order)
                        <tr>
                            <td><strong>{{ $loop->iteration }}</strong></td>
                            <td>
                                <h6 class="mb-1 fs-16"><a
                                        href="{{ route('Order.Details', ['Order_ID' => $Order->Order_ID]) }}">{{ $Order->Order_ID }}</a>
                                </h6>
                            </td>
                            <td>
                                <h6 class="mb-1 fs-16">{!! PortalHelpers::visualizeRecordStatus($Order->basic_info->order_status) !!}</h6>
                            </td>
                            <td>
                                <strong>Service:</strong> {{ $Order->basic_info->Order_Services }}<br>
                                <strong>Word Count:</strong> {{ $Order->basic_info->Word_Count }}
                            </td>
                            <td>
                                <strong>Deadline: </strong>{{ $Order->submission_info->DeadLine }} <br>
                                <strong>Time: </strong>{{ $Order->submission_info->DeadLine_Time }}
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Research Indepenent Writer End View --}}
@endif
