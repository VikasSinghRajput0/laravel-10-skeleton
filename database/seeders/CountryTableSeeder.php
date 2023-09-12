<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['active' => 0, 'name' => 'Afghanistan', 'code' => 'AF'],
            ['active' => 0, 'name' => 'Åland Islands', 'code' => 'AX'],
            ['active' => 0, 'name' => 'Albania', 'code' => 'AL'],
            ['active' => 0, 'name' => 'Algeria', 'code' => 'DZ'],
            ['active' => 0, 'name' => 'American Samoa', 'code' => 'AS'],
            ['active' => 0, 'name' => 'Andorra', 'code' => 'AD'],
            ['active' => 0, 'name' => 'Angola', 'code' => 'AO'],
            ['active' => 0, 'name' => 'Anguilla', 'code' => 'AI'],
            ['active' => 0, 'name' => 'Antarctica', 'code' => 'AQ'],
            ['active' => 0, 'name' => 'Antigua and Barbuda', 'code' => 'AG'],
            ['active' => 0, 'name' => 'Argentina', 'code' => 'AR'],
            ['active' => 0, 'name' => 'Armenia', 'code' => 'AM'],
            ['active' => 0, 'name' => 'Aruba', 'code' => 'AW'],
            ['active' => 0, 'name' => 'Australia', 'code' => 'AU'],
            ['active' => 0, 'name' => 'Austria', 'code' => 'AT'],
            ['active' => 0, 'name' => 'Azerbaijan', 'code' => 'AZ'],
            ['active' => 0, 'name' => 'Bahamas', 'code' => 'BS'],
            ['active' => 0, 'name' => 'Bahrain', 'code' => 'BH'],
            ['active' => 0, 'name' => 'Bangladesh', 'code' => 'BD'],
            ['active' => 0, 'name' => 'Barbados', 'code' => 'BB'],
            ['active' => 0, 'name' => 'Belarus', 'code' => 'BY'],
            ['active' => 0, 'name' => 'Belgium', 'code' => 'BE'],
            ['active' => 0, 'name' => 'Belize', 'code' => 'BZ'],
            ['active' => 0, 'name' => 'Benin', 'code' => 'BJ'],
            ['active' => 0, 'name' => 'Bermuda', 'code' => 'BM'],
            ['active' => 0, 'name' => 'Bhutan', 'code' => 'BT'],
            ['active' => 0, 'name' => 'Bolivia, Plurinational State of', 'code' => 'BO'],
            ['active' => 0, 'name' => 'Bonaire, Sint Eustatius and Saba', 'code' => 'BQ'],
            ['active' => 0, 'name' => 'Bosnia and Herzegovina', 'code' => 'BA'],
            ['active' => 0, 'name' => 'Botswana', 'code' => 'BW'],
            ['active' => 0, 'name' => 'Bouvet Island', 'code' => 'BV'],
            ['active' => 0, 'name' => 'Brazil', 'code' => 'BR'],
            ['active' => 0, 'name' => 'British Indian Ocean Territory', 'code' => 'IO'],
            ['active' => 0, 'name' => 'Brunei Darussalam', 'code' => 'BN'],
            ['active' => 0, 'name' => 'Bulgaria', 'code' => 'BG'],
            ['active' => 0, 'name' => 'Burkina Faso', 'code' => 'BF'],
            ['active' => 0, 'name' => 'Burundi', 'code' => 'BI'],
            ['active' => 0, 'name' => 'Cambodia', 'code' => 'KH'],
            ['active' => 0, 'name' => 'Cameroon', 'code' => 'CM'],
            ['active' => 0, 'name' => 'Canada', 'code' => 'CA'],
            ['active' => 0, 'name' => 'Cape Verde', 'code' => 'CV'],
            ['active' => 0, 'name' => 'Cayman Islands', 'code' => 'KY'],
            ['active' => 0, 'name' => 'Central African Republic', 'code' => 'CF'],
            ['active' => 0, 'name' => 'Chad', 'code' => 'TD'],
            ['active' => 0, 'name' => 'Chile', 'code' => 'CL'],
            ['active' => 0, 'name' => 'China', 'code' => 'CN'],
            ['active' => 0, 'name' => 'Christmas Island', 'code' => 'CX'],
            ['active' => 0, 'name' => 'Cocos (Keeling) Islands', 'code' => 'CC'],
            ['active' => 0, 'name' => 'Colombia', 'code' => 'CO'],
            ['active' => 0, 'name' => 'Comoros', 'code' => 'KM'],
            ['active' => 0, 'name' => 'Congo', 'code' => 'CG'],
            ['active' => 0, 'name' => 'Congo, the Democratic Republic of the', 'code' => 'CD'],
            ['active' => 0, 'name' => 'Cook Islands', 'code' => 'CK'],
            ['active' => 0, 'name' => 'Costa Rica', 'code' => 'CR'],
            ['active' => 0, 'name' => 'Côte d\'Ivoire', 'code' => 'CI'],
            ['active' => 0, 'name' => 'Croatia', 'code' => 'HR'],
            ['active' => 0, 'name' => 'Cuba', 'code' => 'CU'],
            ['active' => 0, 'name' => 'Curaçao', 'code' => 'CW'],
            ['active' => 0, 'name' => 'Cyprus', 'code' => 'CY'],
            ['active' => 0, 'name' => 'Czech Republic', 'code' => 'CZ'],
            ['active' => 0, 'name' => 'Denmark', 'code' => 'DK'],
            ['active' => 0, 'name' => 'Djibouti', 'code' => 'DJ'],
            ['active' => 0, 'name' => 'Dominica', 'code' => 'DM'],
            ['active' => 0, 'name' => 'Dominican Republic', 'code' => 'DO'],
            ['active' => 0, 'name' => 'Ecuador', 'code' => 'EC'],
            ['active' => 0, 'name' => 'Egypt', 'code' => 'EG'],
            ['active' => 0, 'name' => 'El Salvador', 'code' => 'SV'],
            ['active' => 0, 'name' => 'Equatorial Guinea', 'code' => 'GQ'],
            ['active' => 0, 'name' => 'Eritrea', 'code' => 'ER'],
            ['active' => 0, 'name' => 'Estonia', 'code' => 'EE'],
            ['active' => 0, 'name' => 'Ethiopia', 'code' => 'ET'],
            ['active' => 0, 'name' => 'Falkland Islands (Malvinas)', 'code' => 'FK'],
            ['active' => 0, 'name' => 'Faroe Islands', 'code' => 'FO'],
            ['active' => 0, 'name' => 'Fiji', 'code' => 'FJ'],
            ['active' => 0, 'name' => 'Finland', 'code' => 'FI'],
            ['active' => 0, 'name' => 'France', 'code' => 'FR'],
            ['active' => 0, 'name' => 'French Guiana', 'code' => 'GF'],
            ['active' => 0, 'name' => 'French Polynesia', 'code' => 'PF'],
            ['active' => 0, 'name' => 'French Southern Territories', 'code' => 'TF'],
            ['active' => 0, 'name' => 'Gabon', 'code' => 'GA'],
            ['active' => 0, 'name' => 'Gambia', 'code' => 'GM'],
            ['active' => 0, 'name' => 'Georgia', 'code' => 'GE'],
            ['active' => 0, 'name' => 'Germany', 'code' => 'DE'],
            ['active' => 0, 'name' => 'Ghana', 'code' => 'GH'],
            ['active' => 0, 'name' => 'Gibraltar', 'code' => 'GI'],
            ['active' => 0, 'name' => 'Greece', 'code' => 'GR'],
            ['active' => 0, 'name' => 'Greenland', 'code' => 'GL'],
            ['active' => 0, 'name' => 'Grenada', 'code' => 'GD'],
            ['active' => 0, 'name' => 'Guadeloupe', 'code' => 'GP'],
            ['active' => 0, 'name' => 'Guam', 'code' => 'GU'],
            ['active' => 0, 'name' => 'Guatemala', 'code' => 'GT'],
            ['active' => 0, 'name' => 'Guernsey', 'code' => 'GG'],
            ['active' => 0, 'name' => 'Guinea', 'code' => 'GN'],
            ['active' => 0, 'name' => 'Guinea-Bissau', 'code' => 'GW'],
            ['active' => 0, 'name' => 'Guyana', 'code' => 'GY'],
            ['active' => 0, 'name' => 'Haiti', 'code' => 'HT'],
            ['active' => 0, 'name' => 'Heard Island and McDonald Mcdonald Islands', 'code' => 'HM'],
            ['active' => 0, 'name' => 'Holy See (Vatican City State)', 'code' => 'VA'],
            ['active' => 0, 'name' => 'Honduras', 'code' => 'HN'],
            ['active' => 0, 'name' => 'Hong Kong', 'code' => 'HK'],
            ['active' => 0, 'name' => 'Hungary', 'code' => 'HU'],
            ['active' => 0, 'name' => 'Iceland', 'code' => 'IS'],
            ['active' => 0, 'name' => 'India', 'code' => 'IN'],
            ['active' => 0, 'name' => 'Indonesia', 'code' => 'ID'],
            ['active' => 0, 'name' => 'Iran, Islamic Republic of', 'code' => 'IR'],
            ['active' => 0, 'name' => 'Iraq', 'code' => 'IQ'],
            ['active' => 0, 'name' => 'Ireland', 'code' => 'IE'],
            ['active' => 0, 'name' => 'Isle of Man', 'code' => 'IM'],
            ['active' => 0, 'name' => 'Israel', 'code' => 'IL'],
            ['active' => 0, 'name' => 'Italy', 'code' => 'IT'],
            ['active' => 0, 'name' => 'Jamaica', 'code' => 'JM'],
            ['active' => 0, 'name' => 'Japan', 'code' => 'JP'],
            ['active' => 0, 'name' => 'Jersey', 'code' => 'JE'],
            ['active' => 0, 'name' => 'Jordan', 'code' => 'JO'],
            ['active' => 0, 'name' => 'Kazakhstan', 'code' => 'KZ'],
            ['active' => 0, 'name' => 'Kenya', 'code' => 'KE'],
            ['active' => 0, 'name' => 'Kiribati', 'code' => 'KI'],
            ['active' => 0, 'name' => 'Korea, Democratic People\'s Republic of', 'code' => 'KP'],
            ['active' => 0, 'name' => 'Korea, Republic of', 'code' => 'KR'],
            ['active' => 0, 'name' => 'Kuwait', 'code' => 'KW'],
            ['active' => 0, 'name' => 'Kyrgyzstan', 'code' => 'KG'],
            ['active' => 0, 'name' => 'Lao People\'s Democratic Republic', 'code' => 'LA'],
            ['active' => 0, 'name' => 'Latvia', 'code' => 'LV'],
            ['active' => 0, 'name' => 'Lebanon', 'code' => 'LB'],
            ['active' => 0, 'name' => 'Lesotho', 'code' => 'LS'],
            ['active' => 0, 'name' => 'Liberia', 'code' => 'LR'],
            ['active' => 0, 'name' => 'Libya', 'code' => 'LY'],
            ['active' => 0, 'name' => 'Liechtenstein', 'code' => 'LI'],
            ['active' => 0, 'name' => 'Lithuania', 'code' => 'LT'],
            ['active' => 0, 'name' => 'Luxembourg', 'code' => 'LU'],
            ['active' => 0, 'name' => 'Macao', 'code' => 'MO'],
            ['active' => 0, 'name' => 'Macedonia, the Former Yugoslav Republic of', 'code' => 'MK'],
            ['active' => 0, 'name' => 'Madagascar', 'code' => 'MG'],
            ['active' => 0, 'name' => 'Malawi', 'code' => 'MW'],
            ['active' => 0, 'name' => 'Malaysia', 'code' => 'MY'],
            ['active' => 0, 'name' => 'Maldives', 'code' => 'MV'],
            ['active' => 0, 'name' => 'Mali', 'code' => 'ML'],
            ['active' => 0, 'name' => 'Malta', 'code' => 'MT'],
            ['active' => 0, 'name' => 'Marshall Islands', 'code' => 'MH'],
            ['active' => 0, 'name' => 'Martinique', 'code' => 'MQ'],
            ['active' => 0, 'name' => 'Mauritania', 'code' => 'MR'],
            ['active' => 0, 'name' => 'Mauritius', 'code' => 'MU'],
            ['active' => 0, 'name' => 'Mayotte', 'code' => 'YT'],
            ['active' => 0, 'name' => 'Mexico', 'code' => 'MX'],
            ['active' => 0, 'name' => 'Micronesia, Federated States of', 'code' => 'FM'],
            ['active' => 0, 'name' => 'Moldova, Republic of', 'code' => 'MD'],
            ['active' => 0, 'name' => 'Monaco', 'code' => 'MC'],
            ['active' => 0, 'name' => 'Mongolia', 'code' => 'MN'],
            ['active' => 0, 'name' => 'Montenegro', 'code' => 'ME'],
            ['active' => 0, 'name' => 'Montserrat', 'code' => 'MS'],
            ['active' => 0, 'name' => 'Morocco', 'code' => 'MA'],
            ['active' => 0, 'name' => 'Mozambique', 'code' => 'MZ'],
            ['active' => 0, 'name' => 'Myanmar', 'code' => 'MM'],
            ['active' => 0, 'name' => 'Namibia', 'code' => 'NA'],
            ['active' => 0, 'name' => 'Nauru', 'code' => 'NR'],
            ['active' => 0, 'name' => 'Nepal', 'code' => 'NP'],
            ['active' => 0, 'name' => 'Netherlands', 'code' => 'NL'],
            ['active' => 0, 'name' => 'New Caledonia', 'code' => 'NC'],
            ['active' => 0, 'name' => 'New Zealand', 'code' => 'NZ'],
            ['active' => 0, 'name' => 'Nicaragua', 'code' => 'NI'],
            ['active' => 0, 'name' => 'Niger', 'code' => 'NE'],
            ['active' => 0, 'name' => 'Nigeria', 'code' => 'NG'],
            ['active' => 0, 'name' => 'Niue', 'code' => 'NU'],
            ['active' => 0, 'name' => 'Norfolk Island', 'code' => 'NF'],
            ['active' => 0, 'name' => 'Northern Mariana Islands', 'code' => 'MP'],
            ['active' => 0, 'name' => 'Norway', 'code' => 'NO'],
            ['active' => 0, 'name' => 'Oman', 'code' => 'OM'],
            ['active' => 0, 'name' => 'Pakistan', 'code' => 'PK'],
            ['active' => 0, 'name' => 'Palau', 'code' => 'PW'],
            ['active' => 0, 'name' => 'Palestine, State of', 'code' => 'PS'],
            ['active' => 0, 'name' => 'Panama', 'code' => 'PA'],
            ['active' => 0, 'name' => 'Papua New Guinea', 'code' => 'PG'],
            ['active' => 0, 'name' => 'Paraguay', 'code' => 'PY'],
            ['active' => 0, 'name' => 'Peru', 'code' => 'PE'],
            ['active' => 0, 'name' => 'Philippines', 'code' => 'PH'],
            ['active' => 0, 'name' => 'Pitcairn', 'code' => 'PN'],
            ['active' => 0, 'name' => 'Poland', 'code' => 'PL'],
            ['active' => 0, 'name' => 'Portugal', 'code' => 'PT'],
            ['active' => 0, 'name' => 'Puerto Rico', 'code' => 'PR'],
            ['active' => 0, 'name' => 'Qatar', 'code' => 'QA'],
            ['active' => 0, 'name' => 'Réunion', 'code' => 'RE'],
            ['active' => 0, 'name' => 'Romania', 'code' => 'RO'],
            ['active' => 0, 'name' => 'Russian Federation', 'code' => 'RU'],
            ['active' => 0, 'name' => 'Rwanda', 'code' => 'RW'],
            ['active' => 0, 'name' => 'Saint Barthélemy', 'code' => 'BL'],
            ['active' => 0, 'name' => 'Saint Helena, Ascension and Tristan da Cunha', 'code' => 'SH'],
            ['active' => 0, 'name' => 'Saint Kitts and Nevis', 'code' => 'KN'],
            ['active' => 0, 'name' => 'Saint Lucia', 'code' => 'LC'],
            ['active' => 0, 'name' => 'Saint Martin (French part)', 'code' => 'MF'],
            ['active' => 0, 'name' => 'Saint Pierre and Miquelon', 'code' => 'PM'],
            ['active' => 0, 'name' => 'Saint Vincent and the Grenadines', 'code' => 'VC'],
            ['active' => 0, 'name' => 'Samoa', 'code' => 'WS'],
            ['active' => 0, 'name' => 'San Marino', 'code' => 'SM'],
            ['active' => 0, 'name' => 'Sao Tome and Principe', 'code' => 'ST'],
            ['active' => 0, 'name' => 'Saudi Arabia', 'code' => 'SA'],
            ['active' => 0, 'name' => 'Senegal', 'code' => 'SN'],
            ['active' => 0, 'name' => 'Serbia', 'code' => 'RS'],
            ['active' => 0, 'name' => 'Seychelles', 'code' => 'SC'],
            ['active' => 0, 'name' => 'Sierra Leone', 'code' => 'SL'],
            ['active' => 0, 'name' => 'Singapore', 'code' => 'SG'],
            ['active' => 0, 'name' => 'Sint Maarten (Dutch part)', 'code' => 'SX'],
            ['active' => 0, 'name' => 'Slovakia', 'code' => 'SK'],
            ['active' => 0, 'name' => 'Slovenia', 'code' => 'SI'],
            ['active' => 0, 'name' => 'Solomon Islands', 'code' => 'SB'],
            ['active' => 0, 'name' => 'Somalia', 'code' => 'SO'],
            ['active' => 0, 'name' => 'South Africa', 'code' => 'ZA'],
            ['active' => 0, 'name' => 'South Georgia and the South Sandwich Islands', 'code' => 'GS'],
            ['active' => 0, 'name' => 'South Sudan', 'code' => 'SS'],
            ['active' => 0, 'name' => 'Spain', 'code' => 'ES'],
            ['active' => 0, 'name' => 'Sri Lanka', 'code' => 'LK'],
            ['active' => 0, 'name' => 'Sudan', 'code' => 'SD'],
            ['active' => 0, 'name' => 'Suriname', 'code' => 'SR'],
            ['active' => 0, 'name' => 'Svalbard and Jan Mayen', 'code' => 'SJ'],
            ['active' => 0, 'name' => 'Swaziland', 'code' => 'SZ'],
            ['active' => 0, 'name' => 'Sweden', 'code' => 'SE'],
            ['active' => 0, 'name' => 'Switzerland', 'code' => 'CH'],
            ['active' => 0, 'name' => 'Syrian Arab Republic', 'code' => 'SY'],
            ['active' => 0, 'name' => 'Taiwan', 'code' => 'TW'],
            ['active' => 0, 'name' => 'Tajikistan', 'code' => 'TJ'],
            ['active' => 0, 'name' => 'Tanzania, United Republic of', 'code' => 'TZ'],
            ['active' => 0, 'name' => 'Thailand', 'code' => 'TH'],
            ['active' => 0, 'name' => 'Timor-Leste', 'code' => 'TL'],
            ['active' => 0, 'name' => 'Togo', 'code' => 'TG'],
            ['active' => 0, 'name' => 'Tokelau', 'code' => 'TK'],
            ['active' => 0, 'name' => 'Tonga', 'code' => 'TO'],
            ['active' => 0, 'name' => 'Trinidad and Tobago', 'code' => 'TT'],
            ['active' => 0, 'name' => 'Tunisia', 'code' => 'TN'],
            ['active' => 0, 'name' => 'Turkey', 'code' => 'TR'],
            ['active' => 0, 'name' => 'Turkmenistan', 'code' => 'TM'],
            ['active' => 0, 'name' => 'Turks and Caicos Islands', 'code' => 'TC'],
            ['active' => 0, 'name' => 'Tuvalu', 'code' => 'TV'],
            ['active' => 0, 'name' => 'Uganda', 'code' => 'UG'],
            ['active' => 0, 'name' => 'Ukraine', 'code' => 'UA'],
            ['active' => 0, 'name' => 'United Arab Emirates', 'code' => 'AE'],
            ['active' => 0, 'name' => 'United Kingdom', 'code' => 'GB'],
            ['active' => 0, 'name' => 'United States', 'code' => 'US'],
            ['active' => 0, 'name' => 'United States Minor Outlying Islands', 'code' => 'UM'],
            ['active' => 0, 'name' => 'Uruguay', 'code' => 'UY'],
            ['active' => 0, 'name' => 'Uzbekistan', 'code' => 'UZ'],
            ['active' => 0, 'name' => 'Vanuatu', 'code' => 'VU'],
            ['active' => 0, 'name' => 'Venezuela, Bolivarian Republic of', 'code' => 'VE'],
            ['active' => 0, 'name' => 'Viet Nam', 'code' => 'VN'],
            ['active' => 0, 'name' => 'Virgin Islands, British', 'code' => 'VG'],
            ['active' => 0, 'name' => 'Virgin Islands, U.S.', 'code' => 'VI'],
            ['active' => 0, 'name' => 'Wallis and Futuna', 'code' => 'WF'],
            ['active' => 0, 'name' => 'Western Sahara', 'code' => 'EH'],
            ['active' => 0, 'name' => 'Yemen', 'code' => 'YE'],
            ['active' => 0, 'name' => 'Zambia', 'code' => 'ZM'],
            ['active' => 0, 'name' => 'Zimbabwe', 'code' => 'ZW'],
        ];

        foreach ($countries as $key => $value) {
            $value['name'] = strtoupper($value['name']);
            Country::create($value);
        }
    }
}