<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }
    public function addressUpdate($id)
    {
        $data = json_decode(file_get_contents(public_path() . "/assets/data/MOCK_DATA.json"), true);
        $data[$id]['address'] = request()->address;
        $newJsonString = json_encode($data);
        file_put_contents(public_path() . "/assets/data/MOCK_DATA.json" , $newJsonString);

        return back()->with('message', 'The Address has been updated.');;
    }
    public function paymentUpdate($id)
    {
        $data = json_decode(file_get_contents(public_path() . "/assets/data/MOCK_DATA.json"), true);
        $data[$id]['payment'] = '€'.request()->payment;
        $newJsonString = json_encode($data);
        file_put_contents(public_path() . "/assets/data/MOCK_DATA.json" , $newJsonString);

        return back()->with('message', 'The Payments has been updated.');;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, $payment)
    {
        ddd(request()->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
