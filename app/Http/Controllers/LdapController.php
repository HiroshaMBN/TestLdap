<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// use PSpell\Config;
use Psy\Command\Command;
// use Symfony\Component\Process\Process;
use Symfony\Component\Process\Process;

class LdapController extends Controller
{
    public $t;

    //

    public function updateSettings(Request $request)
    {
        // Config::set('ldap.hosts', $request->input('hosts'));
        // Config::set('ldap.username', $request->input('username'));
        // Config::set('ldap.password', $request->input('password'));
        // Config::set('ldap.port', $request->input('port'));
        // Config::set('ldap.base_dn', $request->input('base_dn'));


        // if ($request->has('password')) {
        //     Config::set('ldap.password', $request->input('password'));
        // }
        // Redirect to the previous page with a success message
        // return back()->with('success', 'LDAP settings updated successfully');



    }

    public function saveDataAPI(Request $request){

        $serverURL = $request->input('serverURL');
        $userField = $request->input('userField');
        $DN = $request->input('DN');
        $LoginID = $request->input('LoginID');
        $password = $request->input('password');

        // Create the contents of the file
        $contents = "[LDAP]\nServeURL = $serverURL\nuserField = $userField\nLoginID = $LoginID\npassword = $password";

        // Save the contents to the file
        $path = public_path('../config/data.ini');
        File::put($path, $contents);

        return response()->json([

            "serveURL" => $serverURL,
            "userField" => $userField,
            "DN" => $DN,
            "LoginID" => $LoginID,
            "password" => $password,


        ]);

        // echo '<br>URL '.  $serverURL.'<br>USER '. $value2.'<br>UserName '. $value4.'<br>Password '. $value5."\n<br>";


    }





    public function saveTxt(Request $request){
        // $name = $request->input('username');
        // $request = Request::capture();


        $serverURL = $request->input('serverURL');
        $userField = $request->input('userField');
        $DN = $request->input('DN');
        $LoginID = $request->input('LoginID');
        $password = $request->input('password');


    //    $file = File::put(public_path('../config\data.ini'), "[LDAP]\nServeURL => $serverURL\nuserField => $userField\n => $LoginID\npassword => $password");
        //with out DN
        $file = File::put(public_path('../config\data.ini'), "[LDAP]\nServeURL = $serverURL\nuserField = $userField\nLoginID = $LoginID\npassword = $password");
        // return redirect()->back();

        // Specify the path of the .ini file
        $path = '../config\data.ini';

        // Read the contents of the .ini file and parse it
        $config = parse_ini_file($path, true);

        // Access the values from the parsed .ini file
        $value = $config['LDAP']['ServeURL'];
        $value2 = $config['LDAP']['userField'];
        // $value3 = $config['LDAP']['userField'];
        $value4 = $config['LDAP']['LoginID'];
        $value5 = $config['LDAP']['password'];



        echo '<br>URL '.  $value.'<br>USER '. $value2.'<br>UserName '. $value4.'<br>Password '. $value5."\n<br>";










        return view('welcome')->with('value' , $value);


        // echo $file;











        // $array = [1, 2, 3, 4, 5];
        // $data = implode(',', $array); // convert array to comma-separated string

        // // save data to file
        // file_put_contents('data.txt', $data);
    }













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







