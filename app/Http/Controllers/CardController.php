<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Baby;
use Illuminate\View\View;
use App\Models\BloodType;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CardStoreRequest;
use App\Http\Requests\CardUpdateRequest;
use Dompdf\Dompdf;



class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Card::class);

        $search = $request->get('search', '');

        $cards = Card::search($search)
            ->latest()
            ->paginate(500)
            ->withQueryString();

        $sampleCard = array(
            "personal_info" => array(
                "name" => "Aiden Smith",
                "date_of_birth" => "March 10, 2021",
                "birth_weight" => "7 pounds, 2 ounces",
                "birth_length" => "20 inches",
                "head_circumference" => "14 inches"
            ),
            "growth_rate" => array(
                "age_1_month" => array(
                    "weight" => "8 pounds",
                    "length" => "21 inches",
                    "head_circumference" => "14.5 inches"
                ),
                "age_2_months" => array(
                    "weight" => "10 pounds",
                    "length" => "23 inches",
                    "head_circumference" => "15 inches"
                ),
                "age_4_months" => array(
                    "weight" => "13 pounds",
                    "length" => "25 inches",
                    "head_circumference" => "15.5 inches"
                ),
                "age_6_months" => array(
                    "weight" => "15 pounds",
                    "length" => "27 inches",
                    "head_circumference" => "16 inches"
                ),
                "age_9_months" => array(
                    "weight" => "18 pounds",
                    "length" => "29 inches",
                    "head_circumference" => "16.5 inches"
                ),
                "age_12_months" => array(
                    "weight" => "20 pounds",
                    "length" => "31 inches",
                    "head_circumference" => "17 inches"
                ),
                "age_18_months" => array(
                    "weight" => "24 pounds",
                    "length" => "33 inches",
                    "head_circumference" => "17.5 inches"
                ),
                "age_24_months" => array(
                    "weight" => "28 pounds",
                    "length" => "35 inches",
                    "head_circumference" => "18 inches"
                ),
                "age_36_months" => array(
                    "weight" => "35 pounds",
                    "length" => "38 inches",
                    "head_circumference" => "18.5 inches"
                ),
                "age_48_months" => array(
                    "weight" => "42 pounds",
                    "length" => "41 inches",
                    "head_circumference" => "19 inches"
                ),
                "age_60_months" => array(
                    "weight" => "48 pounds",
                    "length" => "44 inches",
                    "head_circumference" => "19.5 inches"
                )
            ),
            "immunizations" => array(
                "birth" => array(
                    "hepatitis_b" => "given",
                    "bcg" => "not given",
                    "polio" => "given"
                ),
                "2_months" => array(
                    "hepatitis_b" => "given",
                    "diphtheria_tetanus_pertussis" => "given",
                    "inactivated_polio" => "given",
                    "pneumococcal" => "given",
                    "rotavirus" => "given"
                ),
                "4_months" => array(
                    "diphtheria_tetanus_pertussis" => "given",
                    "inactivated_polio"=> "given",
                    "pneumococcal" => "given",
                    "rotavirus" => "given"
                ),
                "6_months" => array(
                    "hepatitis_b" => "given",
                    "diphtheria_tetanus_pertussis" => "given",
                    "inactivated_polio" => "given",
                    "pneumococcal" => "given",
                    "rotavirus" => "given"
                ),
                "12_months" => array(
                    "hepatitis_a" => "given",
                    "measles_mumps_rubella" => "given",
                    "varicella" => "given"
                ),
                "18_months" => array(
                    "diphtheria_tetanus_pertussis" => "given",
                    "inactivated_polio" => "given",
                    "hepatitis_a" => "not given"
                ),
                "4_years" => array(
                    "diphtheria_tetanus_pertussis" => "given",
                    "inactivated_polio" => "given",
                    "measles_mumps_rubella" => "given"
                )
            )
        );

        $dompdf = new Dompdf();

        $html = '<h1>Road to Health Booklet</h1>';
        $html .= '<h2>Personal Information</h2>';
        $html .= '<p>Name: '.$sampleCard["personal_info"]["name"].'</p>';
        $html .= '<p>Date of Birth: '.$sampleCard["personal_info"]["date_of_birth"].'</p>';
        $html .= '<p>Birth Weight: '.$sampleCard["personal_info"]["birth_weight"].'</p>';
        $html .= '<p>Birth Length: '.$sampleCard["personal_info"]["birth_length"].'</p>';
        $html .= '<p>Head Circumference: '.$sampleCard["personal_info"]["head_circumference"].'</p>';

        $html .= '<h2>Growth Rate</h2>';
        $html .= '<table>';
        $html .= '<tr><th>Age</th><th>Weight</th><th>Length</th><th>Head Circumference</th></tr>';
        foreach ($sampleCard["growth_rate"] as $age => $data) {
            $html .= '<tr><td>'.$age.'</td><td>'.$data["weight"].'</td><td>'.$data["length"].'</td><td>'.$data["head_circumference"].'</td></tr>';
        }
        $html .= '</table>';

        $html .= '<h2>Immunizations</h2>';
        foreach ($sampleCard["immunizations"] as $age => $data) {
            $html .= '<h3>'.$age.' Immunizations</h3>';
            $html .= '<ul>';
            foreach ($data as $vaccine => $status) {
                $html .= '<li>'.$vaccine.': '.$status.'</li>';
            }
            $html .= '</ul>';
        }


// Set the HTML content for Dompdf
        $dompdf->loadHtml($html);

// Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
        $print = $dompdf->render();


//        $print = $dompdf->stream('Road to Health Booklet.pdf');



        return view('app.cards.index', compact('cards', 'search','print','sampleCard'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Card::class);

        $babies = Baby::pluck('name', 'id');
        $bloodTypes = BloodType::pluck('name', 'id');

        return view('app.cards.create', compact('babies', 'bloodTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CardStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Card::class);

        $validated = $request->validated();

        $card = Card::create($validated);

        return redirect()
            ->route('cards.edit', $card)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Card $card): View
    {
        $this->authorize('view', $card);

        return view('app.cards.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Card $card): View
    {
        $this->authorize('update', $card);

        $babies = Baby::pluck('name', 'id');
        $bloodTypes = BloodType::pluck('name', 'id');

        return view('app.cards.edit', compact('card', 'babies', 'bloodTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CardUpdateRequest $request,
        Card $card
    ): RedirectResponse {
        $this->authorize('update', $card);

        $validated = $request->validated();

        $card->update($validated);

        return redirect()
            ->route('cards.edit', $card)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Card $card): RedirectResponse
    {
        $this->authorize('delete', $card);

        $card->delete();

        return redirect()
            ->route('cards.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
