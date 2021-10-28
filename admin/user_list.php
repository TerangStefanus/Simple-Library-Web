<?php 
  include '../dbconnect.php';
?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style_admin.css">

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>    
<div id="app">
        <div class="sidebar">
            <div class="header">
              <div>
                <img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <h4 class="m-0">Administrator</h4>
                <p class="font-weight-light text-muted mb-0">Kelompok 7</p>
              </div>
            </div>
            <div class="body">
            <a href="index.php"><div class="item">Dashboard</div></a>
                <a href="user_list.php"><div class="item active">User List</div></a>
                <a href="book_list.php"><div class="item">Book List</div></a>
                <a href="logout.php"><div class="item">Log out</div></a>
            </div>
        </div>
        <div class="content">
            <div class="header">
                <div class="hamburger" onclick="toggleSidebar()">
                    <div></div>
                    <div></div>
                    <div></div>
				</div>
				<div class="col" style="float:left;">Dashboard</div>
            <div class="logout"><a href="logout.php">SIGN OUT <i class="fa fa-sign-out"></i></a></div>
            </div>
            <div class="body">
            </div>
            <div class="container">         
			
            </div>

    <!-- page title area end -->
    <div class="main-content-inner"> 
        <!-- market value area start -->
        <div class="row mt-5 mb-5">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-center">
                  <h2>Customer List</h2>
                </div>
                  <div class="data-tables datatable-dark">
                    <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
                      <tr>
                          <th>No.</th>
                          <th>Customer Name</th>
                          <th>Phone Number</th>
                          <th>Address</th>
                          <th>Email</th>
                          <th>Action</th>
                      </tr></thead>
                      <tbody>

                      <?php 
                          $brgs=mysqli_query($conn,"SELECT * from users where role='member' order by id ASC");
                          $no=1;
                          while($p=mysqli_fetch_array($brgs)){
                      ?>
                      <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $p['fullname'] ?></td>
                          <td><?php echo $p['phonenumber'] ?></td>
                          <td><?php echo $p['address'] ?></td>
                          <td><?php echo $p['email'] ?></td>
                          <td>
                              <a class="btn btn-danger" href="../proses/delete_user.php?id=<?php echo $p['id']?>" >Delete</a>                            
                          </td>
                      </tr>		
                      <?php 
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <!-- Button trigger modal -->
    </div>
</div>
</div>

<script>
        function toggleSidebar(){
            const side = document.querySelector('#app .sidebar');
            side.classList.toggle('sidebar-hide');
        }
</script>
<script>
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
        });
</script>