<?php

namespace App\Http\Livewire\Research;

use App\Services\ResearchOrderService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\ResearchOrders\OrderInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReasearchOrdersList extends Component
{
    protected ResearchOrderService $researchOrderService;


    public function mount(ResearchOrderService $researchOrderService): void
    {
        $this->researchOrderService = $researchOrderService;
    }

    public function render(Request $request)
    {
        $auth_user = Auth::guard('Authorized')->user();
        $Research_Orders = $this->researchOrderService->getOrdersList((int) $auth_user->Role_ID, (int) $auth_user->id);
        $unAssignedOrder = "";
        $IndependentWriterOrder = "";

        if ($request->has('filter') && in_array($auth_user->Role_ID, [1, 4])) {
            $currentMonth = Carbon::now()->month;
            $currentYear = Carbon::now()->year;

            $unAssignedOrder = OrderInfo::with([
                'authorized_user',
                'assign',
                'client_info',
                'basic_info',
                'content_info',
                'submission_info',
                'deadlines',
                'reference_info',
                'order_desc',
                'payment_info',
                'attachments',
                'revision',
                'tasks',
                'final_submission',
            ])->whereDoesntHave('assign')
                ->whereDoesntHave('tasks')
                ->whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->OrderByDesc('id')
                ->get();
        }
        if ($auth_user->Role_ID == 7) {

            $IndependentWriterOrder = OrderInfo::whereHas('assign', function ($query) use ($auth_user) {
                $query->where('assign_id', $auth_user->id);
            })->whereHas('basic_info', function ($query) {
                $query->whereNot('Order_Status', 2);
            })->with([
                'basic_info',
                'assign',
                'submission_info'

            ])->get();
        }
        if ($request->has('date') && $request->has('draft_name')) {
            $Research_Orders = OrderInfo::with([
                'authorized_user',
                'assign',
                'client_info',
                'basic_info',
                'content_info',
                'submission_info' => function ($q) use ($request) {
                    $q->whereDate($request->draft_name, $request->date)->orderByDesc($request->draft_name);
                },
                'deadlines',
                'reference_info',
                'order_desc',
                'payment_info',
                'attachments',
                'revision',
                'tasks',
                'final_submission',
            ])->whereHas('submission_info', function ($q) use ($request) {
                $q->whereDate($request->draft_name, $request->date)->orderByDesc($request->draft_name);
            })->where('Order_Type', 1)->get();
        }

        return view('livewire.research.reasearch-orders-list', compact('IndependentWriterOrder', 'Research_Orders', 'auth_user', 'unAssignedOrder'))->layout('layouts.authorized');
    }
}
