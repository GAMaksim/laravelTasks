<?php 

namespace App\Models;

class Job{
    public static function all(){
        return [
            [
                'id' => 1,
                'title' => "Director",
                'salary' => 100000,
            ],
            [
                'id' => 2,
                'title' => "Manager",
                'salary' => 80000,
            ],
            [
                'id' => 3,
                'title' => "Developer",
                'salary' => 60000,
            ]
        ];
    }

    public static function find(int $id){
        $jobs = Job::all();
        
        $findingJob = [];

        foreach ($jobs as $job) {
            if ($job['id'] == $id) {
                $findingJob = $job;
            }
        }

        if(!$findingJob){
            return abort(404);
        }

        return $findingJob;


    }
}