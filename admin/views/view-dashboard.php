<?php 
if(!isset($_SESSION['admin'])){
    header("Location:login.php");
}

?>
                <div class="card mb-3">
                   <div class="card-body">
                   <h2>Admin Dashboard</h2>
                   <span class="fw-bold" style="color:green;"><?php 
                   if(isset($_SESSION['name'])){
                       echo $_SESSION['name'];
                   }
                   ?></span>
                   </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h4>All Users</h4>
                        <table class="table">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>role</th>
                                <th>Action</th>
                            </tr>
                            <?php 

                            $sql = "SELECT * FROM users ORDER BY id DESC";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0){

                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id']; 
                                    $name = $row['name']; 
                                    $email = $row['email']; 
                                    $phone = $row['phone']; 
                                    $role = $row['role']; 
                            
                            
                            ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $email;?></td>
                                <td><?php echo $phone;?></td>
                                <td><?php echo $role;?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary shadow-sm">view</a>
                                    <a href="" class="btn btn-sm btn-warning shadow-sm">edit</a>
                                    <a href="" class="btn btn-sm btn-danger shadow-sm">delete</a>
                                </td>
                            </tr>
                            <?php  }
                            }else{
                                echo "No Data";
                            }
                            ?>
                        </table>
                    </div>
                </div>
          
 