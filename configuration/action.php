<?php
include './db.con.php';

$output = '';

if(isset($_POST['action'])){

    if($_POST['action'] == 'allStudents'){
        
        $sql = mysqli_query($con, "SELECT * FROM student ORDER BY id_student DESC");
        if(@mysqli_num_rows($sql) > 0){
            $output .= '<ul lass="list-group shadow-sm">';
            while($row = mysqli_fetch_assoc($sql)){
                $output .= '
                    <li class="list-group-item list-group-item-action">
                        <a href="?student='.$row['id_student'].'">'.$row['sname'].'</a>
                    </li>
                ';
            }
            $output .= '</ul>';
        }else{
            $output .= '<p class="alert alert-warning">There is no data!</p>';
        }
        sleep(2);
        print $output;
    }

    if($_POST['action'] == 'getStudent'){
        $id = $_POST['Id'];
        $sql = "SELECT * FROM student INNER JOIN class_tb on student_id = class_id";
        $query = mysqli_query($con, $sql);

        if(@mysqli_num_rows($query) > 0){
            $output .= '<h2 class="bg-success text-white text-center p-2">Student''</h2>';
            while($row = mysqli_fetch_assoc($query)){
                $output .= '
                <div class="card card-body">
                    <
                </div>';
            }

        }else{
            $output .= '<p class="alert alert-danger">Sorry there is no data found!</p>';
        }
        print $output;
    }
}