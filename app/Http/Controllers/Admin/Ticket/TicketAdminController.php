<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket\TicketAdmin;

class TicketAdminController extends Controller
{
    public function index()
    {
        $admins= User::where('user_type', 1)->orderBy('created_at')->simplePaginate(15);
        return view('admin.ticket.admin.index', compact('admins'));
    }

    public function set(User $admin)
    {
        $admin->ticket==null? TicketAdmin::create(['user_id'=>$admin->id]): TicketAdmin::where('user_id', $admin->id)->forceDelete();
        return back()->with('swal-success', 'تغییر با موفقیت انجام شد');
    }
}
