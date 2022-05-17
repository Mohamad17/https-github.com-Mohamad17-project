<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketRequest;
use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function newTicket()
    {
        $title= "تیکت های دیده نشده";
        $tickets= Ticket::where('seen', 0)->orderBy('created_at', 'desc')->simplePaginate(20);
        return view('admin.ticket.index',compact('tickets', 'title'));
    }

    public function openTicket()
    {
        $title= "تیکت های باز";
        $tickets= Ticket::where('status', 0)->orderBy('created_at', 'desc')->simplePaginate(20);
        return view('admin.ticket.index',compact('tickets', 'title'));
    }

    public function closeTicket()
    {
        $title= "تیکت های بسته شده";
        $tickets= Ticket::where('status', 1)->orderBy('created_at', 'desc')->simplePaginate(20);
        return view('admin.ticket.index',compact('tickets', 'title'));
    }

    public function index()
    {
        $title= "تیکت ها";
        $tickets=Ticket::orderBy('created_at', 'desc')->simplePaginate(20);
        return view('admin.ticket.index' ,compact('tickets', 'title'));
    }

    
    public function answer(TicketRequest $request, Ticket $ticket)
    {
        $inputs = $request->all();
        $inputs['subject'] = $ticket->subject;
        $inputs['description'] = $request->description;
        $inputs['seen'] = 1;
        $inputs['reference_id'] = $ticket->reference_id;
        $inputs['user_id'] = 1;
        $inputs['category_id'] = $ticket->category_id;
        $inputs['priority_id'] = $ticket->priority_id;
        $inputs['ticket_id'] = $ticket->id;
        $ticket = Ticket::create($inputs);
        return redirect()->route('admin.ticket.index')->with('swal-success', '  پاسخ شما با موفقیت ثبت شد');
    }

    public function show(Ticket $ticket)
    {
        return view('admin.ticket.show', compact('ticket'));
    }

    public function change(Ticket $ticket)
    {
        $ticket->status= $ticket->status == 0 ? 1 : 0;
        $result=$ticket->save(); 
        return back()->with('swal-success', 'تغییر وضعیت تیکت با موفقیت انجام شد');
    }
}
