<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
use App\Models\Criteria;
use App\Models\Alternative;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreMatrixRequest;
use App\Http\Requests\UpdateMatrixRequest;

class MatrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Matrix::with('alternative', 'criteria')->latest()->get();

        $alternativeAmount = Alternative::count();
        $criteriaAmount = Criteria::count();

        // create array 2 dimensional and push data from $data
        $matrix = [];
        foreach ($data as $value) {
            $matrix[$value->alternative_id][$value->criteria_id] = (object) [
                'alternative_id' => $value->alternative_id,
                'alternative_code' => $value->alternative->code,
                'alternative_name' => $value->alternative->name,
                'criteria_id' => $value->criteria_id,
                'criteria_code' => $value->criteria->code,
                'criteria_name' => $value->criteria->name,
                'id' => $value->id,
                'value' => $value->value,
            ];
        }

        ksort($matrix);

        foreach ($matrix as $key => $value) {
            ksort($matrix[$key]);
        }

        return view('contents.matrices.index', [
            'alternativeAmount' => $alternativeAmount,
            'criteriaAmount' => $criteriaAmount,
            'criterias' => Criteria::all(),
            'alternatives' => Alternative::all(),
            'matrix' => $matrix,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.matrices.create', [
            'criterias' => Criteria::latest()->get(),
            'alternatives' => Alternative::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMatrixRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatrixRequest $request)
    {
        // Check if data already exists
        $check = Matrix::where('alternative_id', $request->alternative_id)
            ->where('criteria_id', $request->criteria_id)
            ->first();

        if ($check) {
            Alert::error('Error', 'Data already exists!');
            return redirect('/matrices/create');
        } else {
            Matrix::create($request->validated());
            Alert::success('Success', 'Value matrix has been added.');

            return redirect('/matrices');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matrix  $matrix
     * @return \Illuminate\Http\Response
     */
    public function show(Matrix $matrix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matrix  $matrix
     * @return \Illuminate\Http\Response
     */
    public function edit(Matrix $matrix)
    {
        return view('contents.matrices.edit', [
            'matrix' => $matrix,
            'criterias' => Criteria::latest()->get(),
            'alternatives' => Alternative::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatrixRequest  $request
     * @param  \App\Models\Matrix  $matrix
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatrixRequest $request, Matrix $matrix)
    {
        $matrix->update($request->validated());
        Alert::success('Success', 'Value matrix has been updated.');

        return redirect('/matrices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matrix  $matrix
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matrix $matrix)
    {
        $matrix->delete();
        Alert::success('Success', 'Value matrix has been deleted.');

        return redirect('/matrices');
    }

    public function truncate()
    {
        Matrix::truncate();
        Alert::success('Success', 'Matrix has been deleted.');
        return redirect('/matrices');
    }

    public function rank()
    {
        $alternatives = Alternative::all();

        return response()->json([
            'alternatives' => $alternatives,
        ]);
    }

    public function count()
    {
        $data = Matrix::with('alternative', 'criteria')->latest()->get();

        // check if data is empty
        if ($data->isEmpty()) {
            Alert::error('Error', 'Data to be calculated is empty! Please complete the data first.');
            return redirect('/matrices');
        } else {
            $alternativeCount = Alternative::count();
            $criteriaCount = Criteria::count();

            // create array 2 dimensional and push data from $data
            $matrix = [];
            foreach ($data as $value) {
                $matrix[$value->alternative_id][$value->criteria_id] = $value->value;
            }

            ksort($matrix);

            foreach ($matrix as $key => $value) {
                ksort($matrix[$key]);
            }

            $jumlahAlternatif = count($matrix);
            $jumlahKriteria = count($matrix[1]);

            if ($jumlahAlternatif != $alternativeCount || $jumlahKriteria != $criteriaCount) {
                Alert::error('Error', 'Data to be calculated is incomplete! Please complete the data first.');
                return redirect('/matrices');
            } else {
                // create max and min each criteria
                $max = [];
                $min = [];
                for ($i = 1; $i <= $jumlahKriteria; $i++) {
                    $max[$i] = max(array_column($matrix, $i));
                    $min[$i] = min(array_column($matrix, $i));
                }

                // create matrix normalize by dividing each value with max if benefit and min if cost
                // $normalisasi = [];
                // for ($i = 1; $i <= $jumlahAlternatif; $i++) {
                //     for ($j = 1; $j <= $jumlahKriteria; $j++) {
                //         if (Criteria::find($j)->type == 'benefit') {
                //             $normalisasi[$i][$j] = $matrix[$i][$j] / $max[$j];
                //         } else {
                //             $normalisasi[$i][$j] = $min[$j] / $matrix[$i][$j];
                //         }
                //     }
                // }
                $normalisasi = [];
                for ($i = 1; $i <= $jumlahAlternatif; $i++) {
                    for ($j = 1; $j <= $jumlahKriteria; $j++) {
                        if (Criteria::find($j)->type == 'benefit') {
                            if ($max[$j] != 0) {
                                $normalisasi[$i][$j] = $matrix[$i][$j] / $max[$j];
                            } else {
                                // Tangani kasus pembagian dengan nol, misalnya atur nilai normalisasi menjadi 0 atau nilai lain yang sesuai dengan logika Anda.
                                $normalisasi[$i][$j] = 0;
                            }
                        } else {
                            if ($matrix[$i][$j] != 0) {
                                $normalisasi[$i][$j] = $min[$j] / $matrix[$i][$j];
                            } else {
                                // Tangani kasus pembagian dengan nol, misalnya atur nilai normalisasi menjadi 0 atau nilai lain yang sesuai dengan logika Anda.
                                $normalisasi[$i][$j] = 0;
                            }
                        }
                    }
                }
                
                // sum each column of matrix normalized
                $sumEachCriteria = [];
                for ($i = 1; $i <= $jumlahKriteria; $i++) {
                    $sumEachCriteria[$i] = array_sum(array_column($normalisasi, $i));
                }

                // 1 / alternative amount, then times with $sumEachCriteria
                $averageValue = array_map(function ($value) use ($jumlahAlternatif) {
                    return (1 / $jumlahAlternatif) * $value;
                }, $sumEachCriteria);

                // (normalize value - $averageValue) ^ 2
                $pow = [];
                for ($i = 1; $i <= $jumlahAlternatif; $i++) {
                    for ($j = 1; $j <= $jumlahKriteria; $j++) {
                        $pow[$i][$j] = pow($normalisasi[$i][$j] - $averageValue[$j], 2);
                    }
                }

                // sum each column of pow
                $sumPow = [];
                for ($i = 1; $i <= $jumlahKriteria; $i++) {
                    $sumPow[$i] = array_sum(array_column($pow, $i));
                }

                // 1 - $sumPow
                $result = array_map(function ($value) {
                    return 1 - $value;
                }, $sumPow);

                // sum result
                $sumResult = array_sum($result);

                // Define criteria weight with divide $result with $sumResult
                $criteriaWeight = array_map(function ($value) use ($sumResult) {
                    return $value / $sumResult;
                }, $result);

                // Define PSI value with times normalize value with criteria weight
                $psi = [];
                for ($i = 1; $i <= $jumlahAlternatif; $i++) {
                    for ($j = 1; $j <= $jumlahKriteria; $j++) {
                        $psi[$i][$j] = $normalisasi[$i][$j] * $criteriaWeight[$j];
                    }
                }

                // sum each row of psi
                $sumPsi = [];
                for ($i = 1; $i <= $jumlahAlternatif; $i++) {
                    $sumPsi[$i] = array_sum($psi[$i]);
                }

                $sumPsiRank = $sumPsi;

                // sort $sumPsi value from highest to lowest
                arsort($sumPsiRank);
            }
        }

        // dd($matrix, $max, $min, $normalisasi, $sumEachCriteria, $averageValue, $pow, $sumPow, $result, $sumResult, $criteriaWeight, $psi, $sumPsi, $sumPsiRank);

        return view('contents.calculate.index', [
            'data' => $data,
            'matrix' => $matrix,
            'max' => $max,
            'min' => $min,
            'normalisasi' => $normalisasi,
            'sumEachCriteria' => $sumEachCriteria,
            'averageValue' => $averageValue,
            'pow' => $pow,
            'sumPow' => $sumPow,
            'result' => $result,
            'sumResult' => $sumResult,
            'criteriaWeight' => $criteriaWeight,
            'psi' => $psi,
            'sumPsi' => $sumPsi,
            'sumPsiRank' => $sumPsiRank,
            'alternativeCount' => $alternativeCount,
            'criteriaCount' => $criteriaCount,
            'criterias' => Criteria::all(),
            'alternatives' => Alternative::all(),
        ]);
    }
}
