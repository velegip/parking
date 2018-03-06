<?php

namespace App\Http\Controllers;

use App\Park;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use phpDocumentor\Reflection\Types\Integer;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Park $park, Request $request)
    {
        $total = $this->calculateTotal($park,$request->paid_to);
        $request->flash();
        return view('park.payment.create', compact('park'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Park $park, Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    private function calculateTotal(Park $park,$paid_to = null) : int
    {

        $total = 0;

        if ($park->longterm) {
            if(is_null($paid_to)) {
                $diff = $park->created_at->diffInDays(Carbon::now());
            } else {
                if(!$park->paid_to) {
                    $diff = $park->created_at->diffInDays(Carbon::createFromFormat('Y-m-d', $paid_to));
                } else {
                    $diff = $park->paid_to->diffInDays(Carbon::createFromFormat('Y-m-d', $paid_to)) - 1;
                }
                $total = ($diff+1) * Payment::LONGTERM_DAY;
            }
        } else {
            $diff = $park->created_at->diffInMinutes(Carbon::now());

            if($diff > 480) {
                $total = Payment::EIGHT_HOUR;
            } else {
                $total = Payment::FIRST_HOUR;

                if($diff > 60) {
                    $total += ceil(($diff - 60) / 30) * Payment::HALF_HOUR;
                }

            }
        }
        return $total;
    }
}
