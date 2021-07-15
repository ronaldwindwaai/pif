<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UploadRequest;
use App\Models\File;
use App\Models\Meeting;
use App\Models\Participant;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    private $participant;
    private $page;
    private $countries = [
        'AF' => 'Afghanistan',
        'AX' => 'Aland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua And Barbuda',
        'AR' => 'Argentina',
        'AM' => 'Armenia',
        'AW' => 'Aruba',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia And Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CD' => 'Congo, Democratic Republic',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Cote D\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)',
        'FO' => 'Faroe Islands',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island & Mcdonald Islands',
        'VA' => 'Holy See (Vatican City State)',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran, Islamic Republic Of',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle Of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'Kenya',
        'KI' => 'Kiribati',
        'KR' => 'Korea',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Lao People\'s Democratic Republic',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia, Federated States Of',
        'MD' => 'Moldova',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'AN' => 'Netherlands Antilles',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory, Occupied',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Reunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'BL' => 'Saint Barthelemy',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts And Nevis',
        'LC' => 'Saint Lucia',
        'MF' => 'Saint Martin',
        'PM' => 'Saint Pierre And Miquelon',
        'VC' => 'Saint Vincent And Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome And Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia And Sandwich Isl.',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard And Jan Mayen',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad And Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks And Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States',
        'UM' => 'United States Outlying Islands',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Viet Nam',
        'VG' => 'Virgin Islands, British',
        'VI' => 'Virgin Islands, U.S.',
        'WF' => 'Wallis And Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
    ];

    public function __construct()
    {
        $this->participant  = new Participant();
        $this->page     = 'participants';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $title = 'List of Participants';
            $participants = DB::table('participants')
                ->join('meetings', 'participants.meeting_id', '=', 'meetings.id')
                ->select('participants.id', DB::raw("CONCAT(participants.first_name,' ',participants.last_name) as full_name"),
                'participants.registration_date','meetings.name_of_the_meeting as name_of_the_meeting','participants.country',
                'participants.organization')
                ->get();

            $columns    =   $this->participant->get_columns();

            return view('pages.participant.index')
                ->with('data', $participants)
                ->with('columns', $columns)
                ->with('title', $title);

        } catch (Exception $exception) {
            dd($exception);
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $title = 'Add a Participant';

            $meetings = Meeting::all();

            return view('pages.participant.add')
                ->with('page', $this->page)
                ->with('meetings', $meetings)
                ->with('title', $title);

        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParticipantRequest $request)
    {
        try {
            $validated = $request->validated();

            $participant = new Participant($validated);
            $participant->country = $this->countries[$request->input('country')];
            $participant->country_code = $request->input('country');
            $participant->user_id = Auth::user()->id;
            $participant->save();

            $full_name = $participant->first_name.' '. $participant->last_name;

            return \redirect()
                ->route('participants.index')->withStatus('The  (' . strtoupper($full_name) . ') Participant was successfully created..');
        } catch (Exception $exception) {
            dd($exception);
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $user_participant)
    {
        try {
            $participant = DB::table('participants')
                ->join('users', 'participants.user_id', '=', 'users.id')
                ->where('participants.id', $user_participant->id)
                ->select('participants.id', DB::raw("CONCAT(participants.first_name,' ',participants.last_name) as full_name"),
                 'participants.registration_date',
                  'users.name as added_by')
                ->first();

            dd($user_participant);

            $title = $participant->full_name;
            $columns    =   $this->participant->get_columns();

            return view('pages.participant.show')
            ->with('data', $participant)
                ->with('columns', $columns)
                ->with('page', $this->page)
                ->with('title', $title);

        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */

    public function edit(Participant $participant)
    {
        try {

            $title = $participant->title;

            return view('pages.participant.edit')
                ->with('data', $participant)
                ->with('page', $this->page)
                ->with('title', $title);
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(StoreParticipantRequest $request, Participant $participant)
    {
        try {

            $validated = $request->validated();
            $participant->fill($validated);
            $participant->country = $this->countries[$request->input('country')];
            $participant->country_code = $request->input('country');
            $participant->user_id = Auth::user()->id;
            $participant->save();

            $full_name = $participant->first_name . ' ' . $participant->last_name;


            return \redirect()
                ->route('participants.index')->withStatus('The  (' . strtoupper($full_name) . ') Participant was successfully updated..');
        } catch (Exception $exception) {
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        try {
            $full_name = $participant->first_name.' '.$participant->last_name;
            $participant->delete();

            return \redirect()
                ->route('participants.index')
                ->withStatus('Successfully deleted the (' . strtoupper($full_name) . ') Participant');
        } catch (Exception $exception) {
            dd($exception);
            return \redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function load()
    {
        $title = 'Upload Participants List';
        $meetings = Meeting::all();

        return view('pages.participant.upload')
                ->with('title', $title)
                ->with('page', $this->page)
                ->with('meetings',$meetings);
    }

    public function upload(UploadRequest $request)
    {
        try{

            $validated = $request->validated();

            $file_name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('files', $file_name);
            $path = Storage::path($path);

            $file = File::create(
                    [
                        'title' => $file_name,
                        'link'  => $path,
                    ]
                );
            //dd($path);
            // $rows is an instance of Illuminate\Support\LazyCollection
            $rows = SimpleExcelReader::create($path)->getRows();

            $data = [];

            $rows->each(function (array $row) use (&$data, $file, $validated) {
                $column['first_name']         =   isset($row['First Name']) ? $row['First Name'] : '';
                $column['last_name']          =   isset($row['Last Name']) ? $row['Last Name'] : '';
                $column['email']              =   isset($row['Email']) ? $row['Email'] : '';
                $column['registration_date']  =   isset($row['Registration Time']) ? $row['Registration Time'] : '';
                $column['country_code']       =   isset($row['Country/Region']) ? $row['Country/Region'] : '';
                $column['country']            =   isset($row['Country/Region Name']) ? $row['Country/Region Name'] : '';
                $column['tel']              =   isset($row['Phone']) ? $row['Phone'] : '';
                $column['organization']       =   isset($row['Organization']) ? $row['Organization'] : '';
                $column['job_title']          =   isset($row['Job Title']) ? $row['Job Title'] : '';
                $column['meeting_id']         =   isset($validated['meeting_id']) ? $validated['meeting_id'] : '';
                $column['file_id']            =   isset($file->id) ? $file->id : '';
                $column['user_id']            =   isset(Auth::user()->id) ? Auth::user()->id : '';

                $data[] = $column;
            });

            $participant    = Participant::insert($data);

            return \redirect()
                ->route('participants.index')->withStatus('Participants have been successfully uploaded..');

        }catch(Exception $exception){
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }

    }
}
