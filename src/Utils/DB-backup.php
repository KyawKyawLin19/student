<?php

    namespace Utils;
    
    use PDO;

    class DB{

        protected $pdo;

        public function __construct(){

            try{
        
                $this->pdo = new PDO("mysql:dbname=school;host=localhost",'root','root');
                
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        
            }catch(PDOException $e){
        
                die($e->getMessage());
        
            }
        }


        public function index(){


            $statement = $this->pdo->query("SELECT * FROM students");

            $students = $statement->fetchAll(PDO::FETCH_OBJ);

            return $students;

        }


        public function store($data){

            $statement = $this->pdo->prepare("
            INSERT INTO `students` (`name`, `email`, `gender`, `dob`, `age`) 
            VALUES (:name, :email, :gender, :dob, :age);
            ");

            $statement->bindParam(":name", $data["name"]);
            $statement->bindParam(":email", $data["email"]);
            $statement->bindParam(":gender", $data["gender"]);
            $statement->bindParam(":dob", $data["dob"]);
            $statement->bindParam(":age", $data["age"]);

            $statement->execute();

            if($statement) {

                header("location: index.php");

            }

        }


        public function edit($id){

            $statement = $this->pdo->prepare("SELECT * FROM students WHERE id = :id");
        
            $statement->bindParam(":id",$id);
            
            $statement->execute();

            $student = $statement->fetch(PDO::FETCH_OBJ);

            return $student;

        }


        public function update($data){

            $statement = $this->pdo->prepare("
            UPDATE `students`
            SET name = :name, email = :email, gender = :gender, dob = :dob, age = :age
            WHERE id = :id
            ");

            $statement->bindParam(":id", $data["id"]);
            $statement->bindParam(":name", $data["name"]);
            $statement->bindParam(":email", $data["email"]);
            $statement->bindParam(":gender", $data["gender"]);
            $statement->bindParam(":dob", $data["dob"]);
            $statement->bindParam(":age", $data["age"]);

            if($statement->execute()) {

                header("location: index.php");

            }

        }


        public function destroy($id){

            $statement = $this->pdo->prepare("DELETE FROM students WHERE id = :id");
        
            $statement->bindParam(":id",$id);
            
            if($statement->execute()) {

                header("location: index.php");

            }
        }

    }

?>