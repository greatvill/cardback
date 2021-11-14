<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Validation\ValidationException;
use JeroenDesloovere\VCard\VCard;
use App\Models\Card;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CardController extends Controller
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

    public function showtest(){
        return collect([
            'id' => 13,
            'name' => 'ruslan',
        ]);
    }

    public function welcome(){
        $user = Auth::user();
        $cards = Card::where('user_id', $user->id)->get();
        return view('dashboard', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card = Card::create([
            'user_id' => $request->get('user_id'),
            'data' => $request->get('data'),
        ]);
        return $card;
    }

    public function download(Card $card)
    {
        $user = Auth::user();


        $data = $card->data;
        $vcard = new VCard();
        $lastname = $data['lastname'];
        $firstname = $data['name'];
        $company = $data['company'];
        $jobTitle = $data['jobTitle'];
        $email = $data['email'];
        $phone = $data['phone'];
        $addressName = $data['addressName'];
        $addressExtended = $data['addressExtended'];
        $street = $data['street'];
        $city = $data['city'];
        $region = $data['region'];
        $zip = $data['zip'];
        $country = $data['country'];
        $url = $data['url'];
        $additional = '';
        $prefix = '';
        $suffix = '';

        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
        $vcard->addCompany($company);
        $vcard->addJobtitle($jobTitle);
        $vcard->addEmail($email);
        $vcard->addPhoneNumber($phone);
        $vcard->addAddress($addressName, $addressExtended, $street, $city, $region, $zip, $country);
        $vcard->addURL($url->value, 'TYPE='.$url->type);
        $imageWidth = '150';
        $imgUrl = 'http://www.gravatar.com/avatar/'.md5($email).'fs='.$imageWidth;
        $vcard->addPhoto($imgUrl);
        $vcard->download();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {

        return view('cards.show', ['card' => $card]);

        // define vcard
        $vcard = new VCard();

        // define variables
        $lastname = 'Шадаев';
        $firstname = 'Руслан';
        $company = 'Prodbysection';
        $jobTitle = 'CEO';
        $email = "rushadaev@gmail.com";
        $phone = '+7 (999) 9772124';
        $addressName = 'Работа';
        $addressExtended = 'Секция';
        $street = 'Газетный переулок';
        $city = 'Москва';
        $region = 'Москва';
        $zip = '125009';
        $country = 'Россия';
        $additional = '';
        $prefix = '';
        $suffix = '';
        $urls = collect(
            [
                [
                    'type' => 'Сайт',
                    'value' => 'http://prodbysection.com/',
                ],
                [
                    'type' => 'Вконтакте',
                    'value' => 'https://vk.com/shadaev',
                ]
            ]
        );

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add work data
        $vcard->addCompany($company);
        $vcard->addJobtitle($jobTitle);

        $vcard->addEmail($email);
        $vcard->addPhoneNumber($phone);

        $vcard->addAddress($addressName, $addressExtended, $street, $city, $region, $zip, $country);

        foreach($urls as $url)
        {
            $url = collect($url);

            $vcard->addURL($url->get('value'), 'TYPE='.$url->get('type'));
        }

        $imageWidth = '150';

        $imgUrl = 'http://www.gravatar.com/avatar/'.md5($email).'fs='.$imageWidth;
        $vcard->addPhoto($imgUrl);

        // return vcard as a string
        //return $vcard->getOutput();

        // return vcard as a download
        return $vcard->download();

        // save vcard on disk
        //$vcard->setSavePath('/path/to/directory');
        //$vcard->save();


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return view('cards.edit', ['card' => $card]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function actionUpdate(Request $request, $number)
    {
        try {
            $params = $request->validate([
                'password' => 'required',
                'data' => 'required|array',
            ]);
        } catch (ValidationException $exception) {
            return response(status: Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $card = Card::whereNumber($number)->first();
        if (!$card) {
            return response(['code_response' => 'card_not_found'], Response::HTTP_NOT_FOUND);
        }

        if (Hash::check($params['password'], $card->password)) {
            $card->data = $params['data'];
            $card->save();
            return response([
                'code_response' => 'json_update_success',
                'card' => $card->data,
            ]);
        }

        return response([
            'code_response' => 'json_update_failure',
        ], Response::HTTP_FORBIDDEN);

    }

    public function actionCheckByNumber($number)
    {
        $card = Card::whereNumber($number)->first();
        if (!$card) {
            return response(['code_response' => 'card_not_found'], Response::HTTP_NOT_FOUND);
        }
        if (!$card->password) {
            return response(['code_response' => 'no_password']);
        }
        return response(['code_response' => 'has_password']);
    }

    public function actionSetPassword($number, Request $request)
    {
        try {
            $params = $request->validate([
                'password' => 'required'
            ]);
        } catch (ValidationException $exception) {
            return response(status: Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $card = Card::whereNumber($number)->first();
        if (!$card) {
            return response(['code_response' => 'card_not_found'], Response::HTTP_NOT_FOUND);
        }

        $card->password = Hash::make($params['password']);
        $card->save();
        return response([
            'code_response' => 'password_set_success',
            'card' => $card->data,
        ]);
    }

    public function actionGetData($number, Request $request)
    {
        try {
            $params = $request->validate([
                'password' => 'required'
            ]);
        } catch (ValidationException $exception) {
            return response(status: Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $card = Card::whereNumber($number)->first();
        if (!$card) {
            return response(['code_response' => 'card_not_found'], Response::HTTP_NOT_FOUND);
        }

        if (Hash::check($params['password'], $card->password)) {
            return response([
                'code_response' => 'password_check_success',
                'card' => $card->data,
            ]);
        }

        return response([
            'code_response' => 'password_check_failure',
        ], Response::HTTP_FORBIDDEN);
    }
}
