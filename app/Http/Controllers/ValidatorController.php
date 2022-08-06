<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidatorController extends Controller
{
    private $topic, $dbname;
    private $test_code, $isAllowSubmit;

    protected function displayHint($myhint)
    {
        $hint = "<div style='color: red; font-weight:bold; background-color:rgba(255, 255, 0, 0.2);'>";
        $hint .= "<i class='fa-solid fa-triangle-exclamation'></i> " .  $myhint;
        $hint .= "</div>";
        return $hint;
    }

    protected function displayError($myerror)
    {
        $error = "<div id='output-text' style='color: red; background-color:rgba(255, 0, 0, 0.15);'>";
        $error .= $myerror;
        $error .= "</div>";
        return $error;
    }

    public function connectToDatabase($dbname)
    {
        if (!pg_connect("host = localhost port = 5432 dbname=$dbname user=postgres  password=postgres")) {
            throw new \Exception('SYSTEM_ERROR: Cant connect to database!');
        }
        return pg_connect("host = localhost port = 5432 dbname=$dbname user=postgres  password=postgres");
    }

    public function disconnectFromDatabase($connection)
    {
        if (!pg_close($connection)) {
            throw new \Exception('SYSTEM_ERROR: Cant disconnect from database!');
        }
    }

    public function executeCode($connection, $code, $topic)
    {
        if (str_contains(strtolower($code), strtolower($topic))) {
            $result = pg_query($connection, $code);
            if (!$result) {
                throw new \Exception($this->displayError(pg_last_error($connection)));
            } else {
                return $result;
            }
        } else {
            throw new \Exception($this->displayHint("Anda bisa menggunakan <strong>$topic</strong> pada pembelajaran kali ini"));
        }
    }

    public function executeTest($connection, $test_code)
    {
        $result = pg_query($connection, $test_code);
        if (!$result) {
            throw new \Exception($this->displayError(pg_last_error($connection)));
        } else {
            return $result;
        }
    }

    public function displayTestResult($test_result)
    {
        $result = "<div id='output-text' class='w-100 font-weight-bold'> ";
        while ($row = pg_fetch_assoc($test_result)) {
            if (str_contains($row['runtests'], 'not ok')) {
                $this->isAllowSubmit = false;
                $result .= "<div class='alert alert-danger'>";
                $result .= "<i class='fas fa-times'></i> " .  $row['runtests'];
                $result .= "</div>";
            } else if (str_contains($row['runtests'], 'failed')) {
                $this->isAllowSubmit = false;
                $result .= "<div class='alert alert-warning'>";
                $result .= "<i class='fas fa-exclamation-triangle'></i> " .  $row['runtests'];
                $result .= "</div>";
                
            } else {
                $this->isAllowSubmit = true;
                $result .= "<div class='alert alert-success'>";
                $result .= "<i class='fas fa-check'> </i> " .  $row['runtests'];
                $result .= "</div>";
            }
        }
        $result .= "</div>";
        return $result;
    }

    public function runTest(Request $request)
    {

        //Get task data
        $test = Question::where('id', '=',  $request->question_id)->get();
        $this->test_code = $test[0]->test_code;
        $this->topic = $test[0]->topic;
        $this->dbname = $test[0]->dbname . Auth::user()->id;

        if (strcmp($test[0]->topic, "CREATE Database") == 0) {
            if (strcasecmp($request->code, "create database my_playlist;") == 0) {
                $finalResult = "<div id='output-text'>";
                $finalResult .= "<div style='color: green; background-color:rgba(0, 255, 0, 0.2);'>";
                $finalResult .= "<i class='fas fa-check'> </i> " . "Membuat database my_playlist";
                $finalResult .= "</div>";
                $finalResult .= "</div>";
            } else {
                $finalResult = "<div id='output-text'>";
                $finalResult .= "<div style='color: red; background-color:rgba(255, 0, 0, 0.15);'>";
                $finalResult .= "<i class='fas fa-times'> </i> " . "Membuat database my_playlist";
                $finalResult .= "</div>";
                $finalResult .= "</div>";
            }

            //Display test result
            return response()->json(['result' => $finalResult]);
        } else if (strcmp($test[0]->topic, "DROP Database") == 0) {
            if (strcasecmp($request->code, "DROP DATABASE my_playlists;") == 0) {
                $finalResult = "<div id='output-text'>";
                $finalResult .= "<div style='color: green; background-color:rgba(0, 255, 0, 0.2);'>";
                $finalResult .= "<i class='fas fa-check'> </i> " . "Menghapus database my_playlist";
                $finalResult .= "</div>";
                $finalResult .= "</div>";
            } else {
                $finalResult = "<div id='output-text'>";
                $finalResult .= "<div style='color: red; background-color:rgba(255, 0, 0, 0.15);'>";
                $finalResult .= "<i class='fas fa-times'> </i> " . "Menghapus database my_playlist";
                $finalResult .= "</div>";
                $finalResult .= "</div>";
            }

            //Display test result
            return response()->json(['result' => $finalResult]);
        } else {
            //Get Connection 1
            try {
                $pg_connection = $this->connectToDatabase('postgres');
                pg_query($pg_connection, "DROP DATABASE IF EXISTS " . $this->dbname . ";");
                pg_query($pg_connection, "create database " . $this->dbname . ";");
            } catch (\Exception $e) {
                return response()->json(['result' =>  $this->displayError($e->getMessage())]);
            }

            //Get Connection 2
            try {
                $mhs_connection = $this->connectToDatabase($this->dbname);
            } catch (\Exception $e) {
                return response()->json(['result' =>  $this->displayError($e->getMessage())]);
            }

            //Execute Code
            $mycode = "BEGIN;";
            $mycode = $test[0]->required_table;
            $mycode .= $request->code;
            try {
                $this->executeCode($mhs_connection, $mycode, $this->topic, $this->dbname);
            } catch (\Exception $e) {
                return response()->json(['result' =>  $this->displayError($e->getMessage())]);
            }

            //Execute Test
            try {
                $finalResult = $this->displayTestResult($this->executeTest($mhs_connection, $this->test_code));
            } catch (\Exception $e) {
                return response()->json(['result' =>  $this->displayError($e->getMessage())]);
            }

            //Close Connection
            try {
                pg_query($mhs_connection, 'ROLLBACK;');
                $this->disconnectFromDatabase($mhs_connection);
                pg_query($pg_connection, "DROP DATABASE IF EXISTS " . $this->dbname);
            } catch (\Exception $e) {
                return response()->json(['result' => $e->getMessage()]);
            }

            //Display test result
            return response()->json(['result' => $finalResult]);
        }
    }
}
