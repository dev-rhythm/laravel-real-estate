<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title'             => 'required|unique:coupons,title',
                'description'       => 'required|string',
                'coupon_amount'     => 'required|integer|between:0,100',
            ],
            [
                'title.required'    => 'The Coupon Title cannot be empty',
                'title.unique'      => 'The Coupon Title has already been taken'
            ]

        );

        Coupon::firstOrCreate(array(
            'title'             => $request->title,
            'description'       => $request->description,
            'coupon_amount'     => $request->coupon_amount,
        ));

        return redirect()->route('coupons.index')->with(['success' => 'Coupon Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $this->validate(
            $request,
            [
                'title'             => 'required|unique:coupons,title,' . $request->id,
                'description'       => 'required|string',
                'coupon_amount'     => 'required|integer|between:0,100',
            ],
            [
                'title.required'    => 'The Coupon Title cannot be empty',
                'title.unique'      => 'The Coupon Title has already been taken'
            ]
        );

        $coupon->title              = $request->title;
        $coupon->description        = $request->description;
        $coupon->coupon_amount      = $request->coupon_amount;
        $coupon->save();

        return redirect()->route('coupons.index')->with(['success' => 'Coupon Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        return response()->json([$coupon->delete()]);
    }


    public function check_coupon(Request $request)
    {
        $coupon_name = $request->coupon_name;
        $coupon  = Coupon::where([['title', 'LIKE', '%' . $coupon_name . '%']])->first();


        if ($coupon != null) {
            echo $coupon->toJson();
        } else {
            echo collect(['not_available' => true])->toJson();
        }
    }
}