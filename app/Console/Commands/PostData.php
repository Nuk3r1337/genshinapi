<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Character;
use App\Ascension;
use App\Level;
use App\Option;
use App\OptionType;

class PostData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Posts webscraped data to database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        include('vendor/autoload.php');

        include('simple_html_dom.php');

        for($charCount = 0; $charCount <= 22; $charCount++) {

            $characters = ['Amber', 'Barbara', 'Beidou', 'Bennett', 'Chongyun', 'Diluc', 'Diona', 'Fischl', 'Jean', 'Kaeya', 'Keqing', 'Klee', 'Lisa', 'Mona', 'Ningguang', 'Noelle', 'Qiqi', 'Razor', 'Sucrose', 'Tartaglia', 'Venti', 'Xiangling', 'Xingqiu'];
            //$charCount = 0;
            $listCount = 4;

            //traveler is broken so I don't use
            /*if ($charCount == 20) {
                $listCount = 13;
            } else {
                $listCount = 4;
            }*/
            $url = 'https://genshin-impact.fandom.com/wiki/' . $characters[$charCount];
            $html = file_get_html($url);

            $list = $html->find('table[class="wikitable"]', $listCount);

            $headers = [];
            $data = [];

            $table = [[]];

            $i = 0;
            $ii = 0;

            foreach ($list->find('th') as $element) {
                $headers[$i] = $element->plaintext;
                $i++;
            }
            foreach ($list->find('td') as $element) {
                $data[$ii] = $element->plaintext;
                $ii++;
            }

            $table[0][0] = $headers[0];
            $table[0][1] = $headers[1];
            $table[0][2] = $headers[2];
            $table[0][3] = $headers[3];
            $table[0][4] = $headers[4];
            $table[0][5] = $headers[5];
            $table[1][0] = $headers[6];
            $table[1][1] = $data[0];
            $table[1][2] = $data[1];
            $table[1][3] = $data[2];
            $table[1][4] = $data[3];
            $table[1][5] = $data[4];
            $table[2][0] = $headers[6];
            $table[2][1] = $data[5];
            $table[2][2] = $data[6];
            $table[2][3] = $data[7];
            $table[2][4] = $data[8];
            $table[2][5] = $data[9];
            $table[3][0] = $headers[7];
            $table[3][1] = $data[10];
            $table[3][2] = $data[11];
            $table[3][3] = $data[12];
            $table[3][4] = $data[13];
            $table[3][5] = $data[14];
            $table[4][0] = $headers[7];
            $table[4][1] = $data[15];
            $table[4][2] = $data[16];
            $table[4][3] = $data[17];
            $table[4][4] = $data[18];
            $table[4][5] = $data[18];
            $table[5][0] = $headers[8];
            $table[5][1] = $data[20];
            $table[5][2] = $data[21];
            $table[5][3] = $data[22];
            $table[5][4] = $data[23];
            $table[5][5] = $data[24];
            $table[6][0] = $headers[8];
            $table[6][1] = $data[25];
            $table[6][2] = $data[26];
            $table[6][3] = $data[27];
            $table[6][4] = $data[28];
            $table[6][5] = $data[29];
            $table[7][0] = $headers[9];
            $table[7][1] = $data[30];
            $table[7][2] = $data[31];
            $table[7][3] = $data[32];
            $table[7][4] = $data[33];
            $table[7][5] = $data[34];
            $table[8][0] = $headers[9];
            $table[8][1] = $data[35];
            $table[8][2] = $data[36];
            $table[8][3] = $data[37];
            $table[8][4] = $data[38];
            $table[8][5] = $data[39];
            $table[9][0] = $headers[10];
            $table[9][1] = $data[40];
            $table[9][2] = $data[41];
            $table[9][3] = $data[42];
            $table[9][4] = $data[43];
            $table[9][5] = $data[44];
            $table[10][0] = $headers[10];
            $table[10][1] = $data[45];
            $table[10][2] = $data[46];
            $table[10][3] = $data[47];
            $table[10][4] = $data[48];
            $table[10][5] = $data[49];
            $table[11][0] = $headers[11];
            $table[11][1] = $data[50];
            $table[11][2] = $data[51];
            $table[11][3] = $data[52];
            $table[11][4] = $data[53];
            $table[11][5] = $data[54];
            $table[12][0] = $headers[11];
            $table[12][1] = $data[55];
            $table[12][2] = $data[56];
            $table[12][3] = $data[57];
            $table[12][4] = $data[58];
            $table[12][5] = $data[59];
            $table[13][0] = $headers[12];
            $table[13][1] = $data[60];
            $table[13][2] = $data[61];
            $table[13][3] = $data[62];
            $table[13][4] = $data[63];
            $table[13][5] = $data[64];
            $table[14][0] = $headers[12];
            $table[14][1] = $data[65];
            $table[14][2] = $data[66];
            $table[14][3] = $data[67];
            $table[14][4] = $data[68];
            $table[14][5] = $data[69];

            /*echo $table[0][0]; echo $table[0][1]; echo $table[0][2]; echo $table[0][3]; echo $table[0][4]; echo $table[0][5]; echo "\n";
            echo $table[1][0]; echo $table[1][1]; echo $table[1][2]; echo $table[1][3]; echo $table[1][4]; echo $table[1][5]; echo "\n";
            echo $table[2][0]; echo $table[2][1]; echo $table[2][2]; echo $table[2][3]; echo $table[2][4]; echo $table[2][5]; echo "\n";
            echo $table[3][0]; echo $table[3][1]; echo $table[3][2]; echo $table[3][3]; echo $table[3][4]; echo $table[3][5]; echo "\n";
            echo $table[4][0]; echo $table[4][1]; echo $table[4][2]; echo $table[4][3]; echo $table[4][4]; echo $table[4][5]; echo "\n";
            echo $table[5][0]; echo $table[5][1]; echo $table[5][2]; echo $table[5][3]; echo $table[5][4]; echo $table[5][5]; echo "\n";
            echo $table[6][0]; echo $table[6][1]; echo $table[6][2]; echo $table[6][3]; echo $table[6][4]; echo $table[6][5]; echo "\n";
            echo $table[7][0]; echo $table[7][1]; echo $table[7][2]; echo $table[7][3]; echo $table[7][4]; echo $table[7][5]; echo "\n";
            echo $table[8][0]; echo $table[8][1]; echo $table[8][2]; echo $table[8][3]; echo $table[8][4]; echo $table[8][5]; echo "\n";
            echo $table[9][0]; echo $table[9][1]; echo $table[9][2]; echo $table[9][3]; echo $table[9][4]; echo $table[9][5]; echo "\n";
            echo $table[10][0]; echo $table[10][1]; echo $table[10][2]; echo $table[10][3]; echo $table[10][4]; echo $table[10][5]; echo "\n";
            echo $table[11][0]; echo $table[11][1]; echo $table[11][2]; echo $table[11][3]; echo $table[11][4]; echo $table[11][5]; echo "\n";
            echo $table[12][0]; echo $table[12][1]; echo $table[12][2]; echo $table[12][3]; echo $table[12][4]; echo $table[12][5]; echo "\n";
            echo $table[13][0]; echo $table[13][1]; echo $table[13][2]; echo $table[13][3]; echo $table[13][4]; echo $table[13][5]; echo "\n";
            echo $table[14][0]; echo $table[14][1]; echo $table[14][2]; echo $table[14][3]; echo $table[14][4]; echo $table[14][5]; echo "\n";*/

            list($http, $dash, $game, $wiki, $name) = explode("/", $url);
            $levelcount = 0;

            //Inserts name into database
            Character::firstOrCreate([
                'name' => $name
            ]);

            //Creates relationship between ascension and character
            for ($x = 1; $x <= 13; $x++) {

                Ascension::firstOrCreate([
                    'ascension' => $table[$x][0],
                    'character_id' => $charCount + 1
                ]);
            }

            //Creates relationship between ascension and level
            for ($y = 1; $y <= 7; $y++) {

                Level::firstOrCreate([
                    'ascension_id' => $y,
                    'level' => $data[$levelcount]
                ]);

                $levelcount += 5;

                Level::firstOrCreate([
                    'ascension_id' => $y,
                    'level' => $data[$levelcount]
                ]);
                $levelcount += 5;

            }

            //Inserts stat types into the database
            for ($z = 2; $z <= 5; $z++) {
                OptionType::firstOrCreate([
                    'name' => $table[0][$z]
                ]);
            }

            for ($level = 1; $level <= 14; $level++) {
                for ($row = 2; $row <= 5; $row++) {
                    Option::firstOrCreate([
                        'option_types_id' => $row - 1,
                        'value' => $table[$level][$row],
                        'levels_id' => $level
                    ]);
                }
            }

        }

        return 'Data migrated to database';
    }
}
