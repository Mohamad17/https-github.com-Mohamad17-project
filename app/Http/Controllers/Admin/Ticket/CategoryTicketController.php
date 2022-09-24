<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketCategoryRequest;
use App\Models\Ticket\TicketCategory;

class CategoryTicketController extends Controller
{
    
    public function index()
    {
        $ticketCategories= TicketCategory::orderBy('created_at')->simplePaginate(10);
        return view('admin.ticket.category.index', compact('ticketCategories'));
    }

  
    public function create()
    {
        return view('admin.ticket.category.create');
    }

    
    public function store(TicketCategoryRequest $request)
    {
        $inputs= $request->all();
        TicketCategory::create($inputs);
        return redirect()->route('admin.ticket.category.index')->with('swal-success', 'دسته بندی تیکت شما با موفقیت ثبت شد');
    }

    
    public function edit(TicketCategory $categoryTicket)
    {
        return view('admin.ticket.category.edit', compact('categoryTicket'));
    }

   
    public function update(TicketCategoryRequest $request, TicketCategory $categoryTicket)
    {
        $inputs= $request->all();
        $categoryTicket->update($inputs);
        return redirect()->route('admin.ticket.category.index')->with('swal-success', 'دسته بندی تیکت شما با موفقیت ویرایش شد');
    }

    
    public function destroy(TicketCategory $categoryTicket)
    {
        $categoryTicket->delete();
        return back()->with('swal-success', 'دسته بندی تیکت شما با موفقیت حذف شد');
    }

    public function status(TicketCategory $categoryTicket)
    {
        $categoryTicket->status= $categoryTicket->status == 0 ? 1 : 0;
        $result=$categoryTicket->save();
        if($result){
            if($categoryTicket->status==0){
                return response()->json(['status'=> true, 'checked'=>false]);
            }else{
                return response()->json(['status'=> true, 'checked'=>true]);
            }

        }else{
            return response()->json(['status'=> false]);
        }
    }
}
