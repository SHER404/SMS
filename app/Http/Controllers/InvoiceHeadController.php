<?php
use App\Models\Town;
use App\Models\FeeHead;
use App\Models\StudentsFee;
use App\Models\Students;
use App\Models\StudentParent;
use App\Models\StudentClass;
use App\Models\StudentHealth;
use App\Models\Family;
use App\Models\Employees;
use App\Models\ClassSection;
use App\Models\AcademicSession;
use Redirect;
use App\Models\Campuses;
use App\Models\Country;
use App\Models\City;
use App\Models\StudentLanguage;
use App\Models\EmergencyPhone;
use App\Models\RescuePhone;
use App\Models\FamilyMember;
use App\Models\PaidFees;
use App\Models\Invoices;

use App\Models\InvoiceHead;
use Illuminate\Http\Request;

class InvoiceHeadController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceHead  $invoiceHead
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceHead $invoiceHead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceHead  $invoiceHead
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceHead $invoiceHead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceHead  $invoiceHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceHead $invoiceHead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceHead  $invoiceHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceHead $invoiceHead)
    {
        //
    }
}
