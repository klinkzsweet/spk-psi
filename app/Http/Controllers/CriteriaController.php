<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Criteria;
use App\Http\Requests\StoreCriteriaRequest;
use App\Http\Requests\UpdateCriteriaRequest;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Criteria::latest()->get();
        if ($request->ajax()) {
            return Datatables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="/criterias/' . $row->id . '/edit" class="btn btn-warning"><i
                                    class="mdi mdi-pencil"></i>
                                Edit</a>
                                <a href="/criterias/' . $row->id . '" class="btn btn-danger" data-confirm-delete="true"><i
                                    class="mdi mdi-delete"></i>
                                Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $title = 'Hapus Kriteria!';
        $text = 'Apakah anda yakin ingin menghapus kriteria ini?';
        confirmDelete($title, $text);

        return view('contents.criterias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.criterias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCriteriaRequest $request)
    {
        Criteria::create($request->validated());
        Alert::success('Berhasil!', 'Kriteria berhasil ditambahkan.');

        return redirect('/criterias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function show(Criteria $criteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Criteria $criteria)
    {
        return view('contents.criterias.edit', compact('criteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCriteriaRequest  $request
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCriteriaRequest $request, Criteria $criteria)
    {
        $criteria->update($request->validated());
        Alert::success('Berhasil!', 'Kriteria berhasil diubah.');

        return redirect('/criterias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criteria $criteria)
    {
        Criteria::destroy($criteria->id);
        Alert::success('Berhasil!', 'Kriteria berhasil dihapus.');

        return redirect('/criterias');
    }
}
