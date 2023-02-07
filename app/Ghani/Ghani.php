<?php

namespace App\Ghani;


class Ghani
{
    public function __construct()
    {
        $this->init();
    }

    public function init(){
        /*
        *
        * 
        * $arv[0] = 'ghanicmd'
        * $arg[1] = 'action:action-arg'
        * $arg[2] = 'arg'
        * 
        * */
        global $argv;

        if (count($argv) > 1) {

            $arr = explode(':', $argv[1]);

            switch ($arr[0]) {
                case 'create': {
                        $this->create($arr);
                        break;
                    }
                default: {
                        echo "could not found command $arr[0]";
                        break;
                    }
            }
        } else {
            echo "Not enough arguments";
        }

    }

    public function create($arr){
        if (count($arr) == 2) {
            $type = $arr[1];

            switch ($type) {
                case 'folder': {
                        $this->createFolder();
                        break;
                    }
                default: {
                        echo "could not create $arr[1]";
                    }
            }
        } else {
            echo "Not enough arguments";
        }
    }


    public function createFolder()
    {
        global $argv;
        if (count($argv) > 2) {
            $folderName = $argv[2];
            if (!file_exists($folderName)) {
                if (!mkdir($folderName, 0777, true)) {
                    die('Failed to create directories...');
                }
                echo "Folder Created!";
            } else {
                echo "Folder Already There";
            }
        } else {
            echo "Not enough arguments";
        }
    }
}
