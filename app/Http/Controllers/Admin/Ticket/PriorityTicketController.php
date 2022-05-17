<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketPeriorityRequest;
use App\Models\Ticket\TicketPeriority;
use Illuminate\Http\Request;

class PriorityTicketController extends Controller
{
    public function index()
    {
        $ticketPeriorities = TicketPeriority::orderBy('created_at')->simplePaginate(10);
        return view('admin.ticket.priority.index', compact('ticketPeriorities'));
    }


    public function create()
    {
        return view('admin.ticket.priority.create');
    }


    public function store(TicketPeriorityRequest $request)
    {
        $inputs = $request->all();
        TicketPeriority::create($inputs);
        return redirect()->route('admin.ticket.priority.index')->with('swal-success', 'دسته بندی تیکت شما با موفقیت ثبت شد');
    }


    public function edit(TicketPeriority $ticketPeriority)
    {
        return view('admin.ticket.priority.edit', compact('ticketPeriority'));
    }


    public function update(TicketPeriorityRequest $request, TicketPeriority $ticketPeriority)
    {
        $inputs = $request->all();
        $ticketPeriority->update($inputs);
        return redirect()->route('admin.ticket.priority.index')->with('swal-success', 'دسته بندی تیکت شما با موفقیت ویرایش شد');
    }


    public function destroy(TicketPeriority $ticketPeriority)
    {
        $ticketPeriority->delete();
        return back()->with('swal-success', 'دسته بندی تیکت شما با موفقیت حذف شد');
    }

    public function status(TicketPeriority $ticketPeriority)
    {
        $ticketPeriority->status = $ticketPeriority->status == 0 ? 1 : 0;
        $result = $ticketPeriority->save();
        if ($result) {
            if ($ticketPeriority->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
