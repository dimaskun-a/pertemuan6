<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::getAllStudents();
        $data =
             ['message' => 'Get all student',
             'data' => $students ];
        
             return response()->json($data, 200);
    }

    public function store()
    {
        $input =
        student::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ]);
        $student = student::create($input);
        $data = [
            'message' => 'student is created',
            'data' => $student
        ];

        return response()->json($data, 201);
    
    }

    #membuat method show
    public function show($id) {
        $student = student::find($id);
        
        if ($student) {
            $data = [
                'message' => 'get detail student',
                'data' => $student 
            ];

            return response()->json($data, 200);
        }
        else {
            $data = [
                'massage' => 'data not found', ];

                return response()->json($data, 404); 
            }   
    }

    #membuat method update
    public function update(Request $request, $id)
    {
        #cara update data
        #cari data yang ingin diupdate apakah ada atau tidak
        #jika ada maka update datanya
        #jika tidak ada,maka munculkan pesan data tidak

        $student = Student::find($id);

        if ($student) {
                $input = [
                'nama' => $request->nama,
                'nim' => $request->nim,
                'email' => $request->email,
                'jurusan' => $request->jurusan,
            ];

            $student->update($input);

            $data = [
                'massage' => 'data is update',
                'data' => $student 
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'massage' => 'data not found', ];

                return response()->json($data, 404); 
        }
    }
    #membuat method destroy
    public function destroy($id) {
        #cari id
        #jika ada, hapus data
        #jika tidak ada, kembalikan pesan data tidak ada

        $student = $student::find($id);

        if ($student) {
            $student->delete();

            $data = [
                'massage' => 'data is delete'
            ];

            return response()->json($data, 200);
        }
        else{
            $data = [
                'massage' => 'data not found',
            ];

            return response()->json(data, 404);
        }
    }
}