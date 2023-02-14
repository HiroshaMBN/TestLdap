<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Http\Request;
use Psy\Command\Command;
// use Symfony\Component\Process\Process;
use Symfony\Component\Process\Process;

class LdapController extends Controller
{
    public $t;

    //



    public function TestLdapData(){
         $testPass ="Connection Test Passed";
         $testFailed ="Connection Test Failed";
         Artisan::call('ldap:test');
         $output = Artisan::output();
        //  echo $output;
        $lines = explode(PHP_EOL,$output);

        $headers = [];
        $values = [];


        foreach ($lines as $line) {
            if (strpos($line, '|') === 0) {
                // This is a header row
                $headers = array_map('trim', explode('|', $line));
            }
             else if (strpos($line, '|') !== false) {
                // This is a data row
                $data = array_map('trim', explode('|', $line));
                $values[] = array_combine($headers, $data);

             }

            // }
        }
        $t = (array_map(null,$headers));
        // print_r($t[4]);
        if(($t[4] == "Successfully connected.")){
            // echo "<h4 style='color:#00d82f'>".$testPass. "</h4>";

            return response()->json([
                "message" => $testPass,
            ]);
        }else{
            // echo "<h4 style='color:#e60d2a'>" . $testFailed . "</h4>";

            return response()->json([
                "message" => $testFailed
            ]);
        }





        //return view("connection", with(["va"=>$t]));
        // return view("connection")->with('t',$t);


    }

    }







