<!--@foreach ($attachments as $attachment)-->
<!--    <div class="direct-chat-text py-3">-->
<!--        <div class="d-flex">-->
<!--            <i class="fe fe-file-text fs-40 op-2 text-muted d-block me-2"></i>-->
<!--            <div>-->
<!--                <div class="font-weight-bold fs-12">-->
<!--                    <a href="{{ asset($attachment->file_path) }}"  download="">{{ $attachment->File_Name }}</a>-->
<!--                </div>-->
<!--                <span class="fs-12">{{ $attachment->created_at }}</span>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--@endforeach-->


@foreach ($attachments as $attachment)
  @if($attachment->chat->authorized_user->Role_ID == 9 || 
    $attachment->chat->authorized_user->Role_ID == 10 || 
    $attachment->chat->authorized_user->Role_ID == 11)
    @php
        $class = 'justify-content-start';
    @endphp
@else
    @php
        $class = 'justify-content-end';
    @endphp
@endif

    <div class="direct-chat-text py-3 ">
        <div class="d-flex {{ $class }}">
            <i class="fe fe-file-text fs-40 op-2 text-muted d-block me-2"></i>
            <div>
                
                <div class="font-weight-bold fs-12">
                    <a href="{{ asset($attachment->file_path) }}" download="">{{ $attachment->File_Name }}</a>
                </div>
                <span class="fs-12">{{ $attachment->created_at }}</span>
                
                
               
                
            </div>
        </div>
    </div>
@endforeach