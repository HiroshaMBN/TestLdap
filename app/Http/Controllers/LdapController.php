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
            echo "<color='red'>".$testPass;
        }else{
            echo $testFailed;
        }





        //return view("connection", with(["va"=>$t]));
        // return view("connection")->with('t',$t);


    }

    }







